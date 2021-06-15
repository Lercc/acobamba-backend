<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivation extends Model
{
    use HasFactory;
    protected $fillable = [
        'expediente_id',
        'user_id',
        'observations',
        'status'
    ];

    public function expedient()
    {
        return $this->belongsTo(Expedient::class);
    }
    
}
