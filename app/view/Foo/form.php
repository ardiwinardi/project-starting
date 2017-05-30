<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title"><?=$title?></h3>
	</div>
	<form id="program-form" class="form-submit" method="post" enctype="multipart/form-data">
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<?php $form = new Core\Form($foo, $editable)?>
					<?=$form->inputHidden('ID')?>
					<?=$form->inputText('name',['label'=>'Name'])?>
					
				</div>
			</div>
		</div>
		<div class="box-footer">
			<div class="row">
				<div class="col-lg-12">
					<div class="form-group">
						<div class="col-lg-7 col-lg-offset-5">
							<button type="submit" name="btnSubmit" class="btn btn-success btn-sm" data-confirm='Are you sure?'>
								<i class="fa fa-save"></i> <?=($data->method == 'add')?'Save' : 'Update'?>
							</button>
							<a href="<?=action('foo')?>" class='btn btn-sm btn-primary'><i class="fa fa-undo"></i> Back</a>
						</div>
					</div>
				</div>
			</div>
        </div>
	</form>
</div>
<script>
$(document).ready(function() {
	App.initForm('form',{
		rules: {
			name:'required',
		}
	});
});
</script>
