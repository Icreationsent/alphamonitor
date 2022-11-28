@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.party.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.parties.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.party.fields.id') }}
                        </th>
                        <td>
                            {{ $party->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party.fields.name') }}
                        </th>
                        <td>
                            {{ $party->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party.fields.aspirant') }}
                        </th>
                        <td>
                            {{ $party->aspirant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party.fields.running_mate') }}
                        </th>
                        <td>
                            {{ $party->running_mate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.party.fields.party') }}
                        </th>
                        <td>
                            {{ $party->party->party ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.parties.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
