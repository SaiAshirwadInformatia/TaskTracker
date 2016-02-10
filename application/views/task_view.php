<div class="content-wrapper">
	<section class="content-header">
		<h1>Task</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<dl class="dl-horizontal">
					<dt>Title</dt>
					<dd><?php echo $task['title']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Type</dt>
					<dd><?php echo $task['type']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Description</dt>
					<dd><?php echo $task['description']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Start Date</dt>
					<dd><?php echo $task['start_ts']?></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>End Date</dt>
					<dd><?php echo $task['end_ts']?></dd>
				</dl>
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url('Tasks')?>" class="btn btn-primary btn-sm">Back</a>
			</div>
		</div>
	</div>
</div>