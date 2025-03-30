<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StreamType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function streams()
    {
        return $this->hasMany(Stream::class, 'type');
    }
}
