<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AIEngine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'model_path',
        'api_key',
        'status',
    ];

    public function processVideoFrame($frame)
    {
        // Placeholder for actual video processing logic
        // This method should be implemented based on the AI model and its requirements
        return "Processed frame: " . $frame;
    }
}
