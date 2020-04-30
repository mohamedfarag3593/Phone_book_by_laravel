<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PhoneRequest extends FormRequest
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
        $id = $this->route('phone');
        // dd($id);
        return [
            'phone' => [
                'required',
                "unique:phones,phone,{$id},id,deleted_at,NULL",
                'digits:11',
                'regex:/^01(0|2|5|1)\d{8}$/',                
            ]
        ];
    }
}
