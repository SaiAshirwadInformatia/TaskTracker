<div class="content-wrapper">
	<section class="content-header">
		<h1>Teams</h1>
	</section>
	<div class="content">
		<div class="box box-default">	
			<table class="table table-hover table-striped table-bordered">
				<tr>
					<th>Name</th>
					<th>Key</th>
					<th>Members</th>
					<th>Projects</th>
					<th style="width: 75px"></th>
				</tr>
				<?php
				foreach ($teamsList as $team) {
					echo '<tr>';
					echo '<td><a href="'.base_url('Teams/view/'.$team['id']).'">' . $team['name'] . '</a></td>';
					echo '<td>' . $team['key'] . '</td>';
					echo '<td>' . count($members[$team['id']]) . '</td>';
					echo '<td>' . count($projects[$team['id']]) . '</td>';
					echo '<td>';
					echo '<span class="btn-group">';
					echo '<a href="' . base_url('Teams/view/' . $team['id']) . '" class="btn btn-xs btn-default fa fa-file-text-o"></a>';
					echo '<a href="' . base_url('Teams/update/' . $team['id']) . '" class="btn btn-xs btn-default fa fa-pencil"></a>';
					echo '</span>';
					echo '</td>';
					echo '</tr>';
				}
				?>
			</table>
			<div class="box-footer">
				<?php
					echo $links;
				?>
			</div>
		</div>
	</div>
</div>		