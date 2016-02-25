<div class="content-wrapper">
	<section class="content-header">
		<h1>Releases</h1>
	</section>
	<div class="content">
		<div class="box box-default">
			<div class="box-body">
				<table class="table table-hover table-striped table-bordered">
					<tr>
						<th>Name</th>
						<th>Start Date</th>
						<th>Estimated Release Date</th>
						<th style="width: 75px"></th>
					</tr>
					<?php 
					foreach ($releasesList as $release) {
						echo '<tr>';
						echo '<td>' . $release->name . '</td>';
						echo '<td>' . $release->start_date . '</td>';
						echo '<td>' . $release->estimated_release_date . '</td>';
						echo '<td>';
						echo '<span class="btn-group">';
						echo '<a href="' . base_url('Releases/view/' . $release->id) . '" class="btn btn-xs btn-default fa fa-file-text-o"></a>';
						echo '<a href="' . base_url('Releases/update/' . $release->id) . '" class="btn btn-xs btn-default fa fa-pencil"></a>';
						echo '</span>';
						echo '</td>';
						echo '</tr>';
					}
					?>
				</table>
				<?php
					echo $links;
				?>
			</div>
		</div>
	</div>
</div>