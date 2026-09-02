<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ContentPolicy
{
    public function before(User $user, string $ability): ?bool
    {
        return $user->isAdmin() ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return $user->role === UserRole::Editor;
    }

    public function view(User $user, Model $model): bool
    {
        return $user->role === UserRole::Editor;
    }

    public function create(User $user): bool
    {
        return $user->role === UserRole::Editor;
    }

    public function update(User $user, Model $model): bool
    {
        return $user->role === UserRole::Editor;
    }

    public function delete(User $user, Model $model): bool
    {
        return $user->role === UserRole::Editor;
    }
}
