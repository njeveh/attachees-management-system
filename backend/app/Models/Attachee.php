<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Attachee extends Model
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'applicant_id',
        'department_id',
        'year',
        'cohort',
        'position',
        'advert_id',
        'status',
        //active, terminated_before_completion, 'completed'.
        'date_terminated',
        'termination_reason',
        'date_started',
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
     * get the applicant associated with this attachee
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class);
    }

    /**
     * get the advert associated with this attachee position
     */
    public function advert(): BelongsTo
    {
        return $this->belongsTo(Advert::class);
    }

    /**
     * get the department associated with this attachee
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}