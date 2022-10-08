<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method;
        if($method == 'PUT') {
            return [
                'name' => ['required','string'],
                'email' => ['required', 'unique:users', 'email'],
                'password' => ['required','confirmed'],
            ];
        } else {
            return [
                'name'       => ['sometimes','required'],
                'email'      => ['sometimes','required','email:unique:users'],
                'password' => ['sometimes','required','confirmed'],

            ];  
        }
    }

    protected function prepareForValidation() {
        if($this->mediaUrl){
            $this->merge([
                'media_url' => $this->mediaUrl
            ]);
        }
    }
}
