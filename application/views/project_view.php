<div class="content-wrapper">
	<section class="content-header">
		<h1>Project</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Name</dt>
					<dd><?php echo $project['name']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Description</dt>
					<dd><?php echo $project['description']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Key</dt>
					<dd><?php echo $project['key']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Start Date</dt>
					<dd><?php echo $project['start_date']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Releases</dt>
					<dd><?php
						if($releasesList){
							echo '<ul class="list-group" style="width : 50%">';
							foreach($releasesList as $release){
								echo '<li class="list-group-item">';
								echo '<span class="badge">' . $task[$release['id']] . '</span>';
								echo $release['name'];
								echo '</li>';
							}
							echo '</ul>';
						}else{
							?>
								<ul class="list-group">
  									<li class="list-group-item list-group-item-danger">No release found</li>
  								</ul>
							<?php
						}
					?></dd>
				</dl>
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url('Projects')?>" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
	</div>
</div>