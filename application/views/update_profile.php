<div class="content-wrapper">

 <div class="form-group">

<form class="form-horizontal" action="<?php echo base_url('Profile/update_action')?>" method="POST">


	 <label for="inputEmail3"  class="col-sm-2 control-label">First Name</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="inputEmail3" name="fname" id="fname" <?php echo 'value = "'.$user['fname'].'"' ?>/>
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
<input type="text" class="form-control" placeholder="Notes.."  name="qualification" id="qualification" <?php echo 'value = "'.$user['qualification'].'"' ?>/>
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
</div>
