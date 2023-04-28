<?php

namespace App\Observers;

use App\Models\Phonebook;

class PhonbookObserver
{
    /**
     * Обработка Перед созданием записи
     *
     *@param Phonebook $phonebook
     */
    
    public function creating(Phonebook $phonebook): void
    {   
        $this->setUser($phonebook);
    }

    /**
     * 
     *@param Phonebook $phonebook
     */
     
    
    protected function setUser(Phonebook $phonebook)
    {
        $phonebook->user_id = auth()->id ?? Phonebook::UNKNOWN_USER;
    }


    /**
     * 
     *Handle the Phonebook "deleted" event.
     */
    
    public function deleted(Phonebook $phonebook): void
    {
        //
    }

    /**
     * 
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