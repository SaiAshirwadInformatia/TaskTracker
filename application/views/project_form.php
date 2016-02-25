<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo isset($id) ? 'Update' : 'Create'; ?> Project</h1>
	</section>
	<div class="content">
	<?php $this->load->view('inc_bootstrap_alerts');?>
		<form action="<?php echo base_url('Projects/' . $action);?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name" id="name" <?php echo isset($project['name'])?'value = "'.$project['name'].'"':'';?>/>
							</div>
							<div class="col-md-3">
								<label class="label-control">Team</label>
								<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="team_id" id="team_id"	>
									<?php
									foreach($teamList as $team){
										echo '<option value="';
										echo $team['id'];
										echo '"';
										if(isset($team_id)): if($team['id'] == $team_id): echo 'selected'; endif;endif;
										echo '>';
										echo $team['name'];
										echo '</option>';
									}
									 ?>
								</select>
							</div>
							<div class="col-sm-1">
								<label class="control-label">Key</label> 							
								<input type="text" <?php echo isset($project['key'])?'value="'.$project['key'].'" disabled':''?>
								class="form-control" name="key" id="key" />
							</div>
							<div class="col-sm-2">
				                <label>Color</label>
				                <div class="input-group colorpicker">
				                  <input type="text" class="form-control" name="color" id="color" <?php echo isset($project['color'])?'value="'.$project['color'].'"':'' ?> autocomplete="off">
				                  <div class="input-group-addon">
				                    <i style="background-color: rgb(112, 65, 65);"></i>
				                  </div>
				                </div>
				              </div>
				              <div class="col-sm-3">
								<label class="control-label">Start Date</label>
								<div class="input-group date  dateTimePicker">
									<input type="text" class="form-control" name="start_date" id="start_date" <?php echo isset($project['start_date'])?'value="'.$project['start_date'].'"':''?> />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea name="description" id="desription" class="form-control"><?php echo isset($project['description'])?$project['description']:'' ?></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<?php if(isset($id)): ?>
						<input type="hidden" name="id" id="id" value="<?php echo $project['id'] ?>" />
					<?php endif; ?>
					<div class="btn-group">
						<button type="submit" name="save" id="save" class="btn btn-success">
							<i class="fa fa-save"></i> Save
						</button>
						<?php if(!isset($id)):?>
						<button type="submit" name="save" id="saveAddNew" value="saveAddNew" class="btn btn-success">
							<i class="fa fa-retweet"></i> Save &amp; Add New
						</button>
						<button type="submit" name="save" id="saveAddRelease"  value="saveAddRelease" class="btn btn-success">
							<i class="fa fa-arrow-up"></i> Save &amp; Add Release
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
		tasktracker.isAvailableValidation({
			selector: '#name',
			module: 'projects',
			onBlur: function(instance)
			{
				return {
					'name' : $(instance).val(),
					'team_id' : $('#team_id').val()
				}
			},
			onSuccess: function(response){
				if(response.available !== undefined && response.available){
					$('#name').parent().addClass("has-success").removeClass("has-error");
				}else{
					$('#name').parent().addClass("has-error").removeClass("has-success");
				}
			}
		});
		tasktracker.isAvailableValidation({
			selector: '#key',
			module: 'projects',
			onBlur: function(instance)
			{
				return {
					'key' : $(instance).val()
				};
			},
			onSuccess: function(response){
				if(response.available !== undefined && response.available){
					$('#key').parent().addClass("has-success").removeClass("has-error");
				}else{
					$('#key').parent().addClass("has-error").removeClass("has-success");
				}
			}
		});
		$(".select2").select2();
		$("form").submit(function(){
			isValid  = true;
			if($('#name').val() == ''){
				$('#name').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#name').parent().removeClass('has-error');
			}
			if($('#color').val() == ''){
				$('#color').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#color').parent().removeClass('has-error');
			}
			if($('#key').val() == ''){
				$('#key').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#key').parent().removeClass('has-error');
			}
			if($('#start_date').val() == ''){
				$('#start_date').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#start_date').parent().removeClass('has-error');
			}
			return isValid;
		});
	});
</script>