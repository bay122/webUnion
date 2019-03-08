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
        	'ministerio' => 'bail|required', 
			'fc_estimada_inicio' =>  'bail|required',
			'fc_estimada_fin' =>  'bail|required',
			'nr_cupo_maximo' =>  'bail|required',
			'nr_cupo_minimo' =>  'bail|nullable',
			'discipulador' =>  'bail|required',
			'id_grupo_formacion_tipo' =>  'bail|required',
			'id_grupo_formacion_tipos_sexo' =>  'bail|required',
			//nr_cupo_maximo
			//nr_cupo_minimo
			//hr_inicio
			//hr_fin
			//nr_dia_semana
			//fc_estimada_inicio
			//fc_inicio
			//fc_estimada_fin
			//fc_fin

            //'titulo' => 'bail|max:255|nullable|regex:' . $regex,
            //'descripcion' => 'bail|max:3500|nullable|regex:' . $regex,
            //'fecha' => 'bail|max:255|nullable|regex:' . $regex,
            //'categoria' => 'bail|max:255|nullable|regex:' . $regex,
        ];
    }
}
