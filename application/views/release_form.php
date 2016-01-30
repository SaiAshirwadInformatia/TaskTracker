<form action="<?php echo base_url('Releases/create_action');?>" method="POST">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control" name="name" id="name" />
	</div>
	<button type="submit" name="submit" id="submit">
		Create Release
	</button>
</form>