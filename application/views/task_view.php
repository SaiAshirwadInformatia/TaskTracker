<div class="content-wrapper">
	<section class="content-header">
		<h1> <?php echo $task['title']?> </h1>
	</section>
	<section class="content">
		<div class="box box-default">	
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
						<label>Description</label>
						<div><?php echo $task['description']?></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label>Assigned to :</label>
						<select>
							<option></option>
						</select>
					</div>
					<div class="col-sm-3">
						<label>Type :</label>
						<span><?php echo $task['type']?></span>
					</div>
					<div class="col-sm-3">
						<label>Priority</label>
						<span></span>
					</div>
					<div class="col-sm-3">
						<label>ETA</label>
						<span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Arrived in Release</label>
						<span></span>
					</div>
					<div class="col-sm-6">
						<label>Fixed in Release</label>
						<span></span>
					</div>
				</div>
			</div>
		</div>
		<div class="box box-danger">
			<div class="box-header">
				<h3 class="box-title">Comment</h3>
			</div>
			<div class="box-body">
				<div id="form-group" style="margin-bottom: 10px">
					<textarea rows="3" class="form-control"  name="commentText" placeholder="Start discussion......"></textarea>							
				</div>
				<button type="button" id="commentButton" class="btn btn-sm btn-primary" >Comment</button> 
				
			</div>
		</div>
	</section>
</div>
<script>
	$(function(){
		$('button').click(function(){

			var task_id = '<?php echo $task['id']?>';
			var user_id = tasktracker.currentUser;
			$.ajax({
				async : true,
				cache : false,
				type : 'POST',
				url : tasktracker.apiurl+'/comments',
				data : {
					task_id : task_id,
					user_id : user_id,
					comment : $('commentText').text() 
				},
				success : function(response){
					console.log('Response for Comment : '+response.id);
				}
			});
		});
	});
</script>