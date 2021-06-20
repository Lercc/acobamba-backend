<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Derivation extends Model
{
    use HasFactory;
    protected $fillable = [
        'expedient_id',
        'user_id',
        'employee_id',
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
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
