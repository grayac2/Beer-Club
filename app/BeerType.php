<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BeerType
 * @package App
 */
class BeerType extends Model
{
    use SoftDeletes;

    /**
     * Returns the beers with this type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beers() {
    return $this->hasMany(Beer::class);
}
}
