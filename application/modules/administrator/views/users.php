<div class="content">
    <?php $data['msg']="Welcome To Manage User"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("manage_user",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form id="user_add">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option  value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Name</label><small class="req"> *</small> 
                                                <input type="text" name="name" placeholder="Full Name..." class="form-control" required id="name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="phone">Phone</label><small class="req"> *</small> 
                                                <input type="text" name="phone" placeholder="Phone Number" class="form-control" data-mask="(+88) 999-9999-9999" required id="phone" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <label for="role_id">Roll</label><small class="req"> *</small> 
                                                <select id="role_id" required name="role_id" class="form-control selectpicker" data-live-search="true">
                                                    <option value="">--Select--</option>
                                                    <?php if(count($roles)>0): ?>
                                                        <?php foreach($roles as $value):?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="username">User Email</label><small class="req"> *</small> 
                                                <input type="email" name="username" placeholder="User Email..." class="form-control" required id="username" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label><small class="req"> *</small> 
                                                <input type="password" name="password" placeholder="Password..." class="form-control" required id="password" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="add_user" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>
        <?php  if(hasPermission("manage_user",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("administrator/users/edit/".$single->id); ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option <?php if($single->company_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_branch)): ?>
                                                        <?php foreach($all_branch as $value): ?>
                                                            <option <?php if($single->branch_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Name</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo $single->name ?>" name="name" placeholder="Full Name..." class="form-control" required id="name" >
                                                <input type="hidden" value="<?php echo $single->id ?>" name="id" class="form-control" required id="id" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="phone">Phone</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo $single->phone?>" name="phone" placeholder="Phone Number" class="form-control" data-mask="(+88) 999-9999-9999" required id="phone" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <label for="role_id">Roll</label><small class="req"> *</small> 
                                                <select id="role_id" required name="role_id" class="form-control selectpicker" data-live-search="true">
                                                    <option value="">--Select--</option>
                                                    <?php if(count($roles)>0): ?>
                                                        <?php foreach($roles as $value):?>
                                                            <option <?php if($single->role_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="username">User Email</label><small class="req"> *</small> 
                                                <input type="email" value="<?php echo $single->username?>" name="username" placeholder="User Email..." class="form-control" required id="username" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" placeholder="Password..." class="form-control"  id="password" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="edit_user" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL.</th>
                                            <th class="text-center">Company Name</th>
                                            <th class="text-center">Branch Name</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Role Name</th>
                                            <th class="text-center">User Email</th>
                                            <th class="text-center">Phone</th>
                                            <th class="text-center">Created</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function(){
        $("#user_add").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url() ?>administrator/users/add";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top right',data.success);
                        $("input").val('');
                    }
                    else{
                        $.Notification.autoHideNotify('error', 'top right',data.msg);
                    }
                    get_view();
                }
            });
        });
        datatable();
        function datatable() {
            $('#datatable').dataTable({
                "info":false,
                "autoWidth": false
            });
            
        }
        <?php if(!isset($edit)): ?>
            change_company_id();
        <?php else: ?>
            get_view();
        <?php endif; ?>
        function change_company_id()
        {
            var company_id=$("#company_id").val();
            var url="<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id},
                success:function(data){
                    $("#branch_id").find('option').remove();
                    $("#branch_id").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#branch_id").append('<option value="'+ value.id +'">'+ value.name +'</option>')
                        });
                        $("#branch_id").selectpicker('render').selectpicker('refresh');
                        get_view();
                    }
                }
            });
        }
        $('#company_id').on('change',function(e){
            e.preventDefault();
            change_company_id();
        });
        $('#branch_id').on('change',function(e){
            e.preventDefault();
            get_view();
        });
        function get_view()
        {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>administrator/users/view",
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id},
                success:function(data){
                    $('#datatable').DataTable().destroy();
                   $("#datatable tbody").html(data);
                   datatable();
                }
            });
        }
    });
</script>