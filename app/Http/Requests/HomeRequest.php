<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
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
            'title'=>'required|string|unique:homes,title,'.$this->id,
            'price'=>'required|numeric',
            'cover_image'=>'nullable|image',
            'city'=>'required',
            'desc'=>'required',
            'sales_agent'=>'required',
            'sales_agent_phone'=>'required',
            'link'=>'nullable'
        ];
    }
}
