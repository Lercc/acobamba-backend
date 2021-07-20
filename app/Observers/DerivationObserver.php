<?php

namespace App\Observers;

use App\Models\Derivation;
use App\Models\Notification;

class DerivationObserver
{
    /**
     * Handle the Derivation "created" event.
     *
     * @param  \App\Models\Derivation  $derivation
     * @return void
     */
    public function created(Derivation $derivation)
    {
       if (!\App::runningInConsole()) {
            $notification = new Notification();
            $notification->expedient_id = $derivation->expedient_id;
            $notification->user = $derivation->expedient->employee_id ? $derivation->expedient->employee_id :  $derivation->expedient->processor_id;
            $notification->area = $derivation->user->employee ? ($derivation->user->employee->office_id ? $derivation->user->employee->office->name :  $derivation->user->employee->suboffice->name) : 'Tramitante Externo';
            $notification->exp_status = 'derivado';
            $notification->status = 'no visto';
            $notification->save();
       }
    }

    // /**
    //  * Handle the Derivation "updated" event.
    //  *
    //  * @param  \App\Models\Derivation  $derivation
    //  * @return void
    //  */
    // public function updated(Derivation $derivation)
    // {
    //     //
    // }

    // /**
    //  * Handle the Derivation "deleted" event.
    //  *
    //  * @param  \App\Models\Derivation  $derivation
    //  * @return void
    //  */
    // public function deleted(Derivation $derivation)
    // {
    //     //
    // }

    // /**
    //  * Handle the Derivation "restored" event.
    //  *
    //  * @param  \App\Models\Derivation  $derivation
    //  * @return void
    //  */
    // public function restored(Derivation $derivation)
    // {
    //     //
    // }

    // /**
    //  * Handle the Derivation "force deleted" event.
    //  *
    //  * @param  \App\Models\Derivation  $derivation
    //  * @return void
    //  */
    // public function forceDeleted(Derivation $derivation)
    // {
    //     //
    // }
}
