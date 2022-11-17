<?php

namespace App\Http\Requests;

use App\Models\Party;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPartyRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('party_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:parties,id',
        ];
    }
}
