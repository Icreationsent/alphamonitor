@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vote.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.votes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.id') }}
                        </th>
                        <td>
                            {{ $vote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.lga') }}
                        </th>
                        <td>
                            {{ $vote->lga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.ward') }}
                        </th>
                        <td>
                            {{ $vote->ward }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.pooling_unit') }}
                        </th>
                        <td>
                            {{ $vote->pooling_unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.agent') }}
                        </th>
                        <td>
                            {{ $vote->agent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.phone') }}
                        </th>
                        <td>
                            {{ $vote->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.party') }}
                        </th>
                        <td>
                            {{ $vote->party }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vote.fields.number_of_votes') }}
                        </th>
                        <td>
                            {{ $vote->number_of_votes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.votes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection