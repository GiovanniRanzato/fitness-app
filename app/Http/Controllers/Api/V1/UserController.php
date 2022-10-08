<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\UpdateUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\UserCollection;

use App\Models\User;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return App\Http\Resources\V1\UserCollection
     */
    public function index(Request $request)
    {
        $response = Gate::inspect('index-users');
        if ($response->allowed()) {
            $filter = new UserFilter();
            $filterItems = $filter->transform($request);
            $results = User::where($filterItems);
            // $results = $results->with("category");
            return new UserCollection($results->paginate()->appends($request->query()));
        } else {
            return new Response(['message' => $response->message()], 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Http\Resources\V1\UserResource
     */
    public function show(int $id)
    {
        $requestUser = User::find($id);

        if (!$requestUser)
            return new Response(['message' => 'Not Found.'], 404);
            
        $response = Gate::inspect('show-user', [$requestUser]);
        if ($response->allowed()) {
            return new UserResource($requestUser);
        } else {
            return new Response(['message' => $response->message()], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\V1\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user) {
        // if($request->media_url)
        //     $user->clearMediaCollection();
        //     $user->addMedia($request->media_url)
        //     ->preservingOriginal()
        //     ->toMediaCollection();
        return new UserResource($user->update($request->all()) ? $user : []);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
