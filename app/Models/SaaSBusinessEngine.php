<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaaSBusinessEngine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'features',
        'pricing',
        'status',
        'created_at',
        'updated_at',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
