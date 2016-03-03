<div class="btn-group">
<?php
foreach($status as $state){
	echo '<button type="button" class="btn btn-primary  statusUpdate" data-task-id="'.$task_id.'" data-state="'.$state.'">'.ucfirst($state).'</button>';
}
?>
</div>

<script>
$('.statusUpdate').click(function(){
	var taskId = $(this).data('taskId');
	var status = $(this).data('status');
	$.ajax({
		async: true,
		cache: false,
		type: 'POST',
		url: tasktracker.apihref + '/tasks/statusUpdate',
		data: {
			id: taskId,
			status: status
		},
		success: function(response){
			console.log(response);
			window.location = tasktracker.basehref + '/Tasks';
		}
	});
});
</script>

