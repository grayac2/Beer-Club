<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package App
 */
class Message extends Model
{
    /**
     * Returns the user that sent the message
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Returns the user that the message was sent to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
