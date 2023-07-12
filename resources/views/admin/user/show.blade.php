@extends('admin.layout.app')
@section('headSection')
  <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">  
@endsection

@section('main-content')
    {{--  <!-- Content Wrapper. Contains page content -->  --}}
    <div class="content-wrapper">
        {{--  <!-- Content Header (Page header) -->  --}}
        <section class="content-header">
            @include('admin.layout.pagehead')

            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        {{--  <!-- Main content -->  --}}
        <section class="content">

            {{--  <!-- Default box -->  --}}
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Admin Users</h3>
                    @include('includes.messages')
                    
                    <a class="col-lg-offset-5 btn btn-success" href="{{route('admin.user.create')}}">Add New</a>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        {{--  <!-- /.box-header -->  --}}
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S. No</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Assigned Roles</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)     
                                    <tr>
                                        <td>{{ $loop->index + 1}}</td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->phone}}</td>
                                        <td>
                                            @foreach($user->roles as $role)
                                                {{ $role->name}},
                                            @endforeach
                                        </td>
                                        <td>{{ $user->status? 'Active' : 'Not Active'}}</td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $user->id) }}"><span
                                                    class="glyphicon glyphicon-edit"></span></a>
    
                                            <form id="delete-form-{{ $user->id }}" method="POST"
                                                action="{{ route('admin.user.destroy', $user->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <a href="" onclick="
                                                if(confirm('Are you sure, You want to delete this?'))
                                                {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                                }
                                                else{
                                                    event.preventDefault()
                                                } "><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        {{--  <!-- /.box-body -->  --}}
                    </div>
                </div>
                {{--  <!-- /.box-body -->  --}}
                <div class="box-footer">
                    Footer
                </div>
                {{--  <!-- /.box-footer-->  --}}
            </div>
            {{--  <!-- /.box -->  --}}

        </section>
        {{--  <!-- /.content -->  --}}
    </div>
    {{--  <!-- /.content-wrapper -->  --}}
@endsection

@section('footerSection')

    <script src="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
    </script>
@endsection
