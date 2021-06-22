<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'phone',
        'last_name',
        'doc_type', 
        'doc_number',
        'email',
        'password',
        'status'
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //  TABLA  USER-ROL
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function processor()
    {
        return $this->HasOne(Processor::class);
    }

    public function employee()
    {
        return $this->HasOne(Employee::class);
    }

    // public function expedients(){
    //     return $this->hasMany(Expedient::class);
    // }

    // public function notifications(){ 
    //     return $this->hasMany(Notification::class);
    // }

    public function derivations(){ 
        return $this->hasMany(Derivation::class);
    }
 
    public function archivations(){ 
        return $this->hasMany(Archivation::class);
    }
}
