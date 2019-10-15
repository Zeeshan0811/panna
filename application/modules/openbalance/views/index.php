<div class="content">
    <?php $data['msg']="Welcome To Opening Balance Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <div class="no_print">
            <?php  if(hasPermission("opening_balance",ADD)): ?>
                <?php if(isset($add)): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel ">
                                <div class="panel-body">
                                    <form id="balance">
                                        <div class="row">
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
                                                    <label for="ledger_id">Ledger Name</label><small class="req"> *</small> 
                                                    <select name="ledger_id" id="ledger_id" data-live-search="true" required class="form-control selectpicker">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label><small class="req"> *</small> 
                                                    <input type="text" name="amount" placeholder="Amount" required class="form-control" required id="amount" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group pull-left m-l-15 ">
                                                    <button  type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
            <?php  if(hasPermission("opening_balance",EDIT)): ?>
                <?php if(isset($edit)): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel ">
                                <div class="panel-body">
                                    <?php echo form_open("openbalance/edit/".$single['id']); ?>
                                    <!-- <form id="balance"> -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                    <select name="company_id" disabled data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                        <?php if(isset($all_company)): ?>
                                                            <?php foreach($all_company as $value): ?>
                                                                <option <?php if($value['id']==$single['company_id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
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
                                                    <label for="ledger_id">Ledger Name</label><small class="req"> *</small> 
                                                    <select name="ledger_id" disabled id="ledger_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="<?php echo $single['account_id'] ?>#<?php echo $single['type'] ?>"><?php echo $single['name'] ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label><small class="req"> *</small> 
                                                    <input type="text" name="amount" value="<?php if($single['type']=="Dr") echo $single['debit']; else echo $single['credit']; ?>" placeholder="Amount" required class="form-control" required id="amount" >
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group pull-left m-l-15 ">
                                                    <button  type="submit" class="btn btn-info"><i class="md md-add m-r-5"></i>Update</button>
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
                                                    <th class="text-center">Ledger Name</th>
                                                    <th class="text-center">Assets,Expenses</th>
                                                    <th class="text-center">Liabilites,Equity,Income</th>
                                                    <th class="text-center status">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="text-center"><strong>Total:</strong></td>
                                                    <td class="debit_balance text-center"></td>
                                                    <td class="credit_balance text-center"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" class="text-right"><strong>Trial Balance:</strong></td>
                                                    <td colspan="2" class="trial_balance text-center"></td>
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
                "paging": true,
                "order":false
            });
        }
       <?php if(!isset($edit)): ?>
            change_company_id();
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
            get_opening_balance();
        });

        function change_branch_id(){
            get_ledger();
        }
        function get_ledger()
        {
            var branch_id=$("#branch_id").val();
            var company_id=$("#company_id").val();
            var url="<?php echo base_url(); ?>ajax/get_ledger_for_mixed";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id,"type":"open_balance"},
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
            get_opening_balance();
        }

        function get_opening_balance()
        {
            var branch_id=$("#branch_id").val();
            var company_id=$("#company_id").val();
            var ledger_id=$("#ledger_id").val();
            var url="<?php echo base_url(); ?>openbalance/get_opening_balance";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id,"branch_id":branch_id,"ledger_id":ledger_id},
                success:function(data){
                    var html = '';
                    $('#datatable').DataTable().destroy();
                     if (data.result_data != '') {
                        $("#datatable tbody").html(data.result_data);
                        $(".debit_balance").text(data.debit_balance);
                        $(".credit_balance").text(data.credit_balance);
                        $(".trial_balance").text(data.debit_balance-data.credit_balance);
                        datatable();
                     } else {
                         html = '<tr><td class="text-center" colspan="5">Not Found.</td></tr>';
                        $("#datatable tbody").html(html);
                        datatable();
                     }
                }
            });
        }

        //submit 
        $("#balance").on("submit",function(e){
            e.preventDefault();
            var url="<?php echo base_url(); ?>openbalance/add";
            $.ajax({
                url:url,
                type:"POST",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="success")
                    {
                        $("#amount").val("");
                        get_opening_balance();
                        $.Notification.autoHideNotify('success', 'top right',"Successfully");
                    }else{
                        $.Notification.autoHideNotify('error', 'top right',"Already Exits!");
                    }
                }
            });
        });

    });
</script>