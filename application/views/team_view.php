<div class="content-wrapper">
	<section class="content-header">
		<h1>Team</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Name</dt>
					<dd><?php echo $team['name']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Key</dt>
					<dd><?php echo $team['key']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Members</dt>
					<dd  style="width : 50%">
						<div class="box box-info">
						  	<div class="box-header with-border">
							    <h3 class="box-title">All team Members</h3>
							    <button class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
							    
							<?php
							if($membersList){
								echo '<ul class="list-group">';
								foreach($membersList as $member){
									echo '<li class="list-group-item">';
									echo '<span class="badge">' . $task[$member['fname']] . '</span>';
									echo $member['fname'] . ' ' . $member['lname'] . '(' . ucfirst($member['role']) .')';
									echo '</li>';
								}
								echo '</ul>';
							}else{
								?>
									<ul class="list-group">
	  									<li class="list-group-item list-group-item-danger">No memeber found</li>
	  								</ul>
								<?php
							}
							?>
						
						</div>
					</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Projects</dt>
					<dd style="width : 50%">
						<div class="box box-info">
						  	<div class="box-header with-border">
							    <h3 class="box-title">All team Members</h3>
							    <button class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
							<?php
							if($projectsList){
								echo '<ul class="list-group"	>';
								foreach($projectsList as $project){
									echo '<li class="list-group-item">';
									echo '<span class="badge">' . $task[$project['id']] . '</span>';
									echo $project['name'];
									echo '</li>';
								}
								echo '</ul>';
							}else{
								?>
									<ul class="list-group">
	  									<li class="list-group-item list-group-item-danger">No project found</li>
	  								</ul>
								<?php
							}
					?>
						</div>
					</dd>
				</dl>
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url('Teams')?>" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
	</div>
</div>