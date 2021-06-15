<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suboffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'name',
        'status',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
