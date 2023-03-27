<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, HasUuids, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * get user type.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn($value) => ["user", "attachee", "dipca_admin", "department_admin", "central_services_admin"][$value],
        ); } /**
           * get the attachee associated with this user if any
           */
    public function applicant(): HasOne {
        return $this->hasOne(Applicant::class);
    }

    /**
     * get the dipca admin associated with this user if any
     */
    public function dipcaAdmin(): HasOne
    {
        return $this->hasOne(DipcaAdmin::class);
    }

    /**
     * get the department admin associated with this user if any
     */
    public function departmentAdmin(): HasOne
    {
        return $this->hasOne(DepartmentAdmin::class);
    }

    /**
     * get the central services admin associated with this user
     */
    public function centralServicesAdmin(): HasOne
    {
        return $this->hasOne(CentralServicesAdmin::class);
    }
}