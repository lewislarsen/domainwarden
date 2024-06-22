<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Monitor Domain') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-12 py-8">
                <form method="POST" action="{{ route('domains.store') }}">
                    @csrf
                    @method('POST')
                    <div>
                        <x-input-label for="domain" :value="__('Domain')" />
                        <x-text-input placeholder="{{ 'google.com' }}" id="domain" name="domain" type="text" class="mt-1 block w-full" autofocus autocomplete="domain" />
                        <x-input-error class="mt-2" :messages="$errors->get('domain')" />
                    </div>
                   <div class="flex justify-end mt-6">
                       <x-primary-button type="submit">
                           {{ __('Monitor Domain') }}
                       </x-primary-button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
