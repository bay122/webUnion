<?php

namespace App\Http\Requests;

class ModeradorGrupoFormacionUpdateRequest extends Request
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

        //https://laravel.com/docs/5.7/validation
        //bail: Stopping On First Validation Failure
        return $rules = [
        	//'id_grupo_formacion' => 'bail|required',
        	//'bo_moderador' => 'bail|required',
            'ministerio' => 'bail|required',
            //'titulo' => 'bail|max:255|nullable|regex:' . $regex,
            //'descripcion' => 'bail|max:3500|nullable|regex:' . $regex,
            //'fecha' => 'bail|max:255|nullable|regex:' . $regex,
            //'categoria' => 'bail|max:255|nullable|regex:' . $regex,
            //
            //
        ];
    }
}
