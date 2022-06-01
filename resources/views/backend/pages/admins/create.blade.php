
@extends('backend.layouts.master2')

@section('title')
Admin Create - Admin Panel
@endsection

@section('styles')
<!-- THEME STYLES-->
<link href="{{ asset('template/assets/css/main.min.css') }}" rel="stylesheet" />
<!-- PAGE LEVEL STYLES-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')
<div class="page-heading">
    <h1 class="page-title">Admins</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">Data admin</li>
    </ol>
    @include('backend.layouts.partials.messages')
</div>

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Basic Validation</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            </div>
        </div>
        <div class="ibox-body">
            <form class="form-horizontal" id="form-sample-1" action="{{ route('admin.admins.store') }}" method="POST" novalidate="novalidate">
              @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Admin Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Admin Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Admin Email</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Assign Roles</label>
                    <div class="col-sm-10 ml-sm-auto">
                      <select name="roles[]" id="roles" class="form-control select2" multiple>
                          @foreach ($roles as $role)
                              <option value="{{ $role->name }}">{{ $role->name }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="url">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Min length</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="min">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Max length</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="max">
                    </div>
                </div> -->
                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- PAGE LEVEL PLUGINS-->
<script src="{{ asset('template/assets/vendors/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{ asset('template/assets/js/app.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $("#form-sample-1").validate({
        rules: {
            name: {
                minlength: 2,
                required: !0
            },
            username: {
              minlength: 2,
              required: !0
            },
            email: {
                required: !0,
                email: !0
            },
            url: {
                required: !0,
                url: !0
            },
            number: {
                required: !0,
                number: !0
            },
            min: {
                required: !0,
                minlength: 3
            },
            max: {
                required: !0,
                maxlength: 4
            },
            password: {
                required: !0
            },
            password_confirmation: {
                required: !0,
                equalTo: "#password"
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection
