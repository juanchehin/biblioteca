<?php

namespace app\Http\Requests;

use app\Http\Requests\Request;
use app\Models\Partida;

class UpdatepartidasRequest extends Request
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
        $regla=Partida::$rules;
        $regla['codigo'].=','.$this->segment(2);


        return $regla;
        //return Partida::$rules;
    }
}
