<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo isset($id) ? 'Update' : 'Create' ?> Task</h1>
	</section>
	<div class="content">
	<?php $this->load->view('inc_bootstrap_alerts');?>
		<form action="<?php echo base_url('Tasks/' . $action);?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Title</label>
								<input type="text" class="form-control" name="title" id="title" <?php echo isset($title)?'value = "'.$title.'"':'';?>/>
							</div>
							<div class="col-sm-3">
								<label class="label-control">Type</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="type"	>
									<option value="bug" <?php if(isset($type) and $type == 'Bug'): echo 'selected'; endif; ?> >Issue/Bug</option>
									<option value="story" <?php if(isset($type) and $type == 'Story'):echo 'selected'; endif; ?>>Story</option>
									<option value="discussion" <?php if(isset($type) and $type == 'Discussion'): echo 'selected'; endif; ?> >Discussion</option>
									<option value="question" <?php if(isset($type) and $type == 'Question'): echo 'selected'; endif;?> >Question</option>
									<option value="sub"<?php if(isset($type) and $type == 'Sub-Type'): echo 'selected'; endif;?> >Sub Task</option>
								</select>
							</div>
							<div class="col-sm-3">
								<label class="label-control">Release</label>
								<?php if((isset($releasesList) and $releasesList != NULL) or (isset($release_id) and $release_id != NULL)){ ?>
								<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="release_id"	>
									<?php
									foreach($releasesList as $release){
										echo '<option value="';
										echo $release['id'];
										echo '"';
										if(isset($release_id)): if($release['id'] == $release_id): echo 'selected'; endif;endif;
										echo '>';
										echo $release['name'];
										echo '</option>';
									}
									 ?>
								</select>
								<?php
								}else{
									echo '<p>You need to create release</p>';
								}
								?>
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
								<label class="label-control" id="assigned_id">Assign To</label>
								<?php if(isset($usersList) and $usersList != NULL){ ?>

								<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="assigned_id"	>
									<option value="0">Anyone</option>
									<?php
									foreach($usersList as $user){
										echo '<option value="';
										echo $user['id'];
										echo '"';
										if(isset($assigned_id)): if($user['id'] = $assigned_id): echo 'selected'; endif;endif;
										echo '>';
										echo $user['fname'] .' '.$user['lname'];
										echo '</option>';
									}
									 ?>
								</select>
								<?php }	?>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Due Date</label>
								<div class="input-group date  dateTimePicker">
									<input type="text" class="form-control" name="due_date" id="due_date" <?php echo isset($due_date)?'value="'.$due_date	.'"':''?> />
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
						<input type="hidden" name="id" id="id" value="<?php echo $id ?>" />

					<?php 	endif; ?>
					<div class="btn-group">
						<button type="submit" name="save" id="save" class="btn btn-success">
							<i class="fa fa-save"></i> Save
						</button>
						<?php if(!isset($id)):?>
						<button type="submit" name="save" id="saveAddNew" value="saveAddNew" class="btn btn-success">
							<i class="fa fa-retweet"></i> Save &amp; Add New
						</button>
						<button type="submit" name="save" value="saveExit" id="saveExit" class="btn btn-success">
							<i class="glyphicon glyphicon-floppy-saved"></i> Save &amp; Exit
						</button>
						
					<?php endif;?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	
	$(function(){
		CKEDITOR.replace('description');
		$('.dateTimePicker').datetimepicker({
			format: 'YYYY-MM-DD'
		});

		$('form').submit(function(){
			isValid  = true;
			if($('#title').val() == ''){
				$('#title').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#title').parent().removeClass('has-error');
			}
			if($('#due_date').val() == ''){
				$('#due_date').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#due_date').parent().removeClass('has-error');
			}
			return isValid;
		});
	})
</script>