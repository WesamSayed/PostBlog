 <div class="sidebar" data-background-color="white" data-active-color="danger">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Blog Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{url('/admin')}}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/posts/create')}}">
                        <i class="ti-archive"></i>
                        <p>Add Post</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/posts')}}">
                        <i class="ti-view-list-alt"></i>
                        <p>View Posts</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/users')}}">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            </ul>
        </div>