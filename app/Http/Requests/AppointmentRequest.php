<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ( in_array( $this -> getMethod (), [ 'PUT', 'PATCH' ] ) )
        {
            return $rules =
            [
                'data'                                                              => [ 'required' ],
                'data.id'                                                           => [ 'required', 'string', 'exists:appointments,id' ],
                'data.type'                                                         => [ 'required', 'string', 'in:Appointment' ],

                'data.attributes.appointment_date'                                  => [ 'sometimes', 'date_format:Y-m-d:H:i:s', 'after:yesterday' ],
            ];
        }

        return
        [
            'data'                                                                  => [ 'required' ],
            'data.type'                                                             => [ 'required', 'string', 'in:Appointment' ],
            'data.attributes.appointment_date'                                      => [ 'required', 'date_format:Y-m-d' ],
            'data.attributes.appointment_time'                                      => [ 'required', 'string' ],

            // Message
            'data.relationships.message'                                            => [ 'required' ],
            'data.relationships.message.data.type'                                  => [ 'required', 'string', 'in:Message' ],
            'data.relationships.message.data.id'                                    => [ 'required', 'exists:messages,id' ],

            // Clients
            'data.relationships.client'                                             => [ 'required' ],
            'data.relationships.client.data'                                        => [ 'required' ],
            'data.relationships.client.data.type'                                   => [ 'required', 'in:Client' ],
            'data.relationships.client.data.id'                                     => [ 'required', 'exists:clients,id' ],

            // Personnel
            'data.relationships.personnel'                                          => [ 'required' ],
            'data.relationships.personnel.data.type'                                => [ 'required', 'string', 'in:Personnel' ],
            'data.relationships.personnel.data.id'                                  => [ 'required', 'exists:personnels,id' ],

            // Schedules
            'data.relationships.schedule'                                           => [ 'required' ],
            'data.relationships.schedule.data.type'                                 => [ 'required', 'string', 'in:Schedule' ],
            'data.relationships.schedule.data.id'                                   => [ 'required', 'exists:schedules,id' ]
        ];
    }
}
