@extends('admin.layouts.app')
@section('title', 'Permission List')
@section('content')
<div class="content-wrapper">
    @include('components.bread-crumb-component', [
    'title'=>'Permission list',
    'links'=>[
    'Home'=>route('admin.dashboard'),
    'Permission list'=>''
    ]
    ])
    {{-- <x-bread-crumb-component title='Permission list' :links="$links" />--}}
    <div class="content-body">
        <!-- Responsive tables start -->
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Permission List</h4>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('admin.permission.create')}}" class="btn btn-sm btn-primary">{{__('Add Permission')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="search-form">
                            <div class="row justify-content-center">
                                <div class="col-md-3 form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Search By Name" value="{{request()->name}}">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="button"></label>
                                    <button class="btn btn-primary form-control" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Responsive tables end -->
    </div>
</div>
@endsection
@push('script')
{!! $dataTable->scripts() !!}
<script>
    $(document).ready(function() {
        let table = $('#permission-table');
        $('#search-form').on('submit', function(e) {
            table.draw();
            e.preventDefault();
            table.on('preXhr.dt', function(e, settings, data) {
                data.name = $('#name').val();
            })
            table.DataTable().ajax.reload();
        });
    })
</script>
@endpush