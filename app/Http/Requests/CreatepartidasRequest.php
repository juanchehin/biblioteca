<?php

namespace app\Http\Requests;

use app\Http\Requests\Request;
use app\Models\Partida;

class CreatepartidasRequest extends Request
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
        return Partida::$rules;
    }
}