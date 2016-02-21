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
							<div class="col-sm-6">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name" id="name" <?php echo isset($name)?'value = "'.$name.'"':'';?>/>
							</div>
							<div class="col-sm-1">
								<label class="control-label">Key</label> 							
								<input type="text" <?php echo isset($key)?'value="'.$key.'"':''?>
								class="form-control" name="key" id="key" />
							</div>
							<div class="col-sm-2">
				                <label>Color</label>
				                <div class="input-group projectColorPicker colorpicker-element">
				                  <input type="text" class="form-control" name="color" id="color" <?php echo isset($color)?'value="'.$color.'"':'' ?> autocomplete="off">

				                  <div class="input-group-addon">
				                    <i style="background-color: rgb(112, 65, 65);"></i>
				                  </div>
				                </div>
				              </div>
				              <div class="col-sm-3">
								<label class="control-label">Start Date</label>
								<div class="input-group date  dateTimePicker">
									<input type="text" class="form-control" name="start_date" id="start_date" <?php echo isset($start_date)?'value="'.$start_date.'"':''?> />
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea name="description" id="desription" class="form-control"><?php echo isset($description)?$description:'' ?></textarea>
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
		$('.date').focus(function(){ 
			$(this).next().next().click();
		});
		$('.projectColorPicker').colorpicker();
		$('.dateTimePicker').datetimepicker({
			format : 'YYYY-MM-DD'
		});
		$('#start_date').focus(function(){
			$(this).next().click();
		});
		$('#color').focus(function(){
			$(this).next().click();
		});
		$('#key').blur(function(){
			var key = $(this).val();
			$.ajax({
				async : true,
				cache : false,
				url : '<?php echo base_url('Api/V1/projects/checkKey')?>',
				type : 'POST',
				data : {
					key : key
				},
				success : function(response) {
					if(response.error_code){
						$('#key').parent().addClass("has-success").removeClass("has-error");
					}else{
						$('#key').parent().addClass("has-error").removeClass("has-success");
					}
				}
			});
		});
	});

</script>