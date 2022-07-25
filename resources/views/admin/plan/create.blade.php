@extends('admin.layouts.app')
@section('title', 'Plan')
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Plan</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Plan Create
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-float waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('admin.plans.index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square mr-1">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg><span class="align-middle">List</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Basic Inputs start -->
        <section id="basic-input">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Plan Create</h4>
                            <div class="dt-action-buttons text-right">
                                <div class="dt-buttons d-inline-flex">
                                    <a href="{{route('admin.plans.index')}}" class="btn btn-sm btn-primary">{{__('Plan List')}}</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">
                            <form action="{{route('admin.plans.store')}}" method="POST" class="">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="duration">Duration</label>
                                            <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter Duration">
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <!-- <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description"> -->
                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <h4>Modules</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="role[]" class="custom-control-input" id="user" value="user">
                                                <label class="custom-control-label" for="user">User</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="role[]" class="custom-control-input" id="role" value="role">
                                                <label class="custom-control-label" for="role">Role</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="role[]" class="custom-control-input" id="plan" value="plan">
                                                <label class="custom-control-label" for="plan">Plan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3 col-12 mb-1">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="role[]" class="custom-control-input" id="category" value="category">
                                                <label class="custom-control-label" for="category">Category</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic Inputs end -->
    </div>
</div>

@endsection
@section('css')

@endsection
@section('js')

@endsection
@push('script')

@endpush