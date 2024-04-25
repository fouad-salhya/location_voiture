<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeRequest extends FormRequest
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
        return [
            'model' => 'required',
            'matricule' => 'required|min:4',
            'carburant' => 'required',
            'climatisation' => 'required',
            'transmission' => 'required',
            'places' => 'required',
            'marque_id' =>'required',
            'airbag' => 'required',
            'prix' => 'required|numeric',
            'disponible' => 'required',
            'image' => 'required',
            'premier_circulation' => 'required',
            'premier_vidange' => 'required',
            'dernier_vidange' => 'required',
            'assurance' => 'required',
            'kilometrage' => 'required|numeric',
            'changement_roue' => 'required',
            'description' => 'required'

        ];
    }
}
