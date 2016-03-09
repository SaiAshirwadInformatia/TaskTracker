<div class="content-wrapper">
	<section class="content-header">
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
	</section>
	<div class="content">
		<div class="row">
			<?php 
				$status = [	
					'Open' => [
								'color' => 'warning'
							],
					'Inprogress' => [
								'color' => 'primary'
							],
					'Complete' => [
								'color' => 'success'
							],
					'Failed' => [
								'color' => 'danger'
							]
				];
				foreach($status as $key => $state){
					echo '<div class="col-sm-3">';
					echo '<div class="box box-solid">';
					echo '<div class="box box-header>';
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
	$(function(){
		var boxOpen =  $('#Open');
		getByState('Open',boxOpen,'primary');


		var boxInprogress =  $('#Inprogress');
		getByState('Inprogress',boxInprogress,'info');


		var boxComplete =  $('#Complete');
		getByState('Complete',boxComplete,'success');


		var boxFailed =  $('#Failed');
		getByState('Failed',boxFailed,'danger');

		function getByState(state,container,color){
			var state = state;
			var releaseId = $('#releaseDropdown option:selected').val();
			$.ajax({
				aync : true,
				cache: false,
				type: 'POST',
				url: tasktracker.apiurl+'tasks/getByState',
				data: {
					state : state,
					release_id : releaseId
				},
				success: function(response){
					var setOfObjects = response;
					if(setOfObjects.length > 0){
						for(var key in setOfObjects){
							var task = setOfObjects[key];
							drawCard(task,container,color);
						}
					}
				}

			});
		}

		function drawCard(task,container,color){
			var box = $('<div class="box box-'+color+'">');
			var boxTitle = $('<div class="box-header with-border">');
			var H3 = $('<h3 class="box-title">');
			var boxBody = $('<div class="box-body">');
			var boxFooter = $('<div class="box-footer">');
			var selectTag = $('<select class="select2" id="'+task['id']+'" style="width:50%">');
			userGetByTask(task['id'],task['assigned_id']);
			console.log('user : '+task['assigned_id']);
			$(H3).html(task['title']);
			$(boxBody).html(task['description']);
			$(H3).appendTo(boxTitle);
			$(boxTitle).appendTo(box);
			$(boxBody).appendTo(box);
			$(boxFooter).appendTo(box);
			$(selectTag).appendTo(boxFooter);
			$(box).appendTo(container);
			$('.select2').select2();
		}


		function userGetByTask(task_id,assigned_id){
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
				}
			});
		}

		function drawDropdown(user,task_id,assigned_id){
			console.log(assigned_id,user['id']);
			if(user['id'] == assigned_id){
				var optionTag = $('<option value="'+user['id']+'" selected>');
			}else{
				var optionTag = $('<option value="'+user['id']+'">');
			}
			$(optionTag).html(user['fname']+' '+user['lname']);
			$("#"+task_id).append(optionTag);
		}
	});
</script>