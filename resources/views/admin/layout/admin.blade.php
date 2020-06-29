
<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel | Administrativo</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('Admin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('AdminLTE/plugins/summernote/summernote-bs4.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('product.index')}}" class="nav-link">Home</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <div class="user-panel ">
                        <i class="far fa text-uppercase"><strong class="mr-1">{{$user->name}}</strong></i>
                        <img src="{{asset('imagens/User.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>

                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header text-uppercase"> <strong> {{$user->name}}
                            <span aria-label="Online agora" style="background: rgb(66, 183, 42); border-radius: 50%; display: inline-block; height: 6px; margin-left: 4px; width: 6px;"></span>
                        </strong>
                    </span>
                    <div class="dropdown-divider"></div>
                    <a href="{{route('adm.logout')}}" class="dropdown-item">
                        <i class="fas fa-sign mr-2"></i> Sair
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{route('adm.setting')}}" class="dropdown-item">
                        <i class="fas fa-cogs mr-2"></i> Configurações
                    </a>

                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <span class="brand-text font-weight-light"> <strong>Controler de Caixa</strong></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block text-uppercase"><img src="{{asset('imagens/User.png')}}" class="img-circle elevation-2" alt="User Image">
                        <strong class="ml-2"> {{$user->name}}
                     <span aria-label="Online agora" style="background: rgb(66, 183, 42); border-radius: 50%; display: inline-block; height: 6px; margin-left: 4px; width: 6px;"></span>
                    </strong></span>
                        </strong></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview menu-open">
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('product.index')}}"  class="nav-link {{Route::current()->getName() === 'product.index' ? 'active':''}} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Produto</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('painel.userAll')}}"  class="nav-link {{Route::current()->getName() === 'painel.userAll' ? 'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Usuário</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('client.index')}}" class="nav-link {{Route::current()->getName() === 'client.index' ? 'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cliente</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('provider.index')}}" class="nav-link {{Route::current()->getName() === 'provider.index' ? 'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fornecedor</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('purchase.index')}}" class="nav-link {{Route::current()->getName() === 'purchase.index' ? 'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Compra</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('adm.logout')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sair</p>
                                </a>
                            </li>

                        </ul>
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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @yield('contentElement')
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

{{----------------------------------------------------------------------------------------------------------------}}
        @yield('rowContent')
{{--        ====================================================================================================--}}


        @yield('content')


    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{date("Y")}} <a href="http://adminlte.io">Dynne</a>.</strong>
        Sistemas Inteligentes
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0


        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
{{--<script>--}}
{{--    $(function () {--}}
{{--        $("#example1").DataTable({--}}
{{--            "responsive": true,--}}
{{--            "autoWidth": false,--}}
{{--        });--}}
{{--        $('#example2').DataTable({--}}
{{--            "paging": true,--}}
{{--            "lengthChange": false,--}}
{{--            "searching": false,--}}
{{--            "ordering": true,--}}
{{--            "info": true,--}}
{{--            "autoWidth": false,--}}
{{--            "responsive": true,--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
