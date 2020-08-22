<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Permission
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Corp\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Model
{
    public function roles(){
        return $this->belongsToMany('Corp\Role','permission_role');
    }
}
