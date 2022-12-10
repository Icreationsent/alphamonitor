@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.poolingUnit.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pooling-units.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="lga">{{ trans('cruds.poolingUnit.fields.lga') }}</label>
                <select class="form-control {{ $errors->has('lga') ? 'is-invalid' : '' }}" type="text" name="lga" id="lga" value="{{ old('lga', '') }}">

                </select>

                @if($errors->has('lga'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lga') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolingUnit.fields.lga_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ward">{{ trans('cruds.poolingUnit.fields.ward') }}</label>
                <Select class="form-control {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" id="ward" value="{{ old('ward', '') }}">
                </Select>
                @if($errors->has('ward'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ward') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolingUnit.fields.ward_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pu">{{ trans('cruds.poolingUnit.fields.pu') }}</label>
                <input class="form-control {{ $errors->has('pu') ? 'is-invalid' : '' }}" type="text" name="pu" id="pu" value="{{ old('pu', '') }}" required>
                @if($errors->has('pu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.poolingUnit.fields.pu_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
