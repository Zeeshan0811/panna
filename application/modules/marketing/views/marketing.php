<div class="content">
    <?php $data['msg']="Welcome To Marketing Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("marketing",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form id="marketing_add">
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
                                                <label for="marketing_name">Name</label><small class="req"> *</small> 
                                                <input type="text" name="marketing_name" placeholder="Name" class="form-control" required id="marketing_name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="designation_id">Designation</label><small class="req"> *</small> 
                                                <div class="input-group">
                                                    <select name="designation_id" id="designation_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                    </select>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal" type="button">
                                                            <i class="md md-add"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="present_address">Present Address</label><small class="req"> *</small> 
                                                <input type="text" name="present_address" placeholder="Present Address" class="form-control" required id="present_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="permanent_address">Permanent Address</label><small class="req"> *</small> 
                                                <input type="text" name="permanent_address" placeholder="Permanent Address" class="form-control" required id="permanent_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mobile">Mobile No.</label><small class="req"> *</small> 
                                                <input type="text" name="mobile" placeholder="Mobile No." class="form-control" required id="mobile" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tel">Telephone No.</label>
                                                <input type="text" name="tel" placeholder="Telephone No." class="form-control"  id="tel" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="add_section" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php  if(hasPermission("marketing",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("marketing/marketingEdit/".$single['marketing_id']); ?>
                                <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" id="company_id" data-live-search="true" required class="form-control selectpicker">
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
                                                <label for="marketing_name">Name</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['marketing_name']; ?>" name="marketing_name" placeholder="Name" class="form-control" required id="marketing_name" >
                                                <input type="hidden" name="id" value="<?php echo @$single['marketing_id']; ?>"  required id="id" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="designation_id">Designation</label><small class="req"> *</small> 
                                                <div class="input-group">
                                                    <select name="designation_id" id="designation_id" data-live-search="true" required class="form-control selectpicker">
                                                    <?php if(isset($all_designation)): ?>
                                                        <?php foreach($all_designation as $value): ?>
                                                            <option <?php if($single['designation_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['designation'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    </select>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal" type="button">
                                                            <i class="md md-add"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="present_address">Present Address</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['present_address']; ?>" name="present_address" placeholder="Present Address" class="form-control" required id="present_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="permanent_address">Permanent Address</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['permanent_address']; ?>" name="permanent_address" placeholder="Permanent Address" class="form-control" required id="permanent_address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mobile">Mobile No.</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['mobile']; ?>" name="mobile" placeholder="Mobile No." class="form-control" required id="mobile" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tel">Telephone No.</label>
                                                <input type="text" value="<?php echo @$single['tel']; ?>" name="tel" placeholder="Telephone No." class="form-control"  id="tel" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="edit_company" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Branch Name</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Designation</th>
                                                <th class="text-center">Present Address</th>
                                                <th class="text-center">Permanent Address</th>
                                                <th class="text-center">Mobile No.</th>
                                                <th class="text-center">Telephone No.</th>
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
<input type="hidden" name="stock_modal" value="stock_modal" class="form-control" required id="stock_modal" >
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <form id="designation_add">
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Add Designation</h4> 
                </div> 
                <div class="modal-body"> 
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="company_id_m">Company Name</label><small class="req"> *</small> 
                                <select name="company_id" data-live-search="true" id="company_id_m" required class="form-control selectpicker">
                                    <?php if(isset($all_company)): ?>
                                        <?php foreach($all_company as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="branch_id_m">Branch Name</label><small class="req"> *</small> 
                                <select name="branch_id" id="branch_id_m" data-live-search="true" required class="form-control selectpicker">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="section_id">Section Name</label>
                                <select name="section_id" id="section_id" data-live-search="true"  class="form-control selectpicker">
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="designation_name">Designation</label><small class="req"> *</small> 
                                <input type="text" name="designation_name" placeholder="Designation" class="form-control" required id="designation_name" >
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                </div> 
            </div>
        </form> 
    </div>
</div>
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function(){
        $("#marketing_add").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url() ?>marketing/marketingadd";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top right',data.result_data);
                        $("#marketing_name").val('');
                        $("#present_address").val('');
                        $("#permanent_address").val('');
                        $("#mobile").val('');
                        $("#tel").val('');
                    }
                    else{
                        $.Notification.autoHideNotify('error', 'top right',data.result_data);
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
                    }
                    $("#designation_id").find('option').remove();
                    $("#designation_id").selectpicker("refresh");
                    $("#designation_id").selectpicker('render').selectpicker('refresh');
                    if(data!='')
                    {
                        change_branch_id();
                    }
                }
            });
        }
        $('#company_id').on('change',function(e){
            e.preventDefault();
            change_company_id();
        });
        function change_branch_id(){
            var branch_id=$("#branch_id").val();
            var url="<?php echo base_url(); ?>ajax/get_designation_by_branch";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"branch_id":branch_id},
                success:function(data){
                    $("#designation_id").find('option').remove();
                    $("#designation_id").selectpicker("refresh");
                    if(data!=''){
                        $("#designation_id").append('<option value="">--Select--</option>')
                        $.each(data,function(key,value){
                            $("#designation_id").append('<option value="'+ value.id +'">'+ value.designation +'</option>')
                        });
                        $("#designation_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
            get_view();
        }
        function get_view()
        {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>marketing/view",
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
        $('#branch_id').on('change',function(e){
            e.preventDefault();
            change_branch_id();
        });
        //model part
        change_m_company_id();
        function change_m_company_id(){
            var company_id=$("#company_id_m").val();
            var url="<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id},
                success:function(data){
                    $("#branch_id_m").find('option').remove();
                    $("#branch_id_m").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#branch_id_m").append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        $("#branch_id_m").selectpicker('render').selectpicker('refresh');
                    }
                    change_m_branch_id();
                }
            });
        }
        $('#company_id_m').on('change',function(e){
            e.preventDefault();
            change_m_company_id();
        });
      
        function change_m_branch_id()
        {
            var branch_id=$("#branch_id_m").val();
            var url="<?php echo base_url(); ?>ajax/get_section_by_branch";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"branch_id":branch_id},
                success:function(data){
                    $("#section_id").find('option').remove();
                    $("#section_id").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#section_id").append('<option value="'+ value.id +'">'+ value.name +'</option>')
                        });
                        $("#section_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }
        
        $('#branch_id_m').on('change',function(e){
            e.preventDefault();
            change_m_branch_id();
        });
        $("#designation_add").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url() ?>designation/designationadd";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top right',data.success);
                        $("#designation_name").val('');
                    }
                    else{
                        $.Notification.autoHideNotify('error', 'top right',data.msg);
                    }
                    change_branch_id();
                    $('#con-close-modal').modal('toggle');
                }
            });
        });
    });
</script>