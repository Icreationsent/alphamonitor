@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.party.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.parties.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.party.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.party.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="aspirant">{{ trans('cruds.party.fields.aspirant') }}</label>
                <input class="form-control {{ $errors->has('aspirant') ? 'is-invalid' : '' }}" type="text" name="aspirant" id="aspirant" value="{{ old('aspirant', '') }}" required>
                @if($errors->has('aspirant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aspirant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.party.fields.aspirant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="running_mate">{{ trans('cruds.party.fields.running_mate') }}</label>
                <input class="form-control {{ $errors->has('running_mate') ? 'is-invalid' : '' }}" type="text" name="running_mate" id="running_mate" value="{{ old('running_mate', '') }}" required>
                @if($errors->has('running_mate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('running_mate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.party.fields.running_mate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="party_id">{{ trans('cruds.party.fields.party') }}</label>
                <select class="form-control select2 {{ $errors->has('party') ? 'is-invalid' : '' }}" name="party_id" id="party_id">
                    @foreach($parties as $id => $entry)
                        <option value="{{ $id }}" {{ old('party_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('party'))
                    <div class="invalid-feedback">
                        {{ $errors->first('party') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.party.fields.party_helper') }}</span>
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
