<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'dni_represent'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expedients(){
        return $this->hasMany(Expedient::class);
    }
}
