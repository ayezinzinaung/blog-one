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
                            <h3 class="box-title">Add New Admin User</h3>
                        </div>

                        @include('layout.errors')

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.user.store')}}" method="POST">
                            {{csrf_field()}}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="from-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="User Name">
                                    </div>
                                    <div class="from-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="email">
                                    </div>
                                    <div class="from-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="phone">
                                    </div>
                                    <div class="from-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="password">
                                    </div>
                                    <div class="from-group">
                                        <label for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" 
                                        required autocomplete="new-password" placeholder="confirm password">
                                    </div>
                                    <div class="from-group">
                                        <label for="role">Assign Role</label>
                                        <select name="role" id="" class="form-control">
                                            <option value="0">Editor</option>
                                            <option value="1">Publisher</option>
                                            <option value="2">Writer</option>
                                        </select>
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
