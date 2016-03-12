<div class="content-wrapper">
	<div class="content-header">
		<h3>Kanban Board
			<small class="pull-right">
				<select id="releaseDropdown" name="released_id">
					<?php
						foreach($releasesList as $release){
							echo '<option value="' . $release['id'] . '">' . $release['name'] . '('.$release['id'].')</option>';
						}
					?>
				</select>
			</small>
		</h3>
	</div>
	<div class="content">
		<div class="row">
			<?php 
				global $status;
				foreach($status as $key => $state){
					echo '<div class="col-sm-3">';
					echo '<div class="box box-solid">';
					echo '<div class="box box-header">';
					echo '<h3 class="box-title">';
					echo $key;
					echo '</h3>';
					echo '</div>';
					echo '<div class="box-body" " id="'.$key.'">';
					echo '</div>';
					echo '</div>';
					echo '</div>';	
				}
			?>
		</div>
	</div>
	<div class="content-footer">
	</div>
</div>
<script>
	var kanbanBuilderObj = new tasktracker.kanbanBuilder();
	$(function(){
		$('#releaseDropdown').change(function(){
			kanbanBuilderObj.start($(this).val());
		});

		$('#releaseDropdown').change();


		/*function userGetByTask(task_id,assigned_id){
			$.ajax({
				asyn : true,
				cache : false,
				url: tasktracker.apiurl+'teams/teamSearchByTask',
				type: 'POST',
				data : {
					task_id: task_id
				},
				success:function(response){
					for(var key in response){
						var user = response[key];
						drawDropdown(user,task_id,assigned_id);
					}
					$('.select2').select2();
				}
			});
		}

		function drawDropdown(user,task_id,assigned_id){
			if(user['id'] == assigned_id){
				var optionTag = $('<option value="'+user['id']+'" selected >');
			}else{
				var optionTag = $('<option value="'+user['id']+'">');
			}
			$(optionTag).html(user['fname']+' '+user['lname']);
			$("#"+task_id).append(optionTag);
		}
		*/

	});
</script>