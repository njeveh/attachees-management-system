<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Attachee extends Model
{
    use HasFactory, Notifiable;

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
        'institution',
        'department_id',
        'year',
        'cohort',
        'position',
        'engagement_level',
        /**
         * 0=>has_made_no_application, 1=>has_made_application, 2=>got_response,
         * 3=>got_offer_but_offer_revoked 4=>got_and_accepted_offer, 5=>reported, 6=>terminated_before_completion, 7=>'completed'.
         */
        'date_terminated',
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
     * get the user associated with this attachee
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * get the department associated with this attachee
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * get applications associated with this attcahee
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * get biodata associated with this attcahee
     */
    public function attacheeBiodata(): HasOne
    {
        return $this->hasOne(AttacheeBiodata::class);
    }

    /**
     * get skills associated with this attcahee
     */
    public function attacheeSkills(): HasMany
    {
        return $this->hasMany(AttacheeSkill::class);
    }

    /**
     * get emergency contacts associated with this attcahee
     */
    public function attacheeEmergencyContacts(): HasMany
    {
        return $this->hasMany(AttacheeEmergencyContact::class);
    }

    /**
     * get education levels associated with this attcahee
     */
    public function attacheeEducationLevels(): HasMany
    {
        return $this->hasMany(AttacheeEducationLevel::class);
    }

    /**
     * get the referees associated with this attcahee
     */
    public function attacheeReferees(): Hasmany
    {
        return $this->hasmany(AttacheeReferee::class);
    }
}