<!DOCTYPE HTML>
<html>
<head>
<title>Ag Policy Web </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Jkisanga Tanzania Software Developer" />
  <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
            {{ Html::style(elixir('css/backend-rtl.css')) }}
            {{ Html::style(elixir('css/rtl.css')) }}
        @else
            {{ Html::style(elixir('css/backend.css')) }}
        @endif
		 {{ Html::style(('vendor/datepicker/css/datepicker.css')) }}
		 {{ Html::style(('css/backend/plugin/datatables/dataTables.bootstrap.min.css')) }}

        @yield('after-styles')

        <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="{{asset('css/icon-font.min.css')}}" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="{{asset('js/Chart8.js')}}"></script>
<!-- //chart -->
<!--animate-->
<link href="{{asset('css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{asset('js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!----webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts--->
 <!-- Meters graphs -->
<script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head>

 <body class="sticky-header left-side-collapsed"  onload="initMap()">

    <!-- left side start-->
		<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="#">Ag <span>P</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="{{route('admin.dashboard')}}"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
									<ul class="nav nav-pills nav-stacked custom-nav">
                    						<li class="active"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i><span> Dashboard</span></a></li>
                    						<li class=""><a href="{{route('admin.categories.index')}}"><i class="lnr lnr-file-add"></i><span> Documents</span></a></li>
                    						<li class=""><a href="{{route('admin.dataCategories.index')}}"><i class="fa fa-list-ol"></i><span> Statistics</span></a></li>
                    						<li class=""><a href="{{route('admin.audioCategories.index')}}"><i class="lnr lnr-volume-high"></i><span> Audio</span></a></li>
                    						<li class=""><a href="{{route('admin.videoCategories.index')}}"><i class="lnr lnr-camera-video"></i><span> Video</span></a></li>
                    						<li class=""><a href="{{route('admin.news.index')}}"><i class="lnr lnr-list"></i><span> News & Events</span></a></li>
                    						<li class=""><a href="{{route('admin.profiles.index')}}"><i class="fa fa-cog"></i><span> Administration</span></a></li>
                    						<li class=""><a href="{{route('admin.deviceUsers.index')}}"><i class="lnr lnr-users"></i><span> Users</span></a></li>



                    					</ul>
                    					<hr>
                    					<ul class="nav nav-pills nav-stacked custom-nav">
                    					<li class="menu-list">
                                            <a href="#"><i class="lnr lnr-cog"></i>
                                                <span>Admin</span></a>
                                                <ul class="sub-menu-list">
                                                    <li><a href="{{ route('admin.access.user.index') }}">Web Users</a> </li>
                                                    <li><a href="{{ route('admin.access.role.index') }}">Roles</a> </li>
                                                    
                                                </ul>
                                        </li>

                    					</ul>
				<!--sidebar nav end-->
			</div>
		</div>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<div class="header-section">

			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">
					<div class="profile_details_left">
						<ul class="nofitications-dropdown">
							{{--<li class="dropdown">--}}
								{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>--}}
							{{--</li>--}}


							<div class="clearfix"></div>
						</ul>
					</div>
					<div class="profile_details">
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="{!! route('frontend.auth.logout') !!}" >
									
											<p>{{ access()->user()->name }}</p>
										
										
									
								</a>
								
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>

					<div class="clearfix"></div>
				</div>
			  </div>
			<!--notification menu end -->
			</div>
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="graphs">
                @yield('content')
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<footer>
			   <p>&copy 2017 COMMODITY BRIEF REPOSITORY |  Sponsored  By <a href="#" target="_blank"> ILRI/ASPIRES</a></p>
			</footer>
        <!--footer section end-->


<!-- Bootstrap Core JavaScript -->
   <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- JavaScripts -->
           @yield('before-scripts')
           {{ Html::script(elixir('js/backend.js')) }}
   		 {{ Html::script(('vendor/datepicker/js/bootstrap-datepicker.js')) }}
   		 {{ Html::script(('js/backend/plugin/datatables/dataTables.bootstrap.min.js')) }}
   		 {{ Html::script(('js/backend/plugin/datatables/jquery.dataTables.min.js')) }}

           <script>

   		//Data tables
   		  $(".table").DataTable();

   		//date picker
   		   $(function () {
                $('.datepicker').datepicker({
   				 format: 'yyyy/mm/dd',
   			 });

           });


   		</script>
   		<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
           @yield('after-scripts')
</body>
</html>