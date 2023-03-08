<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentAdmin extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'department_id',
        'first_name',
        'last_name',
        'phone_number',
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
     * get the department associated with this admin
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * get the user associated with this admin
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
