<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo isset($team['id']) ? 'Update' : 'Create'; ?> Team</h1>
	</section>
	<div class="content">
	<?php $this->load->view('inc_bootstrap_alerts');?>
		<form action="<?php echo base_url('Teams/' . $action);?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label class="control-label">Name</label>
								<input type="text" class="form-control" name="name" id="name" <?php echo isset($team['name'])?'value = "'.$team['name'].'"':'';?>/>
							</div>
							<div class="col-sm-3">
								<label class="control-label">Key</label>
								<input type="text" class="form-control" name="key" id="key" <?php echo isset($team['key'])?'value = "'.$team['key'].'"':'';?>/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea name="description" id="desription" class="form-control"><?php echo isset($team['description'])?$team['description']:'' ?></textarea>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="label-control">Team Members</label>
								<input type="text" class="form-control" name="team_members" id="team_members" />
							</div>
						</div>
						<div class="row">
							<?php foreach ($members as $member) {
								?>
							<div class="col-sm-3" id="userColumn_<?php echo $member['id']?>">
								<input id="<?php echo 'member_id_'.$member['id']?>" type="hidden" name="members_id[]" value="<?php echo $member['id']?>" />
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h2 class="panel-title"><?php echo $member['fname'] . ' ' . $member['lname']?></h2>
									</div>
									<div class="panel-body">
										<img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png" width = 100% class="img-responsive" >
									</div>
									<div class="panel-footer">
										<button type="button" class="btn btn-danger btn-xs" id="btn_remove_<?php echo $member['id']?>">Remove</button>
										<span style="margin-left : 2px">
											<select class="select2" style="width:70%"  name="role[]">
												<option value="owner" <?php if(isset($member['role']) && $member['role'] == 'owner'):echo 'selected'; endif; ?>>Owner</option>
												<option value="leader" <?php if(isset($member['role']) && $member['role'] == 'leader'):echo 'selected'; endif; ?>>Leader</option>
												<option value="developer" <?php if(isset($member['role']) && $member['role'] == 'developer'):echo 'selected'; endif; ?>>Developer</option>
											</select>
										</span>
									</div>
								</div>
							</div>
							<script>
								$(function(){
									$("#btn_remove_<?php echo $member['id']?>").click(function(){
										$("#userColumn_<?php echo $member['id']?>").remove();
									});
								});

							</script>
							<?php }?>
							<div id="membersContainer">
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<?php if(isset($team['id'])): ?>
						<input type="hidden" name="id" id="id" value="<?php echo $team['id'] ?>" />
					<?php endif; ?>
					<div class="btn-group">
						<button type="submit" name="save" id="save" class="btn btn-success">
							<i class="fa fa-save"></i> Save
						</button>
						<?php if(!isset($team['id'])):?>
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

		/*
		$('#team_members').typeahead(null, {
			displayKey: 'name',
			source: function(query, syncResults, asyncResults){
				$.ajax({
					async: true,
					cache: false,
					type: 'POST',
					url: 'http://localhost/TaskTracker/api/v1/users/search',
					data: {
						fname: query
					},
					success: function(response){
						console.log(response);
						var results = [];
						for(var rIdx in response)
						{
							results.push({
								id: response[rIdx].id, 
								name: response[rIdx].fname + ' ' + response[rIdx].lname
							});
						}
						asyncResults(results);
					}
				});
			}
		});
		*/

			tasktracker.isAvailableValidation({
			selector: '#key',
			module: 'teams',
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
		$('#team_members').autocomplete({
			source: function(request, response){
				var name = request.term.split(" ");
	            var fname = name[0];
	            var lname = '';
	            if (name[1] !== undefined) {
	                lname = name[1];
	            }
				$.ajax({
					async: true,
					cache: false,
					type: 'POST',
					url: 'http://localhost/TaskTracker/api/v1/users/search',
					data: {
						fname: fname
					},
					success: function(results){
						response(results);
					}
				});
			},
			minLength: 1,
			select: function(event, ui){
				if($('#member_id_' + ui.item.id).length == 0){
					var userColumn = $('<div class="col-sm-3">');
					var hiddenInput = $('<input id="member_id_'+ui.item.id+'" type="hidden" name="members_id[]" value="' + ui.item.id + '">');
					var panel = $('<div class="panel panel-primary">');
					var panelBody = $('<div class="panel-body">');
					var panelHeader = $('<div class="panel-heading">');
					var imageSrc = $('<img src="http://s3.amazonaws.com/37assets/svn/765-default-avatar.png">');
					var panelFooter = $('<div class="panel-footer">');
					var removeBtn = $('<button type="button" class="btn btn-danger btn-xs">Remove</button>');
					var span = $('<span style="margin-left : 5px">')
					var dropdown = $('<select class="select2" style="width:70%" name="role[]">');
					var option1 = $('<option value="owner">');
					var option2 = $('<option value="leader">');
					var option3 = $('<option value="developer">');
					$(option1).text('Owner');
					$(option2).text('Leader');
					$(option3).text('Developer');
					$(removeBtn).click(function(){
						$(userColumn).remove();
					});
					$(imageSrc).css('width','100%');
					$(imageSrc).addClass('img-responsive');
					$('<h2 class="panel-title">').html(ui.item.fname + ' ' + ui.item.lname).appendTo(panelHeader);
					$(panelHeader).appendTo(panel);
					$(panelBody).append(imageSrc).appendTo(panel);				
					$(panel).appendTo(userColumn);
					$(option1).appendTo(dropdown);
					$(option2).appendTo(dropdown);
					$(option3).appendTo(dropdown);
					$(dropdown).appendTo(span);
					$(panelFooter).append(removeBtn).append(span).appendTo(panel);
					$(userColumn).append(hiddenInput).appendTo('#membersContainer');
					$('.select2').select2();
				}
			}
		}).autocomplete('instance')._renderItem = function(ul, item){
			return $("<li>")
				.append('<a href="#">'+item.fname + ' ' + item.lname + '</a>')
				.appendTo(ul);
		};

		$('form').submit(function(){
			isValid  = true;
			if($('#name').val() == ''){
				$('#name').parent().addClass('has-error');
				isValid = false;
			}else{
				$('#name').parent().removeClass('has-error');
			}
			return isValid;
		});
	});

</script>
