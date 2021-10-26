<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'skills',
    ];
}
