<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'address',
        'phone_number',
        'password',
        'address',
    ];

    public function getUserRoleAttribute()
    {
        return [
            '0'=>'Super Admin',
            '1'=>'Admin',
            '2'=>'Editor',
        ][$this->role_id] ?? " No User Role ";
    }
    public function getStatusAttribute()
    {
        return [
            '0'=>'Not Approved',
            '1'=>'Approved',
        ][$this->approve_status] ?? " Un authorized user ";
    }
    public function getStatusColorAttribute()
    {
        return [
            '0'=>' bg-danger',
            '1'=>' bg-success',
        ][$this->approve_status] ?? " Un authorized user ";
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
