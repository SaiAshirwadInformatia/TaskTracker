<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo isset($id) ? 'Update': 'Create'?> Release</h1>
	</section>
	<div class="content">
		<?php $this->load->view('inc_bootstrap_alerts') ?>
		<form action="<?php echo base_url('Releases/' . $action);?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Name</label> 
							
								<input type="text" <?php echo isset($name)?'value="'.$name.'"':''?>
								class="form-control" name="name" id="name" />
							</div>
							<div class="col-sm-4">
								<label class="control-label">Project</label>
								<p class="form-control-static"><?php echo $currentProject['name']?></p>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label">Description</label>
						<textarea name="description" id="desription" class="form-control"><?php echo isset($description)?$description:'' ?></textarea>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Start Date</label>
								<div class="input-group date  dateTimePicker">
									<input type="text" class="form-control" name="start_date" id="start_date" <?php echo isset($start_date)?'value="'.$start_date.'"':''?> />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Estimated Release Date</label>							
								<div class="input-group date dateTimePicker">
									<input type="text" class="form-control" name="estimated_release_date" id="estimated_release_date" <?php echo isset($estimated_release_date)?'value="'.$estimated_release_date.'"':''?>/>
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<?php if(isset($id)): ?>
					<input type="hidden" name="id" id="id" <?php echo 'value="'.$id.'"'?> />
					<?php endif; ?>
					<input type="hidden" name="project_id" id="project_id" <?php echo 'value="'.$currentProject['id'].'"' ?> />
					<div class="btn-group">
						<button type="submit" value="save" name="save" id="save" class="btn btn-success">
							<i class="fa fa-save"></i> Save
						</button>
						<?php if(!isset($id)):?>
						<button type="submit" value="saveAddNew" name="save" id="saveAddNew" class="btn btn-success">
							<i class="fa fa-retweet"></i> Save &amp; Add New
						</button>
						<button type="submit" value="saveAddTask" name="save" id="saveAddTask" class="btn btn-success">
							<i class="fa fa-tasks"></i> Save &amp; Add Task
						</button>
						<button type="submit" value="saveExit" name="save" id="saveExit" class="btn btn-success">
							<i class="glyphicon glyphicon-floppy-saved"></i> Save &amp; Exit
						</button>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</form>
	</div>
	
</div>

<script>
	$(function(){
		$('form').submit(function(){
			isValid  = true;
			if($('#name').val() == ''){
				$('#name').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#name').parent().removeClass('has-error');
			}
			if($('#start_date').val() == ''){
				$('#start_date').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#start_date').parent().removeClass('has-error');
			}
			if($('#estimated_release_date').val() == ''){
				$('#estimated_release_date').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#estimated_release_date').parent().removeClass('has-error');
			}
			return isValid;
		});
	});
</script>