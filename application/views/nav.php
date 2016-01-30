<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-rocket"></i> Projects <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li> 
                    <a href="<?php echo site_url('Projects/create')?>">
                        <i class="fa fa-plus-square-o"></i> Add Project
                    </a>
                </li>
                <li> 
                    <a href="<?php echo site_url('Projects')?>">
                        <i class="fa fa-th-list"></i> View Projects
                    </a>
                </li>
            </ul>
        </li>
        <!--
        Dashboard
        My Tasks
        Project Board
        Projects
            - Add Projects
            - View Projects
        Releases
            - Add Release
            - View Releases
        Tasks
            - Add Tasks
            - View Tasks
            - Open Tasks
            - Unassigned Tasks
            - Closed Tasks
         -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>