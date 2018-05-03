<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 * @package App
 */
class Brand extends Model
{
    use SoftDeletes;

    /**
     * Returns all the beers with this brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beers() {
        return $this->hasMany(Beer::class);
    }
}
