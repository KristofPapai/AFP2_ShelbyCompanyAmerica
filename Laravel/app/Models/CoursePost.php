<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePost extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';
    public $incrementing = true;
    protected $fillable = [
        'post_id',
        'course_id',
        'post_name',
        'post',
    ];
}
