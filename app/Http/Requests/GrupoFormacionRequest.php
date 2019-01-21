<?php

namespace App\Http\Requests;

class GrupoFormacionRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * Docs:
     *     https://laravel.com/docs/5.7/validation
     * @return array
     */
    public function rules()
    {
        $regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';

        //bail: Stopping On First Validation Failure
        return $rules = [
            'contenido' => 'bail|required|max:255',
            'titulo' => 'bail|max:255|nullable',
            'fecha' => 'bail|max:255|nullable',
            'categoria' => 'bail|max:255|nullable',
            //'titulo' => 'bail|max:255|nullable|regex:' . $regex,
            //'descripcion' => 'bail|max:3500|nullable|regex:' . $regex,
            //'fecha' => 'bail|max:255|nullable|regex:' . $regex,
            //'categoria' => 'bail|max:255|nullable|regex:' . $regex,
        ];
    }
}
