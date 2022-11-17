<?php

namespace App\Http\Requests;

use App\Models\PoolingUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePoolingUnitRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pooling_unit_edit');
    }

    public function rules()
    {
        return [
            'lga' => [
                'string',
                'nullable',
            ],
            'ward' => [
                'string',
                'nullable',
            ],
            'pu' => [
                'string',
                'required',
                'unique:pooling_units,pu,' . request()->route('pooling_unit')->id,
            ],
        ];
    }
}
