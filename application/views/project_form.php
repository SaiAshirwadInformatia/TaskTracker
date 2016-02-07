<div class="content-wrapper">
	<section class="content-header">
		<h1>Create Project</h1>
		<?php $this->load->view('inc_bootstrap_alert');?>
	</section>
	<div class="content">
		<form action="<?php echo base_url('Projects/' . $action);?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name" id="name" <?php echo isset($name)?'value = "'.$name.'"':'';?>/>
							</div>
							<div class="col-sm-2">
								<label class="control-label">Key</label> 							
								<input type="text" <?php echo isset($key)?'value="'.$key.'"':''?>
								class="form-control" name="key" id="key" />
							</div>
							<div class="col-sm-2">
				                <label>Color</label>

				                <div class="input-group projectColorPicker colorpicker-element">
				                  <input type="text" class="form-control" autocomplete="off">

				                  <div class="input-group-addon">
				                    <i style="background-color: rgb(112, 65, 65);"></i>
				                  </div>
				                </div>
				                <!-- /.input group -->
				              </div>
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea name="description" id="desription" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<?php if(isset($id)): ?>
						<input type="hidden" name="id" id="id" value="<?php echo $id ?>" />
					<?php endif; ?>
					<div class="btn-group">
						<button type="submit" name="save" id="save" class="btn btn-success">
							<i class="fa fa-save"></i> Save
						</button>
						<button type="submit" name="saveAddNew" id="saveAddNew" class="btn btn-success">
							<i class="fa fa-retweet"></i> Save &amp; Add New
						</button>
						<button type="submit" name="saveAddRelease" id="saveAddRelease" class="btn btn-success">
							<i class="fa fa-arrow-up"></i> Save &amp; Add Release
						</button>
						<button type="submit" name="saveExit" id="saveExit" class="btn btn-success">
							<i class="glyphicon glyphicon-floppy-saved"></i> Save &amp; Exit
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$(function(){
		CKEDITOR.replace('description');
		$('.projectColorPicker').colorpicker();
	});
</script>