	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>TaskTracker</b></a>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg">Login only Authorized users</p>
				<form action="<?php echo base_url('Auth/login');?>" method="post">
					<div class="form-group has-feedback">
						<input type="text" name="username" class="form-control" placeholder="(ex. smith@gmail.com)" />
        				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password" placeholder="(ex. ********)" class="form-control" />
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<div class="row">
							<div class="col-xs-8">
								<div class="checkbox icheck">
            						<label>
              							<input type="checkbox"> Remember Me
            						</label>
          						</div>
							</div>
							<div class="col-xs-4">
		         				<button type="submit" class="btn btn-primary btn-flat">Login</button>
	        			</div>		
					</div>
				</form>
			</div>
		</div>
