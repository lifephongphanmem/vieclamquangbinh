<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>DASHBOARD | CUNGCAULAODONG</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{URL::asset('')}}backend/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{URL::asset('')}}backend/css/style.css" rel='stylesheet' type='text/css' />
<link href="{{URL::asset('')}}backend/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{URL::asset('')}}backend/css/font.css" type="text/css"/>
<link href="{{URL::asset('')}}backend/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="{{URL::asset('')}}backend/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{URL::asset('')}}backend/css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{URL::asset('')}}backend/js/jquery2.0.3.min.js"></script>
<script src="{{URL::asset('')}}backend/js/raphael-min.js"></script>
<script src="{{URL::asset('')}}backend/js/morris.js"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('dashboard')}}" class="logo">
        QUẢN TRỊ
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
		<li><a href="{{URL::to('#')}}">
				<span> Xin chào  {{Auth::user()->name}}</span>
		</a></li>
	   <li class="dropdown" style="display:none;">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success">8</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
				
				<li>
                    <p class="">Bạn đang có 8 nhiệm vụ</p>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>25% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Product Delivery</h5>
                                <p>45% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Payment collection</h5>
                                <p>87% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>33% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>

                <li class="external">
                    <a href="#">See All Tasks</a>
                </li>
            </ul>
        </li>
        <!-- settings end -->
        
        <!-- notification dropdown start-->
        <li id="header_notification_bar" class="dropdown"  style="display:none;">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">2</span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Khai báo trong kỳ</p>
                </li>
                <li>
                    <div class="alert alert-info clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> 120 doanh nghiệp chưa khai báo </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="alert alert-danger clearfix">
                        <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                        <div class="noti-info">
                            <a href="#"> 10 Công việc trể hạn </a>
                        </div>
                    </div>
                </li>
                

            </ul>
        </li>
        <!-- notification dropdown end -->
		<li><a href="{{URL::to('logout-admin')}}"><i class="fa fa-lock"></i> Logout</a></li>
		
	</ul>
    <!--  notification end -->
</div>

</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
@include('admin.sidebar')
@yield('sidebar')
    </div>
</aside>
<!--sidebar end-->

<!--main content start-->

<section id="main-content">
	
	<section class="wrapper">
	<div class="message" style=" background-color: green; color: white;text-align: center;">
		<?php
		$message = Session::get('message');
		if($message){
			echo ($message);
			Session::put('message',null);
		}
	
		?>	
	</div>
		@yield('content')
	</section>
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2021 CUNGCAULAODONG. All rights reserved</p>
			</div>
		  </div>
  
  <!-- / CUNGCAULAODONG -->
  
  <!--main content end-->
</section>
<script src="{{URL::asset('')}}backend/js/bootstrap.js"></script>
<script src="{{URL::asset('')}}backend/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{URL::asset('')}}backend/js/scripts.js"></script>
<script src="{{URL::asset('')}}backend/js/jquery.slimscroll.js"></script>
<script src="{{URL::asset('')}}backend/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{URL::asset('')}}backend/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{URL::asset('')}}backend/js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	   
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{URL::asset('')}}backend/js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
