<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Portfolio
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $customer
 * @property string $alias
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $filter_alias
 * @property string $keywords
 * @property string $meta_desc
 * @property-read \Corp\Filter $filter
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereCustomer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereFilterAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Portfolio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Portfolio extends Model
{
    public function filter(){
        return $this->belongsTo('Corp\Filter','filter_alias','alias');
    }
}
