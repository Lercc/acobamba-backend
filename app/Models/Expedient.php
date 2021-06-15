<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'document_type',
        'header',
        'subject', 
        'folios',
        'file',
        'status'
    ];

    //tabla Expedient - User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function notification(){ 
        return $this->hasMany(Notification::class);
    }

    public function derivation(){ 
        return $this->hasMany(Derivation::class);
    }

    
    public function archivation(){ 
        return $this->hasOne(Archivation::class);
    }

    
}
