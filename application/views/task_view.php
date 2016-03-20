<div class="content-wrapper">
	<section class="content-header">
		<h1> <?php echo $task['title']?> </h1>
	</section>
	<section class="content">
		<div class="box box-default">	
			<div class="box-body">
				<div class="row">
					<div class="col-sm-12">
						<label>Description</label>
						<div><?php echo $task['description']?></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						<label>Assigned to :</label>
						<select>
						</select>
					</div>
					<div class="col-sm-3">
						<label>Type :</label>
						<span><?php echo $task['type']?></span>
					</div>
					<div class="col-sm-3">
						<label>Priority</label>
						<span></span>
					</div>
					<div class="col-sm-3">
						<label>ETA</label>
						<span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<label>Arrived in Release</label>
						<span></span>
					</div>
					<div class="col-sm-6">
						<label>Fixed in Release</label>
						<span></span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>