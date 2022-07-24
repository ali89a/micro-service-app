@extends('admin.layouts.app')
@section('title', 'Plan List')
@push('style')
<style>
    table[id="dataTable"] {
        width: 100% !important;
    }

    table thead th:first-child {
        width: 5%;
    }

    table thead th:nth-child(2) {
        width: 20%;
    }
    table thead th:nth-child(3) {
        width: 10%;
    }
    table thead th:nth-child(4) {
        width: 10%;
    }
    table thead th:nth-child(5) {
        width: 10%;
    }
    table thead th:nth-child(6) {
        width: 10%;
    }
    table thead th:nth-child(7) {
        width: 10%;
    }
    table thead th:nth-child(8) {
        width: 10%;
    }

    table thead th:last-child {
        width: 10%;
    }
</style>
@endpush
@section('content')
<div class="content-wrapper">
    @include('components.bread-crumb-component', [
    'title'=>'Plan list',
    'links'=>[
    'Home'=>route('admin.dashboard'),
    'Plan list'=>''
    ]
    ])
    {{-- <x-bread-crumb-component title='Plan list' :links="$links" />--}}
    <div class="content-body">
        <!-- Responsive tables start -->
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Plan List</h4>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('admin.plans.create')}}" class="btn btn-sm btn-primary">{{__('Add Plan')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="dataTable" class="datatables-basic table table-striped table-secondary table-bordered">
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
<script>
    $(document).ready(function() {
        $('#dataTable').dataTable({
            stateSave: true,
            responsive: true,
            serverSide: true,
            processing: true,
            ajax: '{{ route('admin.plans.index') }}',
            columns: [{
                    data: "DT_RowIndex",
                    title: "SL",
                    name: "DT_RowIndex",
                    searchable: false,
                    orderable: false
                },
                {
                    data: "name",
                    title: "Plan Name",
                    searchable: true
                },
                {
                    data: "price",
                    title: "Price",
                    searchable: true
                },
                {
                    data: "duration",
                    title: "Duration",
                    searchable: true
                },
                {
                    data: "max_users",
                    title: "Max Users",
                    searchable: true
                },
                {
                    data: "max_customers",
                    title: "Max Customer",
                    searchable: true
                },
                {
                    data: "max_categories",
                    title: "Max Categories",
                    searchable: true
                },
                {
                    data: "max_products",
                    title: "Max Products",
                    searchable: true
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