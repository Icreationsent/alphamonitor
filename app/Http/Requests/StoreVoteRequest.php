<?php

namespace App\Http\Requests;

use App\Models\Vote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vote_create');
    }

    public function rules()
    {
        return [
            'lga' => [
                'string',
                'required',
            ],
            'ward' => [
                'string',
                'required',
            ],
            'pooling_unit' => [
                'string',
                'required',
            ],
            'agent' => [
                'string',
                'required',
            ],
            'phone' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'party' => [
                'string',
                'required',
            ],
            'number_of_votes' => [
                'string',
                'required',
            ],
        ];
    }
}
