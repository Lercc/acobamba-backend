<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedient extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id',
        'processor_id',
        'employee_id',
        'code',
        'document_type',
        'header',
        'subject', 
        'folios',
        'file',
        'status'
    ];

    //tabla Expedient - User
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function processor()
    {
        return $this->belongsTo(Processor::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    
    public function notifications(){ 
        return $this->hasMany(Notification::class);
    }

    public function derivations(){ 
        return $this->hasMany(Derivation::class);
    }
    
    public function archivation(){ 
        return $this->hasOne(Archivation::class);
    }
}
