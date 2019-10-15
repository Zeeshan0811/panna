<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <h5 class="text-center  text-white page-titleb"><?php echo logged_in_role_name(); ?> </h5>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
            <?php if(setActive("module")): ?>
                <li>
                    <a href="<?php echo site_url("module"); ?>" class="waves-effect"><i class="md md-view-module"></i><span> Module </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url("module/mlist"); ?>" class="waves-effect"><i class="fa  fa-lock fa-2x"></i><span> Module List </span></a>
                </li>
            <?php else:?>
                <?php $submenu=submenu(); ?>
                <?php if(isset($submenu)): ?>
                    <?php foreach($submenu as $key=>$value): ?>
                        <?php if(setActive($key) && hasPermission($key, VIEW)): ?>
                            <?php if (hasActive($key) && hasPermission($key, VIEW)) : ?>
                            <li class="<?php if(!empty($value[$key])) echo "has_sub" ?>">
                                <a href="<?php if(empty($value[$key])) echo site_url($value['link']); else echo "javascript:void(0)"; ?>" class="waves-effect active"><i class="md  md-view-module"></i><span><?php echo $value['name']; ?></span>
                                    <?php if(!empty($value[$key])): ?>
                                    <span class="pull-right"><b class="caret"></b></span>
                                    <?php endif;?>
                                </a>
                                <?php if(!empty($value[$key])): ?>
                                    <ul class="list-unstyled" class="sub_menu" style="display: block;">
                                        <?php foreach($value[$key] as $sub_key=>$subvalue): ?>
                                            <?php if (hasPermission($subvalue['short_code'], VIEW)) : ?>
                                                <li class="<?php echo set_Submenu($subvalue['link']); ?> <?php if(!empty($subvalue[$sub_key])) echo "has_sub" ?>">
                                                    <a href="<?php if(empty($subvalue[$sub_key])) echo site_url($subvalue['link']); else echo "javascript:void(0)"; ?>" class="sub_menu_a"><i class="fa <?php if($subvalue['sub_icon']!='') echo $subvalue['sub_icon']; else echo "md md-trending-neutral"; ?>"></i><?php echo $subvalue['name']; ?>
                                                        <?php if(!empty($subvalue[$sub_key])): ?>
                                                        <span class="pull-right"><b class="caret"></b></span>
                                                        <?php endif;?>
                                                    </a>
                                                    <?php if(!empty($subvalue[$sub_key])): ?>
                                                        <ul style="">
                                                            <?php foreach($subvalue[$sub_key] as $seceond_sub_key=>$second_sub_value): ?>
                                                                <?php if (hasPermission($second_sub_value["short_code"], VIEW)) : ?>
                                                                    <li class="<?php echo set_Submenu($second_sub_value['link']); ?>"><a href="<?php echo site_url($second_sub_value['link']); ?>"><span><i class="fa <?php if($second_sub_value['icon']!='') echo $second_sub_value['icon']; else echo "md md-thumb-up"; ?>"></i><?php echo $second_sub_value['name']; ?></span></a></li>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif;?>
            <?php endif;?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>