@extends('layouts.admin')
@section('content')
    @can('guardian_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.guardians.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.guardian.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.guardian.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Guardian">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.surname') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.initials') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.guardian.fields.address') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($guardians as $key => $guardian)
                        <tr data-entry-id="{{ $guardian->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $guardian->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Guardian::TITLE_SELECT[$guardian->title] ?? '' }}
                            </td>
                            <td>
                                {{ $guardian->surname ?? '' }}
                            </td>
                            <td>
                                {{ $guardian->initials ?? '' }}
                            </td>
                            <td>
                                {{ $guardian->email ?? '' }}
                            </td>
                            <td>
                                {{ $guardian->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $guardian->address ?? '' }}
                            </td>
                            <td>
                                @can('guardian_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.guardians.show', $guardian->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('guardian_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.guardians.edit', $guardian->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('guardian_delete')
                                    <form action="{{ route('admin.guardians.destroy', $guardian->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                    @can('guardian_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.guardians.massDestroy') }}",
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
                order: [[ 1, 'desc' ]],
                pageLength: 25,
            });
            $('.datatable-Guardian:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
