<div class="content">
    <?php $data['msg'] = "Welcome To Customer Information Setup"; ?>
    <?php $this->load->view("message", $data) ?>
    <div class="container">
        <div class="no_print">
            <?php if (hasPermission("customer_info", ADD)) : ?>
                <?php if (isset($add)) : ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel ">
                                <div class="panel-body">
                                    <form id="customer_add" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-3">
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="branch_id">Branch Name</label><small class="req"> *</small>
                                                    <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="name">Customer Name</label><small class="req"> *</small>
                                                    <input type="text" name="name" placeholder="Name" class="form-control" required id="name">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="owner_name">Owner Name</label><small class="req"> *</small>
                                                    <input type="text" name="owner_name" placeholder="Owner Name" class="form-control" required id="owner_name">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="picture">Picture</label><span class="label_notice">(jpg,png,jpeg, size 500KB)</span>
                                                    <input type="file" onchange="readURL(this);" name="picture" class="form-control" id="picture">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="img_show">
                                                    <img id="image" src="<?= IMG_URL ?>default.png" alt="your image" />
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="code">Code</label><small class="req"> *</small>
                                                    <input type="text" name="code" value="<?php echo @$code; ?>" readonly placeholder="Code" class="form-control" required id="code">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="cl">CL</label><small class="req"> *</small>
                                                    <input type="text" name="cl" placeholder="Cl" class="form-control" required id="code">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="marketing_id">Marketing</label><small class="req"> *</small>
                                                    <div class="input-group">
                                                        <select name="marketing_id" id="marketing_id" data-live-search="true" required class="form-control selectpicker">
                                                            <option value="">--Select</option>
                                                        </select>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal" type="button">
                                                                <i class="md md-add"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="address">Address</label><small class="req"> *</small>
                                                    <input type="text" name="address" placeholder="Address" class="form-control" required id="address">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="tel">Telephone No.</label><small class="req"> *</small>
                                                    <input type="text" name="tel" placeholder="Telephone No." required class="form-control" required id="tel">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="email">Email</label><small class="req"> *</small>
                                                    <input type="email" name="email" placeholder="Email" required class="form-control" required id="email">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="national_id">National ID</label><small class="req"> *</small>
                                                    <input type="text" name="national_id" placeholder="National ID No." required class="form-control" required id="national_id">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="trade">Trade License</label><small class="req"> *</small>
                                                    <input type="text" name="trade" placeholder="Trade License No." required class="form-control" required id="trade">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="security_cheque">Security Cheque No.</label><small class="req"> *</small>
                                                    <input type="text" name="security_cheque" placeholder="Security Cheque No." required class="form-control" required id="security_cheque">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label><small class="req"> *</small>
                                                    <input type="text" name="amount" placeholder="Amount" required class="form-control" required id="amount">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="bank_id">Bank Name</label><small class="req"> *</small>
                                                    <select name="bank_id" id="bank_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if (isset($all_bank)) : ?>
                                                            <?php foreach ($all_bank as $value) : ?>
                                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group pull-left m-t-22 m-l-15 ">
                                                    <button name="add_section" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
            <?php if (hasPermission("customer_info", EDIT)) : ?>
                <?php if (isset($edit)) : ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("customer/edit/" . $single['customer_id']); ?>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="company_id">Company Name</label><small class="req"> *</small>
                                            <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                <?php if (isset($all_company)) : ?>
                                                    <?php foreach ($all_company as $value) : ?>
                                                        <option <?php if ($single['company_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="branch_id">Branch Name</label><small class="req"> *</small>
                                            <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                <?php if (isset($all_branch)) : ?>
                                                    <?php foreach ($all_branch as $value) : ?>
                                                        <option <?php if ($single['branch_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name">Customer Name</label><small class="req"> *</small>
                                            <input type="text" name="name" value="<?php echo @$single['customer_name']; ?>" placeholder="Name" class="form-control" required id="name">
                                            <input type="hidden" name="id" value="<?php echo @$single['customer_id']; ?>" required id="id">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="owner_name">Owner Name</label><small class="req"> *</small>
                                            <input type="text" name="owner_name" value="<?php echo @$single['owner_name']; ?>" placeholder="Owner Name" class="form-control" required id="owner_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="picture">Picture</label><span class="label_notice">(jpg,png,jpeg, size 500KB)</span>
                                            <input type="file" onchange="readURL(this);" name="picture" class="form-control" id="picture">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="img_show">
                                            <img id="image" src="<?= base_url() . $single['picture'] ?>" alt="your image" />
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="code">Code</label><small class="req"> *</small>
                                            <input type="text" name="code" readonly value="<?php echo @$single['code']; ?>" placeholder="Code" class="form-control" required id="code">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="cl">CL</label><small class="req"> *</small>
                                            <input type="text" name="cl" value="<?php echo @$single['cl']; ?>" placeholder="cl" class="form-control" required id="code">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="marketing_id">Marketing</label><small class="req"> *</small>
                                            <select name="marketing_id" id="marketing_id" data-live-search="true" required class="form-control selectpicker">
                                                <?php if (isset($all_marketing)) : ?>
                                                    <?php foreach ($all_marketing as $value) : ?>
                                                        <option <?php if ($single['marketing_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="address">Address</label><small class="req"> *</small>
                                            <input type="text" value="<?php echo @$single['address']; ?>" name="address" placeholder="Address" class="form-control" required id="address">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="tel">Telephone No.</label><small class="req"> *</small>
                                            <input type="text" name="tel" value="<?php echo @$single['tel']; ?>" placeholder="Telephone No." required class="form-control" required id="tel">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="email">Email</label><small class="req"> *</small>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo @$single['email']; ?>" required class="form-control" required id="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="national_id">National ID</label><small class="req"> *</small>
                                            <input type="text" value="<?php echo @$single['national_id']; ?>" name="national_id" placeholder="National ID No." required class="form-control" required id="national_id">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="trade">Trade License</label><small class="req"> *</small>
                                            <input type="text" name="trade" value="<?php echo @$single['trade']; ?>" placeholder="Trade License No." required class="form-control" required id="trade">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="security_cheque">Security Cheque No.</label><small class="req"> *</small>
                                            <input type="text" name="security_cheque" value="<?php echo @$single['security_cheque']; ?>" placeholder="Security Cheque No." required class="form-control" required id="security_cheque">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="amount">Amount</label><small class="req"> *</small>
                                            <input type="text" name="amount" placeholder="Amount" value="<?php echo @$single['amount']; ?>" required class="form-control" required id="amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="bank_id">Bank Name</label><small class="req"> *</small>
                                            <select name="bank_id" id="bank_id" data-live-search="true" required class="form-control selectpicker">
                                                <option value="">--Select--</option>
                                                <?php if (isset($all_bank)) : ?>
                                                    <?php foreach ($all_bank as $value) : ?>
                                                        <option <?php if ($single['bank_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group pull-left m-t-22 m-l-15 ">
                                            <button name="add_section" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- col -->
                    </div> <!-- End row -->
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="print_div">
                    <div class="panel ">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive"><span class="print_link"></span>
                                        <?php if (hasPermission("import_customer", VIEW)) : ?>
                                            <button href="javascript:void(0)" class="btn btn-success print_button pull-right m-l-10" id="import_customer" data-toggle="modal" data-target="#con-close-modal-import"><i class="fa fa-upload"></i></button>
                                        <?php endif; ?>
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Code</th>
                                                    <th class="text-center">Company Name</th>
                                                    <th class="text-center">Branch Name</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">CL</th>
                                                    <th class="text-center">Picture</th>
                                                    <th class="text-center">Marketing Ofiicer</th>
                                                    <th class="text-center">Address</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Telephone No.</th>
                                                    <th class="text-center">NID</th>
                                                    <th class="text-center">Trade License</th>
                                                    <th class="text-center">Security Cheque</th>
                                                    <th class="text-center">Bank Name</th>
                                                    <th class="text-center">Amount</th>
                                                    <th class="text-center status">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="14" class="total_customer text-right">Total Customer: 0</td>
                                                    <td class="status"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
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
<div class="no_print">
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <form id="marketing_add">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Marketing</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="company_id_m">Company Name</label><small class="req"> *</small>
                                    <select name="company_id" data-live-search="true" id="company_id_m" required class="form-control selectpicker">
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
                                    <label for="branch_id_m">Branch Name</label><small class="req"> *</small>
                                    <select name="branch_id" id="branch_id_m" data-live-search="true" required class="form-control selectpicker">
                                        <option value="">--Select--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="marketing_name">Name</label><small class="req"> *</small>
                                    <input type="hidden" name="stock_modal" value="stock_modal" class="form-control" required id="stock_modal">
                                    <input type="text" name="marketing_name" placeholder="Name" class="form-control" required id="marketing_name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="designation_id">Designation</label>
                                    <select name="designation_id" id="designation_id" data-live-search="true" class="form-control selectpicker">
                                        <option value="">--Select--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="present_address">Present Address</label><small class="req"> *</small>
                                    <input type="text" name="present_address" placeholder="Present Address" class="form-control" required id="present_address">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="permanent_address">Permanent Address</label><small class="req"> *</small>
                                    <input type="text" name="permanent_address" placeholder="Permanent Address" class="form-control" required id="permanent_address">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile No.</label><small class="req"> *</small>
                                    <input type="text" name="mobile" placeholder="Mobile No." class="form-control" required id="mobile">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="tel">Telephone No.</label>
                                    <input type="text" name="tel" placeholder="Telephone No." class="form-control" id="tel">
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
    </div>
    <!-- item modal-->
    <div id="con-close-modal-import" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <!-- <form id="item_add"> -->
            <?php echo form_open_multipart("customer/import_csv") ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Customer CSV file</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="csv_file">CSV FILE</label><small class="req"> *</small>
                                <input type="file" name="csv_file" class="form-control" required id="csv_file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div><!-- /.modal -->
</div>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>
<script>
    $(document).ready(function() {
        $("#customer_add").on("submit", function(e) {
            e.preventDefault();
            var url = "<?php echo base_url() ?>customer/add";
            var formdata = new FormData(this);

            $.ajax({
                method: "POST",
                url: url,
                data: formdata,
                // dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    var data = JSON.parse(data);
                    if (data.msg == "success") {
                        $.Notification.autoHideNotify('success', 'top right', data.result_data);
                        $("input").val('');
                        $(".img_show").html('<img id="image" src="<?= IMG_URL ?>default.png" alt="your image" />');
                        get_custom_code();
                    } else {
                        console.log(2);
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    }
                    get_view();
                }
            });
        });
        datatable();

        function datatable() {
            $('#datatable').dataTable({
                dom: 'Bfrtip',
                columnDefs: [{
                    targets: 1,
                    className: 'noVis'
                }],
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],
                "order": [
                    [0, "desc"]
                ],
                buttons: ['pageLength',
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible',

                        }
                    },
                    {
                        extend: 'colvis',
                        collectionLayout: 'fixed two-column'
                    },
                ],
                "info": false,
                "autoWidth": false
            });
        }
        <?php if (!isset($edit) || $single['marketing_id'] == "") : ?>
            change_company_id();
        <?php else :; ?>
            get_view();
        <?php endif; ?>

        function get_print_link() {
            var company_id = $("#company_id").val();
            var branch_id = $("#branch_id").val();
            var html = '<a target="_blank" href="<?= site_url("customer/print_customer/") ?>' + company_id + '/' + branch_id + '"  class="btn bg-primary print_button pull-right m-l-10"><i class="fa fa-print"></i></a>'
            $(".print_link").html(html);
        }

        function get_custom_code() {
            var company_id = $("#company_id").val();
            var code = "<?= @$single['code'] ?>";
            var editCompany_id = "<?= @$single['company_id'] ?>";
            if (editCompany_id != company_id) {
                var url = "<?php echo base_url(); ?>customer/get_custom_code";
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "json",
                    data: {
                        "company_id": company_id
                    },
                    success: function(data) {
                        // debugger;
                        if (data != '') {
                            var branchFirstText = $("#branch_id :selected").text().substring(0, 1);
                            // $("#code").val(data);
                            if (branchFirstText) {
                                var branchCode = branchFirstText.substring(0, 1);
                                data = branchCode + "-" + data;
                            }
                            $("#code").val(data);
                        }
                    }
                });
            } else {
                $("#code").val(code);
            }
        }

        function change_company_id() {
            get_custom_code();
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
                        change_branch_id();
                    }
                }
            });
        }
        $('#company_id').on('change', function(e) {
            e.preventDefault();
            change_company_id();
        });

        function change_branch_id() {
            var branch_id = $("#branch_id").val();
            var url = "<?php echo base_url(); ?>ajax/get_marketing_by_branch";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "branch_id": branch_id
                },
                success: function(data) {
                    $("#marketing_id").find('option').remove();
                    $("#marketing_id").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#marketing_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $("#marketing_id").selectpicker('render').selectpicker('refresh');
                    }

                    get_custom_code();
                }
            });
            get_view();
            get_print_link();
        }
        $('#branch_id').on('change', function(e) {
            e.preventDefault();
            change_branch_id();
        });

        function get_view() {
            var company_id = $("#company_id").val();
            var branch_id = $("#branch_id").val();
            $.ajax({
                url: "<?php echo base_url() ?>customer/view",
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id,
                    "branch_id": branch_id
                },
                success: function(data) {
                    $('#datatable').DataTable().destroy();
                    $("#datatable tbody").html(data.result_data);
                    $("#datatable .total_customer").text("Total Customer: " + data.total_customer);
                    datatable();
                }
            });
        }
        //marketing part
        change_m_company_id();

        function change_m_company_id() {
            var company_id = $("#company_id_m").val();
            var url = "<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id
                },
                success: function(data) {
                    $("#branch_id_m").find('option').remove();
                    $("#branch_id_m").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#branch_id_m").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $("#branch_id_m").selectpicker('render').selectpicker('refresh');
                    }
                    change_m_branch_id();
                }
            });
        }
        $('#company_id_m').on('change', function(e) {
            e.preventDefault();
            change_m_company_id();
        });

        function change_m_branch_id() {
            var branch_id = $("#branch_id_m").val();
            var url = "<?php echo base_url(); ?>ajax/get_designation_by_branch";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "branch_id": branch_id
                },
                success: function(data) {
                    $("#designation_id").find('option').remove();
                    $("#designation_id").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#designation_id").append('<option value="' + value.id + '">' + value.designation + '</option>')
                        });
                        $("#designation_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }
        $('#branch_id_m').on('change', function(e) {
            e.preventDefault();
            change_m_branch_id();
        });
        $('#marketing_add').on('submit', function(e) {
            e.preventDefault();
            var company_id = $(this).val();
            var url = "<?php echo base_url(); ?>marketing/marketingAdd";
            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                data: $(this).serialize(),
                success: function(data) {
                    if (data.msg == "error") {
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    } else {
                        change_branch_id();
                        // marketing_option_value(data.result_data);
                        $.Notification.autoHideNotify('success', 'top right', "Supplier Add Successfully");
                        // $('#marketing_add .selectpicker').selectpicker('val', '');
                        // document.getElementById("marketing_add").reset();
                        $("input").val('');
                        $('#con-close-modal').modal('toggle'); //or  $('#IDModal').modal('hide');
                    }
                    return false;
                }
            });
        });

        function marketing_option_value(data) {
            $("#customer_add #marketing_id").find('option').remove();
            $("#customer_add #marketing_id").selectpicker("refresh");
            if (data != '') {
                $("#customer_add #marketing_id").append('<option value="">--Select--</option>')
                $.each(data, function(key, value) {
                    $("#customer_add #marketing_id").append('<option value="' + value.id + '#' + value.name + '">' + value.name + '</option>')
                });
                $("#customer_add #marketing_id").selectpicker('render').selectpicker('refresh');
            }
        }
    });
</script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files.length > 0) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(75)
                        .height(65);
                };

                reader.readAsDataURL(input.files[0]);
            }

        } else {

            $(".img_show").html('<img id="image" src="<?= IMG_URL ?>default.png" alt="your image" />');
        }
    }
    $(".img_show").on("click", "#image", function() {
        $("#logo").val('');
        $(".img_show").html('<img id="image" src="<?= IMG_URL ?>default.png" alt="your image" />');
    });
</script>