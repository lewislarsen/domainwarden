<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Domains') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($domains->isEmpty())
                <div class="text-center space-y-2 bg-white rounded-lg p-10 shadow-sm border border-gray-100">
                    <h1 class="text-lg font-semibold">{{ __('No domains found!') }}</h1>
                    <p>
                        {{ __('You are currently not tracking any domains.') }}
                    </p>

                   <div class="mt-6">
                       <a href="{{ route('domains.create') }}" wire:navigate>
                           <x-primary-button>
                               {{ __('Monitor first domain') }}
                           </x-primary-button>
                       </a>
                   </div>
                </div>
                @else
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">{{ __('Domains') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">{{ __('All the domains you are currently tracking.') }}</p>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                       <a href="{{ route('domains.create') }}" wire:navigate>
                           <x-primary-button>
                               {{ __('Monitor Domain') }}
                           </x-primary-button>
                       </a>
                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                {{ __('Domain') }}</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Added') }}</th>
                                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">{{ __('Added By') }}</th>

                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach($domains as $domain)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                    {{ $domain->domain }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $domain->created_at->format('d F Y') }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <div class="flex">
                                                        <img src="{{ $domain->user->gravatar() }}" class="h-5 w-5 rounded-full border-transparent mr-2" />
                                                        <span class="font-medium">
                                                            {{ $domain->user->name }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                    <a href="{{ route('domains.edit', $domain) }}" class="text-gray-600 hover:text-gray-900">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
</x-app-layout>
