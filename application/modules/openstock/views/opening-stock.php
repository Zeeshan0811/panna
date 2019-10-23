<div class="content">
    <?php $data['msg'] = "Welcome To Opening Stock"; ?>
    <?php $this->load->view("message", $data) ?>
    <div class="container">
        <?php if (hasPermission("opening_stock", ADD)) : ?>
            <?php if (isset($add)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <form id="temp_stock_form" class="temp_stock_form">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small>
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if (isset($all_company)) : ?>
                                                        <?php foreach ($all_company as $value) : ?>
                                                            <option value="<?php echo $value['id'] ?>#<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
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
                                                <label for="supplier_id">Supplier</label><small class="req"> *</small>
                                                <div class="input-group">
                                                    <select name="supplier_id" id="supplier_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="">--Select</option>
                                                    </select>
                                                    <?php if (hasPermission("supplier_info", VIEW) && hasPermission("supplier_info", ADD)) : ?>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-supplier" type="button">
                                                                <i class="md md-add"></i>
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="supplier_code">Supp. Code</label><small class="req"> *</small>
                                                <input type="text" name="supplier_code" readonly class="form-control" required id="supplier_code">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="account_id">Account Id</label><small class="req"> *</small>
                                                <input type="text" name="account_id" readonly class="form-control" required id="account_id">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="date">Date</label><small class="req"> *</small>
                                                <input type="text" readonly name="date" id="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_id">Item</label><small class="req"> *</small>
                                                <div class="input-group">
                                                    <select name="item_id" id="item_id" required class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                    </select>
                                                    <?php if (hasPermission("item_name", VIEW) && hasPermission("item_name", ADD)) : ?>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-item" type="button">
                                                                <i class="md md-add"></i>
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc_id">Item Desc.</label><small class="req"> *</small>
                                                <div class="input-group">
                                                    <select name="item_desc_id" data-live-search="true" id="item_desc_id" required class="form-control selectpicker">
                                                        <option value="">--Select--</option>
                                                        <?php if (isset($all_item_desc)) : ?>
                                                            <?php foreach ($all_item_desc as $value) : ?>
                                                                <option value="<?php echo $value['id'] ?>#<?php echo $value['item_desc']; ?>"><?php echo $value['item_desc'] ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                    <?php if (hasPermission("item_description", VIEW) && hasPermission("item_description", ADD)) : ?>
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-item-desc" type="button">
                                                                <i class="md md-add"></i>
                                                            </button>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
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
                                                <input type="text" name="price" placeholder="Price" class="form-control" required id="price">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="qty">Qty</label><small class="req"> *</small>
                                                <input type="text" name="qty" placeholder="Qty" class="form-control" required id="qty">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="unit">Unit</label><small class="req"> *</small>
                                                <input type="text" name="unit" placeholder="Unit" readonly class="form-control" required id="unit">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left m-t-22 ">
                                                <button name="" type="submit" class="btn btn-primary "><i class="md md-add m-r-5"></i>Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row msg_parent" style="display:none">
                                    <div class="col-md-12">
                                        <div class="alert alert-danger">
                                            <div class="msg_body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                                            <th class="text-center">Company Name</th>
                                                                            <th class="text-center">Branch Name</th>
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
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td>Total:</td>
                                                                            <td class="text-center"><span id="total_qty">0</span></td>
                                                                            <td></td>
                                                                            <td class="text-center">
                                                                                <span id="total_sub_total">0.00</span>
                                                                                <input type="hidden" name="total" id="total">
                                                                            </td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="ol-md-12 col-sm-12 col-xs-12">
                                                            <button type="submit" class="btn btn-info pull-right">Save</button>
                                                        </div>
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
        <?php endif; ?>
        <?php if (hasPermission("opening_stock", EDIT)) : ?>
            <?php if (isset($edit)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <?php echo form_open("openstock/edit/" . $single_item_stock['id'], array("id" => "temp_stock_form")); ?>
                                <!-- <form id="" > -->
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="company_id">Company Name</label><small class="req"> *</small>
                                            <select name="company_id" disabled data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                <?php if (isset($all_company)) : ?>
                                                    <?php foreach ($all_company as $value) : ?>
                                                        <option <?php if ($single_item_stock['company_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>#<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="branch_id">Branch Name</label><small class="req"> *</small>
                                            <select name="branch_id" disabled id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                <option selected value="<?php echo $single_item_stock['branch_id'] ?>#<?php echo $single_item_stock['branch_name'] ?>"><?php echo $single_item_stock['branch_name'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier</label><small class="req"> *</small>
                                            <select name="supplier_id" disabled id="supplier_id" data-live-search="true" required class="form-control selectpicker">
                                                <option value="">--Select</option>
                                                <option selected value="<?php echo $single_item_stock['supplier_id'] ?>#<?php echo $single_item_stock['supplier_name'] ?>"><?php echo $single_item_stock['supplier_name'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="supplier_code">Supp. Code</label><small class="req"> *</small>
                                            <input type="text" name="supplier_code" value="<?php echo $single_item_stock['supplier_code']; ?>" readonly class="form-control" required id="supplier_code">
                                            <input type="hidden" name="stock_amount_id" value="<?php echo $single_item_stock['stock_amount_id']; ?>" readonly class="form-control" required id="supplier_code">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="account_id">Account Id</label><small class="req"> *</small>
                                            <input type="text" name="account_id" readonly class="form-control" value="<?php echo $single_item_stock['account_id']; ?>" required id="account_id">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="date">Date</label><small class="req"> *</small>
                                            <input type="text" value="<?php echo $single_item_stock['date']; ?>" readonly name="date" id="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="item_id">Item</label><small class="req"> *</small>
                                            <div class="input-group">
                                                <select name="item_id" id="item_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if (isset($all_item)) : ?>
                                                        <?php foreach ($all_item as $value) : ?>
                                                            <option <?php if ($single_item_stock['item_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>#<?php echo $value['name']; ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <?php if (hasPermission("item_name", VIEW) && hasPermission("item_name", ADD)) : ?>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-item" type="button">
                                                            <i class="md md-add"></i>
                                                        </button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="item_desc_id">Item Desc.</label><small class="req"> *</small>
                                            <div class="input-group">
                                                <select name="item_desc_id" id="item_desc_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if (isset($all_item_desc)) : ?>
                                                        <?php foreach ($all_item_desc as $value) : ?>
                                                            <option <?php if ($single_item_stock['item_desc_id'] == $value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>#<?php echo $value['item_desc']; ?>"><?php echo $value['item_desc'] ?></option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                                <?php if (hasPermission("item_description", VIEW) && hasPermission("item_description", ADD)) : ?>
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-item-desc" type="button">
                                                            <i class="md md-add"></i>
                                                        </button>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="item_desc_code">Desc. Code</label><small class="req"> *</small>
                                            <input type="text" name="item_desc_code" value="<?php echo $single_item_stock['item_desc_code']; ?>" id="item_desc_code" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="price">Price</label><small class="req"> *</small>
                                            <input type="text" name="price" value="<?php echo $single_item_stock['purchase_price']; ?>" placeholder="Price" class="form-control" required id="price">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="qty">Qty</label><small class="req"> *</small>
                                            <input type="text" name="qty" placeholder="Qty" value="<?php echo $single_item_stock['qty']; ?>" class="form-control" required id="qty">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="unit">Unit</label><small class="req"> *</small>
                                            <input type="text" name="unit" value="<?php echo $single_item_stock['unit_name']; ?>" placeholder="Unit" readonly class="form-control" required id="unit">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group pull-left m-t-22 ">
                                            <button name="" type="submit" class="btn btn-primary "><i class="md md-add m-r-5"></i>Update</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <?php if (!isset($edit)) : ?>
                                    <div class="row msg_parent" style="display:none">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <div class="msg_body">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                                                <th class="text-center">Company Name</th>
                                                                                <th class="text-center">Branch Name</th>
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
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td>Total:</td>
                                                                                <td class="text-center"><span id="total_qty">0</span></td>
                                                                                <td></td>
                                                                                <td class="text-center">
                                                                                    <span id="total_sub_total">0.00</span>
                                                                                    <input type="hidden" name="total" id="total">
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="ol-md-12 col-sm-12 col-xs-12">
                                                                <button type="submit" class="btn btn-info pull-right">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- End Row -->
                                <?php endif; ?>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>

        <div class="row ">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SL.</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Items</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Unit</th>
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

<!-- supplier  modal-->
<div id="con-close-modal-supplier" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="supplier_add">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Supplier</h4>
                </div>
                <div class="modal-body">
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
                                <label for="name">Supplier Name</label><small class="req"> *</small>
                                <input type="text" name="name" placeholder="Name" class="form-control" required id="name">
                                <input type="hidden" name="stock_modal" required value="modal" id="modal">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="address">Address</label><small class="req"> *</small>
                                <input type="text" name="address" placeholder="Address" class="form-control" required id="address">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="owner_name">Owner Name</label><small class="req"> *</small>
                                <input type="text" name="owner_name" placeholder="Owner Name" class="form-control" required id="owner_name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tel">Telephone No.</label><small class="req"> *</small>
                                <input type="text" name="tel" placeholder="Telephone No." required class="form-control" required id="tel">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email</label><small class="req"> *</small>
                                <input type="email" name="email" placeholder="Email" required class="form-control" required id="email">
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

<!-- item modal-->
<div id="con-close-modal-item" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="item_add">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Item Name</label><small class="req"> *</small>
                                <input type="text" name="name" placeholder="Item Name" class="form-control" required id="name">
                                <input type="hidden" name="stock_item_model" value="stock_model" required id="stock_item_model">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="old_unit_id">Unit</label><small class="req"> *</small>
                                <span id="new_unit_add" class="btn btn-xs btn-info"><i class="md md-add"></i></span>
                                <div class="old_unit">
                                    <select name="old_unit_id" data-live-search="true" id="old_unit_id" class="form-control selectpicker">
                                        <option value="">--Select--</option>
                                        <?php if (isset($all_unit)) : ?>
                                            <?php foreach ($all_unit as $value) : ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div style="display:none;" class="new_unit">
                                    <input type="text" name="new_unit_id" placeholder="Unit Name" class="form-control" id="new_unit_id">
                                </div>
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
<!-- item-desc modal-->
<div id="con-close-modal-item-desc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form id="item_desc_add">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Item Description</h4>
                </div>
                <div class="modal-body">
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
                                <label for="item_id">Item</label><small class="req"> *</small>
                                <select required name="item_id" data-live-search="true" id="item_id" class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                    <?php if (isset($all_item)) : ?>
                                        <?php foreach ($all_item as $value) : ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="item_desc">Item Description</label><small class="req"> *</small>
                                <input type="text" value="<?php echo @$single['item_name'] ?>" name="item_desc" class="form-control" id="item_desc" required placeholder="Item Description">
                                <input type="hidden" name="stock_item_desc_model" value="stock_model" required id="stock_item_model">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="re_qty">Reorder Qty</label><small class="req"> *</small>
                                <input type="text" value="<?php echo @$single['item_name'] ?>" name="re_qty" class="form-control" id="re_qty" required placeholder="Description Code">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="purchase_price">Purchase Price</label><small class="req"> *</small>
                                <input type="text" value="<?php echo @$single['item_name'] ?>" name="purchase_price" class="form-control" id="purchase_price" required placeholder="Purchase Price">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="sale_price">Sale Price</label><small class="req"> *</small>
                                <input type="text" value="<?php echo @$single['item_name'] ?>" name="sale_price" class="form-control" id="sale_price" required placeholder="Sale Price">
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


<script src="<?php echo VENDOR_URL; ?>timepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notify-metro.js"></script>
<script src="<?php echo VENDOR_URL; ?>notifications/notifications.js"></script>

<script>
    $(document).ready(function() {
        $branch = "0#no";
        $body = $("body");
        $('#date').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            immediateUpdates: true,
            todayBtn: true,
            todayHighlight: true
        }).datepicker("setDate", "0");

        /**
         * ========= start main form  part
         */
        <?php if (!isset($edit)) : ?>
            change_company_id();
        <?php endif; ?>

        function change_company_id() {
            var company_id = $("#temp_stock_form #company_id").val().split("#")[0];
            var url = "<?php echo base_url(); ?>ajax/get_branch_by_company";
            var batch = $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id
                },
                success: function(data) {
                    $("#temp_stock_form #branch_id").find('option').remove();
                    $("#temp_stock_form #branch_id").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#temp_stock_form #branch_id").append('<option value="' + value.id + '#' + value.name + '">' + value.name + '</option>');
                        });
                        $("#temp_stock_form #branch_id").selectpicker('render').selectpicker('refresh');
                    }
                    change_branch_id();
                    get_item_desc();
                }
            });
            var url2 = "<?php echo base_url(); ?>ajax/get_supplier_by_company_branch";
            var supplier = $.ajax({
                url: url2,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id
                },
                success: function(data) {
                    $("#temp_stock_form #supplier_id").find('option').remove();
                    $("#temp_stock_form #supplier_id").selectpicker("refresh");
                    if (data != '') {
                        supplier_option_value(data);
                    }
                }
            });
        }

        function change_branch_id() {
            var branch_id = $("#temp_stock_form #branch_id").val().split("#")[0];
            var url = "<?php echo base_url(); ?>ajax/get_supplier_by_company_branch";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "branch_id": branch_id
                },
                success: function(data) {
                    supplier_option_value(data);
                    get_item_desc();
                }
            });
            get_item();
            get_stock();
            //reset some value
            reset_some_value();
        }

        function get_item() {
            var company_id = $("#temp_stock_form #company_id").val().split("#")[0];
            var url = "<?php echo base_url(); ?>ajax/get_all_item";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "status": 1,
                    "company_id": company_id
                },
                success: function(data) {
                    replace_item(data.result_data);
                }
            });
        }

        function get_item_desc() {
            var company_id = $("#temp_stock_form #company_id").val().split("#")[0];
            var branch_id = $("#temp_stock_form #branch_id").val().split("#")[0];
            var url = "<?php echo base_url(); ?>ajax/get_item_description_list";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id,
                    "branch_id": branch_id
                },
                success: function(data) {
                    replace_item_code_and_item_desc(data.result_data);
                }
            });
        }
        $('#temp_stock_form #company_id').on('change', function(e) {
            e.preventDefault();
            change_company_id();
        });

        $('#temp_stock_form #branch_id').on('change', function(e) {
            e.preventDefault();
            change_branch_id();
        });

        $('#temp_stock_form #supplier_id').on('change', function(e) {
            e.preventDefault();
            var supplier_id = $(this).val().split("#")[0];
            var url = "<?php echo base_url(); ?>ajax/get_supplier_details_by_id";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "supplier_id": supplier_id
                },
                success: function(data) {
                    if (data != null) {
                        $("#supplier_code").val(data.code);
                        $("#account_id").val(data.ledger_id);
                    } else {
                        $("#supplier_code").val('');
                        $("#account_id").val('');
                    }
                }
            });
            get_stock();
        });

        $('#item_id').on('change', function(e) {
            e.preventDefault();
            var item_id = $(this).val().split("#")[0];
            var company_id = $("#temp_stock_form #company_id").val().split("#")[0];
            var branch_id = $("#temp_stock_form #branch_id").val().split("#")[0];
            var url = "<?php echo base_url(); ?>ajax/get_item_description";
            var item = $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "item_id": item_id,
                    "company_id": company_id,
                    "branch_id": branch_id
                },
                success: function(data) {
                    replace_item_code_and_item_desc(data.result_data);
                }
            });
            //unit
            var url2 = "<?php echo base_url(); ?>ajax/get_item_unit";
            var unit = $.ajax({
                url: url2,
                type: "get",
                dataType: "json",
                data: {
                    "item_id": item_id
                },
                success: function(data) {
                    $("#unit").val("");
                    if (data != null) {
                        $("#unit").val(data.name);
                    }
                }
            });
        });

        ///item_desc_id
        $('#item_desc_id').on('change', function(e) {
            e.preventDefault();
            var item_desc_id = $(this).val().split("#")[0];
            var company_id = $("#temp_stock_form #company_id").val();
            var branch_id = $("#temp_stock_form #branch_id").val();
            var url = "<?php echo base_url(); ?>ajax/get_single_item_description";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "item_desc_id": item_desc_id,
                    "company_id": company_id,
                    "branch_id": branch_id,
                    "msg": "id",
                },
                success: function(data) {
                    if (data.msg == "id") {
                        $("#price").val("");
                        $("#item_id").find('option').remove();
                        $("#item_id").selectpicker("refresh");
                        if (data.result_data != '') {
                            $("#price").val(data.result_data.purchase_price);
                            $("#unit").val(data.result_data.unit_name);
                            $("#item_desc_code").val(data.result_data.code);
                            $("#item_id").append('<option value="' + data.result_data.item_id + '#' + data.result_data.name + '">' + data.result_data.name + '</option>')
                            $("#item_id").selectpicker('render').selectpicker('refresh');
                        } else {
                            $("#price").val('');
                            $("#unit").val('');
                            replace_item(data.item_list);
                        }
                    } else if (data.msg == "all") {
                        $("#price").val('');
                        $("#unit").val('');
                        replace_item_code_and_item_desc(data.result_data);
                        replace_item(data.item_list);
                    }
                }
            });
        });

        //item_desc_code
        $('#item_desc_code').on(' change', function(e) {
            e.preventDefault();
            var item_desc_code = $(this).val();
            // var item_id=$('#temp_stock_form #item_id').val();
            var company_id = $("#temp_stock_form #company_id").val();
            var branch_id = $("#temp_stock_form #branch_id").val();
            var url = "<?php echo base_url(); ?>ajax/get_single_item_description";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "item_desc_code": item_desc_code,
                    "company_id": company_id,
                    "branch_id": branch_id,
                    "msg": "code",
                },
                success: function(data) {
                    if (data.msg == "code") {
                        $("#price").val('');
                        $("#item_id").find('option').remove();
                        $("#item_id").selectpicker("refresh");
                        $("#item_desc_id").find('option').remove();
                        $("#item_desc_id").selectpicker("refresh");
                        if (data.result_data != null) {
                            $("#price").val(data.result_data.purchase_price);
                            $("#unit").val(data.result_data.unit_name);
                            $("#item_desc_id").append('<option value="' + data.result_data.item_desc_id + '#' + data.result_data.item_desc + '">' + data.result_data.item_desc + '</option>')
                            $("#item_desc_id").selectpicker('render').selectpicker('refresh');
                            $("#item_id").append('<option value="' + data.result_data.item_id + '#' + data.result_data.name + '">' + data.result_data.name + '</option>')
                            $("#item_id").selectpicker('render').selectpicker('refresh');
                        } else {
                            $("#price").val('');
                            $("#unit").val('');
                            replace_item(data.item_list);
                        }
                    } else if (data.msg == "all") {
                        $("#price").val('');
                        $("#unit").val('');
                        replace_item_code_and_item_desc(data.result_data);
                        replace_item(data.item_list);
                    }
                }
            });
        });

        function replace_item_code_and_item_desc(data) {
            $("#item_desc_code").val('');
            $("#item_desc_id").find('option').remove();
            $("#item_desc_id").selectpicker("refresh");
            if (data != '') {
                $("#item_desc_id").append('<option value="">--Select--</option>');
                $.each(data, function(key, value) {
                    $("#item_desc_id").append('<option value="' + value.id + '#' + value.item_desc + '">' + value.item_desc + '</option>')
                });
                $("#item_desc_id").selectpicker('render').selectpicker('refresh');
            }
        }

        function replace_item(data) {
            $("#item_id").find('option').remove();
            $("#item_id").selectpicker("refresh");
            if (data != '') {
                $("#item_id").append('<option value="">--Select--</option>');
                $.each(data, function(key, value) {
                    $("#item_id").append('<option value="' + value.id + '#' + value.name + '">' + value.name + '</option>')
                });
                $("#item_id").selectpicker('render').selectpicker('refresh');
            }

        }

        function reset_some_value() {
            $('#temp_stock_form #item_id').selectpicker('val', '');
            $("#temp_stock_form #item_id").selectpicker("refresh");
            $("#item_desc_code").val("");
            $("#item_desc_id").find('option').remove();
            $("#item_desc_id").selectpicker("refresh");
            $('#price').val('');
            $('#supplier_code').val('');
            $('#account_id').val('');
        }

        //main supplier not modal
        function supplier_option_value(data) {
            $("#temp_stock_form #supplier_id").find('option').remove();
            $("#temp_stock_form #supplier_id").selectpicker("refresh");
            if (data != '') {
                $("#temp_stock_form #supplier_id").append('<option value="">--Select--</option>')
                $.each(data, function(key, value) {
                    $("#temp_stock_form #supplier_id").append('<option value="' + value.id + '#' + value.name + '">' + value.name + '</option>')
                });
                $("#temp_stock_form #supplier_id").selectpicker('render').selectpicker('refresh');
            }
        }

        //stock form save temporary

        var store_data = [];
        var supplier_data = [];
        $(".temp_stock_form").on("submit", function(e) {
            e.preventDefault();
            var company = $("#temp_stock_form #company_id").val().split("#");
            var company_id = company[0];
            var company_name = company[1];

            var branch = $("#temp_stock_form #branch_id").val().split("#");
            var branch_id = branch[0];
            var branch_name = branch[1];

            var supplier = $("#temp_stock_form #supplier_id").val().split("#");
            var supplier_id = supplier[0];
            var supplier_name = supplier[1];
            //check is supplier is same 
            supplier_data.push(supplier_id);
            if (!allEqual(supplier_data)) {
                $.Notification.autoHideNotify('error', 'top right', "Keep Supplier Same");
                removeSuppplier(supplier_data, supplier_id);
                return;
            }
            var item = $("#temp_stock_form #item_id").val().split("#");
            var item_id = item[0];
            var item_name = item[1];

            var item_desc = $("#temp_stock_form #item_desc_id").val().split("#");
            var item_desc_id = item_desc[0];
            var item_desc_name = item_desc[1];

            var date = $("#date").val();
            var price = $("#price").val();
            var qty = $("#qty").val();
            var unit = $("#unit").val();
            var account_id = $("#account_id").val();
            var url = "<?php echo base_url() ?>openstock/check_exits_item";
            $.ajax({
                type: "post",
                url: url,
                dataType: "json",
                data: {
                    "item_desc_id": item_desc_id,
                    "supplier_id": supplier_id
                },
                success: function(data) {
                    if (data.msg == "error") {
                        $.Notification.autoHideNotify('error', 'top right', "This Item description alerady exits!");
                    } else {
                        var single_input_data = {
                            company_id: company_id,
                            company_name: company_name,
                            branch_id: branch_id,
                            branch_name: branch_name,
                            supplier_id: supplier_id,
                            supplier_name: supplier_name,
                            item_id: item_id,
                            item_name: item_name,
                            date: date,
                            item_desc_id: item_desc_id,
                            item_desc_name: item_desc_name,
                            price: price,
                            qty: qty,
                            unit: unit,
                            account_id: account_id,
                        };
                        if (!useritem(store_data, item_desc_id)) {
                            store_data.push(single_input_data);
                            calculate_footer_value();
                        } else {
                            alert(item_desc_name + " Already Add");
                        }
                        store_data_show()
                    }
                },

            });
        });

        function store_data_show() {
            $('#tem_data tbody').find("tr").remove();
            $.each(store_data, function(key, value) {
                html = '<tr id="' + value.item_desc_id + '">' +
                    '<td class="text-center">' + (++key) + '</td>' +
                    '<td class="text-center">' + value.company_name +
                    '<input type="hidden" name="company_id[]" value="' + value.company_id + '" >' +
                    '<input type="hidden" name="branch_id[]" value="' + value.branch_id + '" >' +
                    '<input type="hidden" name="supplier_id[]" value="' + value.supplier_id + '" >' +
                    '<input type="hidden" name="account_id" value="' + value.account_id + '" >' +
                    '<input type="hidden" name="date[]" value="' + value.date + '" >' +
                    '<input type="hidden" name="item_id[]" value="' + value.item_id + '" >' +
                    '<input type="hidden" name="item_desc_id[]" value="' + value.item_desc_id + '" >' +
                    '<input type="hidden" name="price[]" value="' + value.price + '" >' +
                    '<input type="hidden" name="qty[]" value="' + value.qty + '" >' +
                    '<input type="hidden" name="sub_total[]" value="' + value.price * value.qty + '" >' +
                    '</td>' +
                    '<td class="text-center">' + value.branch_name + '</td>' +
                    '<td class="text-center">' + value.item_name + '</td>' +
                    '<td class="text-center">' + value.item_desc_name + '</td>' +
                    '<td class="text-center">' + value.unit + '</td>' +
                    '<td class="text-center">' + value.qty + '</td>' +
                    '<td class="text-center">' + value.price + '</td>' +
                    '<td class="text-center">' + (value.price * value.qty) + '</td>' +
                    '<td class="text-center text-danger"><button  type="button" class="temp_delete deleteRow btn btn-danger btn-xs">Delete</button></td>' +
                    '</tr>';
                $("#tem_data tbody").append(html);
            });
        }

        function useritem(array, item_desc_id) {
            return array.some(function(el) {
                return el.item_desc_id === item_desc_id;
            });
        }

        function allEqual(arr) {
            return new Set(arr).size == 1;
        }
        //delete temp data
        $("#tem_data").on("click", ".temp_delete", function() {
            if (confirm("Are You sure?")) {
                var id = $(this).parent().closest('tr').attr("id");
                $(this).parent().closest('tr').remove();
                removeItem(store_data, id);
                calculate_footer_value();
            }
        });
        //removeItem
        function removeItem(array, item) {
            for (var i = 0; i <= array.length - 1; i++) {
                if (array[i].item_desc_id == item) {
                    array.splice(i, 1);
                }
            }
        }

        function removeSuppplier(array, supplier_id) {
            var index = array.indexOf(supplier_id);
            if (index > -1) {
                array.splice(index, 1);
            }
        }
        //calculate_footer_value
        function calculate_footer_value() {
            if (store_data.length <= 0) {
                supplier_data = [];
            }
            var total_qty = 0;
            var total_sub_total = 0.00;
            $.each(store_data, function(key, value) {
                total_qty += parseInt(value.qty);
                total_sub_total += (value.price * value.qty);
            });
            $("#total_qty").text(total_qty);
            $("#total_sub_total").text(total_sub_total);
            $("#total").val(total_sub_total);
        }
        //final_submit
        $("#final_submit").on("submit", function(e) {
            e.preventDefault();
            if (store_data.length > 0) {
                var url = "<?php echo base_url(); ?>openstock/add";
                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.msg == "success") {

                            $(".msg_parent").hide();
                            $(".msg_body").html('');
                            $.Notification.autoHideNotify('success', 'top right', "Item Add Successfully");
                            $('#tem_data tbody').find("tr").remove();
                            store_data = [];
                            supplier_data = [];
                            $("#total_qty").text("0");
                            $("#total_sub_total").text("0.00");
                            get_stock();
                        } else if (data.msg == "error") {
                            $.Notification.autoHideNotify('error', 'top right', "Somthing Wrong!");
                        } else {
                            $.Notification.autoHideNotify('error', 'top right', "Item Not Add");
                            $(".msg_body").html(data.msg + "this code is already exits.");
                            $(".msg_parent").show();
                        }
                    }
                });
            } else {
                alert("Please Add Item First");
            }
        });
        //get stock item
        function get_stock() {
            var company_id = $("#temp_stock_form #company_id").val().split("#")[0];
            var branch = $("#temp_stock_form #branch_id").val();
            var branch_id = '';
            if (branch != null) {
                branch_id = branch.split("#")[0];
            }
            var supplier = $("#temp_stock_form #supplier_id").val();
            var supplier_id = '';
            if (supplier != null) {
                supplier_id = supplier.split("#")[0];
            }
            var data = {
                "company_id": company_id,
                "branch_id": branch_id,
                "supplier_id": supplier_id,
            }
            var url = "<?php echo base_url(); ?>openstock/view";
            $.ajax({
                url: url,
                type: "get",
                data: data,
                success: function(data) {
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

        /**
         * ========= start modal part
         */

        //supplier part
        change_supplier_company_id();

        function change_supplier_company_id() {
            var company_id = $("#con-close-modal-supplier #company_id").val();
            var url = "<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id
                },
                success: function(data) {
                    $("#con-close-modal-supplier #branch_id").find('option').remove();
                    $("#con-close-modal-supplier #branch_id").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#con-close-modal-supplier #branch_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $("#con-close-modal-supplier #branch_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }

        $('#con-close-modal-supplier #company_id').on('change', function(e) {
            e.preventDefault();
            change_supplier_company_id();
        });

        $('#supplier_add').on('submit', function(e) {
            e.preventDefault();
            var company_id = $(this).val();
            var url = "<?php echo base_url(); ?>supplier/add";
            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                data: $(this).serialize(),
                success: function(data) {
                    if (data.msg == "error") {
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    } else {
                        supplier_option_value(data.result_data);
                        $.Notification.autoHideNotify('success', 'top right', "Supplier Add Successfully");
                        $('#supplier_add .selectpicker').selectpicker('val', '');
                        document.getElementById("supplier_add").reset();
                        $('#con-close-modal-supplier').modal('toggle'); //or  $('#IDModal').modal('hide');
                    }
                    return false;
                }
            });
        });

        //item  part
        $("#new_unit_add").on("click", function() {
            $('.selectpicker').selectpicker('val', '');
            $(".new_unit").toggle();
            $(".new_unit #new_unit_id").val("");
            $(".old_unit").toggle();
        });

        $('#item_add').on('submit', function(e) {
            e.preventDefault();
            var company_id = $(this).val();
            var url = "<?php echo base_url(); ?>item/add";
            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                data: $(this).serialize(),
                success: function(data) {
                    if (data.msg == "error") {
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    } else {
                        $("#item_id").find('option').remove();
                        $("#item_id").selectpicker("refresh");
                        if (data.result_data != '') {
                            $("#item_id").append('<option value="">--Select--</option>');
                            $.each(data.result_data, function(key, value) {
                                $("#item_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $("#item_id").selectpicker('render').selectpicker('refresh');
                        }

                        $.Notification.autoHideNotify('success', 'top right', "Item Add Successfully");
                        $('#item_add .selectpicker').selectpicker('val', '');
                        document.getElementById("item_add").reset();
                        $('#con-close-modal-item').modal('toggle');
                    }
                    return false;
                }
            });
        });

        //item description
        change_item_desc_company_id();

        function change_item_desc_company_id() {
            var company_id = $("#con-close-modal-item-desc #company_id").val();
            var url = "<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                data: {
                    "company_id": company_id
                },
                success: function(data) {
                    $("#con-close-modal-item-desc #branch_id").find('option').remove();
                    $("#con-close-modal-item-desc #branch_id").selectpicker("refresh");
                    if (data != '') {
                        $.each(data, function(key, value) {
                            $("#con-close-modal-item-desc #branch_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $("#con-close-modal-item-desc #branch_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }

        $('#con-close-modal-item-desc #company_id').on('change', function(e) {
            e.preventDefault();
            change_item_desc_company_id();
        });

        $('#item_desc_add').on('submit', function(e) {
            e.preventDefault();
            var company_id = $(this).val();
            var url = "<?php echo base_url(); ?>itemdescription/add";
            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                data: $(this).serialize(),
                success: function(data) {
                    if (data.msg == "error") {
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    } else {
                        replace_item_code_and_item_desc(data.result_data);
                        $.Notification.autoHideNotify('success', 'top right', "Item Add Successfully");
                        $('#item_desc_add .selectpicker').selectpicker('val', '');
                        document.getElementById("item_desc_add").reset();
                        $('#con-close-modal-item-desc').modal('toggle');
                    }
                    return false;
                }
            });
        });

        /**
         * ========= end modal part
         */


    });
</script>