<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMaintenanceRequest extends FormRequest
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
           'vehicle_id' => 'required',
           'problem_presented' => 'required|string|max:255',
           'type_of_maintenance' => 'required|string|max:255',
           'scheduling' => 'required|date'
        ];
    }
}
