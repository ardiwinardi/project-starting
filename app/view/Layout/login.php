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
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/adminlte/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/iCheck/square/blue.css">
	<link rel="stylesheet" href="<?=WEB_ROOT?>/asset/pnotify/pnotify.custom.css" type="text/css">
	
	<script src="<?=WEB_ROOT?>/asset/jquery/jquery.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/jquery/jquery.validate.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/login.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<?=$content?>
	</div>
	<script src="<?=WEB_ROOT?>/asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/fastclick/fastclick.js"></script>
	<script src="<?=WEB_ROOT?>/asset/iCheck/icheck.min.js"></script>
	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
	</script>
	<script src="<?=WEB_ROOT?>/asset/adminlte/js/app.min.js"></script>
	<script src="<?=WEB_ROOT?>/asset/pnotify/pnotify.custom.js"></script>
	<?=$message?>
</body>
</html>
