<?php

namespace App\Providers;

use App\Models\Actualite;
use App\Models\Commentaire;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Message;
use App\Models\Programme;
use App\Models\User;
use App\Policies\ContentPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Actualite::class => ContentPolicy::class,
        Commentaire::class => ContentPolicy::class,
        Evenement::class => ContentPolicy::class,
        Image::class => ContentPolicy::class,
        Message::class => ContentPolicy::class,
        Programme::class => ContentPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
