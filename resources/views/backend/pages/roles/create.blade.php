
@extends('backend.layouts.master2')

@section('title')
Role Create - Admin Panel
@endsection

@section('styles')
<!-- THEME STYLES-->
<link href="{{ asset('template/assets/css/main.min.css') }}" rel="stylesheet" />
<!-- PAGE LEVEL STYLES-->
<style>
  .form-check-input {
    margin-left: 0rem!important;
  }
</style>
@endsection


@section('admin-content')
<!-- START PAGE CONTENT-->
<div class="page-heading">
    <h1 class="page-title">Form Create</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Create New Role</li>
    </ol>
    @include('backend.layouts.partials.messages')
</div>

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">New Role</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" action="{{ route('admin.roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter a Role Name">
                </div>

                <div class="form-group">
                    <label for="name">Permissions</label>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                        <label class="form-check-label" for="checkPermissionAll">All</label>
                    </div>
                    <hr>
                    @php $i = 1; @endphp
                    @foreach ($permission_groups as $group)
                        <div class="row">
                            <div class="col-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                </div>
                            </div>

                            <div class="col-9 role-{{ $i }}-management-checkbox">
                                @php
                                    $permissions = App\User::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                @endphp
                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @php  $j++; @endphp
                                @endforeach
                                <br>
                            </div>

                        </div>
                        <hr>
                        @php  $i++; @endphp
                    @endforeach
                </div>
                
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
            </form>
        </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection

@section('scripts')
     @include('backend.pages.roles.partials.scripts')
     <!-- CORE SCRIPTS-->
     <script src="{{ asset('template/assets/js/app.min.js') }}" type="text/javascript"></script>
@endsection
