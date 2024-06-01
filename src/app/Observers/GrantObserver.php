<?php

namespace App\Observers;

use App\Models\Grant;
use App\Models\WorkFlowHistory;

class GrantObserver
{
    /**
     * Handle the Grant "created" event.
     *
     * @param  \App\Models\Grant  $grant
     * @return void
     */
    public function created(Grant $grant)
    {
        //
    }

    /**
     * Handle the Grant "updated" event.
     *
     * @param  \App\Models\Grant  $grant
     * @return void
     */
    public function updated(Grant $grant)
    {
        $desiredFields = [
            'opportunity_title',
            'opportunity_teaser',
            'opportunity_title_for_subscriber',
            'opportunity_description_for_subscriber',
            'amount_low',
            'amount_high',
            'close_date_at',
            'deadline_at',
            'letter_of_intent_deadline_at',
            'posted_date_at',
            'url',
            'funding_source',
            'funding_agency_id',
            'additional_notes',
            'is_ongoing',
            'is_opening',
            'status',
        ];

        $updatedFields = array_intersect($desiredFields, array_keys($grant->getDirty()));

        if (!empty($updatedFields)) {
            WorkFlowHistory::updateOrCreate(
                [
                    'user_id' => auth()->user()->id
                ],
                [
                    'user_id' => auth()->user()->id,
                    'grant_id' => $grant->id,
                    'status' => $grant->status,
                    'id_edit' => true,
                ]
            );
        }
    }

    /**
     * Handle the Grant "deleted" event.
     *
     * @param  \App\Models\Grant  $grant
     * @return void
     */
    public function deleted(Grant $grant)
    {
        //
    }

    /**
     * Handle the Grant "restored" event.
     *
     * @param  \App\Models\Grant  $grant
     * @return void
     */
    public function restored(Grant $grant)
    {
        //
    }

    /**
     * Handle the Grant "force deleted" event.
     *
     * @param  \App\Models\Grant  $grant
     * @return void
     */
    public function forceDeleted(Grant $grant)
    {
        //
    }
}
