<div class="content">
    <?php $data['msg'] = "Welcome To Role Permission"; ?>
    <?php $this->load->view("message", $data) ?>
    <div class="container">
        <div class="row">
            <?php if (hasPermission("role_permission", ADD)) : ?>
                <?php if (isset($add)) : ?>
                    <div class="col-sm-6">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Role <?php echo isset($add) ? "Add" : "Edit"; ?></h3>
                            </div>
                            <div class="panel-body">
                                <?php echo form_open("administrator/role/add", array("role" => "form")); ?>
                                <div class="form-group">
                                    <label for="name">Role Name</label><small class="req"> *</small>
                                    <input required name="name" type="text" class="form-control" id="name" placeholder="Enter role name">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn-lg btn btn-primary pull-right" value="Save" name="submit" />
                                </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                <?php endif; ?>
            <?php endif; ?>
            <?php if (hasPermission("role_permission", EDIT)) : ?>
                <?php if (isset($edit)) : ?>
                    <div class="col-sm-6">
                        <div class="panel panel-border panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Role <?php echo isset($add) ? "Add" : "Edit"; ?></h3>
                            </div>
                            <div class="panel-body">
                                <?php echo form_open("administrator/role/edit/" . $single_role->id, array("role" => "form")); ?>
                                <div class="form-group">
                                    <label for="name">Name</label><small class="req"> *</small>
                                    <input type="hidden" value="<?php echo $single_role->id ?>" name="id" />
                                    <input required name="name" value="<?php echo $single_role->name; ?>" type="text" class="form-control" id="name" placeholder="Enter role name">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn-lg btn btn-primary pull-right" value="Save" name="submit" />
                                </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                <?php endif; ?>
            <?php endif; ?>
            <div class="col-sm-6">
                <div class="panel panel-border panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Role View</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Role Name</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($role) > 0) : ?>
                                        <?php foreach ($role as $key => $value) : ?>
                                            <?php if (logged_in_role_name() == "Super Admin") : ?>
                                                <tr>
                                                    <td><?php echo ++$key; ?></td>
                                                    <td><?php echo $value['name']; ?></td>
                                                    <td><?php echo $value['type']; ?></td>
                                                    <td class="actions btn-group-xs text-right">
                                                        <?php if (hasPermission("assign_permission", VIEW)) : ?>
                                                            <?php if ($value['name'] != "Super Admin") : ?>
                                                                <a data-toggle="tooltip" data-placement="top" title="Assign Permission!" href="<?php echo site_url("administrator/role/permission/" . $value['id']); ?>" class="  btn-xs  waves-effect"><i class="fa fa-tag"></i></a>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                        <?php if ($value['type'] != "system") : ?>
                                                            <?php if (hasPermission("role_permission", EDIT)) : ?>
                                                                <a data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo site_url("administrator/role/edit/" . $value['id']); ?>" class="  btn-xs  waves-effect"><i class="fa fa-edit"></i></a>
                                                            <?php endif; ?>
                                                            <?php if (hasPermission("role_permission", DELETE)) : ?>
                                                                <?php if ($value['type'] != "system") : ?>
                                                                    <a data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo site_url("administrator/role/delete/" . $value['id']); ?>" class="text-danger  btn-xs  waves-effect deleteRow"><i class="fa fa-trash"></i></a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <?php if ($value['name'] != "Super Admin") : ?>
                                                    <?php if ($value['name'] != logged_in_role_name()) : ?>
                                                        <?php if ($value['name'] != "Admin") : ?>
                                                            <tr>
                                                                <td><?php echo ++$key; ?></td>
                                                                <td><?php echo $value['name']; ?></td>
                                                                <td><?php echo $value['type']; ?></td>
                                                                <td class="actions btn-group-xs text-right">
                                                                    <?php if (hasPermission("assign_permission", VIEW)) : ?>
                                                                        <a data-toggle="tooltip" data-placement="top" title="Assign Permission!" href="<?php echo site_url("administrator/role/permission/" . $value['id']); ?>" class=" btn btn-default  waves-effect"><i class="fa fa-tag"></i></a>
                                                                    <?php endif; ?>
                                                                    <?php if ($value['type'] != "system") : ?>
                                                                        <?php if (hasPermission("role_permission", EDIT)) : ?>
                                                                            <a data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo site_url("administrator/role/edit/" . $value['id']); ?>" class=" btn btn-default  waves-effect"><i class="fa fa-edit"></i></a>
                                                                        <?php endif; ?>
                                                                        <?php if (hasPermission("role_permission", DELETE)) : ?>
                                                                            <?php if ($value['type'] != "system") : ?>
                                                                                <a data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo site_url("administrator/role/delete/" . $value['id']); ?>" class="text-danger btn btn-default  waves-effect deleteRow"><i class="fa fa-trash"></i></a>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <h3 class="text-center">No role Found</h3>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->

    </div> <!-- container -->

</div>
<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
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