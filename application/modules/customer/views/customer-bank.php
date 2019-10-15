<div class="content">
    <?php $data['msg']="Welcome To Customer Bank Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("customer_bank",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("customer/addBank"); ?>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="bank_name">Bank Name</label><small class="req"> *</small> 
                                                <input type="text" name="bank_name" placeholder="Bank Name" class="form-control" required id="bank_name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
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
        <?php  if(hasPermission("customer_bank",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("customer/editBank/".$single->id); ?>
                                <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="bank_name">Bank Name</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single->name; ?>" name="bank_name" placeholder="Bank Name" class="form-control" required id="bank_name" >
                                                <input type="hidden" name="id" value="<?php echo @$single->id; ?>"  required id="id" >
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
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Bank Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($all_bank)): ?>
                                            <?php foreach($all_bank as $key=>$value):?>
                                                <tr>
                                                    <td class="text-center"><?php echo ++$key; ?></td>
                                                    <td class="text-center"><?php echo $value['name']; ?></td>
                                                    <td class="actions btn-group-xs text-center">
                                                        <?php if (hasPermission("customer_bank", EDIT)) : ?>
                                                            <a title="Edit" href="<?php echo site_url("customer/editBank/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (hasPermission("customer_bank", DELETE)) : ?>
                                                            <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("customer/deleteBank/" . $value['id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
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
    });
</script>