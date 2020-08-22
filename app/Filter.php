<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Filter
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Filter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Filter extends Model
{
    //
}
