

<div class="content-wrapper">
	<section class="content-header">
		<h1> <?php echo $task['title']?> </h1>
	</section>
	<section class="content">
		<div class="box box-default">	
			<div class="box-body">
				<form class="form-inline">
					<div class="row">
						<div class="col-sm-12">
							<label class="label-control">Description </label>
							<div><?php echo $task['description']?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-1">
							<label class="label-control" >Assign To</label>
						</div>
							<?php if(isset($usersList) and $usersList != NULL){ ?>
							<div class="col-sm-2">
							<select class=" select2 select2-hidden-accessible" style="width: 100%;" name="assigned_id"	id="assigned_id">
								<option value="0">Anyone </option>
								<?php
								foreach($usersList as $user){
									echo '<option value="';
									echo $user['id'];
									echo '"';
									if(isset($task['assigned_id'])): if($user['id'] === $task['assigned_id']): echo 'selected'; endif;endif;
									echo '>';
									echo $user['fname'] .' '.$user['lname'];
									echo '</option>';
								}
								 ?>
							</select>
							<?php }	?>
							</div>
						<div class="col-sm-1">
							<label class="label-control">Type </label>
						</div>
						<div class="col-sm-2">
							<span><?php echo $task['type']?></span>
						</div>
						<div class="col-sm-1">
							<label class="label-control">Priority </label>
						</div>
						<div class="col-sm-2">
							<span></span>
						</div>
						<div class="col-sm-1">
							<label class="label-control">ETA </label>
						</div>
						<div class="col-sm-2">
							<span></span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label class="label-control">Arrived in Release </label>
						</div>
						<div class="col-sm-4">
							<span>
							<?php
							echo '<a href="' . base_url('Releases/view/' . $releaseArrive['id']).'">';
							echo '<span>'.$releaseArrive['name'].'</span>';
							echo '</a>';	 ?>

						</div>
						<div class="col-sm-2">
							<label class="label-control">Fixed in Release </label>
						</div>
						<div class="col-sm-4">
							<span>
							<?php
							echo '<a href="' . base_url('Releases/view/' . $releaseFixed['id']).'">';
							echo '<span>'.$releaseFixed['name'].'</span>';
							echo '</a>'; 
							?>

						</div>
					</div>
				</form>
				<div class="box-comments col-sm-offset-2 col-sm-8">
					<div class="box-header">
						<div class="btn-group">
							<h3 class="btn btn-default" id="comment_btn">Comments</h3>
							<h3 class="btn btn-default" id="history_btn">History</h3>
						</div>
					</div>
					<div  id="comments">
					</div>
					<div id="history">
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
	</section>
</div>
<script>
	var commentObj = new tasktracker.commentBuilder();
	$(function(){
		var task = <?php echo json_encode($task); ?>;
		var selectTag = $('#assigned_id');
		//console.log(task);
		tasktracker.changeAssignedMember(task,selectTag);
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

		$('#assigned_id').change(function(){
			assigned_id = $(this).val();
			console.log(assigned_id);
		});


		$('#comments').slimScroll({
			height: '400px',
			size: '5px'
		});

		$('#comment_btn').click(function(){
			$('#history').css('display','none');
			$('#comments').css('display','block');
		});
		$('#history_btn').click(function(){
			$('#comments').css('display','none');
			$('#history').css('display','block');
		});
		$('comment_btn').click();
	});
</script>