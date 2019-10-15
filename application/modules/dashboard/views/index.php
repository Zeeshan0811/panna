<div class="content">
    <?php $data['msg']="Welcome To Dashboard"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="row">
    <?php if(hasPermission("total_supplier",VIEW)): ?>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-person-stalker"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?= $total_supplier; ?></span>
                    Total Supplier
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(hasPermission("total_customer",VIEW)): ?>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-person-add"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?= $total_customer; ?></span>
                    Total Customer
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(hasPermission("total_roles",VIEW)): ?>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <a href="<?= site_url("manage-user"); ?>">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-locked"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter"><?= $total_roles-1; ?></span>
                    Total Role
                </div>
            </div>
            </a>
        </div>
    <?php endif; ?>
    </div> 
</div>