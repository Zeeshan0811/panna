<div class="content">
    <?php $data['msg']="Welcome To Supplier Information Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <div class="no_print">
            <?php  if(hasPermission("supplier_info",ADD)): ?>
                <?php if(isset($add)): ?> 
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form id="supplier_add">
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
                                                    <label for="name">Supplier Name</label><small class="req"> *</small> 
                                                    <input type="text" name="name" placeholder="Name" class="form-control" required id="name" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="code">Code</label><small class="req"> *</small> 
                                                    <input type="text" name="code" readonly value="<?php echo @$code; ?>" placeholder="Code" class="form-control" required id="code" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="address">Address</label><small class="req"> *</small> 
                                                    <input type="text" name="address" placeholder="Address" class="form-control" required id="address" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="owner_name">Owner Name</label><small class="req"> *</small> 
                                                    <input type="text" name="owner_name" placeholder="Owner Name" class="form-control" required id="owner_name" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="tel">Telephone No.</label><small class="req"> *</small> 
                                                    <input type="text" name="tel" placeholder="Telephone No." required class="form-control" required id="tel" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label><small class="req"> *</small> 
                                                    <input type="email" name="email" placeholder="Email" required class="form-control" required id="email" >
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
            <?php  if(hasPermission("supplier_info",EDIT)): ?>
                <?php if(isset($edit)): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <!-- <form id="find"> -->
                                    <?php echo form_open("supplier/edit/".$single['supplier_id']); ?>
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
                                                    <label for="name">Supplier Name</label><small class="req"> *</small> 
                                                    <input type="text" name="name" value="<?php echo @$single['supplier_name']; ?>" placeholder="Name" class="form-control" required id="name" >
                                                    <input type="hidden" name="id" value="<?php echo @$single['supplier_id']; ?>"  required id="id" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="code">Code</label><small class="req"> *</small> 
                                                    <input type="text" name="code" readonly value="<?php echo @$single['code']; ?>" placeholder="Code" class="form-control" required id="code" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="address">Address</label><small class="req"> *</small> 
                                                    <input type="text" value="<?php echo @$single['address']; ?>" name="address" placeholder="Address" class="form-control" required id="address" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="owner_name">Owner Name</label><small class="req"> *</small> 
                                                    <input type="text" name="owner_name" value="<?php echo @$single['owner_name']; ?>" placeholder="Owner Name" class="form-control" required id="owner_name" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="tel">Telephone No.</label><small class="req"> *</small> 
                                                    <input type="text" name="tel" value="<?php echo @$single['tel']; ?>" placeholder="Telephone No." required class="form-control" required id="tel" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label><small class="req"> *</small> 
                                                    <input type="email" name="email" placeholder="Email" value="<?php echo @$single['email']; ?>" required class="form-control" required id="email" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="print_div">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive"><span class="print_link"></span>
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Code</th>
                                                    <th class="text-center">Company Name</th>
                                                    <th class="text-center">Branch Name</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Address</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Telephone No.</th>
                                                    <th class="text-center status">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" class="total_supplier text-right">Total Supplier: 0</td>
                                                    <td class="status"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script> 
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function(){
        $("#supplier_add").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url() ?>supplier/add";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="success")
                    {
                        $.Notification.autoHideNotify('success', 'top right',data.result_data);
                        $("input").val('');
                        get_custom_code();
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
                dom: 'Bfrtip',
                columnDefs: [
                    {
                        targets: 1,
                        className: 'noVis'
                    }
                ],
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: ['pageLength',
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        collectionLayout: 'fixed two-column'
                    },
                ],
                "info":false,
                "autoWidth": false
            });

        }
       <?php if(!isset($edit)): ?>
            change_company_id();
        <?php else:;?>
            get_view();
        <?php endif;?>
        function get_print_link() {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            var html='<a target="_blank" href="<?= site_url("supplier/print_supplier/") ?>'+company_id+'/'+branch_id+'"  class="btn bg-primary print_button pull-right m-l-10"><i class="fa fa-print"></i></a>'
            $(".print_link").html(html);
        }
        function get_custom_code() {
            var company_id=$("#company_id").val();
            var code="<?= @$single['code'] ?>";
            var editCompany_id="<?= @$single['company_id'] ?>";
            if(editCompany_id!=company_id)
            {
                var url="<?php echo base_url(); ?>supplier/get_custom_code";
                $.ajax({
                    url:url,
                    type:"get",
                    dataType:"json",
                    data:{"company_id":company_id},
                    success:function(data){
                        if(data!=''){
                            $("#code").val(data);
                        }
                    }
                });
            }else{
                $("#code").val(code);
            }
        }
        function change_company_id()
        {
            get_custom_code();
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
                        get_print_link();
                    }
                }
            });
        }
        $('#company_id').on('change',function(e){
            e.preventDefault();
            change_company_id();
        });
        function get_view()
        {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>supplier/view",
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id},
                success:function(data){
                    $('#datatable').DataTable().destroy();
                    $("#datatable tbody").html(data.result_data);
                   $("#datatable .total_supplier").text("Total Supplier: "+data.total_supplier);
                   datatable();
                }
            });
        }
        $('#branch_id').on('change',function(e){
            e.preventDefault();
            get_view();
            get_print_link();
        });
        
    });
</script>
