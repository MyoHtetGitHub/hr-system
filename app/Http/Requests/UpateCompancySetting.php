<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpateCompancySetting extends FormRequest
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
            'compancy_name' =>'required',
            'compancy_phone'=>'required',
            'compancy_email'=>'required',
            'compancy_address'=>'required',
            'office_start_time'=>'required',
            'office_end_time'=>'required',
            'break_start_time'=>'required',
            'break_end_time'=>'required'
        ];
    }
}
