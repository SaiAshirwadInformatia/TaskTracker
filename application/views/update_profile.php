<div class="content-wrapper">
	<section class="content-header">
		<h1>Update Profile</h1>
	</section>
	<div class="content">
		<?php $this->load->view('inc_bootstrap_alerts');?>
		<form class="form-horizontal" action="<?php echo base_url('Profile/update_action')?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label class="control-label">First Name</label>
								<input type="text" class="form-control" name="fname" id="fname" <?php echo 'value = "'.$user['fname'].'"' ?>/>
							</div>	
						</div>
					</div>
				</div>
			</div>	
		</form>
	</div>

				<label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
				<div class="col-sm-10">
				<input type="text" class="form-control"  name="lname" id="lname" <?php echo 'value = "'.$user['lname'].'"' ?>/>
				</div>
					<label for="inputEmail3" class="col-sm-2 control-label">Phone Number</label>
					<div class="col-sm-10">
					<input type="text" class="form-control"   name="phone" id="phone" <?php echo 'value = "'.$user['phone'].'"' ?>/>
					</div>
						<label for="inputEmail3" class="col-sm-2 control-label">Skills</label>
						<div class="col-sm-10">
						<input type="text" class="form-control"  placeholder="Please Fill Your Skills!!" name="skills" id="skills" <?php echo 'value = "'.$user['skills'].'"' ?>/>
						</div>
								<label for="inputEmail3" class="col-sm-2 control-label">Education</label>
								<div class="col-sm-10">
								<input type="text" class="form-control" placeholder="Please Fill Your Education"  name="education" id="education" <?php echo 'value = "'.$user['education'].'"' ?>/>
								</div>
										<label for="inputEmail3" class="col-sm-2 control-label">Location</label>
										<div class="col-sm-10">
										<input type="text" class="form-control" placeholder="Please Fill Your Location"  name="location" id="location" <?php echo 'value = "'.$user['location'].'"' ?>/>
											</div>
				<label for="inputEmail3" class="col-sm-2 control-label">Notes</label>
		<div class="col-sm-10">
		<input type="text" class="form-control" placeholder="Notes.."  name="notes" id="notes" <?php echo 'value = "'.$user['notes'].'"' ?>/>
		</div>

		<label for="inputEmail3" class="col-sm-2 control-label">Qualification</label>
<div class="col-sm-10">
<input type="text" class="form-control" placeholder="Qualification.."  name="qualification" id="qualification" <?php echo 'value = "'.$user['qualification'].'"' ?>/>
</div>




		<div class="form-group">
		<label class="col-md-4 control-label" for="singlebutton"></label>
		  <div class="col-md-4">
		   <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block" 
		<button  type="submit" >Update</button>
		</div>
		</div>
		</form>
		</div>
</div>