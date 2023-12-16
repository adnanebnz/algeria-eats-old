<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserReview
 *
 * @property int $id
 * @property int $user_id
 * @property int $reviewer_id
 * @property string $review
 * @property int $rating
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $reviewer
 * @property-read \App\Models\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereReviewerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserReview whereUserId($value)
 *
 * @mixin \Eloquent
 */
class UserReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reviewer_id',
        'review',
        'rating',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class);
    }
}
