<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainRequest;
use App\Models\Domain;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Redirect;

class DomainController extends Controller
{
    public function index(): View
    {
        return view('domains.index', [
            'domains' => request()?->user()->domains,
        ]);
    }


    public function create(): View
    {
        return view('domains.create');
    }

    public function store(DomainRequest $request): RedirectResponse
    {
        $request->user()->domains()->create([
            'domain' => $request->get('domain')
        ]);

        Return Redirect::route('domains.index');
    }

    public function edit(Domain $domain): View
    {
        Gate::authorize('update', $domain);

        return view('domains.edit', [
            'domain' => $domain
        ]);
    }

    public function update(DomainRequest $request, Domain $domain): RedirectResponse
    {
        Gate::authorize('update', $domain);

       $domain->update([
           'domain' => $request->get('domain')
       ]);

        Return Redirect::route('domains.index');
    }

    public function destroy(Domain $domain): RedirectResponse
    {
        Gate::authorize('forceDelete', $domain);

        $domain->forceDelete();

        Return Redirect::route('domains.index');
    }
}
