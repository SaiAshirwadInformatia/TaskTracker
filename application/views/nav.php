<?php
/*
use saiashirwadinformatia\AppMenuBuilder\Menu\Builder\SimpleBuilder;
use saiashirwadinformatia\AppMenuBuilder\Menu\Factory\JSONConfigFactory;

$JSONConfigFactory = new JSONConfigFactory(base_url('/'), current_url());

$SimpleBuilder = new SimpleBuilder(current_url(), "sidebar-menu", "treeview", "treeview-menu", "active");
$jsonConfig = APPPATH . 'config' . DIRECTORY_SEPARATOR . 'menu.json';
$menuList = $JSONConfigFactory->build($jsonConfig, base_url('/'));
$menu = $SimpleBuilder->build($menuList);
?>*/
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
 

      <ul class="sidebar-menu">
        <li>
            <a href="<?php echo base_url('Dashboard') ?>">
                <i class="fa fa-dribbble"></i>  <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('Kanban') ?>">
                <i class="fa fa-modx"></i> <span>Kanban</span>
            </a>
        </li>


        <li>
            <a href="<?php echo base_url('Tasks/mytasks')?>">
                <i class="fa fa-list"></i> <span>My Task</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('Projects/board') ?>">
                <i class="fa fa-fighter-jet"></i> <span>Project Board</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">

                <i class="fa fa-users"></i> <span>Team</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url('Teams/create')?>">
                        <i class="fa fa-plus-square-o"></i> <span>Add Team</spna>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Teams')?>">
                        <i class="fa fa-th-list"></i> <span>View Team</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-rocket"></i> <span>Projects</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li> 
                    <a href="<?php echo base_url('Projects/create')?>">
                        <i class="fa fa-plus-square-o"></i> <span>Add Project</span>
                    </a>
                </li>
                <li> 
                    <a href="<?php echo base_url('Projects')?>">
                        <i class="fa fa-th-list"></i> <span>View Projects</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-arrow-up"></i> <span>Releases</span><i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url('Releases/create')?>">
                        <i class="fa fa-plus-square-o"></i> <span>Add Release</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Releases')?>">
                        <i class="fa fa-th-list"></i> <span>View Releases</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-tasks"></i> <span>Tasks</span><i class=" fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="<?php echo base_url('Tasks/create/') ?>">
                        <i class="fa fa-plus-square-o"></i> <span>Add Task</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo  base_url('Tasks') ?>">
                        <i class="fa fa-plus-square-o"></i> <span>View All Task</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Tasks/open') ?>">
                        <i class="fa fa-plus-square-o"></i> <span>Open Task</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Tasks/assigned') ?>">
                        <i class="fa fa-plus-square-o"></i> <span>Assigned Task</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('Tasks/closed') ?>">
                        <i class="fa fa-plus-square-o"></i> <span>Closed Task</span>
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
      <?php /*
=======
      <?php echo $menu; ?>*/
?>
    </section>
    <!-- /.sidebar -->
  </aside>