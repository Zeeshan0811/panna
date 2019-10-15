<div class="content">
    <div class="box-head">
        <span class="pull-left page-titleb text-white">Welcome To Branch Setup</span>
    </div>
    <?php echo $this->session->flashdata("msg"); ?>
    <div class="container">
        <?php  if(hasPermission("branch",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title"> 
                                Add Branch
                            </h4> 
                        </div>
                            <div class="panel-body">
                                <form id="branch_add">
                                    <div class="row">
                                        <div class="col-sm-3">
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
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="branch_name">Branch Name</label><small class="req"> *</small> 
                                                <input type="text" name="branch_name" placeholder="Branch Name..." class="form-control" required id="branch_name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="contact">Mobile</label><small class="req"> *</small> 
                                                <input type="text" data-mask="(+88) 999-9999-9999" name="contact" placeholder="Contact Number" class="form-control" required id="contact" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tel">Telephone No.</label>
                                                <input type="text"  name="tel" placeholder="Telephone No" class="form-control"  id="tel" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address">Address </label><small class="req"> *</small> 
                                                <input type="text"  name="address" placeholder="Address" class="form-control"  id="address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="add_branch" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php  if(hasPermission("branch",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"> 
                                    Edit Branch
                                </h4> 
                            </div>
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("branch/branchedit/".$single->id); ?>
                                <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option <?php if($single->company_id==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="branch_name">Branch Name</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single->name; ?>" name="branch_name" placeholder="Branch Name..." class="form-control" required id="branch_name" >
                                                <input type="hidden" value="<?php echo @$single->id; ?>" name="id"required id="id" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="contact">Mobile</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single->contact; ?>" data-mask="(+88) 999-9999-9999" name="contact" placeholder="Contact Number" class="form-control" required id="contact" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tel">Telephone No.</label>
                                                <input type="text" value="<?php echo @$single->tel; ?>" name="tel" placeholder="Telephone No." class="form-control"  id="tel" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address">Address </label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single->address; ?>"  name="address" placeholder="Address" class="form-control" required id="contact" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="edit_branch" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
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
                    <div class="panel-heading">
                        <h4 class="panel-title"> 
                            All Branch
                        </h4> 
                    </div>
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
                                                <th class="text-center">Mobile </th>
                                                <th class="text-center">Telephone No.</th>
                                                <th class="text-center">Address</th>
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
        datatable();
        function datatable()
        {
            $('#datatable').dataTable({
                "info":false,
                "autoWidth": false
            });
        }
            get_view();
        function get_view()
        {
            var company_id=$("#company_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>branch/view",
                type:"get",
                dataType:"json",
                data:{"company_id":company_id},
                success:function(data){
                    $('#datatable').DataTable().destroy();
                    $("#datatable tbody").html(data);
                    datatable();
                }
            });
        }
        $('#company_id').on('change',function(e){
            e.preventDefault();
            get_view();
        });
        $("#branch_add").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url() ?>branch/branchadd";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top right',data.success);
                        $("#branch_name").val('');
                        $("#contact").val('');
                        $("#tel").val('');
                        $("#address").val('');
                    }
                    else{
                        $.Notification.autoHideNotify('error', 'top right',data.msg);
                    }
                    get_view();
                }
            });
        });
    });
</script>