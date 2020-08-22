<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Article
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property string $desc
 * @property string $alias
 * @property string $img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int $category_id
 * @property string $keywords
 * @property string $meta_desc
 * @property-read \Corp\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\Corp\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Corp\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereMetaDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Article whereUserId($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $fillable = ['title','img','alias','text','desc','keywords','meta_desc','category_id'];

    public function user(){
        return $this->belongsTo('Corp\User');
    }
    public function category(){
        return $this->belongsTo('Corp\Category');
    }
    public function comments(){
        return $this->hasMany('Corp\Comment');
    }
}
