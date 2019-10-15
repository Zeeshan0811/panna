<div class="content">
    <?php $data['msg']="Welcome To Item Description"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("item_description",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <?php echo form_open("itemdescription/add"); ?>
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
                                                    <select required name="item_id" data-live-search="true" id="item_id"  class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if(isset($all_item)): ?>
                                                            <?php foreach($all_item as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="item_desc">Item Description</label><small class="req"> *</small> 
                                                    <input type="text" value="" name="item_desc" class="form-control" id="item_desc" required placeholder="Item Description" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="code">Description Code</label><small class="req"> *</small> 
                                                    <input type="text" value="<?php echo @$code ?>" readonly name="code" class="form-control" id="code" required placeholder="Description Code" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="re_qty">Reorder Qty</label><small class="req"> *</small> 
                                                    <input type="text" value="" name="re_qty" class="form-control" id="re_qty" required placeholder="Reorder Qty" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="purchase_price">Purchase Price</label><small class="req"> *</small> 
                                                    <input type="text" value="" name="purchase_price" class="form-control" id="purchase_price" required placeholder="Purchase Price" >
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="sale_price">Sale Price</label><small class="req"> *</small> 
                                                    <input type="text" value="" name="sale_price" class="form-control" id="sale_price" required placeholder="Sale Price" >
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group pull-left m-t-22 m-l-15 ">
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
        <?php  if(hasPermission("item_description",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("item/itemdescription/edit/".$single['desc_id']); ?>
                                <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option <?php if($value['id']==$single['company_id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    <option value="<?php echo @$single['branch_id']; ?>"><?php echo @$single['branch_name']; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_id">Item</label><small class="req"> *</small> 
                                                <select required name="item_id" data-live-search="true" id="item_id"  class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_item)): ?>
                                                        <?php foreach($all_item as $value): ?>
                                                            <option <?php if($value['id']==$single['item_id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc">Item Description</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['item_desc'] ?>" name="item_desc" class="form-control" id="item_desc" required placeholder="Item Description" >
                                                <input type="hidden" value="<?php echo @$single['desc_id'] ?>" name="id" id="id" required >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="code">Description Code</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['code'] ?>" readonly name="code" class="form-control" id="code" required placeholder="Description Code" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="re_qty">Reorder Qty</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['re_qty'] ?>" name="re_qty" class="form-control" id="re_qty" required placeholder="Reorder Qty" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="purchase_price">Purchase Price</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['purchase_price'] ?>" name="purchase_price" class="form-control" id="purchase_price" required placeholder="Purchase Price" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="sale_price">Sale Price</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['sale_price'] ?>" name="sale_price" class="form-control" id="sale_price" required placeholder="Sale Price" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button name="" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Submit</button>
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
                                                <th class="text-center">Code</th>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Branch Name</th>
                                                <th class="text-center">Item Name</th>
                                                <th class="text-center">Item Description</th>
                                                <th class="text-center">P.Price</th>
                                                <th class="text-center">Re.Qty</th>
                                                <th class="text-center">S.Price</th>
                                                <th class="text-center">Action</th>
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
<script>
    $(document).ready(function(){
        function datatable()
        {
            $('#datatable').dataTable({
                "info":false,
                "autoWidth": false,
                "order": [[ 0, "desc" ]],
            });

        }
       <?php if(!isset($edit)): ?>
            change_company_id();
        <?php endif;?>
        function get_custom_code() {
            var company_id=$("#company_id").val();
            var code="<?= @$single['code'] ?>";
            var editCompany_id="<?= @$single['company_id'] ?>";
            if(editCompany_id!=company_id)
            {
                var url="<?php echo base_url(); ?>item/itemdescription/get_custom_code";
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
                        change_branch_id();
                    }
                }
            });
        }
        function change_branch_id()
        {
            var company_id=$("#company_id").val();
            var branch_id=$("#branch_id").val();
            $.ajax({
                url:"<?php echo base_url() ?>item/itemdescription/view",
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
            change_branch_id();
        });
    });
</script>   