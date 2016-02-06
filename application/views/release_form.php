<div class="content-wrapper">
	<section class="content-header">
		<h1>Create Release</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<form action="<?php echo base_url('Releases/create_action');?>" method="POST">
					<div class="form-group col-md-6">
						<label>Name</label> 
						<input type="text" class="form-control" name="name" id="name" />
					</div>
					<button type="submit" name="submit" id="submit" class="btn btn-success">
						Create Release
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

