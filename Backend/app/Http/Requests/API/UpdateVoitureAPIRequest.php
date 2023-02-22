<?php

namespace App\Http\Requests\API;

use App\Models\Voiture;
use InfyOm\Generator\Request\APIRequest;

class UpdateVoitureAPIRequest extends APIRequest
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
        $rules = Voiture::$rules;
        $rules['email'] = $rules['email'].",".$this->route("voiture");
        return $rules;
    }
}
