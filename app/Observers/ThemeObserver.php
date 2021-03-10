<?php

namespace App\Observers;

use App\Models\Theme;
use Illuminate\Support\Facades\Auth;

class ThemeObserver
{
    /**
     * Handle the Theme "created" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function created(Theme $theme)
    {

    }

    /**
     * Handle the Theme "updated" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function updated(Theme $theme)
    {
        //
    }

    /**
     * Handle the Theme "deleted" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function deleted(Theme $theme)
    {
        //
    }

    /**
     * Handle the Theme "restored" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function restored(Theme $theme)
    {
        //
    }

    /**
     * Handle the Theme "force deleted" event.
     *
     * @param  \App\Models\Theme  $theme
     * @return void
     */
    public function forceDeleted(Theme $theme)
    {
        //
    }

    /**
     * Handle the theme "saving" event.
     *
     * @param  \App\Theme  $theme
     * @return void
     */
    public function saving(Theme $theme)
    {
    }

    /**
     * Handle the theme "creating" event.
     *
     * @param  \App\Theme  $theme
     * @return void
     */
    public function creating(Theme $theme)
    {
        $user = Auth::user();
        $theme->created_by = $user->id;
    }

    /**
     * Handle the theme "updating" event.
     *
     * @param  \App\Theme  $theme
     * @return void
     */
    public function updating(Theme $theme)
    {
        $user = Auth::user();
        $theme->updated_by = $user->id;
    }

    /**
     * Handle the theme "deleting" event.
     *
     * @param  \App\Theme  $theme
     * @return void
     */
    public function deleting(Theme $theme)
    {
        $user = Auth::user();
        $theme->update(['deleted_by' => $user->id]);
    }
}
