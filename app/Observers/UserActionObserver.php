<?php

namespace App\Observers;

use App\UserAction;

class UserActionObserver
{
    /**
     * Handle the user action "created" event.
     *
     * @param  \App\UserAction  $userAction
     * @return void
     */
    public function created(UserAction $userAction)
    {
        //
    }

    /**
     * Handle the user action "updated" event.
     *
     * @param  \App\UserAction  $userAction
     * @return void
     */
    public function updated(UserAction $userAction)
    {
        //
    }

    /**
     * Handle the user action "deleted" event.
     *
     * @param  \App\UserAction  $userAction
     * @return void
     */
    public function deleted(UserAction $userAction)
    {
        //
    }

    /**
     * Handle the user action "restored" event.
     *
     * @param  \App\UserAction  $userAction
     * @return void
     */
    public function restored(UserAction $userAction)
    {
        //
    }

    /**
     * Handle the user action "force deleted" event.
     *
     * @param  \App\UserAction  $userAction
     * @return void
     */
    public function forceDeleted(UserAction $userAction)
    {
        //
    }
}
