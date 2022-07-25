@extends('admin.layouts.app')

@section('title', 'Admin List')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
@endpush
@section('content')

<div class="content-wrapper">
    @php
    $links = [
    'Home'=>route('admin.dashboard'),
    'Admin list'=>''
    ]
    @endphp
    <x-bread-crumb-component title='Admin list' :links="$links" />
    <div class="content-body">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="head-label">
                            <h4 class="mb-0"> {{__('All Admin List')}}</h4>
                        </div>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('admin.admin.create')}}" class="btn btn-primary">{{__('Add Admin')}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">
                        <form action="{{route('admin.admin.index')}}" method="get">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-3 form-group">
                                    <label for="from_date">From Date</label>
                                    <input type="text" id="from_date" name="from_date" value="{{request()->from_date}}" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="to_date">To Date</label>
                                    <input type="text" id="to_date" name="to_date" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Search By Name" value="{{request()->name}}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Search By Email" value="{{request()->email}}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="button"></label>
                                    <button class="btn btn-primary form-control" type="submit">Search</button>
                                </div>
                            </div>
                        </form>

                        <table id="dataTable" class="datatables-basic table table-bordered table-secondary table-striped">
                            {{-- show from datatable--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Responsive tables end -->
    </div>
</div>
@endsection
@push('script')


<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
            stateSave: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: {
                url: "{{ route('admin.admin.index') }}",
            },
            columns: [{
                    data: "DT_RowIndex",
                    title: "SL",
                    name: "DT_RowIndex",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "name",
                    title: "Name",
                    searchable: true
                },
                {
                    data: "email",
                    title: "Email",
                    searchable: true
                },
                {
                    data: "mobile",
                    title: "Mobile",
                    searchable: true,
                    "defaultContent": '<i class="text-danger">Not set</i>'
                },
                {
                    data: "role_info",
                    title: "Role",
                    searchable: true,
                    "defaultContent": '<i class="text-danger">Not set</i>',
                    orderable: true,
                },
                {
                    data: "status",
                    title: "Status",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "action",
                    title: "Action",
                    orderable: false,
                    searchable: false
                },
            ],
        });
    })
</script>

@endpush