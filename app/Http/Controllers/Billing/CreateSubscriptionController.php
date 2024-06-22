<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Cashier\SubscriptionBuilder\RedirectToCheckoutResponse;

class CreateSubscriptionController extends Controller
{
    public function __invoke(Request $request, string $subscriptionPlan)
    {
        $billingConfig = config('billing');
        $availablePlans = [];

        foreach ($billingConfig['plans'] as $plan) {
            $availablePlans[strtolower($plan['name']) . '_monthly'] = $plan;
            $availablePlans[strtolower($plan['name']) . '_annually'] = $plan;
        }

        if (! isset($availablePlans[$subscriptionPlan])) {
            abort(404);
        }

        $user = $request->user();
        $planNameParts = explode('_', $subscriptionPlan);
        $planName = ucfirst($planNameParts[0]);

        if ($user->subscribed('main', $subscriptionPlan)) {
            return Redirect::route('subscriptions')->with('error', "You are already on the {$planName} plan.");
        }

        $trialDays = config('billing.trial_days', 0);
        $subscriptionBuilder = $user->newSubscriptionViaMollieCheckout('main', $subscriptionPlan);

        if ($trialDays > 0) {
            $subscriptionBuilder->trialDays($trialDays);
        }

        $result = $subscriptionBuilder->create();

        if (is_a($result, RedirectToCheckoutResponse::class)) {
            return $result; // Redirect to Mollie checkout
        }

        return Redirect::route('subscriptions')->with('success', "Welcome to the {$planName} plan.");
    }
}
