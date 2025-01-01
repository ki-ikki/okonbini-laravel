<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

class FirebaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FirebaseService::class, function ($app) {
            return (new Factory)->withServiceAccount(storage_path('app/firebase/firebase_credentials.json'));
        });
    }

    public function boot(): void
    {
        //
    }
}
