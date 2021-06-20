<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivation extends Model
{
    use HasFactory;
    protected $fillable = [
        'expedient_id',
        'user_id',
        'observations',
        'status'
    ];

    public function expedient()
    {
        return $this->belongsTo(Expedient::class);
    }
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
