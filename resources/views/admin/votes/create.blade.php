@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vote.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.votes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="class row">


                    <div class="form-group col-md-4">
                        <label class="required" for="lga">{{ trans('cruds.vote.fields.lga') }}</label>
                        @php
                            $name = App\Models\Lga::all();
                        @endphp
                        @if(Auth::user()->id == 1 )
                        <select class="form-control {{ $errors->has('lga') ? 'is-invalid' : '' }}" type="text" name="lga" id="lga">
                             <option class="form-control">Select Local Government Area</option>
                        </select>

                        @elseif( Auth::user()->id !== 1)
                            <select class="form-control {{ $errors->has('lga') ? 'is-invalid' : '' }}" type="text" name="lga" id="lga">
                                <option class="form-control disabled">{{ Auth::user()->name }}</option>
                            </select>
                        @endif
                        @if($errors->has('lga'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lga') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.vote.fields.lga_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="ward">{{ trans('cruds.vote.fields.ward') }}</label>
                        <select class="form-control {{ $errors->has('ward') ? 'is-invalid' : '' }}" type="text" name="ward" id="ward" value="{{ old('ward', '') }}" required>

                            <option>Select Local ward</option>
                        </select>
                        @if($errors->has('ward'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ward') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.vote.fields.ward_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="pooling_unit">{{ trans('cruds.vote.fields.pooling_unit') }}</label>
                        <select class="form-control {{ $errors->has('pooling_unit') ? 'is-invalid' : '' }}" type="text" name="pooling_unit" id="pooling_unit" value="{{ old('pooling_unit', '') }}" required>
                            <option>Select Polling Unit</option>
                        </select>
                        @if($errors->has('pooling_unit'))
                            <div class="invalid-feedback">
                                {{ $errors->first('pooling_unit') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.vote.fields.pooling_unit_helper') }}</span>
                    </div>
            </div>



            <div class="form-group">
                <label class="required" for="agent">{{ trans('cruds.vote.fields.agent') }}</label>
                <input class="form-control {{ $errors->has('agent') ? 'is-invalid' : '' }}" type="text" name="agent" id="agent" value="{{ old('agent', '') }}" required>
                @if($errors->has('agent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vote.fields.agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.vote.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="tel" name="phone" id="phone" value="{{ old('phone', '') }}" step="1" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vote.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="party">{{ trans('cruds.vote.fields.party') }}</label>
                <select class="form-control {{ $errors->has('party') ? 'is-invalid' : '' }}" type="text" name="party" id="party" value="{{ old('party', '') }}" required>

                    <option>Select Party</option>
                    @php
                        $party = App\Models\Party::all();
                    @endphp
                    @foreach($party as $value)

                            <option>{{ $value->name }}</option>

                    @endforeach

                </select>
                @if($errors->has('party'))
                    <div class="invalid-feedback">
                        {{ $errors->first('party') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vote.fields.party_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="number_of_votes">{{ trans('cruds.vote.fields.number_of_votes') }}</label>
                <input class="form-control {{ $errors->has('number_of_votes') ? 'is-invalid' : '' }}" type="text" name="number_of_votes" id="number_of_votes" value="{{ old('number_of_votes', '') }}" required>
                @if($errors->has('number_of_votes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('number_of_votes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.vote.fields.number_of_votes_helper') }}</span>
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
