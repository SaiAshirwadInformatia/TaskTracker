<div class="content-wrapper">
	<section class="content-header">
		<h1>Projects</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered">
					<tr>
						<th>Name</th>
						<th>Key</th>
						<th>Color</th>
						<th>Start Date</th>
						<th style="width: 75px"></th>
					</tr>
					<?php 
					foreach ($projectsList as $project) {
						echo '<tr>';
						echo '<td>' . $project['name'] . '</td>';
						echo '<td>' . $project['key'] . '</td>';
						echo '<td>' . $project['color'] . '</td>';
						echo '<td>' . $project['start_date'] . '</td>';
						echo '<td>';
						echo '<span class="btn-group">';
						echo '<a href="' . base_url('Projects/view/' . $project['id']) . '" class="btn btn-xs btn-default fa fa-file-text-o"></a>';
						echo '<a href="' . base_url('Projects/update/' . $project['id']) . '" class="btn btn-xs btn-default fa fa-pencil"></a>';
						echo '</span>';
						echo '</td>';
						echo '</tr>';
					}
					?>
				</table>
			</div>
		</div>
	</div>
</div>