<?php

namespace App\Http\Requests;

use App\Models\Party;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePartyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('party_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:parties',
            ],
            'aspirant' => [
                'string',
                'required',
            ],
            'runing_mate' => [
                'string',
                'required',
            ],
        ];
    }
}
