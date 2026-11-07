<?php

return [
    'model' => 'App\Models\AIEngine',
    'api_key' => env('AI_ENGINE_API_KEY'),
    'subscription_limit' => 80,
    'subscription_expiry_days' => 30,
    'notification_channels' => [
        'email',
        'sms',
        'slack',
    ],
    'scheduling' => [
        'interval' => 'daily',
        'start_time' => '09:00:00',
    ],
    'escalation' => [
        'retry_count' => 3,
        'retry_interval' => '1 hour',
    ],
    'execution_history' => true,
    'error_logs' => true,
];
