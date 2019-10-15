<div class="content">
    <?php $data['msg']="Welcome To Main Head"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("main_head",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-group" id="accordion-test-2">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> 
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" aria-expanded="false" class="collapsed">
                                        Add Main Head
                                        </a> 
                                    </h4> 
                                </div>
                                <div id="collapseOne-2" class="panel-collapse collapse in"> 
                                    <div class="panel-body">
                                        <form id="main_head">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="acc_type">Account Type</label><small class="req"> *</small> 
                                                        <select name="acc_type" required class="form-control selectpicker" id="acc_type">
                                                            <?php foreach($all_type as $key=>$value): ?>
                                                                <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="name">Head Name</label><small class="req"> *</small> 
                                                        <input type="text" name="name" placeholder="Main Head Name" class="form-control" required id="name" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group pull-left m-t-22 m-l-15 ">
                                                        <button  type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div>
                            </div> <!-- panel -->
                        </div>
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>
        <?php  if(hasPermission("main_head",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-group" id="accordion-test-2">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title"> 
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" aria-expanded="false" class="collapsed">
                                        Edit Main Head
                                        </a> 
                                    </h4> 
                                </div>
                                <div id="collapseOne-2" class="panel-collapse collapse in"> 
                                    <div class="panel-body">
                                        <!-- <form id="find"> -->
                                        <?php echo form_open("mainhead/edit/".$single->id); ?>
                                        <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="acc_type">Account Type</label><small class="req"> *</small> 
                                                        <select name="acc_type" required class="form-control selectpicker" id="acc_type">
                                                            <?php foreach($all_type as $key=>$value): ?>
                                                                <option <?php if($value['id']==$single->acc_type) echo "selected"; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="name">Head Name</label><small class="req"> *</small> 
                                                        <input type="text" value="<?php echo @$single->name; ?>" name="name" placeholder="Main Head Name" class="form-control" required id="name" >
                                                        <input type="hidden" name="id" value="<?php echo @$single->id; ?>"  required id="id" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group pull-left m-t-22 m-l-15 ">
                                                        <button name="edit_company" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div> <!-- panel-body -->
                                </div>
                            </div> <!-- panel -->
                        </div>
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="panel-group" id="accordion-test-3">
                <div class="col-md-12">
                    <div class="panel panel-border panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title"> 
                                <a data-toggle="collapse" data-parent="#accordion-test-3" href="#collapseOne-3" aria-expanded="false" class="collapsed">
                                All Main Head
                                </a> 
                            </h4> 
                        </div>
                        <div id="collapseOne-3" class="panel-collapse collapse in"> 
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">SL.</th>
                                                        <th class="text-center">Account Type</th>
                                                        <th class="text-center">Main ID</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php if(isset($all_head)): ?>
                                                    <?php foreach($all_head as $key=>$value):?>
                                                        <tr>
                                                            <td class="text-center"><?php echo ++$key; ?></td>
                                                            <td class="text-center"><?php echo strtoupper($value['type_name']); ?></td>
                                                            <td class="text-center"><?php echo $value['id']; ?></td>
                                                            <td class="text-center"><?php echo $value['name']; ?></td>
                                                            <td class="actions btn-group-xs text-center">
                                                                <?php if (hasPermission("main_head", EDIT)) : ?>
                                                                    <a title="Edit" href="<?php echo site_url("mainhead/edit/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                                                <?php endif; ?>
                                                                <?php if (hasPermission("main_head", DELETE)) : ?>
                                                                    <a href="<?php echo site_url("mainhead/delete/" . $value['id']); ?>" onclick="return confirm('Are You sure want to delete this?')" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id=""><i class="fa fa-trash"></i></a>
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
                </div>
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function(){
       $('#datatable').dataTable({
           "info":false,
           "autoWidth": false
       });

       $('#acc_type').on('change',function(e){
            e.preventDefault();
            var acc_type=$(this).val();
            var url="<?php echo base_url(); ?>ajax/get_main_head_by_type";
            $.ajax({
                url:url,
                type:"post",
                data:{"acc_type":acc_type,"msg":"mainhead"},
                success:function(data){
                    var html = '';
                    $('#datatable').DataTable().destroy();
                     if (data != '') {
                        $("#datatable tbody").html(data);
                        $('#datatable').DataTable().draw();
                     } else {
                         html = '<tr><td class="text-center" colspan="5">Not Found.</td></tr>';
                        $("#datatable tbody").html(html);
                        $('#datatable').DataTable().draw();
                     }
                }
            });
        });

        $('#main_head').on('submit',function(e){
            e.preventDefault();
            var url="<?php echo base_url(); ?>mainhead/add";
            $.ajax({
                url:url,
                type:"post",
                data:$(this).serialize(),
                success:function(data){
                    if(data!="Error")
                    {
                        var html = '';
                        $('#datatable').DataTable().destroy();
                        if (data != '') {
                            $("#datatable tbody").html(data);
                            $('#datatable').DataTable().draw();
                        } else {
                            html = '<tr><td class="text-center" colspan="5">Not Found.</td></tr>';
                                $("#datatable tbody").html(html);
                                $('#datatable').DataTable().draw();
                        }
                        $.Notification.autoHideNotify('success', 'top right', 'Main Head Add Successfully');
                    }else{
                        $.Notification.autoHideNotify('error', 'top right', 'Name Already Exits');
                    }
                     $("#name").val("");
                }
            });
        });
    });
</script>