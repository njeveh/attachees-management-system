<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attachee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', 'national_id', 'first_name', 'second_name',
        'institution', 'department_id', 'year', 'cohort',
        'engagement_level',/** 0=>has_made_no_application, 1=>has_made_application, 2=>got_response,
            * 3=>accepted_offer, 4=>reported, 5=>terminated_before_completion, 6=>'completed'.
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

}
