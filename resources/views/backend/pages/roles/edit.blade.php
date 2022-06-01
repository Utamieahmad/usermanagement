
@extends('backend.layouts.master2')

@section('title')
Role Edit - Admin Panel
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
    <h1 class="page-title">Form Edit</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Edit Role</li>
    </ol>
    @include('backend.layouts.partials.messages')
</div>

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Edit Role</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $role->name }}" name="name" placeholder="Enter a Role Name">
                </div>

                <div class="form-group">
                    <label for="name">Permissions</label>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="checkPermissionAll">All</label>
                    </div>
                    <hr>
                    @php $i = 1; @endphp
                    @foreach ($permission_groups as $group)
                        <div class="row">
                            @php
                                $permissions = App\User::getpermissionsByGroupName($group->name);
                                $j = 1;
                            @endphp

                            <div class="col-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                </div>
                            </div>

                            <div class="col-9 role-{{ $i }}-management-checkbox">

                                @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                    @php  $j++; @endphp
                                @endforeach
                                <br>
                            </div>

                        </div>
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
