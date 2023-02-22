<?php

namespace App\Http\Requests;

use App\Models\Voiture;
use Illuminate\Foundation\Http\FormRequest;

class CreateVoitureRequest extends FormRequest
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
        return Voiture::$rules;
    }
}
