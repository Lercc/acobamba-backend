<?php

namespace App\Observers;

use App\Models\Archivation;
use App\Models\Notification;

class ArchivationObserver
{
    /**
     * Handle the Archivation "created" event.
     *
     * @param  \App\Models\Archivation  $archivation
     * @return void
     */
    public function created(Archivation $archivation)
    {
        if (!\App::runningInConsole()) {
            $notification = new Notification();
            $notification->expedient_id = $archivation->expedient_id;
            $notification->user = $archivation->expedient->employee_id ? $archivation->expedient->employee_id :  $archivation->expedient->processor_id;
            $notification->user_type = $archivation->expedient->employee_id ? 'interno' : 'externo';
            $notification->area = $archivation->user->employee->office_id ? $archivation->user->employee->office->name :  $archivation->user->employee->suboffice->name;
            $notification->exp_status = 'archivado';
            $notification->status = 'no visto';
            $notification->save();
       }
    }

    // /**
    //  * Handle the Archivation "updated" event.
    //  *
    //  * @param  \App\Models\Archivation  $archivation
    //  * @return void
    //  */
    // public function updated(Archivation $archivation)
    // {
    //     //
    // }

    // /**
    //  * Handle the Archivation "deleted" event.
    //  *
    //  * @param  \App\Models\Archivation  $archivation
    //  * @return void
    //  */
    // public function deleted(Archivation $archivation)
    // {
    //     //
    // }

    // /**
    //  * Handle the Archivation "restored" event.
    //  *
    //  * @param  \App\Models\Archivation  $archivation
    //  * @return void
    //  */
    // public function restored(Archivation $archivation)
    // {
    //     //
    // }

    // /**
    //  * Handle the Archivation "force deleted" event.
    //  *
    //  * @param  \App\Models\Archivation  $archivation
    //  * @return void
    //  */
    // public function forceDeleted(Archivation $archivation)
    // {
    //     //
    // }
}
