<?php

namespace App\Providers;

use App\Events\FailedLoginEvent;
use App\Listeners\FailedLoginListener;
use App\Listeners\BlockUserListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        FailedLoginEvent::class => [
            FailedLoginListener::class,
            BlockUserListener::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}