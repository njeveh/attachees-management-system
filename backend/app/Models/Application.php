<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Application extends Model
{
    use HasFactory, HasUuids;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'applicant_id',
        'advert_id',
        'status',
        //pending, rejected, accepted, canceled
        'desired_start_date', //date the applicant would like to start their attachment
        'expiry_date', //date beyond which the application is invalid as per the applicant
        'date_replied',
        'offer_accepted'
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
     * get the application accompaniments
     */
    public function applicationAccompaniments(): HasMany
    {
        return $this->hasMany(ApplicationAccompaniment::class);
    }

    /**
     * get the applicant
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class);
    }
    /**
     * get the attachee associated with this application if any
     */
    public function attachee(): HasOne
    {
        return $this->hasOne(Attachee::class);
    }
    /**
     * get the advert related to this application
     */
    public function advert(): BelongsTo
    {
        return $this->belongsTo(Advert::class);
    }
}