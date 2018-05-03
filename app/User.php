<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App3
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the reviews this user has made
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    /**
     * Returns the events this user owns/created
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventsCreated() {
        return $this->hasMany(Event::class);
    }

    /**
     * Returns the events the user is attending
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventsAttending() {
        return $this->belongsToMany(Event::class);
    }

    /**
     * Messages the user sent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMessages() {
        return $this->hasMany(Message::class, 'sender_id');
    }

    /**
     * Messages the user has received
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receivedMessages() {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}
