<?php

namespace App\Observers;

use App\Models\Property;
use App\Jobs\SendPropertyMail;

class PropertyObserver
{
    /**
     * Handle the property "created" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        //
    }

    /**
     * Handle the property "updated" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function updated(Property $property)
    {
        if($property->contracted) {
            dispatch(new SendPropertyMail($property));
        }
    }

    /**
     * Handle the property "deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function deleted(Property $property)
    {
        //
    }

    /**
     * Handle the property "restored" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function restored(Property $property)
    {
        //
    }

    /**
     * Handle the property "force deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        //
    }
}
