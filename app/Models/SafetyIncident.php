<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyIncident extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'timestamp',
        'status',
    ];

    public function camera()
    {
        return $this->belongsTo(Camera::class);
    }
}
