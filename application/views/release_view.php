<div class="content-wrapper">
	<section class="content-header">
		<h1>Task</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Name</dt>
					<dd><?php echo $release['name']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Project</dt>
					<dd><?php echo $project['name']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Description</dt>
					<dd><?php echo $release['description']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Start Date</dt>
					<dd><?php echo $release['start_date']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Estimated Release Date</dt>
					<dd><?php echo $release['estimated_release_date']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Open Task</dt>
					<dd><?php echo $task?></dd>
				</dl>
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url('Releases')?>" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
	</div>
</div>