<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Coupon\CouponOrderItemPreprocessor as ProcessCoupons;
use Laravel\Cashier\Order\PersistOrderItemsPreprocessor as PersistOrderItems;
use Laravel\Cashier\Plan\AdvancedIntervalGenerator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        config(['cashier_plans' => $this->generateCashierPlansConfig()]);
    }

    protected function generateCashierPlansConfig(): array
    {
        $billingConfig = config('billing', []);
        $plans = $billingConfig['plans'] ?? [];

        $cashierPlans = [];

        foreach ($plans as $plan) {
            $monthlyPlanKey = strtolower($plan['name']) . '_monthly';
            $annualPlanKey = strtolower($plan['name']) . '_annually';

            $cashierPlans[$monthlyPlanKey] = [
                'amount' => [
                    'value' => $plan['price_monthly'],
                    'currency' => $billingConfig['currency'],
                ],
                'interval' => [
                    'generator' => AdvancedIntervalGenerator::class,
                    'value' => 1,
                    'period' => 'month',
                    'monthOverflow' => true,
                ],
                'description' => $plan['name'] . ' plan - Monthly subscription',
            ];

            $cashierPlans[$annualPlanKey] = [
                'amount' => [
                    'value' => $plan['price_annually'],
                    'currency' => $billingConfig['currency'],
                ],
                'interval' => [
                    'generator' => AdvancedIntervalGenerator::class,
                    'value' => 1,
                    'period' => 'year',
                    'monthOverflow' => true,
                ],
                'description' => $plan['name'] . ' plan - Annual subscription',
            ];
        }

        return array_merge(
            [
                'defaults' => [
                    'first_payment' => config('cashier.first_payment'),
                    'order_item_preprocessors' => [
                        ProcessCoupons::class,
                        PersistOrderItems::class,
                    ],
                ],
                'plans' => [],
            ],
            ['plans' => $cashierPlans]
        );
    }
}
