<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $dates=['done_at']; //Datumsformat
    protected $fillable=['subject', 'done_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * Hole mir den User, der mit diesem Task assoziert wird.
     */

    public function user()

    {
     return $this->belongsTo(user::class);

    }

    public function worker()
    {
        return $this->belongsTo(user::class);

    }
}
