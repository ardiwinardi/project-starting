<script src="<?=WEB_ROOT?>/asset/inputmask/jquery.inputmask.bundle.min.js"></script>

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><?=$title?></h3>
	</div>
	<form id="user-form" class="form-submit" method="post">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<?php $form = new Core\Form($usr, $editable)?>
					<?=$form->inputHidden('ID')?>
					<?=$form->inputText('user_login',['label'=>'Nama'])?>
					<?=$form->inputText('user_email',['label'=>'Email','class'=>'email'])?>
					<?=$form->inputText('display_name',['label'=>'Nama Lengkap'])?>
				</div>
				<div class="col-md-6">
					<?=$form->inputPassword('user_pass_old',['label'=>'Password Lama','autocomplete'=>'off'])?>
					<?=$form->inputPassword('user_pass_new',['label'=>'Password New','autocomplete'=>'off'])?>
					<?=$form->inputPassword('user_pass_confirm',['label'=>'Password Confirm','autocomplete'=>'off'])?>
				</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-lg-7 col-lg-offset-5">
							<button type="submit" name="btnSubmit" class="btn btn-success btn-sm" data-confirm='Yakin untuk mengubah profil anda?'>
								<i class="fa fa-save"></i> Perbaharui
							</button>
							<a href="<?=action('home')?>" class='btn btn-sm btn-primary'><i class="fa fa-undo"></i> Kembali</a>
						</div>
					</div>
				</div>
			</div>
        </div>
	</form>
</div>
<script>
$(document).ready(function() {
	App.initForm('user-form',{
		rules: {
			user_login:'required',
			user_email:'required',
			display_name:'required',
			user_pass_new:{
				required: function(){
					return ($('#user_pass_old').val()!='');
				},
				minlength: 4
			},
			user_pass_confirm:{
				minlength: 4,
				equalTo: "#user_pass_new"
			}
		}
	});
});
</script>
