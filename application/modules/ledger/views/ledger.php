<div class="content">
    <?php $data['msg'] = "Welcome To Ledger"; ?>
    <?php $this->load->view("message", $data) ?>
    <div class="container">
        <?php if (hasPermission("ledger", ADD)) : ?>
            <?php if (isset($add)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel-group" id="accordion-test-2">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test-2" href="#collapseOne-2" aria-expanded="false" class="collapsed">
                                            Add Ledger
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne-2" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <form id="ledger_form">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="company_id">Company Name</label><small class="req"> *</small>
                                                        <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                            <?php if (isset($all_company)) : ?>
                                                                <?php foreach ($all_company as $value) : ?>
                                                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
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
                                                        <label for="g_acc_type">Account Type</label><small class="req"> *</small>
                                                        <select name="acc_type" required class="form-control selectpicker" id="g_acc_type">
                                                            <?php foreach ($all_type as $key => $value) : ?>
                                                                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="head_id">Main Head Name</label><small class="req"> *</small>
                                                        <div class="input-group">
                                                            <select name="head_id" data-live-search="true" required class="form-control selectpicker" id="head_id">
                                                                <option value="">--Select</option>
                                                                <?php if (isset($all_head_list)) : ?>
                                                                    <?php foreach ($all_head_list as $key => $value) : ?>
                                                                        <option value="<?php echo $value['id']; ?>#<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal" type="button">
                                                                    <i class="md md-add"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="name">Ledger Name</label><small class="req"> *</small>
                                                        <input type="text" name="name" placeholder="Ledger Name" class="form-control" required id="name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="form-group pull-left m-t-22 m-l-15 ">
                                                        <button type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php if (hasPermission("ledger", EDIT)) : ?>
            <?php if (isset($edit)) : ?>
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
                                        <?php echo form_open("ledger/edit/" . $single_ledger->id); ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="company_id">Company Name</label><small class="req"> *</small>
                                                    <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                        <?php if (isset($all_company)) : ?>
                                                            <?php foreach ($all_company as $value) : ?>
                                                                <option <?php if ($value['id'] == $single_ledger->company_id) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="branch_id">Branch Name</label><small class="req"> *</small>
                                                    <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                        <?php if (isset($all_branch)) : ?>
                                                            <?php foreach ($all_branch as $value) : ?>
                                                                <option <?php if ($value['id'] == $single_ledger->branch_id) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="g_acc_type">Account Type</label><small class="req"> *</small>
                                                    <select name="acc_type" required class="form-control selectpicker" id="g_acc_type">
                                                        <?php foreach ($all_type as $key => $value) : ?>
                                                            <option <?php if ($value['id'] == $single_ledger->acc_type) echo "selected"; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="head_id">Main Head Name</label><small class="req"> *</small>
                                                    <div class="input-group">
                                                        <select name="head_id" data-live-search="true" required class="form-control selectpicker" id="head_id">
                                                            <option value="">--Select</option>
                                                            <?php if (isset($all_head)) ?>
                                                            <?php foreach ($all_head as $key => $value) : ?>
                                                                <option <?php if ($value['id'] == $single_ledger->head_id) echo "selected"; ?> value="<?php echo $value['id']; ?>#<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal" type="button">
                                                                <i class="md md-add"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="name">Ledger Name</label><small class="req"> *</small>
                                                    <input type="text" value="<?php echo $single_ledger->name; ?>" name="name" placeholder="Ledger Name" class="form-control" required id="name">
                                                    <input type="hidden" value="<?php echo $single_ledger->id; ?>" name="id" required id="id">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group pull-left m-t-22 m-l-15 ">
                                                    <button type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
                                                        <th class="text-center">Main Head</th>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Ledger Name</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (isset($all_ledger)) : ?>
                                                        <?php foreach ($all_ledger as $key => $value) : ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo ++$key; ?></td>
                                                                <td class="text-center"><?php echo strtoupper($value['head_name']); ?></td>
                                                                <td class="text-center"><?php echo $value['id']; ?></td>
                                                                <td class="text-center"><?php echo $value['name']; ?></td>
                                                                <td class="actions btn-group-xs text-center">
                                                                    <?php if (hasPermission("ledger", EDIT)) : ?>
                                                                        <a title="Edit" href="<?php echo site_url("ledger/edit/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                                                    <?php endif; ?>
                                                                    <?php if (hasPermission("ledger", DELETE)) : ?>
                                                                        <a href="<?php echo site_url("ledger/delete/" . $value['id']); ?>" onclick="return confirm('Are You sure want to delete this?')" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id=""><i class="fa fa-trash"></i></a>
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
                </div>
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>

<!-- modal -->
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="ledger_main_id_add">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Main Head</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="acc_type">Account Type</label><small class="req"> *</small>
                                <select name="acc_type" required class="form-control selectpicker" id="acc_type">
                                    <option value="">--Select</option>
                                    <?php foreach ($all_type as $key => $value) : ?>
                                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Head Name</label><small class="req"> *</small>
                                <input type="text" name="name" placeholder="Ledger Name" class="form-control" required id="name">
                                <input type="hidden" name="ledger_part" value="ledger_part" readonly required id="ledger_part">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- /.modal -->

<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            "info": false,
            "autoWidth": false,
        });
        $('#g_acc_type').on('change', function(e) {
            e.preventDefault();
            var acc_type = $(this).val();
            var url = "<?php echo base_url(); ?>ajax/get_main_head_by_type";
            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                data: {
                    "acc_type": acc_type
                },
                success: function(data) {
                    $("#head_id").find('option').remove();
                    $("#head_id").selectpicker("refresh");
                    if (data != '') {
                        $("#head_id").append('<option value="">--Select--</option>')
                        $.each(data, function(key, value) {
                            $("#head_id").append('<option value="' + value.id + '#' + value.name + '">' + value.name + '</option>')
                        });
                        $("#head_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
            get_view();
        });

        function get_view() {
            var company_id = $("#company_id").val();
            var branch_id = $("#branch_id").val();
            var acc_type = $("#g_acc_type").val();
            var head = $('#head_id').val();
            var head_id = '';
            if (head != '') {
                head_id = head.split("#")[0];
            }
            $.ajax({
                url: "<?php echo base_url(); ?>ajax/get_ledger_by_head",
                type: "post",
                data: {
                    "acc_type": acc_type,
                    "company_id": company_id,
                    "branch_id": branch_id,
                    "head_id": head_id,
                    "msg": "ledger"
                },
                success: function(data) {
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
        }
        $('#head_id').on('change', function(e) {
            e.preventDefault();
            get_view();
        });
        $('#ledger_main_id_add').on('submit', function(e) {
            e.preventDefault();
            var url = "<?php echo base_url(); ?>mainhead/add";
            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                data: $(this).serialize(),
                success: function(data) {
                    $("#head_id").find('option').remove();
                    $("#head_id").selectpicker("refresh");
                    if (data.err == "Error") {
                        $.Notification.autoHideNotify('error', 'top right', 'Name Already Exits');
                    } else {
                        if (data != '') {
                            $("#head_id").append('<option value="">--Select--</option>')
                            $.each(data, function(key, value) {
                                $("#head_id").append('<option value="' + value.id + '#' + value.name + '">' + value.name + '</option>')
                            });
                            $("#head_id").selectpicker('render').selectpicker('refresh');
                        }
                        $.Notification.autoHideNotify('success', 'top right', 'Main Head Add Successfully');
                        $('#ledger_main_id_add .selectpicker').selectpicker('val', '');
                        document.getElementById("ledger_main_id_add").reset();
                        $('#con-close-modal').modal('toggle'); //or  $('#IDModal').modal('hide');
                    }
                    return false;
                }
            });
        });
        $('#ledger_form').on('submit', function(e) {
            e.preventDefault();
            var url = "<?php echo base_url(); ?>ledger/add";
            $.ajax({
                url: url,
                type: "post",
                data: $(this).serialize(),
                success: function(data) {
                    if (data == "Error") {
                        $.Notification.autoHideNotify('error', 'top right', 'Name Already Exits');
                    } else {
                        get_view();
                    }
                    $("#name").val("");
                }
            });
        });
        <?php if (!isset($edit)) : ?>
            change_company_id();
        <?php endif; ?>

        function get_custom_code() {
            var company_id = $("#company_id").val();
            var code = "<?= @$single['code'] ?>";
            var editCompany_id = "<?= @$single['company_id'] ?>";
            if (editCompany_id != company_id) {
                var url = "<?php echo base_url(); ?>ledger/get_custom_code";
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    data: {
                        "company_id": company_id
                    },
                    success: function(data) {
                        if (data != '') {
                            $("#code").val(data);
                        }
                    }
                });
            } else {
                $("#code").val(code);
            }
        }

        function change_company_id() {
            var company_id = $("#company_id").val();
            var url = "<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id
                },
                success: function(data) {
                    $("#branch_id").find('option').remove();
                    $("#branch_id").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#branch_id").append('<option value="' + value.id + '">' + value.name + '</option>')
                        });
                        $("#branch_id").selectpicker('render').selectpicker('refresh');
                        get_view();
                    }
                }
            });
        }
        $('#company_id').on('change', function(e) {
            e.preventDefault();
            change_company_id();
        });
        $('#branch_id').on('change', function(e) {
            e.preventDefault();
            get_view();
        });
    });
</script>