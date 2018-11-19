<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('/dashboard/'); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="font-size:12px;">HEMS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>HEMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">


                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php  $data['path'] = $this->model_hms->get_profile_pic($this->authentication->read('identifier')); foreach ($data as $dt){ foreach ($dt as $d) {echo base_url('assets/dist/img/') . $d['path'];} } ?>" class="user-image"
                             alt="User Image">
                        <span class="hidden-xs docName"><?php echo $this->authentication->read('fullname'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php  $data['path'] = $this->model_hms->get_profile_pic($this->authentication->read('identifier')); foreach ($data as $dt){ foreach ($dt as $d) {echo base_url('assets/dist/img/') . $d['path'];} } ?>"
                                 class="img-circle" alt="User Image">
                            <p>
                                Welcome! - <?php
                                echo $this->authentication->read('fullname');
                                ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('dashboard/profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign
                                    out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php  $data['path'] = $this->model_hms->get_profile_pic($this->authentication->read('identifier')); foreach ($data as $dt){ foreach ($dt as $d) {echo base_url('assets/dist/img/') . $d['path'];} } ?>" class="img-circle"
                     alt="User Image">
            </div>
            <div class="pull-left info">
                <p><a href="<?php echo base_url('/dashboard/profile'); ?>"><?php echo $this->authentication->read('fullname'); ?></p>
                <a class="underline" href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <!-- search form -->
<!--        <form action="" method="post" class="sidebar-form" enctype="multipart/form-data">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search...">-->
<!--                <span class="input-group-btn">-->
<!--                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <br>
            <br><br>
            <br><br>
            <br>
            <div class="cssload-loader">
                <div class="cssload-inner cssload-one"></div>
                <div class="cssload-inner cssload-two"></div>
                <div class="cssload-inner cssload-three"></div>
            </div>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>