

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
					</div>
				</div>
				<div class="box-comments col-sm-offset-2 col-sm-8">
					<div class="header">
						<h3 class="title">Comments</h3>
					</div>
					<div  id="comments">
					</div>
					<div class="footer">
						<img class="img-responsive img-circle img-sm"  src="<?php echo base_url('assets/images/tiger.jpg')?>">
						<div class="img-push">
							<input type="text" class="form-control input-sm" style="width:80%;display: inline;" placeholder="Press enter to post comment" autocomplete="off" name="comment" id="comment">
							<button class="btn btn-primary btn-sm" type="button" id="commentbtn">Comment</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script>
	var commentObj = new tasktracker.commentBuilder();
	$(function(){
		commentObj.start(<?php echo $task['id']?>,$('#comments'));
		$('#commentbtn').click(function(){
			<?php
				$user = $this->session->userdata('user');
			?>
			var commentInput = $('#comment');
			if(commentInput.val() != ''){
				var user = <?php echo json_encode($user);?>;
				var task_id = <?php echo $task['id']?>;
				var user_id = <?php echo $user['id']?>;
				//console.log(user+' '+task_id+' '+comment);
				var comment = commentInput.val();
				$.ajax({
					async : true,
					cache : false,
					type : 'POST',
					url : tasktracker.apiurl+'/comments',
					data : {
						task_id : task_id,
						user_id : user_id,
						comment : comment
					},
					success : function(response){
							time =  '<?php echo date('Y-m-d G:i:s');?>';
							tasktracker.buildComment(comment,$('#comments'),user,time);
							$('#comment').val('');
							commentInput.css('border','');
							console.log('Helleo');
					}
				});
			}else{
				console.log('Helleo');
				commentInput.css('border','1px solid red');
			}
		});
	});
</script>