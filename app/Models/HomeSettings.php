<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        "salutation",
        "first_name",
        "last_name",
        "status",
        "picture"
    ];
}
