<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'last_name', 
        'doc_type', 
        'doc_number',
        'email',
        'email_verified_at' ,
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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

    public function expedient(){
        return $this->hasMany(Expedient::class);
    }

    public function notification(){ 
        return $this->hasMany(Notification::class);
    }

    public function derivation(){ 
        return $this->hasMany(Derivation::class);
    }





}
