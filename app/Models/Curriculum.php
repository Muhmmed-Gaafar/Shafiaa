<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Curriculum extends Model
{
    use HasFactory;
    protected $table = "curriculums";

    protected $fillable = [
        'title',
        'type',
        'time',
        'from',
        'to',
        'order'
    ];

}

