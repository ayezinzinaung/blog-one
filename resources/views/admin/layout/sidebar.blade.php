<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset ('admin/dist/img/su.jpg') }}" class="img-circle" style="object-fit: cover !important; width: 50px !important; height: 50px !important;" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <li class=""><a href=" {{ route('admin.post.index')}}"><i class="fa fa-circle-o"></i> Posts</a></li>
                @can('posts.category', Auth::user())
                    <li class=""><a href=" {{ route('admin.category.index')}}"><i class="fa fa-circle-o"></i> Categories</a></li>
                @endcan
                @can('posts.tag', Auth::user())
                    <li class=""><a href=" {{ route('admin.tag.index')}}"><i class="fa fa-circle-o"></i> Tags</a></li>
                @endcan
                <li class=""><a href="{{ route('admin.user.index')}}"><i class="fa fa-circle-o"></i> Users</a></li>
                <li class=""><a href="{{ route('admin.role.index')}}"><i class="fa fa-circle-o"></i> Roles</a></li>
                <li class=""><a href="{{ route('admin.permission.index')}}"><i class="fa fa-circle-o"></i> Permissions</a></li>
            </li>
        </ul>
    </section>
    {{--  sidebar   --}}
</aside>
