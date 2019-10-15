<?php $menu_code=$this->session->userdata("menu_code"); ?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <h5 class="text-center text-white"><?= str_replace("_","",ucwords($menu_code)) ?></h5>
            <hr style="margin:0" />
            <h6 class="text-center  text-white">(<?php echo logged_in_role_name(); ?>) </h6>
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
                <?php $submenu=get_submenu($menu_code); ?>
                <?php if(isset($submenu) && !empty($submenu)): ?>
                    <?php foreach($submenu as $key=>$value): ?>
                    <?php if(hasPermission($key, VIEW)): ?>
                        <li  class="menu_active <?php if(!empty($value[$key])) echo "has_sub" ?>">
                        <a href="<?php if(empty($value[$key])) echo site_url($value['link']); else echo "javascript:void(0)"; ?>" id="active_<?= $value['id'] ?>" class="waves-effect  "><i class="fa <?php if($value['sub_icon']!='') echo $value['sub_icon']; else echo "md md-trending-neutral"; ?>"></i><?php echo $value['name']; ?>
                            <?php if(!empty($value[$key])): ?>
                            <span class="pull-right"><i class="md md-add"></i></span>
                            <?php endif;?>   
                        </a>
                            <?php if(!empty($value[$key])): ?>
                                <ul class="list-unstyled" id="<?= $value['id'] ?>">
                                    <?php foreach($value[$key] as $seceond_sub_key=>$second_sub_value): ?>
                                        <?php if (hasPermission($second_sub_value["short_code"], VIEW)) : ?>
                                            <li id="<?= $value['id'] ?>" class="<?php echo set_Submenu($second_sub_value['link']); ?> 3"><a href="<?php echo site_url($second_sub_value['link']); ?>"><span><i class="fa <?php if($second_sub_value['icon']!='') echo $second_sub_value['icon']; else echo "md md-thumb-up"; ?>"></i><?php echo $second_sub_value['name']; ?></span></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif;?>
                    <?php endforeach;?>
                <?php else:?>
                    <li>
                        <a href="<?= site_url(str_replace("_","-",$menu_code)) ?>" class="waves-effect active"><i class="md  md-view-module"></i><span> <?= str_replace("_","",ucwords($menu_code)) ?> </span></a>
                    </li>
                <?php endif;?>
            <?php endif;?>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script>
    var parent=$(".has_sub");
   if(parent.parent().find('.active').length == 1)
   {
       var id=$(".menu_active .active").attr("id");
       $("#active_"+id).addClass("active");
   }
</script>