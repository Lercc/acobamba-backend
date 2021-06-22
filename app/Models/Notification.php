<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'expedient_id',
        'area',
        'exp_status',
        'status'
    ];

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function expedient(){
        return $this->belongsTo(Expedient::class);
    }

    // public function employee(){ 
    //     return $this->belongsTo(Employee::class);
    // }

}
