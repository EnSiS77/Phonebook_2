<?php

namespace App\Observers;

use App\Models\Models\Phonebook;

class PhonbookObserver
{
    /**
     * Handle the Phonebook "created" event.
     */
    public function created(Phonebook $phonebook): void
    {
        //
    }

    /**
     * Handle the Phonebook "updated" event.
     */
    public function updated(Phonebook $phonebook): void
    {
        //
    }

    /**
     * Handle the Phonebook "deleted" event.
     */
    public function deleted(Phonebook $phonebook): void
    {
        //
    }

    /**
     * Handle the Phonebook "restored" event.
     */
    public function restored(Phonebook $phonebook): void
    {
        //
    }

    /**
     * Handle the Phonebook "force deleted" event.
     */
    public function forceDeleted(Phonebook $phonebook): void
    {
        //
    }
}
