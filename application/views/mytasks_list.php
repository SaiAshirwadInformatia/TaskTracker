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
					</tr>
					<?php 
						foreach ($mytasks_list as $task) {
							echo '<tr>';
							echo '<td>' . $task["title"] . '</td>';
							echo '<td>' . $task["type"] . '</td>';
							echo '<td>' . $task["state"] . '</td>';
							echo '</tr>';
						}
					?>
				</table>
			<div>
		</div>
	</div>
</div>