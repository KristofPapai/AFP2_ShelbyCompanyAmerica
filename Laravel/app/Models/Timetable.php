<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Timetable extends Model
{
    use HasFactory,HasApiTokens,Notifiable;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'course_id',
        'student_id'
    ];
}
