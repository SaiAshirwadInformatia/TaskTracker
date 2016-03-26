<div class="content-wrapper">
	<section class="content-header">
		<h1>Dashboard</h1>
	</section>
	<div class="content">
		<div class="row">
				<?php
				$type = [
					'Bug' => [
						'color' => 'red',
						'icon' => 'bug'
						],
					'Story' => [
						'color' => 'orange',
						'icon' => 'paw'
						],
					'Disscussion' => [
						'color' => 'yellow',
						'icon' =>	'glass'
						],
					'Question' => [
						'color' => 'aqua',
						'icon' =>	'question'
							]
				];
				foreach ($taskType as $key => $value) {
					echo '<div class="col-sm-3">';
					echo '<div class="info-box  bg-'.$type[$key]['color'].'">';
					echo '<span class="info-box-icon"><i class="fa fa-'.$type[$key]['icon'].'"></i></span>';
					echo '<div class="info-box-content">';
					echo '<span class="info-box-text">'.$key.'</span>';
					echo '<span class="info-box-number pull-right">'.$taskType[$key]["total$key"]['total'].'</span>';
					echo '<div class="progress">';
					echo '<div class="progress-bar" style="width: 100%"></div>';
					echo '</div>';
					echo '<span class="info-box-text">In your plate</span>';
					echo '<span class="info-box-number pull-right">'.$taskType[$key]["user$key"]['total'].'</span>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}
				?>

			<div class="col-sm-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Task Assigned</h3>
					</div>
					<ul class="list-group">
						<?php 
							foreach ($assignedList as $assignedUser) {
								echo '<li class="list-group-item">';
								echo  $assignedUser['fname'].' '.$assignedUser['lname'];
								echo '<span class="badge bg-red pull-right">'.$assignedUser['total'].'</span>';
								echo '</li>';
							}
						?>
					</ul>
				</div>
			</div>
			<?php
				foreach ($latestFiveTask as $key => $tasks) {
					echo '<div class="col-sm-4">';
					echo '<div class="box">';
					echo '<div class="box-header with-border">';
					echo '<h3 class="box-title">Top 5 '.$key.'</h3>';
					echo '</div>';
					echo '<ul class="list-group">';
					foreach ($tasks as $task) {
						echo '<li class="list-group-item">';
						echo $task['title'];
						echo '<span class="pull-right">';
						echo '<time datetime="'.$task['time'].'"></time>';
						echo '</span>';
						echo '</li>';
					}
					echo '</ul>';
					echo '</div>';
					echo '</div>';
				}

			?>
		</div>
	</div>
</div>
<style type="text/css">
	.info-box-text{
		display: inline; 
	}
</style>
<script>

	var radarChart = new tasktracker.buildRadarChart();
	$(function(){
		radarChart.init();
	});
	/*$(function(){
		var tour = new Tour({
			//backdrop: true,
			 keyboard: true,
			 //backdropContainer: 'body',
			 // duration: 5000,
			 //delay: 5000,
			steps: [
				{
					element : "#profile-link",
					title : "Press this Button",
					content : "This button acts as n Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
				},
				{
					element : "#toggle-btn",
					title : "Press this Button",
					content : "This button acts as n Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
				},
				{
					element : "#profile-link",
					title : "Press this Button",
					content : "This button acts as n Navigation Drawer which will open & minimize the Navigation Drawer at the Left hand Side of your screen."
				}
			]

		})

		tour.init(true);
		tour.start(true);
	});*/
</script>