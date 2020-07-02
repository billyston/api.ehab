<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                'data.id'                                                           => [ 'required', 'string', 'exists:services,id' ],
                'data.type'                                                         => [ 'required', 'string', 'in:Service' ],
                'data.attributes.name'                                              => [ 'sometimes', 'string' ],
                'data.attributes.known_as'                                          => [ 'sometimes', 'string' ],
                'data.attributes.description'                                       => [ 'sometimes', 'string', 'min:50' ],

                'data.attributes.starts_at'                                         => [ 'sometimes' ],
                'data.attributes.ends_at'                                           => [ 'sometimes' ],
            ];
        }

        return
        [
            'data'                                                                  => [ 'required' ],
            'data.type'                                                             => [ 'required', 'string', 'in:Service' ],
            'data.attributes.name'                                                  => [ 'required', 'string' ],
            'data.attributes.known_as'                                              => [ 'required', 'string' ],
            'data.attributes.description'                                           => [ 'nullable', 'min:50' ],

            'data.attributes.start_time'                                            => [ 'required', 'date_format:H:i' ],
            'data.attributes.end_time'                                              => [ 'required', 'date_format:H:i' ],

            'data.relationships.specialty'                                          => [ 'required' ],
            'data.relationships.specialty.type'                                     => [ 'required', 'in:Specialty' ],
            'data.relationships.specialty.id'                                       => [ 'required', 'exists:specialties,id' ],
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return
        [
        ];
    }
}