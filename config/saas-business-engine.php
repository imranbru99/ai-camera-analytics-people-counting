<?php

namespace Config;

return [
    'saas_business_engine' => [
        'name' => 'SaaS Business Engine',
        'description' => 'Manage and monitor the SaaS business engine.',
        'features' => [
            'subscription_management' => true,
            'user_management' => true,
            'billing_management' => true,
            'notification_system' => true,
            'automation_engine' => true,
        ],
        'settings' => [
            'default_subscription_term' => 30,
            'max_subscriptions_per_user' => 5,
            'email_notification_threshold' => 10,
            'sms_notification_threshold' => 5,
        ],
    ],
];
