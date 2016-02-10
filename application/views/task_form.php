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
									<option value="bug" <?php if(isset($type) and $type == 'bug'): echo 'selected'; endif; ?> >Issue/Bug</option>
									<option value="story" <?php if(isset($type) and $type == 'story'):echo 'selected'; endif; ?>>Story</option>
									<option value="discussion" <?php if(isset($type) and $type == 'discussion'): echo 'selected'; endif; ?> >Discussion</option>
									<option value="question" <?php if(isset($type) and $type == 'question'): echo 'selected'; endif;?> >Question</option>
									<option value="sub"<?php if(isset($type) and $type == 'sub'): echo 'selected'; endif;?> >Sub Task</option>
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
										if(isset($release_id)): if($release['id'] = $release_id): echo 'selected'; endif;endif;
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
								<label class="label-control">Assign To</label>
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
								<label class="control-label">Start Date</label>
								<div class="input-group date  dateTimePicker">
									<input type="text" class="form-control" name="start_ts" id="start_ts" <?php echo isset($start_ts)?'value="'.$start_ts.'"':''?> />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
							<div class="col-sm-3">
								<label class="control-label">End Date</label>
								<div class="input-group date  dateTimePicker">
									<input type="text" class="form-control" name="end_ts" id="end_ts" <?php echo isset($end_ts)?'value="'.$end_ts.'"':''?> />
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
					<?php endif; ?>
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
		$('.projectColorPicker').colorpicker();
		$('.select2').select2();
		$('.dateTimePicker').datetimepicker({
			format : 'YYYY-MM-DD'	
		});
	});
</script>