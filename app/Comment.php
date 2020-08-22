<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

/**
 * Corp\Comment
 *
 * @property int $id
 * @property string $text
 * @property string $name
 * @property string $email
 * @property string $site
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $article_id
 * @property int|null $user_id
 * @property-read \Corp\Article $article
 * @property-read \Corp\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Corp\Comment whereUserId($value)
 * @mixin \Eloquent
 */
class Comment extends Model
{
    protected $fillable = ['name','text','site','user_id','article_id','parent_id','email'];

    public function article() {
        return $this->belongsTo('Corp\Article');
    }

    public function user() {
        return $this->belongsTo('Corp\User');
    }
}
