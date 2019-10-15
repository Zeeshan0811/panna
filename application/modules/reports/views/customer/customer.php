<div class="content">
    <?php $data['msg']="Welcome To Customer Ledger"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <div class="no_print">
            <?php  if(hasPermission("customer_ledger",VIEW)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form id="search_reports">
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
                                                <label for="ledger_id">Ledger Name</label><small class="req"> *</small> 
                                                <select name="ledger_id" id="ledger_id" data-live-search="true" required class="form-control selectpicker">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="start_date">Starting Date</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo date("d-m-Y") ?>" readonly name="start_date" id="start_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="close_date">Closing Date</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo date("d-m-Y") ?>" readonly name="close_date" id="close_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button  type="submit" class="btn btn-primary"><i class="md md-search m-r-5"></i>Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        </div>
        <div id="print_div">
        </div>
    </div> <!-- container -->
</div>
<script src="<?php echo VENDOR_URL; ?>timepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script>
    $('#start_date,#close_date').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            immediateUpdates: true,
            todayBtn: true,
            maxDate : 'now',
            todayHighlight: true
        });
    change_company_id();
     $('#company_id').on('change',function(e){
            e.preventDefault();
            change_company_id();
        });

    $('#branch_id').on('change',function(e){
        e.preventDefault();
        change_branch_id();
    });
    function change_company_id()
    {
        var company_id=$("#company_id").val().split("#")[0];
        var url="<?php echo base_url(); ?>ajax/get_branch_by_company";
        var batch=$.ajax({
            url:url,
            type:"get",
            dataType:"json",
            data:{"company_id":company_id},
            success:function(data){
                $("#branch_id").find('option').remove();
                $("#branch_id").selectpicker("refresh");
                if(data!=''){
                    $.each(data,function(key,value){
                        $("#branch_id").append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                    $("#branch_id").selectpicker('render').selectpicker('refresh');
                }
                change_branch_id(); 
            }
        });
    } 

    function change_branch_id()
    {
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
            data:{"company_id":company_id,"branch_id":branch_id,"type":"received"},
            success:function(data){
                $("#ledger_id").find('option').remove();
                $("#ledger_id").selectpicker("refresh");
                if(data!=''){
                        $("#ledger_id").append('<option value="">--Select--</option>');
                    $.each(data,function(key,value){
                        $("#ledger_id").append('<option value="'+ value.id +'#'+value.name+'">'+ value.name +'</option>');
                    });
                    $("#ledger_id").selectpicker('render').selectpicker('refresh');
                }
            }
        });
    }
    function myStringToDate(str) {
        var arr  = str.split("-"); // split string at slashes to make an array
        var yyyy = arr[2] - 0; // subtraction converts a string to a number
        var jsmm = arr[1] - 1; // subtract 1 because stupid JavaScript month numbering
        var dd   = arr[0] - 0; // subtraction converts a string to a number 
        return new Date(yyyy, jsmm, dd); // this gets you your date
    }
    $("#search_reports").on("submit",function(e){
        e.preventDefault();
        var start_date=myStringToDate($("#start_date").val());
        var close_date=myStringToDate($("#close_date").val());
        if(start_date>close_date)
        {
            alert("Make sure You search Date is Correct!");
        }else{
            var url="<?php echo base_url(); ?>reports/customerreports/customer_reorts";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    $("#print_div").html(data);
                }
            });
        }
    });
</script>