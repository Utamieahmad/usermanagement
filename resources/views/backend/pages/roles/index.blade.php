
@extends('backend.layouts.master2')

@section('title')
Role Page - Admin Panel
@endsection

@section('styles')
    <!-- PLUGINS STYLES-->
    <link href="{{ asset('template/assets/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/vendors/DataTables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/assets/vendors/DataTables/responsive.bootstrap.min.css') }}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('template/assets/css/main.min.css') }}" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
@endsection


@section('admin-content')
<div class="page-heading">
    <h1 class="page-title">DataTables</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html"><i class="la la-home font-20"></i></a>
        </li>
        <li class="breadcrumb-item">DataTables</li>
    </ol>
    @include('backend.layouts.partials.messages')
</div>

<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Roles List</div>
            <!-- <h4 class="header-title float-left">Roles List</h4> -->
            <p class="float-right mb-2">
                @if (Auth::guard('admin')->user()->can('role.create'))
                    <a class="btn btn-primary text-white" href="{{ route('admin.roles.create') }}">Create New Role</a>
                @endif
            </p>
        </div>
        <div class="ibox-body">
              <div class="clearfix"></div>
              <div class="data-tables">
                  <table class="table table-striped table-bordered dt-responsive" id="dataTable" cellspacing="0" width="100%">
                      <thead class="bg-light text-capitalize">
                          <tr>
                              <th width="">Sl</th>
                              <th width="">Name</th>
                              <th width="">Permissions</th>
                              <th width="">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach ($roles as $role)
                         <tr>
                              <td>{{ $loop->index+1 }}</td>
                              <td>{{ $role->name }}</td>
                              <td>
                                  @foreach ($role->permissions as $perm)
                                      <span class="badge badge-info mr-1">
                                          {{ $perm->name }}
                                      </span>
                                  @endforeach
                              </td>
                              <td>
                                  @if (Auth::guard('admin')->user()->can('admin.edit'))
                                      <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}">Edit</a>
                                  @endif

                                  @if (Auth::guard('admin')->user()->can('admin.edit'))
                                      <a class="btn btn-danger text-white" href="{{ route('admin.roles.destroy', $role->id) }}"
                                      onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                          Delete
                                      </a>

                                      <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                          @method('DELETE')
                                          @csrf
                                      </form>
                                  @endif
                              </td>
                          </tr>
                         @endforeach
                      </tbody>
                  </table>
              </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<!-- PAGE LEVEL PLUGINS-->
<script src="{{ asset('template/assets/vendors/DataTables/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/assets/vendors/DataTables/dataTables.fixedHeader.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/assets/vendors/DataTables/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/assets/vendors/DataTables/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>

<!-- CORE SCRIPTS-->
<script src="{{ asset('template/assets/js/app.min.js') }}" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script type="text/javascript">
    $(function() {
        $('#dataTable').DataTable({
            pageLength: 10,
            responsive: true,
            //"ajax": './assets/demo/data/table_data.json',
            /*"columns": [
                { "data": "name" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]*/
        });
    })
</script>
@endsection
