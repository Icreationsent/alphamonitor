<?php

namespace App\Http\Requests;

use App\Models\Lga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLgaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lga_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:lgas,name,' . request()->route('lga')->id,
            ],
        ];
    }
}
