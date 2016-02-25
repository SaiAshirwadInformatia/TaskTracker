<?php
use saiashirwadinformatia\AppMenuBuilder\Menu\Builder\SimpleBuilder;
use saiashirwadinformatia\AppMenuBuilder\Menu\Factory\JSONConfigFactory;

$JSONConfigFactory = new JSONConfigFactory(base_url('/'), current_url());

$SimpleBuilder = new SimpleBuilder(current_url(), "sidebar-menu", "treeview", "treeview-menu", "active");
$jsonConfig = APPPATH . 'config' . DIRECTORY_SEPARATOR . 'menu.json';
$menuList = $JSONConfigFactory->build($jsonConfig, base_url('/'));
$menu = $SimpleBuilder->build($menuList);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
    </section>
    <!-- /.sidebar -->
  </aside>