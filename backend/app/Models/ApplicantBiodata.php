<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ApplicantBiodata extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'applicant_id',
        'date_of_birth',
        'address',
        'phone_number',
        'disability',
        'gender',
        'level_of_study',
        'course_of_study',
        'year_of_study',

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
     * get the attachee associated with this bio data
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class);
    }
}