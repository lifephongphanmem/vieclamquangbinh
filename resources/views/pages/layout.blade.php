<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lao động tại doanh nghiệp</title>
    <link href="{{URL::asset('')}}frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::asset('')}}frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{URL::asset('')}}frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{URL::asset('')}}frontend/css/price-range.css" rel="stylesheet">
    <link href="{{URL::asset('')}}frontend/css/animate.css" rel="stylesheet">
	<link href="{{URL::asset('')}}frontend/css/main.css" rel="stylesheet">
	<link href="{{URL::asset('')}}frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	 
    <script src="{{URL::asset('')}}frontend/js/jquery.js"></script>
	<script src="{{URL::asset('')}}frontend/js/bootstrap.min.js"></script>
	<script src="{{URL::asset('')}}frontend/js/jquery.scrollUp.min.js"></script>
	<script src="{{URL::asset('')}}frontend/js/price-range.js"></script>
    <script src="{{URL::asset('')}}frontend/js/jquery.prettyPhoto.js"></script>
    <script src="{{URL::asset('')}}frontend/js/main.js"></script>
	
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="tel:0949820258"><i class="fa fa-phone"></i> (+84) 0949820258</a></li>
								<li><a href="mailto:solaodongtinhquangbinh@gmail.com"><i class="fa fa-envelope"></i> solaodongtinhquangbinh@gmail.com</a></li>
								<li><a href="{{URL::to('/admin')}}"><i class="fa fa-user"></i> Quản trị</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
					<?php if (Session::has('admin')) {  ?>
								@include('pages.menu.usermenu')
								@yield('user-menu') 
						
					<?php } ?>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="logo pull-left">
							<h1 class="text-primary">QUẢN LÝ LAO ĐỘNG TẠI DOANH NGHIỆP </h1>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Quảng Bình
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu hidden" >
									<li><a href="#">Tiếng Việt</a></li>
									<li><a href="#">Tiếng Anh</a></li>
									
								</ul>
							</div>
							
							
						</div>
					</div>
					<div class="col-sm-2 pull-right">
					
					</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
	</header><!--/header-->
			
		<div class="row ">	
			<div class="col-sm-8 col-sm-offset-3">
				<div class="top-menu">
					<?php if (Session::has('admin')) { 
							if(session('admin')->phanloaitk==2){
						
					?>
						@include('pages.menu.dnmenu')
						@yield('top-menu') 
					<?php } } ?>
				</div>
			</div>
		</div>
<div class="flash-message text-center">
		@if(Session::has('message'))
		<p class="alert alert-info ">{{ Session::get('message') }}</p>
		@endif
		@if($errors->has('message'))
		<p class="alert alert-danger ">{{ $errors->first('message') }}</p>
		@endif
	</div>
	<div class="clear" style="clear:both;"></div>

	<section>
					@yield('mainpanel')
	</section>
	
	<footer id="footer"><!--Footer-->
		</br>
		<div class="footer-middle">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 Sở Lao Động Thương Binh Xã Hội tỉnh Quảng Bình </p>
					</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
</body>
</html>