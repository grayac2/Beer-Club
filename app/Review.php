<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Review
 * @package App
 */
class Review extends Model
{
    use SoftDeletes;

    /**
     * Returns the user who made this review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the beer this review is about
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beer() {
        return $this->belongsTo(Beer::class);
    }
}
