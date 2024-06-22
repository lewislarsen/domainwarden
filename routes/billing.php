<?php

use App\Http\Controllers\Billing\CancelSubscriptionController;
use App\Http\Controllers\Billing\CreateSubscriptionController;
use App\Http\Controllers\Billing\ResumeSubscriptionController;
use App\Http\Controllers\Billing\ShowController;
use App\Http\Controllers\Billing\SwapSubscriptionController;
use App\Http\Controllers\Billing\UpdatePaymentMethodController;

Route::prefix('billing')
    ->middleware(['auth'])
    ->group(function () {

        Route::get('update-payment-method', [UpdatePaymentMethodController::class, '__invoke'])
            ->name('billing.update-payment-method');

        Route::get('process/{subscriptionPlan}', [CreateSubscriptionController::class, '__invoke'])
            ->name('billing.create');

        Route::get('swap/{planToSwapTo}', [SwapSubscriptionController::class, '__invoke'])
            ->name('billing.swap');

        Route::get('cancel', [CancelSubscriptionController::class, '__invoke'])
            ->name('billing.cancel');

        Route::get('resume', [ResumeSubscriptionController::class, '__invoke'])
            ->name('billing.resume');

        Route::get('download-invoice/{orderId}', function ($orderId) {
            return request()->user()->downloadInvoice($orderId);
        })->name('billing.download-invoice');

        Route::get('{paymentPeriod?}', ShowController::class)
            ->name('billing');
    });
