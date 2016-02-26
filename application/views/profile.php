<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-3">

          <!-- Profile Image -->
          <div class="box box-primary">
          
            <div class="box-body box-profile ">
              <img class="img-thumbnail" style="height : 180px; width : 230px " src="<?php echo base_url('assets/images/default_profile.png')?>" alt="User profile picture" >

              <h3 class="profile-username text-center"><?php echo $user['fname'] . ' ' . $user['lname']?></h3>

              <p class="text-muted text-center"><?php echo 'Software'?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
              <!--
                  Anchor tag used for profile editing           
              -->
              <a href="<?php echo base_url('Profile/update/')?>" class="btn btn-default  btn-xs pull-right fa fa-pencil"></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li><a href="#CompletedTasks" data-toggle="tab">Completed Tasks</a></li>
              <li><a href="#InProgress" data-toggle="tab">In Progress Task</a></li>
              <li><a href="#TeamContribution" data-toggle="tab">Team Contribution</a></li>
            </ul>
            
         </div>
                      
          </div>
          </div>
          </section>
          </div>
          </div>
                    
