<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'user_id', 'title', 'description', 'tokens_price', 'type', 'date_expiration'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function streamType()
    {
        return $this->belongsTo(StreamType::class, 'type');
    }
}
