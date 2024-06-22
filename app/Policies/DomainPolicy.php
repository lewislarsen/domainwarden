<?php

namespace App\Policies;

use App\Models\Domain;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DomainPolicy
{
    public function view(User $user, Domain $domain): Response
    {
        return $user->id === $domain->user_id
            ? Response::allow()
            : Response::deny('You do not own this domain.');
    }

    public function create(User $user): bool
    {
        return true;
    }


    public function update(User $user, Domain $domain): Response
    {
        return $user->id === $domain->user_id
            ? Response::allow()
            : Response::deny('You do not own this domain.');
    }


    public function forceDelete(User $user, Domain $domain): Response
    {
        return $user->id === $domain->user_id
            ? Response::allow()
            : Response::deny('You do not own this domain.');
    }
}
