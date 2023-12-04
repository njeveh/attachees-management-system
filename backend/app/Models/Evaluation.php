<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_being_pursued',
        'department_id',
        'supervisor_name',
        'level_of_study',
        'attachment_duration',
        'part1_quiz',
        'part2_quiz',
        'recommendable_to_friends',
        'reasons_if_not_recommendable',
        'recommendations_to_university',
        'quarter',
        'year',

    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'part1_quiz' => 'array',
        'part2_quiz' => 'array',
    ];

}