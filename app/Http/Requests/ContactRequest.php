<?php

namespace App\Http\Requests;

class ContactRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|max:255',
            'email' => 'bail|required|email',
            'message' => 'bail|required|max:1000',
            'recap' => 'bail|required',
            'id_ministerio' => 'bail'
        ];
    }

    /*
    public function rules()
    {
        //$regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';
        $regex = '/[A-Za-z0-9 .,_?!()]*[A-Za-z0-9][A-Za-z0-9 .,_?!()]*$/';
        $regex_mail = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';
        return [
            'name' => 'bail|required|max:120',//|regex:' . $regex,
            'email' => 'bail|required|email|max:140', //|regex:' . $regex_mail,
            'message' => 'bail|required|max:1000',//|regex:' . $regex,
            'id_ministerio' => 'bail|integer'
        ];
    }
     */
}
