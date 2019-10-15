<div class="content">
    <?php $data['msg']="Welcome To Item Name Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("item_name",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("item/add"); ?>
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
                                                <label for="name">Item Name</label><small class="req"> *</small> 
                                                <input type="text" name="name" placeholder="Item Name" class="form-control" required id="name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="old_unit_id">Unit</label><small class="req"> *</small> 
                                                <span id="new_unit_add" class="btn btn-xs btn-info"><i class="md md-add"></i></span>
                                                <div class="old_unit" >
                                                    <select  name="old_unit_id" data-live-search="true" id="old_unit_id"  class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if(isset($all_unit)): ?>
                                                            <?php foreach($all_unit as $value): ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                                <div style="display:none;" class="new_unit">
                                                    <input type="text" name="new_unit_id" placeholder="Unit Name" class="form-control"  id="new_unit_id" >
                                                </div>
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
        <?php  if(hasPermission("item_name",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("item/edit/".$single['item_id']); ?>
                                <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option <?php if($value['id']==$single['company_id']) echo "selected" ?>  value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Item Name</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single['item_name']; ?>" name="name" placeholder="Unit Name" class="form-control" required id="name" >
                                                <input type="hidden" name="id" value="<?php echo @$single['item_id']; ?>"  required id="id" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="old_unit_id">Unit</label><small class="req"> *</small>  
                                                <span id="new_unit_add" class="btn btn-xs btn-info"><i class="md md-add"></i></span>
                                                <div class="old_unit" >
                                                    <select name="old_unit_id" data-live-search="true" id="old_unit_id" required class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if(isset($all_unit)): ?>
                                                            <?php foreach($all_unit as $value): ?>
                                                                <option <?php if($single['unit_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                                <div style="display:none;" class="new_unit">
                                                    <input type="text" name="new_unit_id" placeholder="Unit Name" class="form-control"  id="new_unit_id" >
                                                </div>
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
                                                <th class="text-center">#</th>
                                                <th class="text-center">Company Name</th>
                                                <th class="text-center">Item Name</th>
                                                <th class="text-center">Unit</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($all_item)): ?>
                                            <?php foreach($all_item as $key=>$value):?>
                                                <tr>
                                                    <td class="text-center"><?php echo ++$key; ?></td>
                                                    <td class="text-center"><?php echo $value['company_name']; ?></td>
                                                    <td class="text-center"><?php echo $value['item_name']; ?></td>
                                                    <td class="text-center"><?php echo $value['unit']; ?></td>
                                                    <td class="actions btn-group-xs text-center">
                                                        <?php if (hasPermission("item_name", EDIT)) : ?>
                                                            <a title="Edit" href="<?php echo site_url("item/edit/" . $value['item_id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (hasPermission("item_name", DELETE)) : ?>
                                                            <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("item/delete/" . $value['item_id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
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
       $('#datatable').dataTable({
           "info":false,
           "autoWidth": false
       });
       $("#new_unit_add").on("click",function(){
            $('.selectpicker').selectpicker('val', '');
            $(".new_unit").toggle();
            $(".new_unit #new_unit_id").val("");
            $(".old_unit").toggle();
       });
    });
</script>   