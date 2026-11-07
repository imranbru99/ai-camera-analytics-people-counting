<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyIncidentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'safety_incident_id',
        'user_id',
        'report_title',
        'report_description',
    ];

    public function safetyIncident()
    {
        return $this->belongsTo(SafetyIncident::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
