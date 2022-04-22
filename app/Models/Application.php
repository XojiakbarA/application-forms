<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'message', 'file_href'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
