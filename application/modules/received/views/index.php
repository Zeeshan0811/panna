<div class="content">
    <?php $data['msg']="Welcome To received"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <div class="no_print">
            <?php  if(hasPermission("received",ADD)): ?>
                <?php if(isset($add)): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel ">
                                <div class="panel-body">
                                    <form id="received_form">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="received_no">Rec. NO</label><small class="req"> *</small> 
                                                    <input type="text" readonly  name="received_no" placeholder="Received No" required class="form-control" required id="received_no" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                    <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="date">Date</label><small class="req"> *</small> 
                                                    <input type="text" value="<?php echo date("d-m-Y") ?>" readonly name="date" id="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="ledger_id">Rec. From</label><small class="req"> *</small> 
                                                    <select name="ledger_id" id="ledger_id" data-live-search="true" required class="form-control selectpicker">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" readonly name="address" placeholder="Address" class="form-control"  id="address" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="marketing">Marketing</label>
                                                    <input type="text" readonly name="marketing" placeholder="Marketing" class="form-control"  id="marketing" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="">Receive</label><small class="req"> *</small> 
                                                    <select name="received_option"  id="received_option" required class="form-control  selectpicker">
                                                        <option value="Cash">Cash</option>
                                                        <option value="Bank">Bank</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                <label for="">Bank Name</label><small class="req"> *</small> 
                                                    <select name="bank_name" required disabled  id="bank_name" data-live-search="true"  class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if(isset($all_bank)): ?>
                                                            <?php foreach($all_bank as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="cheque_no">Cheque No.</label>
                                                    <input disabled required name="cheque_no"  placeholder="Cheque No" id="cheque_no" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="">Cheque date</label>
                                                    <input disabled value="<?php echo date("d-m-Y") ?>" required name="cheque_date"  id="cheque_date" type="text" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="mature_date">Matured Date</label>
                                                    <input disabled value="<?php echo date("d-m-Y") ?>" required name="mature_date"  id="mature_date" type="text" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" placeholder="Description"  class="form-control"  id="description" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label><small class="req"> *</small> 
                                                    <input type="text" name="amount" placeholder="Amount" required class="form-control" required id="amount" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="received_by">Rec. By</label>
                                                    <input type="text" name="received_by" value="<?php echo logged_in_name(); ?>" readonly placeholder="Rec. By"  class="form-control"  id="received_by" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group pull-left m-l-15 ">
                                                    <button  type="submit" class="btn btn-primary m-t-22 "><i class="md md-add  m-r-5"></i>Add</button>
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
            <?php  if(hasPermission("received",EDIT)): ?>
                <?php if(isset($edit)): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel ">
                                <div class="panel-body">
                                    <?php echo form_open("received/edit/".$single['id']) ?>
                                    <!-- <form id="received_form"> -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="received_no">Rec. NO</label><small class="req"> *</small> 
                                                    <input type="text" readonly value="<?= $single['received_no']; ?>" name="received_no" placeholder="Received No" required class="form-control" required id="received_no" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                    <select name="company_id" disabled data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                        <?php if(isset($all_company)): ?>
                                                            <?php foreach($all_company as $value): ?>
                                                                <option <?php if($value['id']==$single['company_id']) echo "selected"; ?>  value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                    <select name="branch_id" disabled id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="<?php echo $single['branch_id'] ?>"><?php echo $single['branch_name'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="date">Date</label><small class="req"> *</small> 
                                                    <input type="text" value="<?php echo date("d-m-Y",strtotime($single['date'])) ?>" readonly name="date" id="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="ledger_id">Rec. From</label><small class="req"> *</small> 
                                                    <select name="ledger_id" disabled id="ledger_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="<?php echo $single['account_id'] ?>#<?php echo $single['type'] ?>"><?php echo $single['name'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" readonly name="address" value="<?php $single['address'] ?>" placeholder="Address" class="form-control" required id="address" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="marketing">Marketing</label>
                                                    <input type="text" readonly name="marketing" placeholder="Marketing" class="form-control" required id="marketing" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="">Receive</label><small class="req"> *</small> 
                                                    <select name="received_option"  id="received_option" required class="form-control  selectpicker">
                                                        <option <?php if($single['received_type']=="Cash") echo "selected"; ?> value="Cash">Cash</option>
                                                        <option <?php if($single['received_type']=="Bank") echo "selected"; ?> value="Bank">Bank</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                <label for="">Bank Name</label><small class="req"> *</small> 
                                                    <select name="bank_name" required disabled  id="bank_name" data-live-search="true"  class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if(isset($all_bank)): ?>
                                                            <?php foreach($all_bank as $value): ?>
                                                                <option <?php if($single['bank_id']==$value['id']) echo "selected" ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="cheque_no">Cheque No.</label>
                                                    <input disabled required  placeholder="Cheque No" value="<?php echo $single['cheque_no'] ?>" name="cheque_no"  id="cheque_no" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="">Cheque date</label>
                                                    <input disabled value="<?php echo date("d-m-Y",strtotime($single['cheque_date'])) ?>"required name="cheque_date"  id="cheque_date" type="text" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="mature_date">Matured Date</label>
                                                    <input disabled value="<?php echo date("d-m-Y",strtotime($single['mature_date'])) ?>" required name="mature_date"  id="mature_date" type="text" readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input type="text" name="description" value="<?= $single['description'] ?>" placeholder="Description"  class="form-control"  id="description" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label><small class="req"> *</small> 
                                                    <input type="text" name="amount" value="<?php echo $single['credit'] ?>" placeholder="Amount" required class="form-control" required id="amount" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="received_by">Rec. By</label>
                                                    <input type="text" readonly value="<?= $single['received_by'] ?>" name="received_by" placeholder="Pay By"  class="form-control"  id="received_by" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group pull-left m-l-15 ">
                                                    <button  type="submit" class="btn btn-info m-t-22 "><i class="md md-add  m-r-5"></i>Update</button>
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
                    <div class="panel ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="print_header">
                                    <h1 class="title text-center"><img src="<?php echo $this->logo; ?>"><h1>
                                    <h4 class=" text-center m-t-5"><?php echo $this->address; ?></h4>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <table id="datatable" class="open_balance_table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Type</th>
                                                    <th class="text-center">Amount</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center status">Action</th>
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
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script src="<?php echo VENDOR_URL; ?>timepicker/bootstrap-datepicker.js"></script>
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
        $('#date,#cheque_date,#mature_date').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            immediateUpdates: true,
            todayBtn: true,
            todayHighlight: true
        });
       <?php if(!isset($edit)): ?>
            change_company_id();
            get_custom_receive_no();
        <?php endif;?>
        
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
                buttons: ['pageLength'],
                "info":false,
                "autoWidth": false,
                "scrollY": "200px",
                "scrollCollapse": false,
                "paging": false,
                "order":false
            });
        }
        function get_custom_receive_no() {
            var url="<?php echo base_url(); ?>received/received_no";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                success:function(data){
                   $("#received_no").val(data);
                }
            });
        }
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
                            $("#branch_id").append('<option value="'+ value.id +'#'+value.name+'">'+ value.name +'</option>')
                        });
                        $("#branch_id").selectpicker('render').selectpicker('refresh');
                        change_branch_id();
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
            change_branch_id();
        });
        $('#ledger_id').on('change',function(e){
            e.preventDefault();
            get_ledger_address();
            get_received();
        });
         //received option
         received_option();
        $('#received_option').on("change",function(){
            received_option();
        });
        function get_ledger_address() {
            var ledger_id=$("#ledger_id").val();
            var url="<?php echo base_url(); ?>ajax/get_ledger_address";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"ledger_id":ledger_id,"type":"customer"},
                success:function(data){
                    if(data!=null)
                    {
                        $("#address").val(data.address);
                        if(data.name!=null)
                        {
                            $("#marketing").val(data.name);
                        }else{
                            $("#marketing").val(data.branch_name);
                        }
                    }else{
                        $("#address").val('');
                        $("#marketing").val('');
                    }
                }
            });
        }
        function received_option()
        {
            var value=$("#received_option").val();
            if(value==="Bank")
            {
                $("#bank_name").prop("disabled",false);
                $("#bank_name").selectpicker("refresh");
                $("#cheque_no").prop("disabled",false);
                $("#cheque_date").prop("disabled",false);
                $("#mature_date").prop("disabled",false);
            }else{
                $("#bank_name").attr("disabled", 'disabled');
                $("#bank_name").selectpicker("refresh");
                $("#cheque_no").attr("disabled", 'disabled');
                $("#cheque_date").attr("disabled", 'disabled');
                $("#mature_date").attr("disabled", 'disabled');
            }
        }
        function change_branch_id(){
            get_ledger();
        }
        function get_ledger()
        {
            var branch=$("#branch_id").val();
            var branch_id=0;
            if(branch!=null)
            {
                branch_id=branch.split("#")[0];
            }
            var company_id=$("#company_id").val();
            var url="<?php echo base_url(); ?>ajax/get_ledger_for_mixed";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id,"type":"received"},
                success:function(data){
                    $("#ledger_id").find('option').remove();
                    $("#ledger_id").selectpicker("refresh");
                    if(data!=''){
                            $("#ledger_id").append('<option value="">--Select--</option>');
                        $.each(data,function(key,value){
                            $("#ledger_id").append('<option value="'+ value.id +'#'+value.type+'">'+ value.name +'</option>');
                        });
                        $("#ledger_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
            get_received();
        }

        $("#received_form").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url(); ?>received/add";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    get_custom_receive_no();
                    get_received();
                    $("#amount").val('');
                    $.Notification.autoHideNotify('success', 'top right',"Successfully");
                }
            });
        });

        function get_received()
        {
            var branch=$("#branch_id").val();
            var branch_id=0;
            if(branch!=null)
            {
                branch_id=branch.split("#")[0];
            }
            var company_id=$("#company_id").val();
            var ledger_id=$("#ledger_id").val();
            var url="<?php echo base_url(); ?>received/get_received";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id},
                success:function(data){
                    var html = '';
                    $('#datatable').DataTable().destroy();
                     if (data.result_data != '') {
                        $("#datatable tbody").html(data.result_data);
                        datatable();
                     } else {
                         html = '<tr><td class="text-center" colspan="5">Not Found.</td></tr>';
                        $("#datatable tbody").html(html);
                        datatable();
                     }
                }
            });
        }
    });
</script>