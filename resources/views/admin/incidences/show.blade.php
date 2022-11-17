@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.incidence.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.incidences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.incidence.fields.id') }}
                        </th>
                        <td>
                            {{ $incidence->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.incidence.fields.subject') }}
                        </th>
                        <td>
                            {{ $incidence->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.incidence.fields.observations') }}
                        </th>
                        <td>
                            {!! $incidence->observations !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.incidence.fields.images') }}
                        </th>
                        <td>
                            @foreach($incidence->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.incidence.fields.videos') }}
                        </th>
                        <td>
                            @foreach($incidence->videos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.incidences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection