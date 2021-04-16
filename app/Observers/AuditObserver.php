<?php

namespace App\Observers;

use App\Models\Audit;
use Carbon\Carbon;

class AuditObserver
{
    /**
     * Handle the Audit "created" event.
     *
     * @param  \App\Models\Audit  $audit
     * @return void
     */
    public function created(Audit $audit)
    {
        $count = Audit::count();
        $year = Carbon::today()->format('y');
        $month = Carbon::today()->format('m');
        $audit->audit_no = 'ADT/' . $year . '/' . $month . '/' . $count++;
        $audit->save();
    }

    /**
     * Handle the Audit "updated" event.
     *
     * @param  \App\Models\Audit  $audit
     * @return void
     */
    public function updated(Audit $audit)
    {
        //
    }

    /**
     * Handle the Audit "deleted" event.
     *
     * @param  \App\Models\Audit  $audit
     * @return void
     */
    public function deleted(Audit $audit)
    {
        //
    }

    /**
     * Handle the Audit "restored" event.
     *
     * @param  \App\Models\Audit  $audit
     * @return void
     */
    public function restored(Audit $audit)
    {
        //
    }

    /**
     * Handle the Audit "force deleted" event.
     *
     * @param  \App\Models\Audit  $audit
     * @return void
     */
    public function forceDeleted(Audit $audit)
    {
        //
    }
}
