@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.poolingUnit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pooling-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.poolingUnit.fields.id') }}
                        </th>
                        <td>
                            {{ $poolingUnit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolingUnit.fields.lga') }}
                        </th>
                        <td>
                            {{ $poolingUnit->lga }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolingUnit.fields.ward') }}
                        </th>
                        <td>
                            {{ $poolingUnit->ward }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poolingUnit.fields.pu') }}
                        </th>
                        <td>
                            {{ $poolingUnit->pu }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pooling-units.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection