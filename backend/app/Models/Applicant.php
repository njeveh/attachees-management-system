<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Applicant extends Model
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'national_id',
        'first_name',
        'second_name',
        'phone_number',
        'institution',
        'engagement_level',
        /**
         * 0=>has_made_no_application, 1=>has_made_application, 2=>got_response,
         * 3=>got_offer_but_offer_revoked 4=>got_and_accepted_offer, 5=>reported, 6=>terminated_before_completion, 7=>'completed'.
         */
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
     * get the user associated with this applicant
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * get applications associated with this applicant
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * get attachee instances associated with this applicant
     */
    public function attachees(): HasMany
    {
        return $this->hasMany(Attachee::class);
    }

    /**
     * get biodata associated with this applicant
     */
    public function applicantBiodata(): HasOne
    {
        return $this->hasOne(ApplicantBiodata::class);
    }

    /**
     * get skills associated with this applicant
     */
    public function applicantInterestArea(): HasMany
    {
        return $this->hasMany(ApplicantInterestArea::class);
    }

    /**
     * get emergency contacts associated with this applicant
     */
    public function applicantEmergencyContacts(): HasMany
    {
        return $this->hasMany(ApplicantEmergencyContact::class);
    }

    /**
     * get the referees associated with this applicant
     */
    public function applicantReferees(): Hasmany
    {
        return $this->hasmany(ApplicantReferee::class);
    }

    /**
     * get recommendation letters associated with this applicant
     */
    public function recommendationLetters(): HasManyThrough
    {
        return $this->hasManyThrough(RecommendationLetter::class, Attachee::class);
    }
}