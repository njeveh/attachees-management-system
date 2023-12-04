<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Advert extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'study_area_id',
        'reference_number',
        'author',
        'last_updated_by',
        'last_approval_action_done_by',
        'last_activation_action_done_by',
        'description',
        'year',
        'quarter1_vacancies',
        'quarter2_vacancies',
        'quarter3_vacancies',
        'quarter4_vacancies',
        'approval_status',
        //pending_approval || approved || disapproved
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
    public function advertAccompaniments(): HasMany
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
     * get the advert study area
     */
    public function studyArea(): BelongsTo
    {
        return $this->belongsTo(StudyArea::class);
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
    public function applicants()
    {
        //return;
    }

    /**
     * get the attachees related to this advert
     */
    public function attachees(): HasManyThrough
    {
        return $this->hasManyThrough(Attachee::class, Application::class);
    }
}