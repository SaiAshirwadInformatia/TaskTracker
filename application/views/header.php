<?php 
$this->load->view('head');
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>TT</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>T</b>ask <b>T</b>racker</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php
        $projects = $this->session->userdata('projects');
        $currentProject = $this->session->userdata('currentProject');
        $projectName = '';
        $projectKey = '';
        if($currentProject)
        {
            $projectName = $currentProject['name'];
            $projectKey = $currentProject['key'];
        }
      ?>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-rocket"></i>
              <?php if($projectKey):?>
              <span class="label label-warning"><?php echo $projectKey?></span>
            <?php endif; ?>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <?php 
                    foreach ($projects as $proj) {
                        echo '<li>';
                        echo '<a href="';
                        echo base_url("Projects/setCurrent/" . $proj['id']) . '">';
                        echo '<span class="projectColorBlock" style="background: ' . $proj['color'] . '"></span>';
                        echo $proj['name'];
                        if($projectName == $proj['name'] && $projectKey == $proj['key']){
                            echo ' <small><i>(Active)</i></small>';
                        }
                        echo '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('Projects')?>">View all Projects</a></li>
            </ul>
          </li> 
          <!-- User Account: style can be found in dropdown.less -->
          <?php 
            $user = $this->session->userdata('user');
          if(isset($user)):   ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/images/tiger.jpg');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $user['fname'].' '.$user['lname']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/images/tiger.jpg');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user['fname'].' '.$user['lname']?>
                  <small><?php echo 'Email Id - '.$user['email'] ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('Logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        <?php endif;?>
        </ul>
      </div>
    </nav>
  </header>
  <div class="wrapper">

<?php $this->load->view('nav')?>