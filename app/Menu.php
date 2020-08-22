<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Menu
 *
 * @property int $id
 * @property string $title
 * @property string $path
 * @property int $parent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Menu whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menu extends Model
{
    //
}
