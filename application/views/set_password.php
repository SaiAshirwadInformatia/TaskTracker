</head>
<body class="sidebar-mini`">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="jumbotron">
					<?php $this->load->view('inc_bootstrap_alerts')?>
					<h2>Set Password</h2>
					<form action="<?php echo base_url($action)?>" method="post">	
						<div class="form-group has-feedback">
							<label class="label-control">New Password</label> 
							<input type="password" class="form-control" placeholder="password must be 8 characters" name="newPassword" id="newPassword" />
							<span class="fa fa-lock form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label class="label-control">Confirm Password</label>
							<input type="password" class="form-control" placeholder="********" name="confirmPassword" id="confirmPassword" />
							<span class="fa fa-lock form-control-feedback"></span>
						</div>
						<input type="hidden" name="user_id" id="user_id" value="<?php echo $user['id']?>"/>
						<input type="hidden" name="access_token" id="access_token" value="<?php echo $user['access_token']?>"/>
						<button class="btn btn-success btn-left">Recover Password</button>
						<a href="<?php echo base_url('Login')?>" class="btn btn-info pull-right">Login</a> 
						<a href="<?php echo base_url('Login')?>" class="btn btn-info pull-right">Sign In</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<style>
	.jumbotron{
		margin-top : 20%;
	}
</style>
<script>
	$(function(){
		$('#newPassword').focusout(function(){
			if($(this).val().length < 8){
				$(this).parent().addClass('has-error');
			}else{
				$(this).parent().removeClass('has-error');
			}
		});
		$('form').submit(function(){
			isValid = true;
			if($('#newPassword').parent().hasClass('has-error')){
				isValid = false;
			}else{
				if($('#newPassword').val() !== $('#confirmPassword').val()){
					$('#confirmPassword').parent().addClass('has-error');
					isValid = false;
				}else{
					$('#confirmPassword').parent().removeClass('has-error');
					isValid = true;
				}
			}
			return isValid;
		});
	});
</script>