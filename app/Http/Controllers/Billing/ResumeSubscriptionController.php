<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResumeSubscriptionController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $user = $request->user();
        $subscription = $user->subscriptions()->first();

        if (! $subscription) {
            abort(404);
        }

        $subscription->resume();

        return Redirect::route('billing')->with('billingSuccess', 'Your subscription has been resumed.');
    }
}
