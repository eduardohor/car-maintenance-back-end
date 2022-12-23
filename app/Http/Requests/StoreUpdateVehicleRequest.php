<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateVehicleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'brand' => 'required|string|min:3|max:15',
            'model' => 'required|string|min:3|max:15',
            'version' => 'required|string|max:10',
            'plate' => 'required|string|min:7|max:8'

        ];
    }
}
