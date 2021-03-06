<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray( $request )
    {
        return
        [
            'id'                    => $this -> id,
            'type'                  => 'Appointment',

            'attributes' =>
            [
                'smart_id'          => $this -> smart_id,

                'appointment_date'  => $this -> appointment_date,
                'appointment_time'  => $this -> appointment_time,
                'status'            => $this -> status,

                'created_at'        => $this -> created_at -> toDateTimeString(),
                'updated_at'        => $this -> updated_at -> toDateTimeString(),
            ],

            'include' => $this -> when( $this -> relationLoaded( 'message' ) || $this -> relationLoaded( 'client' ) || $this -> relationLoaded( 'personnel' ) || $this -> relationLoaded( 'schedule' ),
            [
                'message'           => new MessageResource( $this -> whenLoaded( 'message' ) ),
                'client'            => new ClientResource( $this -> whenLoaded( 'client' ) ),
                'personnel'         => new PersonnelResource( $this -> whenLoaded( 'personnel' ) ),
                'schedule'          => new ScheduleResource( $this -> whenLoaded( 'schedule' ) ),
            ])
        ];
    }
}
