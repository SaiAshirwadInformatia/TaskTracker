<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo isset($id) ? 'Update' : 'Create'; ?> Team</h1>
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
								<input type="text" class="form-control" name="name" id="name" <?php echo isset($name)?'value = "'.$name.'"':'';?>/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea name="description" id="desription" class="form-control"><?php echo isset($description)?$description:'' ?></textarea>
						</div>
						<div class="row">
							<div class="form-group col-sm-6">
								<label class="label-control">Team Members</label>
								<input type="text" class="form-control" name="team_members" id="team_members" />
							</div>
						</div>
						<div class="row" id="membersContainer">

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
		$('#team_members').autocomplete({
			source: function(request, response){
				var name = request.term.split(" ");
	            var fname = name[0];
	            var lname = '';
	            if (name[1] !== undefined) {
	                lname = name[1];
	            }
	            console.log(fname);
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
					$(removeBtn).click(function(){
						$(userColumn).remove();
					});
					$(imageSrc).css('width','100%');
					$(imageSrc).addClass('img-responsive');
					$('<h2 class="panel-title">').html(ui.item.fname + ' ' + ui.item.lname).appendTo(panelHeader);
					$(panelHeader).appendTo(panel);
					$(panelBody).append(imageSrc).appendTo(panel);				
					$(panel).appendTo(userColumn);
					$(panelFooter).append(removeBtn).appendTo(panel);
					$(userColumn).append(hiddenInput).appendTo('#membersContainer');
				}
			}
		}).autocomplete('instance')._renderItem = function(ul, item){
			console.log(item);
			return $("<li>")
				.append('<a href="#">'+item.fname + ' ' + item.lname + '</a>')
				.appendTo(ul);
		};
	});

</script>
