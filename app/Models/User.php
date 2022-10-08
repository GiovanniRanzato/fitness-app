<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User extends Authenticatable // implements HasMedia
{

    use HasApiTokens, HasFactory, Notifiable; // , InteractsWithMedia;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'role' => 0, // normal user
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Generatate appropriate token for based on user role.
     * @return string
     */
    public function createAuthToken(){
        $token = '';
        switch($this->role){
            case 1:
                $token = $this->createToken('admin-token', ['admin-abilities'])->plainTextToken; 
                break;
            default:
                $token = $this->createToken('user-token',['read:invoices:only_self', 'read:users:only_self', 'update:users:only_self'])->plainTextToken;
        }
        return $token;
    }
    /**
     * Tell if user is admin or not
     * @return boolean
     */
    public function isAdmin(){
        return $this->role === 1 && $this->tokenCan('admin-abilities');
    }


    /**
     * The Collection component will show a preview thumbnail for items in the collection it is showing.
     * To generate that thumbnail, you must add a conversion like this one to your model.
     * @param Spatie\MediaLibrary\MediaCollections\Models\Media
     * @return boolean
     */

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Manipulations::FIT_CROP, 300, 300)
    //         ->nonQueued();
    // }
}