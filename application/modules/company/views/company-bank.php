<div class="content">
    <?php $data['msg']="Welcome To Company Bank Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("company_bank",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel ">
                            <div class="panel-body">
                                <form id="company_bank_add">
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
                                                <label for="name">Bank Name</label><small class="req"> *</small> 
                                                <input type="text" name="bank_name" placeholder="Name" class="form-control" required id="name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="ac_type">Account Type</label><small class="req"> *</small> 
                                                <input type="text" name="ac_type" placeholder="Account Type" class="form-control" required id="ac_type" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_address">Bank Branch Address</label><small class="req"> *</small> 
                                                <input type="text" name="branch_address" placeholder="Bank Branch Address" class="form-control" required id="branch_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="account_no">Account No.</label><small class="req"> *</small> 
                                                <input type="text" name="account_no" placeholder="Account No." class="form-control" required id="account_no" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php  if(hasPermission("company_bank",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel ">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("company/editBank/".$single['bank_id']); ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option <?php if($single['company_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    <?php if(isset($all_branch)): ?>
                                                        <?php foreach($all_branch as $value): ?>
                                                            <option <?php if($single['branch_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Bank Name</label><small class="req"> *</small> 
                                                <input type="text" name="bank_name" value="<?php echo @$single['name']; ?>" placeholder="Name" class="form-control" required id="name" >
                                                <input type="hidden" name="id" value="<?php echo @$single['bank_id']; ?>" required id="id" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="ac_type">Account Type</label><small class="req"> *</small> 
                                                <input type="text" name="ac_type" value="<?php echo @$single['ac_type']; ?>" placeholder="Account Type" class="form-control" required id="ac_type" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_address">Bank Branch Address</label><small class="req"> *</small> 
                                                <input type="text" name="branch_address" value="<?php echo @$single['branch_address']; ?>" placeholder="Bank Branch Address" class="form-control" required id="branch_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="account_no">Account No.</label><small class="req"> *</small> 
                                                <input type="text" name="account_no" value="<?php echo @$single['account_no']; ?>" placeholder="Account No." class="form-control" required id="account_no" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="submit" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
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
                <div class="panel ">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Branch Name</th>
                                                <th class="text-center">Bank Name</th>
                                                <th class="text-center">Bank Branch Address</th>
                                                <th class="text-center">Account Type</th>
                                                <th class="text-center">Account No.</th>
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
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function(){
        $("#company_bank_add").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url() ?>company/addBank";
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
        function datatable()
        {
            $('#datatable').dataTable({
                "info":false,
                "autoWidth": false
            });
        }
       <?php if(!isset($edit)): ?>
            change_company_id();
        <?php else:?>
        get_view();
        <?php endif;?>
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
        function get_view()
        {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>company/bankview",
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
        $('#company_id').on('change',function(e){
            e.preventDefault();
            change_company_id();
        });
        $('#branch_id').on('change',function(e){
            e.preventDefault();
            get_view();
        });
        
    });
</script>