<?php
$message_type = 'info';
$message = '';
if($this->session->userdata('message')):
	$message = $this->session->flashdata('message');
	$message_type = $this->session->flashdata('message_type');

?>

<div class="alert alert-<?php echo $message_type?> alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong><?php echo ucfirst($message_type)?>!</strong> <?php echo $message?>
</div>
<?php endif; ?>