<?php

namespace App\Http\Requests;

use App\Models\Incidence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIncidenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('incidence_edit');
    }

    public function rules()
    {
        return [
            'subject' => [
                'string',
                'required',
            ],
            'observations' => [
                'required',
            ],
            'images' => [
                'array',
            ],
            'videos' => [
                'array',
            ],
        ];
    }
}
