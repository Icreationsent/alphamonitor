<?php

namespace App\Http\Requests;

use App\Models\PoolingUnit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPoolingUnitRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pooling_unit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pooling_units,id',
        ];
    }
}
