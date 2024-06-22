<?php

use Laravel\Cashier\Coupon\CouponOrderItemPreprocessor as ProcessCoupons;
use Laravel\Cashier\Order\PersistOrderItemsPreprocessor as PersistOrderItems;

return [
    'currency' => 'USD', // This must be a valid currency format otherwise Mollie won't be happy.
    'trial_days' => 5,
    'plans' => [
        [
            'name' => 'Starter',
            'enabled' => true,
            'recommended' => false,
            'price_monthly' => '4.00',
            'price_annually' => '48.00',
            'brief_description' => 'The essentials to track that one domain.',
            'features' => [
                'Track One Domain' => true,
                'Access to Support' => true,
            ],
        ],
        [
            'name' => 'Basic',
            'enabled' => true,
            'recommended' => true,
            'price_monthly' => '9.00',
            'price_annually' => '108.00',
            'brief_description' => 'Track the limited number of domains you want.',
            'features' => [
                'Track Five Domains' => true,
                'Access to Support' => true,
            ],
        ],
        [
            'name' => 'Premium',
            'enabled' => true,
            'recommended' => false,
            'price_monthly' => '25.00',
            'price_annually' => '300.00',
            'brief_description' => 'Track all the domains you have wanted.',
            'features' => [
                'Track Fifteen Domains' => true,
                'Access to Support' => true,
            ],
        ],
    ],
    'defaults' => [
        'first_payment' => config('cashier.first_payment'),
        'order_item_preprocessors' => [
            ProcessCoupons::class,
            PersistOrderItems::class,
        ],
    ],
];
