<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
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
        if(request()->get('type') == 'file'){
          $data=[
            'content' => 'required|mimes:png,jpg,jpeg|max:2048'
          ];
        }
        if(request()->get('type') == 'link'){
            $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
            $data=[
              'content' => 'required|regex:'.$regex,
            ];
        }
        if(request()->get('type') == 'text'){
            $data=[
                'content' => 'required',
              ];
        }
        return $data;
    }
}
