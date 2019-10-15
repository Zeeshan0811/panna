    <div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a target="_blank" href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo IMG_URL; ?>logo.png" class="thumb-sm" alt=""> <span><?php echo $this->company_name; ?> </span></a>
        </div>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <div class="">
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav pull-left">
                        <?php if(is_super_admin()): ?>
                            <li class="<?php echo set_Topmenu("module"); ?>">
                                <a href="<?php echo site_url("module"); ?>" id="" class="waves-effect waves-light">Module</a>
                            </li>
                        <?php endif;?>
                        <?php $menu=all_menu(); ?>
                        <?php if(isset($menu)): ?>
                            <?php foreach($menu as $value): ?>
                            <?php if (hasActive($value['short_code']) && hasPermission($value['short_code'], VIEW)) : ?>
                                <li class="<?php echo set_Topmenu($value['link']); ?>">
                                    <a href="<?php echo site_url('main/'.$value['short_code']) ?>" id="" class="waves-effect waves-light"><?php echo $value['name']; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endforeach;?>
                        <?php endif;?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-gears"></i></a>
                            <ul class="dropdown-menu">
                                <?php if(hasPermission("reset_profile", VIEW)): ?>
                                    <li><a href="<?php echo site_url("setting/general/reset"); ?>"><i class="md md-settings"></i> Reset Profile</a></li>
                                <?php endif;?>
                                <li><a href="<?php echo site_url("auth/logout"); ?>"><i class="md md-settings-power"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>