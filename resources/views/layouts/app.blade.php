<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="Admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="Admin/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="Admin/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="Admin/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	<!-- Custom Data Tables -->
	<link href="datatables/css/datatables.bootstrap.css" rel="stylesheet">
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"> <span><img src="images/media.jpg" width="45px" height="45px"  alt="" class="img-circle logo_img"> HEYMART</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
             <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/'.Auth::user()->foto) }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
				
                  <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Home </a>
                  </li>
				  
				  @if( Auth::user()->level==1)
					  
                  <li><a href="{{ route('kategori.index') }}"><i class="fa fa-cube"></i> kategori </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-cubes"></i> Produk </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-credit-card"></i> Member </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-truck"></i> Supplier </a>
                  </li>
				   <li><a href="{{ route('home') }}"><i class="fa fa-money"></i> Pengeluaran </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-user"></i> User </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-upload"></i> Penjualan </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-download"></i> Pembelian </a>
                  </li>
				   <li><a href="{{ route('home') }}"><i class="fa fa-file"></i> Laporan </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-gears"></i> Setting </a>
                  </li>
                    
				  @else
					  
				   <li><a href="{{ route('home') }}"><i class="fa fa-shopping-cart"></i> Transaksi </a>
                  </li>
                  <li><a href="{{ route('home') }}"><i class="fa fa-cart-plus"></i> TransaksiBaru </a>
                  </li>
                  
				  @endif
                </ul>
              </div>
            </div>
				  
				  
				  
				  
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/'.Auth::user()->foto) }}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

               
                    
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              
                
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
			  @yield('title')
			  </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 <div class="x_content">
                    @yield('content')
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="Admin/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="Admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="Admin/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="Admin/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="Admin/raphael/raphael.min.js"></script>
    <script src="Admin/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="Admin/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="Admin/moment/min/moment.min.js"></script>
    <script src="Admin/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	<!-- Custom data tables -->
	<script src="datatables/js/jquery.dataTables.min.js"></script>
@yield('script')
  </body>
</html>