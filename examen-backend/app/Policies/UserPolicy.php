<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): Response
    {
        // operacion ternaria condición ? valor_si_true : valor_si_false
        return (int) $user->role_id === 1
            ? Response::allow()
            : Response::deny('No tiene permiso para el módulo de usuarios');
    }

    public function view(User $user, User $model): Response
    {
        return (int) $user->role_id === 1
            ? Response::allow()
            : Response::deny('No tiene permiso para el módulo de usuarios');
    }

    public function create(User $user): bool
    {
        return (int) $user->role_id === 1;
    }

    public function update(User $user, User $model): bool
    {
        return (int) $user->role_id === 1;
    }

    public function delete(User $user, User $model): bool
    {
        return (int) $user->role_id === 1;
    }

    public function restore(User $user, User $model): bool
    {
        return (int) $user->role_id === 1;
    }
}
