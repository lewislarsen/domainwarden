<x-app-layout>
    <div class="max-w-6xl py-12 mx-auto w-full">
        @if (session()->has('billingSuccess'))
            <div class="bg-green-50 text-green-700 border border-green-100 rounded-[0.70rem]">
                <div class="mx-auto p-3 font-medium">
                    <x-heroicon-o-check class="h-5 w-5 mr-1 inline"/>
                    {{ session()->get('billingSuccess') }}
                </div>
            </div>
        @endif
        @if (session()->has('billingError'))
            <div class="bg-red-100 text-red-600">
                <div class="mx-auto p-3 font-medium">
                    <x-heroicon-o-exclamation-triangle class="h-5 w-5 mr-2 inline"/>
                    {{ session()->get('billingError') }}
                </div>
            </div>
        @endif
        <h1 class="text-3xl font-bold my-2 text-gray-900 dark:text-white">
            {{ __('Your Plan') }}
        </h1>
        <div
            class="mb-4 text-gray-800 dark:text-gray-50 border border-gray-200 dark:border-gray-700 rounded-[0.70rem] overflow-hidden bg-white dark:bg-gray-800 px-8 py-4 shadow">
            @if ($currentSubscription?->trial_ends_at )
                <p>
                    You are currently on a trial subscription on the {{ ucfirst(preg_replace('/_(monthly|annually)/i', '', $currentSubscription?->plan)) }} plan. Your trial will end
                    {{ $currentSubscription?->trial_ends_at?->format('l jS F Y') }}.
                </p>

                <a href="{{ route('billing.update-payment-method') }}" wire:navigate class="block">
                    <x-secondary-button class="mt-4">
                        {{ __('Update Payment Method') }}
                    </x-secondary-button>
                </a>
            @elseif ($currentSubscription && $currentSubscription?->ends_at === null)
                <p>
                    You are currently subscribed to
                    the {{ ucfirst(preg_replace('/_(monthly|annually)/i', '', $currentSubscription?->plan)) }} plan.
                </p>
                <p class="mt-2">
                    Your plan renews {{ $currentSubscription?->cycle_ends_at?->format('l jS F Y') }} and will continue
                    until otherwise cancelled.
                </p>

                <div class="flex space-x-4">
                    <a href="{{ route('billing.cancel') }}" wire:navigate class="block">
                        <x-secondary-button class="mt-4">
                            {{ __('Cancel My Subscription') }}
                        </x-secondary-button>
                    </a>
                    <a href="{{ route('billing.update-payment-method') }}" wire:navigate class="block">
                        <x-secondary-button class="mt-4">
                            {{ __('Update Payment Method') }}
                        </x-secondary-button>
                    </a>
                </div>
            @elseif ($currentSubscription?->ends_at)
                You have cancelled your current subscription. It will
                end {{ $currentSubscription?->ends_at?->format('l jS F Y') }}.

                <div class="flex space-x-4">
                    <a href="{{ route('billing.resume') }}" wire:navigate class="block">
                        <x-secondary-button class="mt-4">
                            {{ __('Resume My Subscription') }}
                        </x-secondary-button>
                    </a>
                    <a href="{{ route('billing.update-payment-method') }}" wire:navigate class="block">
                        <x-secondary-button class="mt-4">
                            {{ __('Update Payment Method') }}
                        </x-secondary-button>
                    </a>
                </div>
            @else
                <p>
                    You do not currently have a subscription to {{ config('app.name') }}. Please consider subscribing.
                </p>
            @endif
        </div>
        @if ($currentSubscription)
            <div class="flex justify-between">
                <div>
                    <h1 class="text-3xl font-bold my-2 text-gray-900 dark:text-white">
                        {{ __('Change Plan') }}
                    </h1>
                </div>
                <div>
                    <a href="{{ route('billing', $paymentPeriod === 'monthly' ? 'annually' : 'monthly') }}"
                       wire:navigate>
                        <button type="submit"
                                class="rounded-[0.70rem] font-medium text-sm p-2 px-7 border-transparent overflow-hidden ease-in-out text-white bg-primary hover:bg-opacity-80">
                            {{ $paymentPeriod === 'monthly' ? __('Switch to Annual Pricing') : __('Switch to Monthly Pricing') }}
                        </button>
                    </a>
                </div>
            </div>
            @foreach ($availablePlansToSwitchTo as $plan)
                <div
                    class="mb-4 border border-gray-200 dark:border-gray-700 rounded-[0.70rem] overflow-hidden bg-white dark:bg-gray-800 px-8 py-4 shadow">
                    <h1 class="font-semibold text-xl text-gray-900 dark:text-white inline">
                        {{ $plan['name'] }}
                    </h1>
                    <h2 class="font-medium text-lg text-gray-700 dark:text-gray-200 mt-0.5">
                        {{ $plan['brief_description'] }}
                    </h2>
                    <div class="grid md:grid-cols-12 gap-x-5 gap-y-3.5 mt-4 text-sm font-medium">
                        @foreach ($plan['features'] as $feature)
                            <div class="col-span-3 p-1 dark:text-gray-50 text-gray-800">
                                @if ($feature['available_in_plan'])
                                    @svg('heroicon-o-check', ['class' => 'w-5 h-5 ml-2 text-green-600 inline mt-0.5'])
                                @else
                                    @svg('heroicon-o-x-mark', ['class' => 'w-5 h-5 ml-2 text-red-600 inline mt-0.5'])
                                @endif
                                {{ $feature['name'] }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-end mt-10">
                        <a href="{{ route('billing.swap', strtolower($plan['name'] . '_' . ($paymentPeriod === 'monthly' ? 'monthly' : 'annually'))) }}">
                            <button
                                class="rounded-[0.70rem] font-medium text-sm p-2 px-7 border-transparent overflow-hidden ease-in-out text-white bg-primary hover:bg-opacity-80">
                                {{ __('Swap to :plan - ', ['plan' => $plan['name']]) }}
                                {{ money_parse_by_intl_localized_decimal($plan['price_' . $paymentPeriod], $currency) }}
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
        @if (!$orders->isEmpty())
            <h1 class="text-3xl font-bold my-2 text-gray-900 dark:text-white">
                {{ __('Your Invoices') }}
            </h1>
            <div
                class="mb-4 text-gray-800 dark:text-gray-50 border border-gray-200 dark:border-gray-700 rounded-[0.70rem] overflow-hidden bg-white dark:bg-gray-800 px-8 py-4 shadow">
                <div class="grid grid-cols-12 gap-4">
                    @foreach ($orders as $order)
                        <div class="col-span-3">
                            {{ $order->number }}
                        </div>
                        <div class="col-span-3">
                            {{ $order->invoice()?->date()?->format('l jS F Y') }}
                        </div>
                        <div class="col-span-2">
                            {{ ucfirst($order->mollie_payment_status ) }}
                        </div>
                        <div class="col-span-3">
                            {{ money_parse($order->total, $order->currency) }}
                        </div>
                        <div class="col-span-1">
                            <a href="{{ route('billing.download-invoice', $order->id) }}"
                               title="{{ __('Download Invoice') }}">
                                @svg('heroicon-o-arrow-down-tray', ['class' => 'inline h-5 w-5 text-primary ease-in-out
                                hover:bg-opacity-90'])
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (!$currentSubscription)
            <div class="flex justify-between">
                <div>
                    <h1 class="text-3xl font-bold my-2 text-gray-900 dark:text-white">
                        {{ __('Available Plans') }}
                    </h1>
                </div>
                <div>
                    <a href="{{ route('billing', $paymentPeriod === 'monthly' ? 'annually' : 'monthly') }}"
                       wire:navigate>
                        <button type="submit"
                                class="rounded-[0.70rem] font-medium text-sm p-2 px-7 border-transparent overflow-hidden ease-in-out text-white bg-primary hover:bg-opacity-80">
                            {{ $paymentPeriod === 'monthly' ? __('Switch to Annual Pricing') : __('Switch to Monthly Pricing') }}
                        </button>
                    </a>
                </div>
            </div>
            @foreach ($plans as $plan)
                <div
                    class="mb-4 border border-gray-200 dark:border-gray-700 rounded-[0.70rem] overflow-hidden bg-white dark:bg-gray-800 px-8 py-4 shadow">
                    <h1 class="font-semibold text-xl text-gray-900 dark:text-white inline">
                        {{ $plan['name'] }}
                    </h1>
                    @if ($plan['recommended'])
                        <div
                            class="text-xs uppercase p-0.5 rounded-lg bg-primary inline text-white px-3 font-semibold ml-1">
                            {{ __('Recommended!') }}
                        </div>
                    @endif
                    <h2 class="font-medium text-lg text-gray-700 dark:text-gray-200 mt-0.5">
                        {{ $plan['brief_description'] }}
                    </h2>
                    <div class="grid md:grid-cols-12 gap-x-5 gap-y-3.5 mt-4 text-sm font-medium">
                        @foreach ($plan['features'] as $feature)
                            <div class="col-span-3 p-1 dark:text-gray-50 text-gray-800">
                                @if ($feature['available_in_plan'])
                                    @svg('heroicon-o-check', ['class' => 'w-5 h-5 ml-2 text-green-600 inline mt-0.5'])
                                @else
                                    @svg('heroicon-o-x-mark', ['class' => 'w-5 h-5 ml-2 text-red-600 inline mt-0.5'])
                                @endif
                                {{ $feature['name'] }}
                            </div>
                        @endforeach
                    </div>
                    <div class="flex justify-end mt-10">
                        <a href="{{ route('billing.create', ['subscriptionPlan' => strtolower($plan['name']) . ($paymentPeriod === 'monthly' ? '_monthly' : '_annually')]) }}">
                            <button
                                class="rounded-[0.70rem] font-medium text-sm p-2 px-7 border-transparent overflow-hidden ease-in-out text-white bg-primary hover:bg-opacity-80">
                               @if (config('billing.trial_days') > 0 && Auth::user()->trial_ends_at === null)
                                   {{ __('Begin your :count day free trial', ['count' => config('billing.trial_days')]) }}
                                @else
                                    {{ __('Subscribe') }}
                                    {{ money_parse_by_intl_localized_decimal($plan['price_' . $paymentPeriod], $currency) }}
                               @endif
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
