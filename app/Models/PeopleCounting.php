<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleCounting extends Model
{
    use HasFactory;

    protected $fillable = [
        'camera_id',
        'start_time',
        'end_time',
        'count',
    ];
}
