<?php
use Core\Request;

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="<?=csrf_token()?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Retribusi Online</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/bootstrap/css/bootstrap.min.css">
	<link href="<?=WEB_ROOT?>/asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/pnotify/pnotify.custom.css" type="text/css">
	
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/adminlte/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/adminlte/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/main.css" type="text/css">
	
	<script src="<?=WEB_ROOT?>/asset/jquery/jquery.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/jquery/jquery-ui-1.9.1.js"></script>
	<script src="<?=WEB_ROOT?>/asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/jquery/jquery.validate.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/main.js"></script>
	<script>
		var WEB_ROOT = '<?=WEB_ROOT?>';
	</script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

	<header class="main-header">
		<!-- Logo -->
		<a href="<?=WEB_ROOT?>/asset/index2.html" class="logo">
			<!-- mini logo for sidebar mini 50x50 pixels -->
			<span class="logo-mini"><b>A</b>LT</span>
			<!-- logo for regular state and mobile devices -->
			<span class="logo-lg"><b>Admin</b>LTE</span>
		</a>
		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=WEB_ROOT?>/asset/adminlte/img/user2-160x160.jpg" class="user-image" alt="User Image">
						<span class="hidden-xs"><?=$_SESSION['_login_display_name']?></span>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="<?=WEB_ROOT?>/asset/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
								<?=$_SESSION['_login_display_name']?> - Admin
								<small>Member since XXX</small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="<?=action('profil')?>" class="btn btn-default btn-flat">Profil</a>
							</div>
							<div class="pull-right">
								<a href="<?=action('logout')?>" class="btn btn-default btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?=WEB_ROOT?>/asset/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?=$_SESSION['_login_display_name']?></p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">MAIN NAVIGATION</li>
			<li class="<?=(Request::data('controller') == 'FooController')?'active':''?>">
				<a href="<?=action('foo')?>">
					<i class="fa fa-book"></i> <span>Foo</span>
				</a>
			</li>
			<li class="header">LABELS</li>
			<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
			<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
			<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
			<?=$content?>
		</section>
    <!-- /.content -->
	</div>
  
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
			<b>Version</b> 2.3.6
		</div>
		<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
		reserved.
	</footer>
  
</div>
<!-- ./wrapper -->

<script src="<?=WEB_ROOT?>/asset/fastclick/fastclick.js"></script>
<script src="<?=WEB_ROOT?>/asset/adminlte/js/app.min.js"></script>
<script src="<?=WEB_ROOT?>/asset/adminlte/js/demo.js"></script>
<script src="<?=WEB_ROOT?>/asset/pnotify/pnotify.custom.js"></script>
<?=$message?>

</body>
</html>
