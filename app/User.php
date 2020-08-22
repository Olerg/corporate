<?php

namespace Corp;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Corp\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $login
 * @property-read \Illuminate\Database\Eloquent\Collection|\Corp\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Corp\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){
        return $this->hasMany('Corp\Article');
    }

    public function roles(){
        return $this->belongsToMany('Corp\Role','role_user');
    }

    public function canDo($permission, $require = false){
        if(is_array($permission)){
            foreach ($permission as $permName){
                $permName = $this->canDo($permName);
                if($permName && !$require){
                    return true;
                }elseif(!$permName && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->roles as $role){
                foreach ($role->perms as $perm){
                    if(\Str::is($permission,$perm->name)){
                        return true;
                    }
                }
            }
        }
    }

    public function hasRole($name, $require = false){
        if(is_array($name)){
            foreach ($name as $roleName){
                $hasRole = $this->hasRole($roleName);
                if($hasRole && !$require){
                    return true;
                }elseif(!$hasRole && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->roles as $role){
                if($role->name == $name){
                    return true;
                }
            }
        }
    }
}
