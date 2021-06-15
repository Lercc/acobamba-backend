<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    public function suboffices()
    {
        return $this->hasMany(Suboffice::class);
    }

    public function employee()
    {
        return $this->HasOne(Employee::class);
    }
}
