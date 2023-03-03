<?php

namespace App\Http\Requests\Flight;

use Illuminate\Foundation\Http\FormRequest;

class FlightBookingRequest extends FormRequest
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
        $data1 = '';
        $data2 = '';
        $data3 = '';
        $data =[];
        if(request()->has('adult')){
            // foreach(request()->get('adult') as $key=>$item){
            //     // dd($item);
            //     $rules['adult'.$key.'title'] = 'required';
            // }
            $data1 = [
                'adult' => 'array',
                'adult.*.first_name' => 'required',
                'adult.*.last_name' => 'required',
                // 'adult.*.email' => 'required',
                'adult.*.travelId' => 'required',
                'adult.*.middle_name' => 'nullable|string',
                'adult.*.dob' => 'date_format:d/m/Y',
                'adult.*.gender' => 'required',
                'adult.*.passport_no' => 'required|integer',
                'adult.*.nationality' => 'required',
                'adult.*.passport_issued' => 'required|date_format:d/m/Y',
                'adult.*.passport_exp_date' => 'required|date_format:d/m/Y|after:today',

            ];
            $data =array_merge($data,$data1);
        }
      
        if(request()->has('child')){
            // foreach(request()->get('adult') as $key=>$item){
            //     // dd($item);
            //     $rules['adult'.$key.'title'] = 'required';
            // }
            $data2 = [
                'child' => 'array',
                'child.*.first_name' => 'required',
                'child.*.last_name' => 'required',
                // 'child.*.email' => 'required',
                'child.*.travelId' => 'required',
                'child.*.middle_name' => 'nullable|string',
                'child.*.dob' => 'required',
                'child.*.gender' => 'required',
                'child.*.passport_no' => 'required|integer',
                'child.*.nationality' => 'required',
                'child.*.passport_issued' => 'required',
                'child.*.passport_exp_date' => 'required',

            ];
            $data =array_merge($data,$data2);
        }
        if(request()->has('held_infant')){
            // foreach(request()->get('adult') as $key=>$item){
            //     // dd($item);
            //     $rules['adult'.$key.'title'] = 'required';
            // }
            $data3 = [
                'held_infant' => 'array',
                'held_infant.*.first_name' => 'required',
                'held_infant.*.last_name' => 'required',
                // 'held_infant.*.email' => 'required',
                'held_infant.*.travelId' => 'required',
                'held_infant.*.middle_name' => 'nullable|string',
                'held_infant.*.dob' => 'required',
                'held_infant.*.gender' => 'required',
                'held_infant.*.passport_no' => 'required|integer',
                'held_infant.*.nationality' => 'required',
                'held_infant.*.passport_issued' => 'required',
                'held_infant.*.passport_exp_date' => 'required',

            ];
            $data = array_merge($data,$data3);
        }
        return  $data;
    }


    public function messages()
    {
        return [
            'adult.*.title.required'=>'Adult title is required',
            'adult.*.first_name.required'=>'Adult first name is required',
            'adult.*.last_name.required'=>'Adult last name is required',
            'adult.*.email.required'=>'Adult email is required',
            'adult.*.travelId.required'=>'Adult travelId is required',
            'adult.*.contact.required'=>'Adult contact is required',
            'adult.*.dob.required'=>'Adult dob is required',
            'adult.*.gender.required'=>'Adult gender is required',
            'adult.*.passport_no.required'=>'Adult passport number is required',
            'adult.*.nationality.required'=>'Adult nationality is required',
            'adult.*.passport_issued.required'=>'Adult passport issued is required',
            'adult.*.passport_exp_date.required'=>'Adult passport expire date is required',


            'child.*.title.required'=>'Child title is required',
            'child.*.first_name.required'=>'Child first name is required',
            'child.*.last_name.required'=>'Child last name is required',
            'child.*.email.required'=>'Child email is required',
            'child.*.travelId.required'=>'Child travelId is required',
            'child.*.contact.required'=>'Child contact is required',
            'child.*.dob.required'=>'Child dob is required',
            'child.*.gender.required'=>'Child gender is required',
            'child.*.passport_no.required'=>'Child passport number is required',
            'child.*.nationality.required'=>'Child nationality is required',
            'child.*.passport_issued.required'=>'Child passport issued is required',
            'child.*.passport_exp_date.required'=>'Child passport expire date is required',

            'held_infant.*.title.required'=>'Infant title is required',
            'held_infant.*.first_name.required'=>'Infant first name is required',
            'held_infant.*.last_name.required'=>'Infant last name is required',
            'held_infant.*.email.required'=>'Infant email is required',
            'held_infant.*.travelId.required'=>'Infant travelId is required',
            'held_infant.*.contact.required'=>'Infant contact is required',
            'held_infant.*.dob.required'=>'Infant dob is required',
            'held_infant.*.gender.required'=>'Infant gender is required',
            'held_infant.*.passport_no.required'=>'Infant passport number is required',
            'held_infant.*.nationality.required'=>'Infant nationality is required',
            'held_infant.*.passport_issued.required'=>'Infant passport issued is required',
            'held_infant.*.passport_exp_date.required'=>'Infant passport expire date is required'
        ];
    }
}
