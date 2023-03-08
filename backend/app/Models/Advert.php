<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Advert extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id', 'title', 'reference_number',
        'description', 'year', 'cohort1_vacancies',
        'cohort2_vacancies', 'cohort3_vacancies', 'cohort4_vacancies', 'approval_status', //pending_approval || approved || disapproved
        'is_active' // 0 || 1
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //
    ];
    /**
     * get the advert accompaniments
     */
    public function accompaniments(): HasMany
    {
        return $this->hasMany(AdvertAccompaniment::class);
    }
    /**
     * get the advert department
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    /**
     * get the applications made to this advert
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * get the applicants to this advert
     */
    public function applicants(): HasManyThrough
    {
        return $this->hasManyThrough(Attachee::class, Application::class);
    }
}