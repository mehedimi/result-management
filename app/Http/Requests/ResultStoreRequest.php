<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResultStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ! in_array($this->get('semester'), range(1, 8));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'points.*' => 'required|numeric'
        ];
    }
}
