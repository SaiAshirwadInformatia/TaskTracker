<!doctype html>
<html lang="en">
  <head>
    <meta name="author" description="Akshay Mane">
    <meta name="author" description="Anuj Khairnar">
    <meta name="author" description="Brian Munis">
    <meta charset="utf-8">

    <title>Task Tracker</title>
    

    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/bootstrap/css/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap-tour/build/css/bootstrap-tour.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/Ionicons/css/ionicons.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/dist/css/AdminLTE.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/dist/css/skins/_all-skins.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/plugins/select2/select2.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') ?> "/>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/AdminLTE/plugins/iCheck/square/blue.css') ?> "/>
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/jquery-ui/themes/base/jquery-ui.min.css')?>" />

    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>" />

    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"> </script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/dist/js/app.min.js'); ?>" ></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/colorpicker/bootstrap-colorpicker.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/ckeditor/ckeditor.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/select2/select2.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/chartjs/Chart.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/AdminLTE/plugins/iCheck/icheck.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/moment/moment.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap-tour/build/js/bootstrap-tour.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/jquery-timeago/jquery.timeago.js')?>"></script>
    <script src="<?php echo base_url('assets/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
    <!--
    <script src="<?php echo base_url('assets/vendor/typeahead.js/dist/typeahead.bundle.min.js')?>"></script>
    -->
    <script src="<?php echo base_url('assets/vendor/jquery-ui/jquery-ui.min.js')?>"></script>

    <script src="<?php echo base_url('assets/js/tasktracker.js')?>"></script>
    <script src="<?php echo base_url('assets/js/tasktracker.tour.js')?>"></script>
    <script>
        tasktracker.baseurl = '<?php echo base_url()?>';
        tasktracker.apiurl = tasktracker.baseurl + 'api/v1';
        tasktracker.currentProject = '<?php  $project = $this->session->userdata("currentProject"); echo $project["id"]?>';
        tasktracker.status = <?php global $status;echo json_encode($status);?>;
        tasktracker.taskType = <?php global $taskType;echo json_encode($taskType);?>;
        <?php 
            if($this->session->userdata('user')){
                $user = $this->session->userdata('user');
                global $user;
                ?> 
                    tasktracker.user = <?php  echo json_encode($user);?>;
                <?php
            }
        ?>
    </script>
