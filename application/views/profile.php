<div class="wrapper">
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
          <div class="box box-primary"> 
            <div class="box-body box-profile ">
              <img class="img-thumbnail" style="height : 180px; width : 230px " src="<?php echo base_url('assets/images/default_profile.png')?>" alt="User profile picture" >
              <h3 class="profile-username text-center">
                <?php echo $user['fname'] . ' ' . $user['lname']?>
              </h3>
              <p class="text-muted text-center"> <?php echo $user['designation'] ?></p>
            </div>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
              <a href="<?php echo base_url('Profile/update/')?>" class="btn btn-default  btn-xs pull-right fa fa-cog"></a>
            </div>
            <div class="box-body">
              <strong>Contact</strong>
              <p class="text-muted">
              <h5><i class="fa fa-envelope"></i> <?php echo $user['email'] ?></label></h5>
              <h5><i class="fa fa-phone"></i> <?php echo $user['phone'] ?></h5>
              </p>
              <hr><strong>Education</strong>
              <p class="text-muted">
              <h5><i class="fa fa-book"></i> <?php echo $user['exam'] ?></label></h5>
              <h5><i class="fa fa-university"></i>   <?php echo $user['board'] ?></h5>
              </p>
              <hr>
              <strong>Location</strong>
              <p class="text-muted">        
                <h5><?php echo $user['address1'].' '.$user['address2'].' '.$user['city'] ?></h5>
              </p>
              <hr>
              <strong>Skills</strong>
              <h5><?php echo $user['skills'] ?></h5>
              <hr>
            </div>
          </div>
        </div>
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
                    


