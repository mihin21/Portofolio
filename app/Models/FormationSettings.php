<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormationSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'diplome', 'school', 'start_date', 'end_date', 'description','experience'
    ];
}
