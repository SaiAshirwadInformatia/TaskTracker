<div class="content-wrapper">
	<section class="content-header">
		<h1>My Tasks</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered">
					<tr>
						<th>Title</th>
						<th>Type</th>
						<th>State</th>
						<th style="width: 75px"></th>
					</tr>
					<?php 
						foreach ($mytasks_list as $task) {
							echo '<tr>';
							echo '<td>' . $task["title"] . '</td>';
							echo '<td>' . $task["type"] . '</td>';
							echo '<td>' . $task["state"] . '</td>';
							echo '<td>';
							echo '<span class="btn-group">';
							echo '<a href="' . base_url('Tasks/view/' . $task['id']) . '" class="btn btn-xs btn-default fa fa-file-text-o"></a>';
							echo '<a href="' . base_url('Tasks/update/' . $task['id']) . '" class="btn btn-xs btn-default fa fa-pencil"></a>';
							echo '</span>';
							echo '</td>';
							echo '</tr>';
						}
					?>
				</table>
			<div>
		</div>
	</div>
</div>