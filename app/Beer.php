<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Beer
 * @package App
 */
class Beer extends Model
{
    use SoftDeletes;

    /**
     * Returns the brand this beer belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Returns the type of beer this beer is
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function beerType() {
        return $this->belongsTo(BeerType::class);
    }

    /**
     * Returns the reviews for this beer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
