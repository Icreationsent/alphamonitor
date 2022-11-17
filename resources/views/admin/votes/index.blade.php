@extends('layouts.admin')
@section('content')
@can('vote_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.votes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.vote.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vote.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Vote">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.lga') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.ward') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.pooling_unit') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.agent') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.party') }}
                        </th>
                        <th>
                            {{ trans('cruds.vote.fields.number_of_votes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($votes as $key => $vote)
                        <tr data-entry-id="{{ $vote->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $vote->id ?? '' }}
                            </td>
                            <td>
                                {{ $vote->lga ?? '' }}
                            </td>
                            <td>
                                {{ $vote->ward ?? '' }}
                            </td>
                            <td>
                                {{ $vote->pooling_unit ?? '' }}
                            </td>
                            <td>
                                {{ $vote->agent ?? '' }}
                            </td>
                            <td>
                                {{ $vote->phone ?? '' }}
                            </td>
                            <td>
                                {{ $vote->party ?? '' }}
                            </td>
                            <td>
                                {{ $vote->number_of_votes ?? '' }}
                            </td>
                            <td>
                                @can('vote_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.votes.show', $vote->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('vote_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.votes.edit', $vote->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('vote_delete')
                                    <form action="{{ route('admin.votes.destroy', $vote->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('vote_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.votes.massDestroy') }}",
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
    order: [[ 8, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Vote:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection