<?php

namespace App\Http\Controllers\Billing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdatePaymentMethodController extends Controller
{
    public function __invoke(Request $request)
    {
        return $request->user()->updatePaymentMethod()
            ->skipBalance()
            ->create();
    }
}
