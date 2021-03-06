
@extends('layouts.admin')
@section('style')
    @parent
@endsection
@section('content')
    <div class="content">
    
        <div class="container-fluid">
     
            <div class="row">
                <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Номер</th>
                            <th>Тип стая</th>
                            <th>Размер</th>
                    </tr>
                    </thead>
                    <tbody>
                          @foreach ($room as $data)
                            <tr>
                            @if($data->room_bookings->first() == null)  
                            <td style="background-color:grey; color: black;  font-size:15px;" >{{ $data->room_number }}</td>
                            @elseif($data->room_bookings->first()->status === 'checked_in')
                            <td style="background-color:green; color: black;  font-size:15px;" >{{ $data->room_number }}</td>
                            @elseif($data->room_bookings->first()->status === 'checked_out') 
                            <td style="background-color:blue; color: black;  font-size:15px;" >{{ $data->room_number }}</td>
                            @endif
                                <td>{{ $data->room_type->name ?? '' }}</td>
                                <td>{{ $data->room_type->size ?? '' }}</td>
                            </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                </div> <!-- end col-md-12 -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    @parent

    <!-- Sweet Alert 2 plugin -->
    <script src="{{ asset('backend/js/sweetalert2.js') }}"></script>

    <!--  Bootstrap Table Plugin    -->
    <script src="{{ asset('backend/js/bootstrap-table.js') }}"></script>
    <script type="text/javascript">

        var delete_button = function(){
            swal({  title: "Are you sure?",
                text: "You want to delete the food.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "Yes, delete it!",
                cancelButtonClass: "btn btn-danger btn-fill",
                closeOnConfirm: false,
            },function(){
                $('form#delete-food').submit();
            });
        }


        var $table = $('#bootstrap-table');
        $().ready(function () {
            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8, 10, 25, 50, 100],

                formatShowingRows: function (pageFrom, pageTo, totalRows) {
                    //do nothing here, we don't want to show the text "showing x of y from..."
                },
                formatRecordsPerPage: function (pageNumber) {
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            //activate the tooltips after the data table is initialized
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

    </script>
@endsection

