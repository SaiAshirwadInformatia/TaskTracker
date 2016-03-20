	</head>

		<?php $this->load->view('inc_bootstrap_alerts');?>
	<body class="hold-transition login-page">
		<div class="login-back">
			<img src="<?php echo base_url("assets/images/bgimg.jpg")?>" />
		</div>
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>TaskTracker</b></a>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Login only Authorized users</p>
				<form action="<?php echo base_url('Auth/login');?>" method="POST">
					<div class="form-group has-feedback">
						<input type="text" name="username" class="form-control" placeholder="(ex. smith@gmail.com)" />
        				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" placeholder="(ex. ********)" class="form-control" />
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-9">
							<div class="checkbox icheck">
        						<label>
          							<input type="checkbox"> Remember Me
        						</label>
      						</div>
						</div>
						<div class="col-xs-3">
	         				<button type="submit" class="btn btn-primary btn-flat" name="login" id="login" value="login">Login</button>
        				</div>	
					</div>
				</form>
				<a href="<?php echo base_url('Login/forgotpassword')?>">I forgot my password</a><br>
			    <a href="<?php echo base_url('Register')?>" class="text-center">Register a new membership</a>
			</div>
		</div>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>