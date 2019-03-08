<?php

namespace App\Http\Requests;

class IntegranteGrupoFormacionRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     * Docs:
     *     https://laravel.com/docs/5.7/validation
     *     https://laracasts.com/discuss/channels/laravel/date-format-validation
     *     https://laracasts.com/discuss/channels/general-discussion/date-format-in-laravel?page=0
     * @return array
     */
    public function rules()
    {
        $regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';

        //https://laravel.com/docs/5.7/validation
        //bail: Stopping On First Validation Failure
        return $rules = [
        	'id_grupo_formacion' => 'bail|required',
        	//'bo_moderador' => 'bail|required|max:255',
            'nombres' => 'bail|required|max:255',
            'apellido_paterno' => 'bail|required|max:255',
            'apellido_materno' => 'bail|nullable|max:255',
            'email' => 'bail|required|email|max:255',//|unique:users,email',
            'gl_sexo' => 'bail|required|max:255',
            'telefono' => 'bail|nullable|max:255',
            'rut' => 'bail|nullable|max:255',
            'fc_nacimiento' => 'bail|nullable|date_format:"d/m/Y"',
            'fc_llegada_iglesia' => 'bail|nullable|date_format:"d/m/Y"',
            'pais_origen' => 'bail|nullable|max:255',
            'region' => 'bail|nullable|max:255',
            'nacionalidad' => 'bail|nullable|max:255',
            'comuna' => 'bail|nullable|max:255',
            'direccion' => 'bail|nullable|max:255',
            //'titulo' => 'bail|max:255|nullable|regex:' . $regex,
            //'descripcion' => 'bail|max:3500|nullable|regex:' . $regex,
            //'fecha' => 'bail|max:255|nullable|regex:' . $regex,
            //'categoria' => 'bail|max:255|nullable|regex:' . $regex,
            //
            //
        ];
    }
}
