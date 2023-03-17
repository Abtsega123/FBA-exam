<style>
	html, body{
		width:100%;
		height:100%;
	}
	body{
		background-image:url('<?= base_url('uploads/default/wallpaper.jpg') ?>') !important;
		background-size:cover !important;
		background-repeat:no-repeat !important;
		background-position:center center !important;
	}
	#login-main{
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
</style>
<div class="h-100 w-100 d-flex" id="login-main">

	<div class="login-box-body col-lg-3 col-md-4 col-sm-10 col-xs-12">
		<p class="login-box-msg">
			<?php echo lang('reset_password_heading');?>
		</p>

		<div id="infoMessage" class="text-red text-center"><?php echo $message;?></div>

		<?php echo form_open('auth/reset_password/' . $code);?>

			<p>
				<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
				<?php echo form_input($new_password);?>
			</p>

			<p>
				<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
				<?php echo form_input($new_password_confirm);?>
			</p>

			<?php echo form_input($user_id);?>
			<?php echo form_hidden($csrf); ?>

			<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

		<?php echo form_close();?>
	</div>
</div>