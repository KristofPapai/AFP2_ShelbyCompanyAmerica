<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student_Group extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $primaryKey = 'group_id';
    public $incrementing = false;
    protected $fillable = [
        'group_id',
        'group_name'
    ];
}
