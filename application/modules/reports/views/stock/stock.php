<div class="content">
    <?php $data['msg']="Welcome To Stock Reports"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <div class="no_print">
            <?php  if(hasPermission("stock_details",VIEW)): ?>
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
                                                <label for="item_id">Item</label><small class="req"> *</small> 
                                                <select name="item_id" data-live-search="true" id="item_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc_id">Item Desc.</label>
                                                <select name="item_desc_id" data-live-search="true" id="item_desc_id" class="form-control selectpicker">
                                                    <option value="">--Select--</option>
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
    function get_item()
    {
        var company_id=$("#company_id").val();
        var url="<?php echo base_url(); ?>ajax/get_all_item";
        $.ajax({
            url:url,
            type:"get",
            dataType:"json",
            data:{"status":1,"company_id":company_id},
            success:function(data){
                replace_item(data.result_data);
            }
        });
    }
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
                get_item_desc();
            }
        });
    } 

    function change_branch_id()
    {
        var branch_id=$("#branch_id").val().split("#")[0];
        var url="<?php echo base_url(); ?>ajax/get_customer_by_branch";
        $.ajax({
            url:url,
            type:"get",
            dataType:"json",
            data:{"branch_id":branch_id},
            success:function(data){
                get_item_desc();
            }
        });
        get_item();
    }
    function get_item_desc()
    {
        var company_id=$("#company_id").val();
        var branch_id=$("#branch_id").val();
        var url="<?php echo base_url(); ?>ajax/get_item_description_list";
        $.ajax({
            url:url,
            type:"get",
            dataType:"json",
            data:{
                "company_id":company_id,
                "branch_id":branch_id
            },
            success:function(data){
                replace_item_code_and_item_desc(data.result_data);
            }
        });
    }
    function replace_item_code_and_item_desc(data)
    {
        $("#item_desc_id").find('option').remove();
        $("#item_desc_id").selectpicker("refresh");
        if(data!=''){
            $("#item_desc_id").append('<option value="">--Select--</option>');
            $.each(data,function(key,value){
                $("#item_desc_id").append('<option value="'+ value.id +'#'+value.item_desc+'">'+ value.item_desc +'</option>')
            });
            $("#item_desc_id").selectpicker('render').selectpicker('refresh');
        }
    }
    $('#item_id').on('change',function(e){
        e.preventDefault();
        var item_id=$(this).val().split("#")[0];
        var company_id=$("#company_id").val();
        var branch_id=$("#branch_id").val();
        var url="<?php echo base_url(); ?>ajax/get_item_description";
        var item=$.ajax({
            url:url,
            type:"get",
            dataType:"json",
            data:{"item_id":item_id,"company_id":company_id,"branch_id":branch_id},
            success:function(data){
                replace_item_code_and_item_desc(data.result_data);
            }
        });
    });

    ///item_desc_id
    $('#item_desc_id').on('change',function(e){
        e.preventDefault();
        var item_desc_id=$(this).val().split("#")[0];
        var company_id=$("#company_id").val();
        var branch_id=$("#branch_id").val();
        var url="<?php echo base_url(); ?>ajax/get_single_item_description";
        var data={
                "item_desc_id":item_desc_id,
                "company_id":company_id,
                "branch_id":branch_id,
                "msg":"id",
            };
        $.ajax({
            url:url,
            type:"get",
            dataType:"json",
            data:data,
            success:function(data){
                if(data.msg=="id")
                {
                    $("#price").val("");
                    $("#item_id").find('option').remove();
                    $("#item_id").selectpicker("refresh");
                    if(data.result_data!=''){
                        $("#item_id").append('<option value="'+ data.result_data.item_id +'#'+data.result_data.name+'">'+ data.result_data.name +'</option>')
                        $("#item_id").selectpicker('render').selectpicker('refresh');
                    }else{
                        replace_item(data.item_list);
                    }
                }
                else if(data.msg=="all")
                { 
                    replace_item_code_and_item_desc(data.result_data);
                    replace_item(data.item_list);
                }
            }
        });

    });
    function replace_item(data)
    {
        $("#item_id").find('option').remove();
        $("#item_id").selectpicker("refresh");
        if(data!=''){
            $("#item_id").append('<option value="">--Select--</option>');
            $.each(data,function(key,value){
                $("#item_id").append('<option value="'+ value.id +'#'+value.name+'">'+ value.name +'</option>')
            });
            $("#item_id").selectpicker('render').selectpicker('refresh');
        }

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
            var url="<?php echo base_url(); ?>reports/stockreports/stock_reorts";
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