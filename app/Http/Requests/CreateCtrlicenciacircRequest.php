<?php

namespace App\Http\Requests;

use App\Models\Ctrlicenciacirc;
use Illuminate\Foundation\Http\FormRequest;

class CreateCtrlicenciacircRequest extends FormRequest
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
        return Ctrlicenciacirc::$rules;
    }
}
