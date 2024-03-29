<div class="content">
    <?php $data['msg'] = "Welcome To Unit Setup"; ?>
    <?php $this->load->view("message", $data) ?>
    <div class="container">
        <?php if (hasPermission("unit", ADD)) : ?>
            <?php if (isset($add)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("unit/add"); ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Unit Name</label><small class="req"> *</small>
                                            <input type="text" name="name" placeholder="Unit Name" class="form-control" required id="name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group pull-left m-t-22 m-l-15 ">
                                            <button type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php if (hasPermission("unit", EDIT)) : ?>
            <?php if (isset($edit)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("unit/edit/" . $single->id); ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Unit Name</label><small class="req"> *</small>
                                            <input type="text" value="<?php echo @$single->name; ?>" name="name" placeholder="Unit Name" class="form-control" required id="name">
                                            <input type="hidden" name="id" value="<?php echo @$single->id; ?>" required id="id">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group pull-left m-t-22 m-l-15 ">
                                            <button name="edit_company" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Submit</button>
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
                                                <th class="text-center">Unit Name</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($all_unit)) : ?>
                                                <?php foreach ($all_unit as $key => $value) : ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo ++$key; ?></td>
                                                        <td class="text-center"><?php echo $value['name']; ?></td>
                                                        <td class="actions btn-group-xs text-center">
                                                            <?php if (hasPermission("unit", EDIT)) : ?>
                                                                <a title="Edit" href="<?php echo site_url("unit/edit/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                                            <?php endif; ?>
                                                            <?php if (hasPermission("unit", DELETE)) : ?>
                                                                <a href="<?php echo site_url("unit/delete/" . $value['id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips deleteRow" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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
    $(document).ready(function() {
        $('#datatable').dataTable({
            "info": false,
            "autoWidth": false
        });
    });
</script>

<script>
    $(document).on("click", ".deleteRow", function(e) {
        e.preventDefault();
        // debugger;
        var element = $(this);
        var confirmation = confirm('Are You sure want to delete this?');
        var url = element.attr('href');

        if (confirmation != true) {
            return false;
        } else {
            $.ajax({
                url: url,
                cache: false,
                success: function(data) {
                    if (data == 1) {
                        element.closest('tr').remove();
                    } else if (data == 3) {
                        alert('Warning! Permission Denied.');
                    } else {
                        alert('Danger! Can\'t Delete this.');
                    }
                    console.log(data);
                }
            });
        }
    });
</script>