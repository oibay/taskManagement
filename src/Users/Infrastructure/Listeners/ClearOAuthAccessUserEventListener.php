<?php

namespace Src\Users\Infrastructure\Listeners;


use Illuminate\Support\Facades\DB;
use Src\Users\Infrastructure\Events\ClearOAuthAccessUserEvent;

class ClearOAuthAccessUserEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClearOAuthAccessUserEvent $event): void
    {
        DB::table('oauth_access_tokens')->where('user_id', $event->id)->delete();
    }
}
