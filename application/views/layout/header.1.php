<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo IMG_URL; ?>logo.png" class="thumb-sm" alt=""> <span><?php echo $this->company_name; ?> </span></a>
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

                <ul class="nav navbar-nav navbar-right pull-left">
                <?php $menu=all_menu(); ?>
                <?php if(isset($menu)): ?>
                    <?php foreach($menu as $value): ?>
                    <?php if (hasActive($value['short_code']) && hasPermission($value['short_code'], VIEW)) : ?>
                        <li class="hidden-xs">
                            <a href="<?php echo site_url($value['link']) ?>" id="" class="waves-effect waves-light"><?php echo $value['name']; ?></a>
                        </li>
                    <?php endif; ?>
                    <?php endforeach;?>
                <?php endif;?>
                    <?php if (hasActive("administrator") && hasPermission("administrator", VIEW)) : ?>
                    <li class="hidden-xs">
                        <a href="<?php echo site_url("administrator"); ?>" id="" class="waves-effect waves-light">Administrator</a>
                    </li>
                    <?php endif; ?>
                    <?php if (hasActive("inventory") && hasPermission("administrator", VIEW)) : ?>
                    <li class="hidden-xs">
                        <a href="<?php echo site_url("inventory"); ?>" id="" class="waves-effect waves-light">Inventory</a>
                    </li>
                    <?php endif;?>
                    <?php if (hasActive("accounting") && hasPermission("accounting", VIEW)) : ?>
                    <li class="hidden-xs">
                        <a href="#" id="" class="waves-effect waves-light">Accounting</a>
                    </li>
                    <?php endif; ?>
                    <?php if (hasActive("setting") && hasPermission("setting", VIEW)) : ?>
                    <li class="hidden-xs">
                        <a href="<?php echo site_url("setting"); ?>" id="" class="waves-effect waves-light">Setting</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="hidden-xs">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo IMG_URL; ?>avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                        <ul class="dropdown-menu">
                            <?php if(is_super_admin()): ?>
                                <li><a href="<?php echo site_url("setting/general/reset"); ?>"><i class="md md-settings"></i> Reset Profile</a></li>
                            <?php endif;?>
                            <li><a href="<?php echo site_url("auth/logout"); ?>"><i class="md md-settings-power"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>