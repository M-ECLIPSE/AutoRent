<?php

namespace App\Observers;

use App\Models\Cars;
use Illuminate\Support\Facades\Auth;

class CarObserver
{
    public function creating(cars $car)
    {
        $car->user_id = \auth()->user()->id;
    }
    /**
     * Handle the Car "created" event.
     */
    public function created(Cars $car): void
    {
        //
    }

    /**
     * Handle the Car "updated" event.
     */
    public function updated(Cars $car): void
    {
        //
    }

    /**
     * Handle the Car "deleted" event.
     */
    public function deleted(Cars $car): void
    {
        //
    }

    /**
     * Handle the Car "restored" event.
     */
    public function restored(Cars $car): void
    {
        //
    }

    /**
     * Handle the Car "force deleted" event.
     */
    public function forceDeleted(Cars $car): void
    {
        //
    }
}
