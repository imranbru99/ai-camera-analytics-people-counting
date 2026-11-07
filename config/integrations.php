<?php

return [
    'rules' => [
        [
            'name' => 'Camera Offline',
            'condition' => 'camera becomes offline',
            'action' => 'notify site manager',
            'notification_channels' => ['email', 'sms'],
            'scheduling' => 'daily at 12:00 AM',
            'escalation' => [
                'level' => 'high',
                'threshold' => 3,
            ],
            'retry' => [
                'enabled' => true,
                'interval' => 60, // in seconds
            ],
            'execution_history' => true,
            'error_logs' => true,
        ],
        [
            'name' => 'Occupancy Exceeds Limit',
            'condition' => 'occupancy exceeds configured limit',
            'action' => 'create occupancy alert',
            'notification_channels' => ['email', 'sms'],
            'scheduling' => 'hourly at 10:00 AM',
            'escalation' => [
                'level' => 'medium',
                'threshold' => 2,
            ],
            'retry' => [
                'enabled' => true,
                'interval' => 30, // in seconds
            ],
            'execution_history' => true,
            'error_logs' => true,
        ],
        // Add more rules as needed
    ],
];
