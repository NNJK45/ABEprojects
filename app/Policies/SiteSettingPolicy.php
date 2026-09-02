<?php

namespace App\Policies;

use App\Models\SiteSetting;
use App\Models\User;

class SiteSettingPolicy
{
    public function view(User $user, SiteSetting $setting): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user, SiteSetting $setting): bool
    {
        return $user->isAdmin();
    }
}
