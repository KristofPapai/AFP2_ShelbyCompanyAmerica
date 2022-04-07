<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Course extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $primaryKey = 'course_id';
    public $incrementing = false;
    protected $fillable = [
        'course_id',
        'course_name',
        'teacher_id'
    ];
}
