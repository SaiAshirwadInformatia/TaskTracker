</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8">
				<div class="jumbotron">
					<h2>Forgot Password</h2>
					<form action="<?php echo base_url('Login/forgotpassword_action')?>" method="post">	
						<div class="form-group has-feedback">
							<label class="label-control">Email Id</label>
							<input type="email" class="form-control" placeholder="(ex. johnsmith@gmail.com)" name="email" id="email" />
							<span class="fa fa-envelope form-control-feedback"></span>
						</div>
						<button class="btn btn-success">Recover Password</button>
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