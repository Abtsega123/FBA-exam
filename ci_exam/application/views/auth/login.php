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
	<!-- /.login-logo -->
	<div class="login-box-body col-lg-3 col-md-4 col-sm-10 col-xs-12">
	<h3 class="text-center mt-0 mb-4">
		<b>O</b>nline <b>E</b>xamination <b>S</b>ystem
	</h3> 
	<p class="login-box-msg">Login to start your session</p>

	<div id="infoMessage" class="text-center"><?php echo $message;?></div>

	<?= form_open("auth/cek_login", array('id'=>'login'));?>
		<div class="form-group has-feedback">
			<?= form_input($identity);?>
			<span class="fa fa-envelope form-control-feedback"></span>
			<span class="help-block"></span>
		</div>
		<div class="form-group has-feedback">
			<?= form_input($password);?>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<span class="help-block"></span>
		</div>
		<div class="row">
			<div class="col-xs-8">
			<div class="checkbox icheck">
				<label>
				<?= form_checkbox('remember', '', FALSE, 'id="remember"');?> Remember Me
				</label>
			</div>
			</div>
			<!-- /.col -->
			<div class="col-xs-4">
			<?= form_submit('submit', lang('login_submit_btn'), array('id'=>'submit','class'=>'btn btn-success btn-block btn-flat'));?>
			</div>
			<!-- /.col -->
		</div>
		<?= form_close(); ?>

		<a href="<?=base_url()?>auth/forgot_password" class="text-center"><?= lang('login_forgot_password');?></a>

	</div>
</div>

<script type="text/javascript">
	let base_url = '<?=base_url();?>';
</script>
<script src="<?=base_url()?>assets/dist/js/app/auth/login.js"></script>