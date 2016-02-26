<div class="content-wrapper">
<form action="<?php echo base_url('Profile/update_action')?>" method="POST">
<input type="text" name="fname" id="fname" <?php echo 'value = "'.$user['fname'].'"' ?>/>
<input type="text" name="lname" id="lname" <?php echo 'value = "'.$user['lname'].'"' ?>/>
<input type="text" name="phone" id="phone" <?php echo 'value = "'.$user['phone'].'"' ?>/>
<button type="submit">Update</button>
</form>
</div>
