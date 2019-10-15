<div class="content">
    <?php $data['msg']="Welcome To Purchase Return"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("purchase_return",ADD)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form id="temp_stock_form" class="temp_stock_form">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="invoice_no">Invoice No.</label><small class="req"> *</small> 
                                                <input type="text" name="invoice_no"  class="form-control" required id="invoice_no" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="supplier_id">Supplier</label><small class="req"> *</small> 
                                                <select name="supplier_id" id="supplier_id" data-live-search="true" required class="form-control selectpicker">
                                                    <option value="">--Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="date">Date</label><small class="req"> *</small> 
                                                <input type="text" readonly name="date" value="<?php echo date("d-m-Y") ?>" id="date" class="form-control">
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
                                                <label for="item_desc_id">Item Desc.</label><small class="req"> *</small> 
                                                <select name="item_desc_id" data-live-search="true" id="item_desc_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc_code">Desc. Code</label><small class="req"> *</small> 
                                                <input type="text" name="item_desc_code" id="item_desc_code" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="price">Price</label><small class="req"> *</small> 
                                                <input type="text" readonly name="price" placeholder="Price" class="form-control" required id="price" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="qty">Qty</label><small class="req"> *</small> 
                                                <input type="text" name="qty" placeholder="Qty" class="form-control" required id="qty" >
                                                <input type="hidden" name="pre_qty"  required id="pre_qty" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="unit">Unit</label><small class="req"> *</small> 
                                                <input type="text" name="unit" placeholder="Unit" readonly class="form-control" required id="unit" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left m-t-22 ">
                                                <button name="" type="submit" class="btn btn-primary "><i class="md md-add m-r-5"></i>Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <form id="final_submit">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="table-responsive">
                                                                <table id="tem_data" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center">No.</th>
                                                                            <th class="text-center">Items</th>
                                                                            <th class="text-center">Description</th>
                                                                            <th class="text-center">Unit</th>
                                                                            <th class="text-center">Qty</th>
                                                                            <th class="text-center">Price</th>
                                                                            <th class="text-center">Sub Total</th>
                                                                            <th class="text-center">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>Total:</td>
                                                                            <td class="text-center"><span id="total_qty">0</span></td>
                                                                            <td></td>
                                                                            <td class="text-center"><span id="total_sub_total">0.00</span></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ol-md-12 col-sm-12 col-xs-12">
                                                        <button type="submit" class="btn btn-info btn-xs pull-right">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End Row -->
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
        <?php endif; ?>
    </div> <!-- container -->
</div>


<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>timepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>

<script>
    $(document).ready(function(){
        $body = $("body");
         /**
         * ========= start datepicker
         */

        $('#date').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            immediateUpdates: true,
            todayBtn: true,
            todayHighlight: true
        });
         /**
         * ========= start main form  part
         */
        $("#invoice_no").on("change",function(e){
            e.preventDefault();
            get_item();
            get_item_desc();
            get_supplier();
        });

        function get_item()
        {
            var invoice_no=$("#invoice_no").val();
            var url="<?php echo base_url(); ?>ajax/get_all_item";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"status":1,"invoice_no":invoice_no,"purchase_return":"purchase_return"},
                success:function(data){
                    replace_item(data.result_data);
                }
            });
        }

        function get_item_desc()
        {
            var invoice_no=$("#invoice_no").val();
            var url="<?php echo base_url(); ?>ajax/get_item_description_list";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{
                    "invoice_no":invoice_no,
                    "purchase_return":"purchase_return"
                },
                success:function(data){
                    replace_item_code_and_item_desc(data.result_data);
                }
            });
        }
        function get_supplier(){
            var invoice_no=$("#invoice_no").val();
            var url="<?php echo base_url(); ?>ajax/get_supplier_by_invoice";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{
                    "invoice_no":invoice_no,
                    "purchase_return":"purchase_return"
                },
                success:function(data){
                    $("#temp_stock_form #supplier_id").find('option').remove();
                    $("#temp_stock_form #supplier_id").selectpicker("refresh");
                    if(data!=''){
                        $("#temp_stock_form #supplier_id").append('<option value="'+ data.id +'#'+data.name+'">'+ data.name +'</option>')
                        $("#temp_stock_form #supplier_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }
        $('#item_id').on('change',function(e){
            e.preventDefault();
            var item_id=$(this).val().split("#")[0];
            var invoice_no=$("#invoice_no").val();
            var url="<?php echo base_url(); ?>ajax/get_item_description";
            var item=$.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"item_id":item_id,"invoice_no":invoice_no,"purchase_return":"purchase_return"},
                success:function(data){
                    replace_item_code_and_item_desc(data.result_data);
                }
            });
            //unit
            var url2="<?php echo base_url(); ?>ajax/get_item_unit";
           var unit= $.ajax({
                url:url2,
                type:"get",
                dataType:"json",
                data:{"item_id":item_id},
                success:function(data){
                    $("#unit").val("");
                    if(data!=null)
                    {
                        $("#unit").val(data.name);
                    }
                }
            });
        });

        ///item_desc_id
        $('#item_desc_id').on('change',function(e){
            e.preventDefault();
            var item_desc_id=$(this).val().split("#")[0];
            var invoice_no=$("#invoice_no").val();
            var url="<?php echo base_url(); ?>ajax/get_single_item_description";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:
                {
                    "item_desc_id":item_desc_id,
                    "invoice_no":invoice_no,
                    "purchase_return":"purchase_return",
                    "msg":"id",
                },
                success:function(data){
                    if(data.msg=="id")
                    {
                        $("#price").val("");
                        $("#item_id").find('option').remove();
                        $("#item_id").selectpicker("refresh");
                        if(data.result_data!=''){
                            $("#price").val(data.result_data.purchase_price);
                            $("#qty").val(data.result_data.qty);
                            $("#pre_qty").val(data.result_data.qty);
                            $("#unit").val(data.result_data.unit_name);
                            $("#item_desc_code").val(data.result_data.code);
                            $("#item_id").append('<option value="'+ data.result_data.item_id +'#'+data.result_data.name+'">'+ data.result_data.name +'</option>')
                            $("#item_id").selectpicker('render').selectpicker('refresh');
                        }else{
                            $("#price").val('');
                            $("#qty").val('');
                            $("#pre_qty").val('');
                            $("#unit").val('');
                            replace_item(data.item_list);
                        }
                    }
                    else if(data.msg=="all")
                    { 
                        $("#price").val('');
                        $("#qty").val('');
                        $("#pre_qty").val('');
                        $("#unit").val('');
                        replace_item_code_and_item_desc(data.result_data);
                        replace_item(data.item_list);
                    }
                }
            });
        });

        //item_desc_code
        $('#item_desc_code').on(' change',function(e){
            e.preventDefault();
            var item_desc_code=$(this).val();
            var invoice_no=$("#invoice_no").val();
            var url="<?php echo base_url(); ?>ajax/get_single_item_description";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:
                {
                    "item_desc_code":item_desc_code,
                    "invoice_no":invoice_no,
                    "purchase_return":"purchase_return",
                    "msg":"code",
                },
                success:function(data){
                    if(data.msg=="code")
                    {
                        $("#price").val('');
                        $("#item_id").find('option').remove();
                        $("#item_id").selectpicker("refresh");
                        $("#item_desc_id").find('option').remove();
                        $("#item_desc_id").selectpicker("refresh");
                        if(data.result_data!=null){
                            $("#price").val(data.result_data.purchase_price);
                            $("#qty").val(data.result_data.qty);
                            $("#pre_qty").val(data.result_data.qty);
                            $("#unit").val(data.result_data.unit_name);
                            $("#item_desc_id").append('<option value="'+ data.result_data.item_desc_id +'#'+data.result_data.item_desc+'">'+ data.result_data.item_desc +'</option>')
                            $("#item_desc_id").selectpicker('render').selectpicker('refresh');
                            $("#item_id").append('<option value="'+ data.result_data.item_id +'#'+data.result_data.name+'">'+ data.result_data.name +'</option>')
                            $("#item_id").selectpicker('render').selectpicker('refresh');
                        }else{
                            $("#price").val('');
                            $("#qty").val('');
                            $("#pre_qty").val('');
                            $("#unit").val('');
                            replace_item(data.item_list);
                        }
                    }
                    else if(data.msg=="all")
                    {
                        $("#price").val('');
                        $("#qty").val('');
                        $("#pre_qty").val('');
                        $("#unit").val('');
                        replace_item_code_and_item_desc(data.result_data);
                        replace_item(data.item_list);
                    }
                }
            });
        });
        //quentity change
        $("#qty").on("change",function(e){
            var qty=parseInt($(this).val());
            var pre_qty=parseInt($("#pre_qty").val());
            if(isNaN(pre_qty))
            {
                pre_qty=0;
            }
            if(isNaN(qty))
            {
                qty=0;
            }
            if(qty>pre_qty || qty<0 )
            {
                $(this).val(pre_qty);
            }
            $(this).select();
        });

        function replace_item_code_and_item_desc(data)
        {
            $("#item_desc_code").val('');
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
        function reset_some_value()
        {
            $('#temp_stock_form #item_id').selectpicker('val', '');
            $("#temp_stock_form #item_id").selectpicker("refresh");
            $("#item_desc_code").val("");
            $("#item_desc_id").find('option').remove();
            $("#item_desc_id").selectpicker("refresh");
        }

        //stock form save temporary

        var store_data=[];
        var invoice_data=[];
        //tem submit
        $(".temp_stock_form").on("submit",function(e){
            e.preventDefault();
            var invoice_no=$("#invoice_no").val();
            invoice_data.push(invoice_no);
            if(!allEqual(invoice_data))
            {
                $.Notification.autoHideNotify('error', 'top right',"Keep Invoice Same");
                removeInvoice(invoice_data,invoice_no);
                return;
            }
            var supplier=$("#temp_stock_form #supplier_id").val().split("#");
            var supplier_id=supplier[0];
            var supplier_name=supplier[1];

            var item=$("#temp_stock_form #item_id").val().split("#");
            var item_id=item[0];
            var item_name=item[1];

            var item_desc=$("#temp_stock_form #item_desc_id").val().split("#");
            var item_desc_id=item_desc[0];
            var item_desc_name=item_desc[1];
            
            var date=$("#date").val();  
            var price=$("#price").val();  
            var qty=$("#qty").val();
            var unit=$("#unit").val();

            var  single_input_data={
                supplier_id:supplier_id,
                supplier_name:supplier_name,
                item_id:item_id,
                item_name:item_name,
                date:date,
                item_desc_id:item_desc_id,
                item_desc_name:item_desc_name,
                price:price,
                qty:qty,
                unit:unit,
                invoice_no:invoice_no,
            };
            if(!useritem(store_data,item_desc_id))
            {
                store_data.push(single_input_data);
                calculate_multiple_value();
            }else{
                alert(item_desc_name+" Already Add");   
            }
            function useritem(array,item_desc_id) {
                return array.some(function(el) {
                    return el.item_desc_id === item_desc_id;
                }); 
            }
        
            $('#tem_data tbody').find("tr").remove();
            $.each(store_data,function(key,value){
                html = '<tr id="'+value.item_desc_id+'">' +
                    '<td class="text-center">'+(++key)+'</td>' +
                    '<input type="hidden" name="supplier_id[]" value="'+value.supplier_id+'" >'+
                    '<input type="hidden" name="date[]" value="'+value.date+'" >'+
                    '<input type="hidden" name="item_id[]" value="'+value.item_id+'" >'+
                    '<input type="hidden" name="item_desc_id[]" value="'+value.item_desc_id+'" >'+
                    '<input type="hidden" name="price[]" value="'+value.price+'" >'+
                    '<input type="hidden" name="qty[]" value="'+value.qty+'" >'+
                    '<input type="hidden" name="sub_total[]" value="'+value.price*value.qty+'" >'+
                    '<input type="hidden" name="invoice_no" value="'+value.invoice_no+'" >'+
                    '</td>' +
                    '<td class="text-center">' + value.item_name + '</td>' +
                    '<td class="text-center">' + value.item_desc_name + '</td>' +
                    '<td class="text-center">' + value.unit + '</td>' +
                    '<td class="text-center">' + value.qty + '</td>' +
                    '<td class="text-center">' + value.price + '</td>' +
                    '<td class="text-center">' + (value.price*value.qty) + '</td>' +
                    '<td class="text-center text-danger"><button  type="button" class="temp_delete btn btn-danger btn-xs">Delete</button></td>' +
                    '</tr>';
                    $("#tem_data tbody").append(html);
                });
        });

        $("#tem_data").on("click",".temp_delete",function(){
            if(confirm("Are You sure?"))
            {
                var id=$(this).parent().closest('tr').attr("id");
                $(this).parent().closest('tr').remove();
                removeItem(store_data,id);
                calculate_multiple_value();
            }
        });
        //removeItem
        function removeItem(array, item){
            for(var i = 0; i <= array.length - 1; i++){
                if(array[i].item_desc_id == item){
                    array.splice(i,1);
                }
            }
        }
        function allEqual(arr) {
            return new Set(arr).size == 1;
        }
        function removeInvoice(array, id){
            var index = array.indexOf(id);
            if (index > -1) {
                array.splice(index, 1);
            }
        }
        /**
        *=========================
        *       account calculation
        *=========================
         */
         
        //calculate_multiple_value
        function calculate_multiple_value()
        {
            if(store_data.length<=0)
            {
                invoice_data=[];
            }
            var total_qty=0;
            var total_sub_total=0.00;
            $.each(store_data,function(key,value){
                total_qty+=parseInt(value.qty);
                total_sub_total+=(value.price*value.qty);
            });
            $("#total_qty").text(total_qty);
            $("#total_sub_total").text(total_sub_total);
        }
        //final_submit

        $("#final_submit").on("submit",function(e){
            e.preventDefault();
            if(store_data.length>0)
            {
                var supplier_id=$("#temp_stock_form #supplier_id").val().split("#")[0];
                var url="<?php echo base_url(); ?>purchase/purchase_return";
                $.ajax({
                    url:url,
                    type:"post",
                    dataType:"json",
                    data:$(this).serialize(),
                    success:function(data){
                        if(data.msg=="success")
                        {
                            $.Notification.autoHideNotify('success', 'top right',"Item Return Successfully");
                            $('#tem_data tbody').find("tr").remove();
                            document.getElementById("final_submit").reset();
                            store_data=[];
                            invoice_data=[];
                            $("#total_qty").text("0");
                            $("#total_sub_total").text("0.00");
                            get_stock(supplier_id);

                        }else if(data.msg=="error"){
                            $.Notification.autoHideNotify('error', 'top right',"Something Worng!");
                        }
                        else{
                            $.Notification.autoHideNotify('error', 'top right',data.msg+" this invoice already exits.");
                        }
                    }
                });
            }
            else{
                alert("Please Add Item First");
            }
        });

        function get_stock(supplier_id)
        {
            var url="<?php echo base_url(); ?>purchase/view";
            $.ajax({
                url:url,
                type:"get",
                data:{"supplier_id":supplier_id},
                success:function(data){
                    var html = '';
                    $("#datatable tbody").find("tr").remove();
                    // $('#datatable').DataTable().destroy();
                     if (data != '') {
                        $("#datatable tbody").html(data);
                        // $('#datatable').DataTable().draw();
                     } else {
                         html = '<tr><td class="text-center" colspan="5">Not Found.</td></tr>';
                            $("#datatable tbody").html(html);
                            // $('#datatable').DataTable().draw();
                     }  
                }
            });
        }
         /**
         * ========= end main form  part
         */
      
    });
</script>