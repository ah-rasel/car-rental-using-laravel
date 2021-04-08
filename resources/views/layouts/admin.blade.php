<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('app_name')?? "Car Rental Management System"}} - Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminFiles/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminFiles/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('adminFiles/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>


    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('/')}}" class="brand-link">
            <img src="{{asset('adminFiles/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Car Rental - Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->


            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('adminFiles/dist/img/rasel.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Md rasel</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="{{route('dashboard')}}" class="nav-link ">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                {{--   Users--}}
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.users')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All Users</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.new.user')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New user</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Rents
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>New Rent Requests</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="add-brand.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Rent Statistics</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Brands -->
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Brands
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.brands')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All Brands</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.new.brand')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Brand</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-car"></i>
                            <p>
                                Cars
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.cars')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All Cars</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.new.car')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Car</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-sliders-h"></i>
                            <p>
                                Sliders
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.sliders')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View All Sliders</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add New Slider</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">

                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <a href="" class="nav-link" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </form>

                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">

        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

               @yield('content')

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2020 <a href="#">Car Rental Management System </a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Made with</b>
            <i class="fa fa-heartbeat"></i> By <a href="#">Rasel</a>
        </div>
    </footer>

    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('adminFiles/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminFiles/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminFiles/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminFiles/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminFiles/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminFiles/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminFiles/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminFiles/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminFiles/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminFiles/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminFiles/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminFiles/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminFiles/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminFiles/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminFiles/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminFiles/dist/js/demo.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@livewireScripts
<script>
    window.addEventListener('swal:modal',event =>{
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            timer: event.detail.timer,
        });
    });
    window.addEventListener('swal:error',event =>{
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            timer: event.detail.timer,
        });
    });

    window.addEventListener('swal:confirm',event =>{
        swal({
            title: event.detail.title,
            text: event.detail.text,
            icon: event.detail.icon,
            buttons:true,
            dangerMode:true,
        })
            .then((wiiDelete) => {
             if (wiiDelete){
                 window.livewire.emit('delete',event.detail.id);
             }
        });
    });

</script>
</body>
</html>
