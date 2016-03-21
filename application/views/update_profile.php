<div class="content-wrapper">
	<section class="content-header">
		<h1>Update Profile</h1>
	</section>
	<div class="content">
		<?php $this->load->view('inc_bootstrap_alerts');?>
		<form action="<?php echo base_url('Profile/update_action')?>" method="POST">
			<div class="box box-default">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<fieldset>
								<div class="col-md-12">
									<legend>
										Personal Information
									</legend>
								</div>
								<div class="col-sm-3">
									<label class="control-label">First Name</label>
									<input type="text" class="form-control" name="fname" id="fname" <?php echo 'value = "'.$user['fname'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Last Name</label>
									<input type="text" class="form-control" name="lname" id="lname" <?php echo 'value = "'.$user['lname'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Middle Name</label>
									<input type="text" class="form-control" name="mname" id="mname" <?php echo 'value = "'.$user['mname'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Username</label>
									<input type="text" class="form-control" name="username" id="username" disabled <?php echo 'value = "'.$user['username'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Date of Birth</label>
									<div class="input-group date dateTimePicker">
										<input type="text" class="form-control" name="dob" id="dob"  <?php echo 'value = "'.$user['dob'].'"' ?>/>
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Gender</label>
									<div class="form-control" style="border:0px solid">
									<label>
										<input type="radio"  name="gender" for="male" value="male" <?php if($user['gender'] == 'male'){echo 'selected';}?>/> Male 
									</label>
									<label><input type="radio" name="gender" value="male" <?php if($user['gender'] == 'female'){echo 'selected';}?>/> Female
									</label>
									</div>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Designation</label>
									<input type="text" class="form-control" name="designation" id="designation"  <?php echo 'value = "'.$user['designation'].'"' ?>/>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<fieldset>
								<div class="col-md-12">
									<legend>
										Contact Details
									</legend>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Email ID</label>
									<input type="text" class="form-control" name="email" id="email" <?php echo 'value = "'.$user['email'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Phone Number</label>
									<input type="text" class="form-control" name="phone" id="phone" <?php echo 'value = "'.$user['phone'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Github</label>
									<input type="text" class="form-control" name="github" id="github" <?php echo 'value = "'.$user['github'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Facebook</label>
									<input type="text" class="form-control" name="facebook" id="facebook" <?php echo 'value = "'.$user['facebook'].'"' ?>/>
								</div>

							</fieldset>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<fieldset>
								<div class="col-md-12">
									<legend>
										Residential Information
									</legend>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Address 1</label>
									<input type="text" class="form-control" name="address1" id="address1" <?php echo 'value = "'.$user['address1'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Address 2</label>
									<input type="text" class="form-control" name="address2" id="address2" <?php echo 'value = "'.$user['address2'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">City</label>
									<input type="text" class="form-control" name="city" id="city" <?php echo 'value = "'.$user['city'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">District</label>
									<input type="text" class="form-control" name="district" id="district" <?php echo 'value = "'.$user['district'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">State</label>
									<input type="text" class="form-control" name="state" id="state" <?php echo 'value = "'.$user['state'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Pincode</label>
									<input type="text" class="form-control" name="pincode" id="pincode" <?php echo 'value = "'.$user['pincode'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Country</label>
									<input type="text" class="form-control" name="country" id="country" <?php echo 'value = "'.$user['country'].'"' ?>/>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<fieldset>
								<div class="col-md-12">
									<legend>
										Educational Details
									</legend>
								</div>
								<div class="col-sm-3">
									<label class="control-label">College</label>
									<input type="text" class="form-control" name="college" id="college" <?php echo 'value = "'.$user['college'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Board</label>
									<input type="text" class="form-control" name="board" id="baord" <?php echo 'value = "'.$user['board'].'"' ?>/>
								</div>
								<div class="col-sm-3">
									<label class="control-label">Exam</label>
									<input type="text" class="form-control" name="exam" id="exam" <?php echo 'value = "'.$user['exam'].'"' ?>/>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<fieldset>
								<div class="col-md-12">
									<legend>
										Skills
									</legend>
								</div>
								<div class="col-md-3">
									<label class="control-label">
										Category
									</label>
									<div class="form-control" style="border: 0px solid">
										<select class="select2" name="category" style="width: 100%">
											<option>Akshay</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label">
										Field
									</label>
									<div class="form-control" style="border: 0px solid">
										<select class="select2" name="field" style="width: 100%">
											<option>Akshay</option>
										</select>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-success">Update Profile</button>
				</div>
			</div>	
		</form>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$('.dateTimePicker').datetimepicker({
			format: 'YYYY-MM-DD'
		});
	});	

</script>