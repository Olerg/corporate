<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Role
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Corp\Permission[] $perms
 * @property-read int|null $perms_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Corp\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    public function users(){
        return $this->belongsToMany('Corp\User','role_user');
    }

    public function perms(){
        return $this->belongsToMany('Corp\Permission','permission_role');
    }
    public function hasPermission($name, $require = false){
        if(is_array($name)){
            foreach ($name as $permissionName) {
                $hasPermission = $this->hasPermission($permissionName);

                if($hasPermission && !$require){
                    return true;
                }elseif (!$hasPermission && $require){
                    return false;
                }
            }
            return $require;
        }else{
            foreach ($this->perms()->get() as $permission){
                if($permission->name == $name){
                    return true;
                }
            }
        }
        return false;
    }
    public function savePermissions($inputPermissions){
        if(!empty($inputPermissions)){
            $this->perms()->sync($inputPermissions);
        }else{
            $this->perms()->detach();
        }
        return true;
    }
}
