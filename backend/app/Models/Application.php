<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Application extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attachee_id', 'advert_id',
        'status',//pending, rejected, accepted, cancelled
        'quarter',
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
        return $this->belongsTo(Attachee::class);
    }

    /**
     * get the advert related to this application
     */
    public function advert(): BelongsTo
    {
        return $this->belongsTo(Advert::class);
    }
}
