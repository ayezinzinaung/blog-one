@extends('admin.layout.app')
@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Editors</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    {{--  general form elements  --}}
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Admin User</h3>
                        </div>

                        @include('includes.messages')

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.user.update', $user->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="from-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="User Name" value="@if (old('name')){{ old('name') }}@else{{ $user->name }}@endif">
                                    </div>
                                    <div class="from-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="email" value="@if (old('email')){{ old('email') }}@else{{ $user->email}}@endif">
                                    </div>
                                    <div class="from-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="phone" value="@if (old('phone')){{ old('phone') }}@else{{ $user->phone}}@endif">
                                    </div>

                                    <div class="from-group">
                                        <label for="password-confirm">Status</label>      
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="status" value="1"
                                                @if(old('status') == 1 || $user->status == 1)
                                                    checked
                                                @endif>Status</label>
                                        </div>
                                    </div>

                                    <div class="from-group">
                                        <label>Assign Role</label>
                                        <div class="row">
                                            @foreach($roles as $role)
                                            <div class="col-lg-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="{{ $role->id }}" name="role[]"
                                                        @foreach ($user->roles as $user_role)
                                                            @if ($user_role->id == $role->id)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                        >{{$role->name}}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="from-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href='{{ route('admin.user.index')}}' class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
