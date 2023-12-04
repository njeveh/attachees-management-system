<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyArea extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'title',
        'description',
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
     * get the adverts associated with this study area
     */
    public function adverts(): HasMany
    {
        return $this->hasMany(Advert::class);
    }

    /**
     * get the accompaniments associated with this study area
     */
    public function studyAreaAccompaniments(): HasMany
    {
        return $this->hasMany(StudyAreaAccompaniment::class);
    }

    /**
     * get the study area department
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
