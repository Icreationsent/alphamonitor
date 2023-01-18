@extends('layouts.admin')
@section('content')
@can('incidence_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.incidences.create') }}">
               Report Incidence
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.incidence.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Incidence">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.incidence.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.incidence.fields.subject') }}
                        </th>
                        <th>
                            {{ trans('cruds.incidence.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.incidence.fields.videos') }}
                        </th>
                        <th>
                            &nbsp;Name
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            LGA
                        </th>
                        <th>
                            WARD
                        </th>
                        <th>
                            &nbsp;Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($incidences as $key => $incidence)
                        <tr data-entry-id="{{ $incidence->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $incidence->id ?? '' }}
                            </td>
                            <td>
{{--                                {{ $incidence->subject ?? '' }}--}}
                                {!!html_entity_decode($incidence->subject  ?? '' )!!}
                            </td>
                            <td>
                                @foreach($incidence->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $media->getUrl('thumb') }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($incidence->videos as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                    {{ $incidence->name ?? '' }}
                            </td>
                            <td>
                                    {{ $incidence->phone ?? '' }}
                            </td>
                            <td>
                                    {{ $incidence->lga ?? '' }}
                            </td>
                            <td>
                                  {{ $incidence->ward ?? '' }}
                            </td>
                            <td>
                                @can('incidence_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.incidences.show', $incidence->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('incidence_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.incidences.edit', $incidence->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('incidence_delete')
                                    <form action="{{ route('admin.incidences.destroy', $incidence->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('incidence_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.incidences.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Incidence:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
