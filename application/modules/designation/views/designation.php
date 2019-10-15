<div class="content">
    <?php $data['msg']="Welcome To Designation Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("designation",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form id="designation_add">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
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
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="section_id">Section Name</label><small class="req"> *</small> 
                                                <select name="section_id" id="section_id" data-live-search="true" required class="form-control selectpicker">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="designation_name">Designation</label><small class="req"> *</small> 
                                                <input type="text" name="designation_name" placeholder="Designation" class="form-control" required id="designation_name" >
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
        <?php  if(hasPermission("designation",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("designation/designationedit/".$single['designation_id']); ?>
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
                                                <label for="section_id">Section Name</label><small class="req"> *</small> 
                                                <select name="section_id" id="section_id" data-live-search="true" required class="form-control selectpicker">
                                                    <?php if(isset($all_section)): ?>
                                                        <?php foreach($all_section as $value): ?>
                                                            <option <?php if($single['section_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="designation_name">Designation</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single["designation"]; ?>" name="designation_name" placeholder="Designation" class="form-control" required id="designation_name" >
                                                <input type="hidden" value="<?php echo @$single['designation_id']; ?>" name="id" required id="id" >
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
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Company Name</th>
                                            <th class="text-center">Branch Name</th>
                                            <th class="text-center">Section Name</th>
                                            <th class="text-center">Designation</th>
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
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function(){
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
                    get_view();
                }
            });
        });
        datatable();
        function datatable(){
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
                    $("#section_id").find('option').remove();
                    $("#section_id").selectpicker("refresh");
                    $("#section_id").selectpicker('render').selectpicker('refresh');
                    if(data!=''){
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
                        get_view();
                    }
                }
            });
        }
        function get_view()
        {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            var section_id=$("#section_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>designation/view",
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id,"section_id":section_id},
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
        
        $('#section_id').on('change',function(e){
            e.preventDefault();
            get_view();
        });
    });
</script>