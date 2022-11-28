<?php

namespace App\Http\Requests;

use App\Models\Party;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePartyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:parties,name,' . request()->route('party')->id,
            ],
            'aspirant' => [
                'string',
                'required',
            ],
            'running_mate' => [
                'string',
                'required',
            ],
        ];
    }
}
