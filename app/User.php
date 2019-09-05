<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_available', 'main_char_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function character()
    {
        return $this->hasMany(Character::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // jwt
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    // role

    /*
    *
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) 
        {      
            return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized.');  
        }
        return $this->hasRole($roles) || abort(401, 'This action is unauthorized.');
    
    }
    /*
    *
    * Check multiple roles* @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /*
    *
    * Check one role* @param string $role
    */
    public function hasRole($role)
    {  
        return null !== $this->roles()->where('name', $role)->first();
    }


    // uuid
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->{$post->getKeyName()} = (string) Str::uuid();
        });

        static::deleting(function($user) {
            $user->character()->delete();
            $user->image()->delete();
       });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}
