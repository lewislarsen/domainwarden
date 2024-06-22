<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request, $paymentPeriod = 'monthly')
    {
        if (! in_array($paymentPeriod, ['monthly', 'annually'], true)) {
            abort(404);
        }

        $billingConfig = config('billing');

        $subscriptionDetails = [
            'currency' => $billingConfig['currency'],
            'plans' => array_map(function ($plan) {
                return [
                    'enabled' => $plan['enabled'],
                    'recommended' => $plan['recommended'],
                    'name' => $plan['name'],
                    'price_monthly' => $plan['price_monthly'],
                    'price_annually' => $plan['price_annually'],
                    'brief_description' => $plan['brief_description'],
                    'features' => array_map(function ($featureName, $available) {
                        return [
                            'name' => $featureName,
                            'available_in_plan' => $available,
                        ];
                    }, array_keys($plan['features']), $plan['features']),
                ];
            }, $billingConfig['plans']),
        ];

        $filteredSubscriptionDetails = array_filter($subscriptionDetails['plans'], function ($plan) {
            return $plan['enabled'];
        });

        $currentSubscriptionPlan = ucfirst(optional($request->user()->subscriptions()->first())->plan);
        $currentSubscriptionPlan = preg_replace('/_(monthly|annually)$/i', '', $currentSubscriptionPlan);
        $plansCanSwitchTo = array_filter($subscriptionDetails['plans'], function ($plan) use ($currentSubscriptionPlan) {
            return $plan['enabled'] && $plan['name'] !== $currentSubscriptionPlan;
        });

        return view('billing', [
            'plans' => $filteredSubscriptionDetails,
            'availablePlansToSwitchTo' => $plansCanSwitchTo,
            'currency' => $subscriptionDetails['currency'],
            'paymentPeriod' => $paymentPeriod,
            'currentSubscription' => $request->user()->subscriptions()->first(),
            'orders' => $request->user()->orders,
        ]);
    }
}
