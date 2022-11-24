<?php

namespace App\Http\Requests;

use App\Models\Lga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLgaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lga_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:lgas',
            ],
        ];
    }
}
