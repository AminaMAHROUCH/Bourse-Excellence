@extends('layouts.master')
<style>
    .titre {
        background-color: #f7f7f7 !important;
    }

    h3 {
        color: rgb(116, 116, 116) !important;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: "/\00a0";
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

    ul.breadcrumb {
        background-color: #f7f7f7 !important;
        padding-bottom: 0px !important;
        font-size: 13px !important;
    }

    .card-header {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }


    a.active {
        background: black !important;
    }

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"
                            style="    width: 20px !important;"></i>الرئيسية </a></li>
                <li><a href="{{ url('boursier/users') }}"> <i class="fas fa-exclamation-triangle text-gray"></i>
                        تدابير</a></li>
                <li> <i class="fas fa-eye text-gray"></i> تفاصيل</li>
            </ul>
        </div>
        <h3 class="mr-3 mb-0 mt-4">المستخدم</h3>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-header mt-2 bg-white">
                        <a class="btn btn-success mb-2" href="{{ url('boursier/users/create') }}">
                            اضف مستعمل
                        </a>
                    </div>

                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2">جدول مستخدمي التطبيق</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            الرقم
                                        </th>
                                        <th>
                                            الاسم
                                        </th>
                                        <th>
                                            البريد الالكتروني
                                        </th>
                                        <th>
                                            الدور
                                        </th>
                                        <th>
                                            الاجراءات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr data-entry-id="{{ $user->id }}">

                                            <td>
                                                {{ $user->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $user->email ?? '' }}
                                            </td>
                                            <td>
                                                @foreach ($user->roles as $key => $item)
                                                    <span class="badge badge-info">{{ $item->titre }}</span>
                                                @endforeach
                                            </td>
                                            <td class="text-center">

                                                <a class="btn btn-xs "
                                                    href="{{ route('boursier.users.show', $user->id) }}">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>

                                                <a class="btn btn-xs "
                                                    href="{{ route('boursier.users.edit', $user->id) }}">
                                                    <i class="fas fa-edit text-wanrning"></i>
                                                </a>

                                                <form action="{{ route('boursier.users.destroy', $user->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn"
                                                        value="{{ trans('global.delete') }}">
                                                        <i class="fas fa-trash text-danger"></i></button>
                                                </form>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#example1').DataTable();
        });
    </script>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('user_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.users.massDestroy') }}",
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
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-User:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
