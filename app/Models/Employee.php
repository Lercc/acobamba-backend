<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'office_id',
        'suboffice_id',
        'employee_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function suboffice()
    {
        return $this->belongsTo(Suboffice::class);
    }

    public function expedients(){
        return $this->hasMany(Expedient::class);
    }

    // public function notifications(){ 
    //     return $this->hasMany(Notification::class);
    // }

    public function derivations(){ 
        return $this->hasMany(Derivation::class);
    }


}
