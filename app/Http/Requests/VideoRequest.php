<?php

namespace App\Http\Requests;

class VideoRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';

        return $rules = [
            'contenido' => 'bail|required|max:350',
            'estado' => 'required',
            'titulo' => 'bail|max:255|nullable',
            'descripcion' => 'bail|max:3500|nullable',
            'fecha' => 'bail|max:255|nullable',
            'categoria' => 'bail|max:255|nullable',
            //'titulo' => 'bail|max:255|nullable|regex:' . $regex,
            //'descripcion' => 'bail|max:3500|nullable|regex:' . $regex,
            //'fecha' => 'bail|max:255|nullable|regex:' . $regex,
            //'categoria' => 'bail|max:255|nullable|regex:' . $regex,
        ];
    }
}
