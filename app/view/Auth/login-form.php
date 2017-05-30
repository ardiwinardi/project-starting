<div class="login-logo">
	<a href="#"><b>App</b>Login</a>
</div>
<div class="login-box-body">
	<p class="login-box-msg">Sign in to start your session</p>
	<form id="login-form" method="post">
		<input type="hidden" value="<?=csrf_token()?>" name="_token">
		<div class="form-group has-feedback">
			<input type="email" class="form-control" name="user_email" placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		
		<div class="form-group has-feedback">
			<input type="password" class="form-control" name="user_pass" placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		
		<div class="row">
			<div class="col-xs-8">
				<div class="checkbox icheck">
				<label><input type="checkbox" name="rememberme"> Remember Me</label>
			</div>
		</div>

		<div class="col-xs-4">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		</div>

		</div>
	</form>

</div>
<script>
$(document).ready(function() {	
	var validator = $("#login-form").validate({
		rules: {
			email:'required',
			password:'required'
		}
	});
	$(".cancel").click(function() {
		validator.resetForm();
	});
});
</script>
