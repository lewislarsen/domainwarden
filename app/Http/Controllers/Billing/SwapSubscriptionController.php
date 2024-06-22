<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SwapSubscriptionController extends Controller
{
    public function __invoke(Request $request, string $planToSwapTo)
    {
        abort_if(! $request->user()->subscriptions()->first(), 404);

        $billingConfig = config('billing');
        $availablePlans = [];

        foreach ($billingConfig['plans'] as $plan) {
            $availablePlans[strtolower($plan['name']) . '_monthly'] = $plan;
            $availablePlans[strtolower($plan['name']) . '_annually'] = $plan;
        }

        if (! isset($availablePlans[$planToSwapTo])) {
            abort(404);
        }

        $user = $request->user();

        $user->subscription('main')->swap($planToSwapTo);

        return Redirect::route('billing')->with('billingSuccess', 'Your subscription has been changed.');
    }
}
