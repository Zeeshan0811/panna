<div class="content">
    <?php $data['msg']="Welcome To Sales"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("sales",ADD)): ?>
            <?php if(isset($add)): ?>
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
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option  value="<?php echo $value['id'] ?>#<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    <?php if(is_super_admin() || is_admin()): ?>
                                                        <option value="">--Select--</option>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="sales_type">Sales Type</label><small class="req"> *</small> 
                                                <select name="sales_type" id="sales_type" required class="form-control selectpicker">
                                                    <option value="Sales Of Product">Sales Of Product</option>
                                                    <option value="Damage">Damage</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="invoice_no">Invoice No.</label><small class="req"> *</small> 
                                                <input type="text" readonly name="invoice_no" value="<?php echo @$invoice_no; ?>"  class="form-control" required id="invoice_no" >
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="customer_id">To</label><small class="req"> *</small> 
                                                <div class="input-group">
                                                    <select name="customer_id" id="customer_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="">--Select</option>
                                                    </select>
                                                    <div class="input-group-btn">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-customer" type="button">
                                                        <i class="md md-add"></i>
                                                    </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="account_id">Account</label><small class="req"> *</small> 
                                                <select name="account_id" id="account_id" required class="form-control selectpicker">
                                                    <option value="">--Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="customer_code">Cust. Code</label><small class="req"> *</small> 
                                                <input type="text" name="customer_code" readonly class="form-control" required id="customer_code" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="marketing">Marketing</label><small class="req"> *</small> 
                                                <input type="text"  readonly name="marketing" id="marketing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="date">Date</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo date("d-m-Y") ?>" readonly name="date" id="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="due_date">Due Date</label><small class="req"> *</small> 
                                                <input type="text" readonly name="due_date" value="<?php echo date("d-m-Y") ?>" id="due_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_id">Item</label><small class="req"> *</small> 
                                                <select name="item_id" data-live-search="true" id="item_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_item)): ?>
                                                        <?php foreach($all_item as $value): ?>
                                                            <option value="<?php echo $value['id'] ?>#<?php echo $value['name']; ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc_id">Item Desc.</label><small class="req"> *</small> 
                                                <select name="item_desc_id" data-live-search="true" id="item_desc_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_item_desc)): ?>
                                                        <?php foreach($all_item_desc as $value): ?>
                                                            <option value="<?php echo $value['id'] ?>#<?php echo $value['item_desc']; ?>"><?php echo $value['item_desc'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
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
                                                <input type="text" name="price" placeholder="Price" class="form-control" required id="price" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="qty">Qty</label><small class="req"> *</small> 
                                                <input type="text" name="qty" placeholder="Qty" class="form-control" required id="qty" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="stock">Stock</label><small class="req"> *</small> 
                                                <input type="text" readonly name="stock" placeholder="Stock" class="form-control" required id="stock" >
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
                                                <!-- <form id="final_submit"> -->
                                                <?php echo form_open("sales/add"); ?>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="table-responsive">
                                                                <table id="tem_data" class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-center">No.</th>
                                                                            <th class="text-center">Items</th>
                                                                            <th class="text-center">Code</th>
                                                                            <th class="text-center">Description</th>
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
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <table class="table table-small-font table-bordered purchase_form_table">
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Payment Option</label><small class="req"> *</small> </td>
                                                                        <td class="text-center">
                                                                        <select name="payment_option"  id="payment_option" required class="form-control purchase_form damage selectpicker">
                                                                            <option value="Ledger">Ledger</option>
                                                                            <option value="Cash">Cash</option>
                                                                            <option value="Bank">Bank</option>
                                                                        </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Bank Name</label></td>
                                                                        <td class="text-center">
                                                                        <select name="bank_name" required disabled  id="bank_name" data-live-search="true"  class="purchase_form damage form-control selectpicker">
                                                                            <option value="">--Select--</option>
                                                                            <?php if(isset($all_bank)): ?>
                                                                                <?php foreach($all_bank as $value): ?>
                                                                                    <option value="<?php echo $value['id'] ?>#<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                                                <?php endforeach;?>
                                                                            <?php endif;?>
                                                                        </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Cheque No.</label></td>
                                                                        <td class="text-center"><input disabled required name="cheque_no"  id="cheque_no" type="text" class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Cheque date</label></td>
                                                                        <td class="text-center"><input disabled value="<?php echo date("d-m-Y") ?>" required name="cheque_date"  id="cheque_date" type="text" readonly class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Matured Date</label></td>
                                                                        <td class="text-center"><input disabled value="<?php echo date("d-m-Y") ?>" required name="mature_date"  id="mature_date" type="text" readonly class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Amount</label> </td>
                                                                        <td class="text-center"><input name="amount" readonly  id="amount" type="text" class="form-control purchase_form"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Current Payable</label> </td>
                                                                        <td class="text-center"><input name="current_payable" readonly  id="current_payable" type="text" class="form-control purchase_form"></td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <table class="table table-small-font  table-bordered purchase_form_table">
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Total</label> </td>
                                                                        <td class="text-center"><input name="total" readonly  id="total" type="text" class="form-control purchase_form"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Discount(%).</label></td>
                                                                        <td class="text-center">
                                                                            <div class="col-md-4">
                                                                                <input name="discount_percent"  id="discount_percent" type="text" class="form-control purchase_form damage">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input readonly name="discount_tk" placeholder="Tk."  id="discount_tk" type="text" class="form-control purchase_form damage">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Transport Charge</label> </td>
                                                                        <td class="text-center">
                                                                            <input name="transport_charge"  id="transport_charge" type="text" class="form-control purchase_form damage">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Previous Balance</label></td>
                                                                        <td class="text-center">
                                                                            <input name="previous_balance" readonly  id="previous_balance" type="text"  class="form-control purchase_form damage">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Net Payable</label></td>
                                                                        <td class="text-center">
                                                                            <input name="net_payable" readonly id="net_payable" type="text"  class="form-control purchase_form">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Adv/Payment</label></td>
                                                                        <td class="text-center"><input name="pay" readonly id="pay" type="text"  class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Net Due</label></td>
                                                                        <td class="text-center"><input name="due"  id="due" type="text" readonly class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Remarks</label></td>
                                                                        <td class="text-center"><input name="remarks"  id="remarks" type="text" class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
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
        <?php endif; ?>

        <?php  if(hasPermission("sales",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <?php echo form_open("sales/edit/".$single['id'],array("id"=>"temp_stock_form")) ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="company_id">Company Name</label><small class="req"> *</small> 
                                                <select name="company_id" data-live-search="true" id="company_id" required class="form-control selectpicker">
                                                    <?php if(isset($all_company)): ?>
                                                        <?php foreach($all_company as $value): ?>
                                                            <option <?php if($value['id']==$single['company_id']) echo "selected"; ?>  value="<?php echo $value['id'] ?>#<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="branch_id">Branch Name</label><small class="req"> *</small> 
                                                <select name="branch_id" id="branch_id" data-live-search="true" required class="form-control selectpicker">
                                                    <option value="<?php echo $single['branch_id'] ?>#<?php echo $single['branch_name'] ?>"><?php echo $single['branch_name'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="sales_type">Sales Type</label><small class="req"> *</small> 
                                                <select name="sales_type" id="sales_type" required class="form-control selectpicker">
                                                    <option value="<?php echo $single['sales_type'] ?>"><?php echo $single['sales_type'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="invoice_no">Invoice No.</label><small class="req"> *</small> 
                                                <input type="text" readonly name="invoice_no" value="<?php echo @$single['invoice_no']; ?>"  class="form-control" required id="invoice_no" >
                                                <input type="hidden" name="sales_amount_id" value="<?php echo $single['sales_amount_id']; ?>" readonly class="form-control" required  >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="customer_id">To</label><small class="req"> *</small> 
                                                <div class="input-group">
                                                    <select name="customer_id" id="customer_id" data-live-search="true" required class="form-control selectpicker">
                                                        <option value="<?php echo $single['customer_id'] ?>#<?php echo $single['customer_name'] ?>"><?php echo $single['customer_name'] ?></option>
                                                    </select>
                                                    <div class="input-group-btn">
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#con-close-modal-customer" type="button">
                                                        <i class="md md-add"></i>
                                                    </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="account_id">Account</label><small class="req"> *</small> 
                                                <select name="account_id" id="account_id" required class="form-control selectpicker">
                                                    <option value="<?php echo $single['account_id'] ?>"><?php echo $single['account_head_name'] ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="customer_code">Cust. Code</label><small class="req"> *</small> 
                                                <input type="text" name="customer_code" value="<?php echo $single['customer_code'] ?>" readonly class="form-control" required id="customer_code" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="marketing">Marketing</label><small class="req"> *</small> 
                                                <input type="text"  readonly value="<?php echo $single['marketing_name'] ?>" name="marketing" id="marketing" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="date">Date</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo date("d-m-Y",strtotime($single['date'])) ?>" readonly name="date" id="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="due_date">Due Date</label><small class="req"> *</small> 
                                                <input type="text" readonly name="due_date" value="<?php echo date("d-m-Y",strtotime($single['due_date'])) ?>" id="due_date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_id">Item</label><small class="req"> *</small> 
                                                <select name="item_id" data-live-search="true" id="item_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_item)): ?>
                                                        <?php foreach($all_item as $value): ?>
                                                            <option <?php if($single['item_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>#<?php echo $value['name']; ?>"><?php echo $value['name'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc_id">Item Desc.</label><small class="req"> *</small> 
                                                <select name="item_desc_id" data-live-search="true" id="item_desc_id" required class="form-control selectpicker">
                                                    <option value="">--Select--</option>
                                                    <?php if(isset($all_item_desc)): ?>
                                                        <?php foreach($all_item_desc as $value): ?>
                                                            <option <?php if($single['item_desc_id']==$value['id']) echo "selected"; ?> value="<?php echo $value['id'] ?>#<?php echo $value['item_desc']; ?>"><?php echo $value['item_desc'] ?></option>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                        </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="item_desc_code">Desc. Code</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo $single['item_desc_code'] ?>" name="item_desc_code" id="item_desc_code" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="price">Price</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo $single['sales_price'] ?>" name="price" placeholder="Price" class="form-control" required id="price" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="qty">Qty</label><small class="req"> *</small> 
                                                <input type="text" name="qty" value="<?php echo $single['qty'] ?>" placeholder="Qty" class="form-control" required id="qty" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="stock">Stock</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @($stock+$single['qty']); ?>" readonly name="stock" placeholder="Stock" class="form-control" required id="stock" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label for="unit">Unit</label><small class="req"> *</small> 
                                                <input type="text" name="unit" value="<?php echo $single['unit_name'] ?>" placeholder="Unit" readonly class="form-control" required id="unit" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left m-t-22 ">
                                                <button name="" type="submit" class="btn btn-info "><i class="md md-add m-r-5"></i>Update</button>
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
        <?php  if(hasPermission("sales",EDIT)): ?>
            <?php if(isset($editMain)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <!-- <form id=""> -->
                                                <?php echo form_open("sales/editMain/".$single_sales_amount->id); ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <table class="table table-small-font table-bordered purchase_form_table">
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Payment Option</label><small class="req"> *</small> </td>
                                                                        <td class="text-center">
                                                                        <select name="payment_option"  id="payment_option" required class="form-control purchase_form selectpicker">
                                                                            <option <?php if($single_sales_amount->payment_option=="Ledger") echo "selected"; ?> value="Ledger">Ledger</option>
                                                                            <option <?php if($single_sales_amount->payment_option=="Cash") echo "selected"; ?> value="Cash">Cash</option>
                                                                            <option <?php if($single_sales_amount->payment_option=="Bank") echo "selected"; ?> value="Bank">Bank</option>
                                                                        </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Bank Name</label></td>
                                                                        <td class="text-center">
                                                                        <select name="bank_name" required disabled  id="bank_name" data-live-search="true"  class="purchase_form form-control selectpicker">
                                                                            <option value="">--Select--</option>
                                                                            <?php if(isset($all_bank)): ?>
                                                                                <?php foreach($all_bank as $value): ?>
                                                                                    <option <?php if($single_sales_amount->bank_id==$value['id']) echo "selected";  ?> value="<?php echo $value['id'] ?>#<?php echo $value['name'] ?>"><?php echo $value['name'] ?></option>
                                                                                <?php endforeach;?>
                                                                            <?php endif;?>
                                                                        </select>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Cheque No.</label></td>
                                                                        <td class="text-center"><input disabled required name="cheque_no" value="<?php echo @$single_sales_amount->cheque_no; ?>"  id="cheque_no" type="text" class="form-control purchase_form"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Cheque date</label></td>
                                                                        <td class="text-center"><input disabled required name="cheque_date"  id="cheque_date" value="<?php echo @$single_sales_amount->cheque_date; ?>" type="text" readonly class="form-control purchase_form"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Matured Date</label></td>
                                                                        <td class="text-center"><input disabled required name="mature_date" value="<?php echo @$single_sales_amount->mature_date; ?>" id="mature_date" type="text" readonly class="form-control purchase_form"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Amount</label> </td>
                                                                        <td class="text-center">
                                                                            <input name="amount" readonly  id="amount" value="<?php echo @$single_sales_amount->total; ?>" type="text" class="form-control purchase_form">
                                                                            <input name="sales_type" readonly  id="sales_type" value="<?php echo @$single_sales_amount->sales_type; ?>" type="hidden" class="form-control purchase_form">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Current Payable</label> </td>
                                                                        <td class="text-center"><input name="current_payable" value="<?php echo @$single_sales_amount->total; ?>" readonly  id="current_payable" type="text" class="form-control purchase_form"></td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <fieldset>
                                                                <table class="table table-small-font  table-bordered purchase_form_table">
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Total</label> </td>
                                                                        <td class="text-center"><input name="total" value="<?php echo @$single_sales_amount->total; ?>" readonly  id="total" type="text" class="form-control purchase_form"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Discount(%).</label></td>
                                                                        <td class="text-center">
                                                                            <div class="col-md-4">
                                                                                <input name="discount_percent" value="<?php echo @$single_sales_amount->discount_percent; ?>" id="discount_percent" type="text" class="form-control purchase_form damage">
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                                <input readonly name="discount_tk" placeholder="Tk." value="<?php echo @$single_sales_amount->discount_tk; ?>" id="discount_tk" type="text" class="form-control purchase_form damage">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Transport Charge</label> </td>
                                                                        <td class="text-center">
                                                                            <input name="transport_charge"  id="transport_charge" value="<?php echo @$single_sales_amount->transport_charge; ?>" type="text" class="form-control purchase_form damage">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Previous Balance</label></td>
                                                                        <td class="text-center">
                                                                            <input name="previous_balance" readonly  id="previous_balance" value="<?php echo @$single_sales_amount->previous_balance; ?>" type="text"  class="form-control purchase_form damage">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Net Payable</label></td>
                                                                        <td class="text-center">
                                                                            <input name="net_payable" readonly id="net_payable" type="text" value="<?php echo @$single_sales_amount->net_payable; ?>" class="form-control purchase_form">
                                                                        </td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Adv/Payment</label></td>
                                                                        <td class="text-center"><input name="pay" readonly id="pay" type="text" value="<?php echo @$single_sales_amount->pay; ?>"  class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                    <tr class="text-center">
                                                                        <td class="text-center"><label for="">Net Due</label></td>
                                                                        <td class="text-center"><input name="due" value="<?php echo @$single_sales_amount->due; ?>"  id="due" type="text" readonly class="form-control purchase_form damage"></td>
                                                                    </tr>
                                                                </table>
                                                            </fieldset>
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
        <?php endif; ?>
        <div class="row ">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered datatable ">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SL.</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Items</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Invoice No</th>
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

<!-- customer  modal-->
<div id="con-close-modal-customer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <form id="customer_add">
            <div class="modal-content"> 
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Add Customer</h4> 
                </div> 
                <div class="modal-body"> 
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
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Customer Name</label><small class="req"> *</small> 
                                <input type="text" name="name" placeholder="Name" class="form-control" required id="name" >
                            </div>
                        </div>
                        <div class="col-sm-4">
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
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="address">Address</label><small class="req"> *</small> 
                                <input type="text" name="address" placeholder="Address" class="form-control" required id="address" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="owner_name">Owner Name</label><small class="req"> *</small> 
                                <input type="text" name="owner_name" placeholder="Owner Name" class="form-control" required id="owner_name" >
                                <input type="hidden" name="stock_modal" value="stock_modal" class="form-control" required id="stock_modal" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="tel">Telephone No.</label><small class="req"> *</small> 
                                <input type="text" name="tel" placeholder="Telephone No." required class="form-control" required id="tel" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="email">Email</label><small class="req"> *</small> 
                                <input type="email" name="email" placeholder="Email" required class="form-control" required id="email" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="national_id">National Id</label><small class="req"> *</small> 
                                <input type="text" name="national_id" placeholder="National Id No." required class="form-control" required id="national_id" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="trade">Trade License</label><small class="req"> *</small> 
                                <input type="text" name="trade" placeholder="Trade License No." required class="form-control" required id="trade" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="security_cheque">Sec. Cheque No.</label><small class="req"> *</small> 
                                <input type="text" name="security_cheque" placeholder="Security Cheque No." required class="form-control" required id="security_cheque" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="amount">Amount</label><small class="req"> *</small> 
                                <input type="text" name="amount" placeholder="Amount" required class="form-control" required id="amount" >
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="bank_id">Bank Name</label><small class="req"> *</small> 
                                <select name="bank_id" id="bank_id" data-live-search="true" required class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                    <?php if(isset($all_bank)): ?>
                                        <?php foreach($all_bank as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </select>
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
                                    <?php if(isset($all_company)): ?>
                                        <?php foreach($all_company as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                                        <?php endforeach;?>
                                    <?php endif;?>
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
                                <input type="hidden" name="stock_modal" value="stock_modal" class="form-control" required id="stock_modal" >
                                <input type="text" name="marketing_name" placeholder="Name" class="form-control" required id="marketing_name" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="designation_id">Designation</label><small class="req"> *</small> 
                                <select name="designation_id" id="designation_id" data-live-search="true" required class="form-control selectpicker">
                                    <option value="">--Select--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="present_address">Present Address</label><small class="req"> *</small> 
                                <input type="text" name="present_address" placeholder="Present Address" class="form-control" required id="present_address" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="permanent_address">Permanent Address</label><small class="req"> *</small> 
                                <input type="text" name="permanent_address" placeholder="Permanent Address" class="form-control" required id="permanent_address" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="mobile">Mobile No.</label><small class="req"> *</small> 
                                <input type="text" name="mobile" placeholder="Mobile No." class="form-control" required id="mobile" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="tel">Telephone No.</label>
                                <input type="text" name="tel" placeholder="Telephone No." class="form-control"  id="tel" >
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

        $('#date,#due_date,#cheque_date,#mature_date').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            immediateUpdates: true,
            todayBtn: true,
            todayHighlight: true
        });


         /**
         * ========= start main form  part
         */
         //function invoke
        <?php if(!isset($edit)&& !isset($editMain)): ?>
            change_company_id();
        <?php endif;?>

        $('#temp_stock_form #company_id').on('change',function(e){
            e.preventDefault();
            change_company_id();
        });

        $('#temp_stock_form #branch_id').on('change',function(e){
            e.preventDefault();
            change_branch_id();
        });
        
        $('#temp_stock_form #customer_id').on('change',function(e){
            e.preventDefault();
            var customer_id=$(this).val().split("#")[0];
            var url="<?php echo base_url(); ?>ajax/get_customer_details_by_id";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"customer_id":customer_id},
                success:function(data){
                    $("#temp_stock_form #account_id").find('option').remove();
                    $("#temp_stock_form #account_id").selectpicker("refresh");
                    if(data!=null)
                    {
                        $("#customer_code").val(data.code);
                        $("#marketing").val(data.marketing_name);
                        $("#temp_stock_form #account_id").append('<option value="'+ data.ledger_id +'">'+ data.account_head_name +'</option>')
                        $("#temp_stock_form #account_id").selectpicker('render').selectpicker('refresh');
                    }
                    else{
                        $("#customer_code").val('');
                        $("#marketing").val("");
                    }
                }
            });
            get_previous_balance(customer_id);
            get_sales_item(customer_id);
        });

        $('#item_id').on('change',function(e){
            e.preventDefault();
            var item_id=$(this).val().split("#")[0];
            var company_id=$("#temp_stock_form #company_id").val().split("#")[0];
            var branch_id=$("#temp_stock_form #branch_id").val().split("#")[0];
            var url="<?php echo base_url(); ?>ajax/get_item_description";
            var item=$.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"item_id":item_id,"company_id":company_id,"branch_id":branch_id},
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
            $("#qty").val(0);
            var item_desc_id=$(this).val().split("#")[0];
            var company_id=$("#temp_stock_form #company_id").val();
            var branch_id=$("#temp_stock_form #branch_id").val();
            var url="<?php echo base_url(); ?>ajax/get_single_item_description";
            var data={
                    "item_desc_id":item_desc_id,
                    "company_id":company_id,
                    "branch_id":branch_id,
                    "msg":"id",
                };
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:data,
                success:function(data){
                    if(data.msg=="id")
                    {
                        $("#price").val("");
                        $("#item_id").find('option').remove();
                        $("#item_id").selectpicker("refresh");
                        if(data.result_data!=''){
                            $("#price").val(data.result_data.purchase_price);
                            $("#unit").val(data.result_data.unit_name);
                            $("#item_desc_code").val(data.result_data.code);
                            $("#item_id").append('<option value="'+ data.result_data.item_id +'#'+data.result_data.name+'">'+ data.result_data.name +'</option>')
                            $("#item_id").selectpicker('render').selectpicker('refresh');
                        }else{
                            $("#price").val('');
                            $("#unit").val('');
                            replace_item(data.item_list);
                        }
                    }
                    else if(data.msg=="all")
                    { 
                        $("#price").val('');
                        $("#unit").val('');
                        replace_item_code_and_item_desc(data.result_data);
                        replace_item(data.item_list);
                    }
                }
            });

            get_available_atock(data);
        });
        //item_desc_code
        $('#item_desc_code').on(' change',function(e){
            e.preventDefault();
            $("#qty").val(0);
            var item_desc_code=$(this).val();
            // var item_id=$('#temp_stock_form #item_id').val();
            var company_id=$("#temp_stock_form #company_id").val();
            var branch_id=$("#temp_stock_form #branch_id").val();
            var url="<?php echo base_url(); ?>ajax/get_single_item_description";
            var data={
                    "item_desc_code":item_desc_code,
                    "company_id":company_id,
                    "branch_id":branch_id,
                    "msg":"code",
                };
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:data,
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
                            $("#unit").val(data.result_data.unit_name);
                            $("#item_desc_id").append('<option value="'+ data.result_data.item_desc_id +'#'+data.result_data.item_desc+'">'+ data.result_data.item_desc +'</option>')
                            $("#item_desc_id").selectpicker('render').selectpicker('refresh');
                            $("#item_id").append('<option value="'+ data.result_data.item_id +'#'+data.result_data.name+'">'+ data.result_data.name +'</option>')
                            $("#item_id").selectpicker('render').selectpicker('refresh');

                            var item_desc_id=$("#item_desc_id").val().split("#")[0];
                            var new_data={
                                "item_desc_id":item_desc_id,
                                "company_id":company_id,
                                "branch_id":branch_id,
                                "msg":"code",
                            };
                            get_available_atock(new_data);
                        }else{
                            $("#price").val('');
                            $("#unit").val('');
                            replace_item(data.item_list);
                        }
                    }
                    else if(data.msg=="all")
                    {
                        $("#price").val('');
                        $("#unit").val('');
                        replace_item_code_and_item_desc(data.result_data);
                        replace_item(data.item_list);
                    }
                }
            });
        });
        //sales type
        $("#sales_type").on("change",function(e){
            e.preventDefault();
            var value=$(this).val();
            if(value==="Damage"){
                $("#customer_id").attr("disabled",true);
                $("#customer_id").selectpicker("refresh");
                $("#account_id").attr("disabled",true);
                $("#account_id").selectpicker("refresh");
                $("#price").attr("readonly",true);
                $("#customer_code").attr("disabled",true);

                $(".damage").attr("disabled",true);
                $("#payment_option").selectpicker("refresh");
                $("#bank_name").selectpicker("refresh");

            }else{
                $("#customer_id").attr("disabled",false);
                $("#customer_id").selectpicker("refresh");
                $("#account_id").attr("disabled",false);
                $("#account_id").selectpicker("refresh");
                $("#price").attr("readonly",false);
                $("#customer_code").attr("disabled",false);
                
                $(".damage").attr("disabled",false);
                $("#payment_option").selectpicker("refresh");
                $("#bank_name").selectpicker("refresh");
            }
        });
        //qty
        $("#qty").on("change focus",function(e){
            e.preventDefault();
            var stock=parseInt($("#stock").val());
            var qty=parseInt($(this).val());
            if(isNaN(qty)){
                qty=0;
            }
            if(isNaN(stock)){
                stock=0;
            }
            if(stock<qty){
                qty=stock;
            }
            $(this).val(qty);
            $(this).select();
        });

        //function creation part

        function get_sales_item(customer_id)
        {
            var url="<?php echo base_url(); ?>sales/view";
            $.ajax({
                url:url,
                type:"get",
                data:{"customer_id":customer_id},
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

        function change_company_id()
        {
            var company_id=$("#temp_stock_form #company_id").val().split("#")[0];
            var url="<?php echo base_url(); ?>ajax/get_branch_by_company";
            var batch=$.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id},
                success:function(data){
                    $("#temp_stock_form #branch_id").find('option').remove();
                    $("#temp_stock_form #branch_id").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#temp_stock_form #branch_id").append('<option value="'+ value.id +'#'+value.name+'">'+ value.name +'</option>');
                        });
                        $("#temp_stock_form #branch_id").selectpicker('render').selectpicker('refresh');
                    }
                    change_branch_id(); 
                    get_item_desc();
                }
            });
        } 
        function change_branch_id(){
            var branch_id=$("#temp_stock_form #branch_id").val().split("#")[0];
            var url="<?php echo base_url(); ?>ajax/get_customer_by_branch";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"branch_id":branch_id},
                success:function(data){
                    customer_option_value(data);
                    get_item_desc();
                }
            });
            get_item();
            //reset some value
            reset_some_value();
        }
        function get_item()
        {
            var url="<?php echo base_url(); ?>ajax/get_all_item";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"status":1},
                success:function(data){
                    replace_item(data.result_data);
                }
            });
        }

        function get_item_desc()
        {
            var company_id=$("#temp_stock_form #company_id").val().split("#")[0];
            var branch_id=$("#temp_stock_form #branch_id").val().split("#")[0];
            var url="<?php echo base_url(); ?>ajax/get_item_description_list";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{
                    "company_id":company_id,
                    "branch_id":branch_id
                },
                success:function(data){
                    replace_item_code_and_item_desc(data.result_data);
                }
            });
        }
        function get_previous_balance(customer_id){
            $.ajax({
                url:"<?php echo site_url() ?>ajax/get_customer_previous_balance",
                type:"post",
                dataType:"json",
                data:{"customer_id":customer_id},
                success:function(data){
                    $("#previous_balance").val(data);
                }
            });
        }
        function get_available_atock(data)
        {
            $.ajax({
                url:"<?php echo site_url() ?>ajax/get_available_stock",
                type:"get",
                dataType:"json",
                data:data,
                success:function(data){
                    $("#stock").val(data.result_data);
                }
            });
        }
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

        //main customer not modal
        function customer_option_value(data)
        {
            $("#temp_stock_form #customer_id").find('option').remove();
            $("#temp_stock_form #customer_id").selectpicker("refresh");
            if(data!=''){
                $("#temp_stock_form #customer_id").append('<option value="">--Select--</option>')
                $.each(data,function(key,value){
                    $("#temp_stock_form #customer_id").append('<option value="'+ value.id +'#'+value.name+'">'+ value.name +'</option>')
                });
                $("#temp_stock_form #customer_id").selectpicker('render').selectpicker('refresh');
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
            $('#price').val('');
            $('#customer_code').val('');
            $("#marketing").val("");
            $("#account_id").find('option').remove();
            $("#account_id").selectpicker("refresh");
        }

        //stock form save temporary

        var store_data=[];
        //tem submit
        $(".temp_stock_form").on("submit",function(e){
            e.preventDefault();
            
            var company=$("#temp_stock_form #company_id").val().split("#");
            var company_id=company[0];
            var company_name=company[1];

            var branch=$("#temp_stock_form #branch_id").val().split("#");
            var branch_id=branch[0];
            var branch_name=branch[1];

            var customer=$("#temp_stock_form #customer_id").val().split("#");
            var customer_id=customer[0];
            var customer_name=customer[1];

            var item=$("#temp_stock_form #item_id").val().split("#");
            var item_id=item[0];
            var item_name=item[1];

            var item_desc=$("#temp_stock_form #item_desc_id").val().split("#");
            var item_desc_id=item_desc[0];
            var item_desc_name=item_desc[1];
            
            var date=$("#date").val();  
            var due_date=$("#due_date").val();  
            var price=$("#price").val();  
            var qty=$("#qty").val();
            var unit=$("#unit").val();
            var account_id=$("#account_id").val();
            var invoice_no=$("#invoice_no").val();
            var sales_type=$("#sales_type").val();
            var item_desc_code=$("#item_desc_code").val();

            var  single_input_data={
                company_id:company_id,
                company_name:company_name,
                branch_id:branch_id,
                branch_name:branch_name,
                customer_id:customer_id,
                customer_name:customer_name,
                item_id:item_id,
                item_name:item_name,
                item_desc_code:item_desc_code,
                date:date,
                due_date:due_date,
                item_desc_id:item_desc_id,
                item_desc_name:item_desc_name,
                sales_type:sales_type,
                price:price,
                qty:qty,
                unit:unit,
                account_id:account_id,
                invoice_no:invoice_no,
            };
            if(qty>0)
            {
                if(!useritem(store_data,item_desc_id))
                {
                    store_data.push(single_input_data);
                    calculate_multiple_value();
                }else{
                    alert(item_desc_name+" Already Add");   
                }
            }else{
                alert("Qty can't be empty");   
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
                    '<input type="hidden" name="company_id[]" value="'+value.company_id+'" >'+
                    '<input type="hidden" name="branch_id[]" value="'+value.branch_id+'" >'+
                    '<input type="hidden" name="customer_id[]" value="'+value.customer_id+'" >'+
                    '<input type="hidden" name="date[]" value="'+value.date+'" >'+
                    '<input type="hidden" name="due_date[]" value="'+value.due_date+'" >'+
                    '<input type="hidden" name="item_id[]" value="'+value.item_id+'" >'+
                    '<input type="hidden" name="item_desc_id[]" value="'+value.item_desc_id+'" >'+
                    '<input type="hidden" name="price[]" value="'+value.price+'" >'+
                    '<input type="hidden" name="qty[]" value="'+value.qty+'" >'+
                    '<input type="hidden" name="sub_total[]" value="'+value.price*value.qty+'" >'+
                    '<input type="hidden" name="account_id" value="'+value.account_id+'" >'+
                    '<input type="hidden" name="invoice_no" value="'+value.invoice_no+'" >'+
                    '<input type="hidden" name="sales_type" value="'+value.sales_type+'" >'+
                    '</td>' +
                    '<td class="text-center">' + value.item_name + '</td>' +
                    '<td class="text-center">' + value.item_desc_code + '</td>' +
                    '<td class="text-center">' + value.item_desc_name + '</td>' +
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
        /**
        *=========================
        *       account calculation
        *=========================
         */
         
        //calculate_multiple_value
        function calculate_multiple_value()
        {
            var total_qty=0;
            var total_sub_total=0.00;
            $.each(store_data,function(key,value){
                total_qty+=parseInt(value.qty);
                total_sub_total+=(value.price*value.qty);
            });
            $("#total_qty").text(total_qty);
            $("#total_sub_total").text(total_sub_total);
            $("#total").val(total_sub_total);
            $("#amount").val(total_sub_total);
            $("#current_payable").val(total_sub_total);
            var previous_balance=parseFloat($("#previous_balance").val()).toFixed(2);
            if(isNaN(previous_balance))
            {
                previous_balance=0;
            }
            var net_payable=parseFloat(total_sub_total)+parseFloat(previous_balance);
            $("#net_payable").val(net_payable);
            $("#due").val(net_payable);
            $("#discount_percent").val('');
            $("#discount_tk").val('');
            $("#transport_charge").val("");
            $("#pay").val("");
        }
        
        //discount
        $("#discount_percent").on("change",function(){
            $("#pay").val("");
            var total=parseFloat($("#total").val()).toFixed(2);
            var discount_percent=parseFloat($("#discount_percent").val()).toFixed(2);
            var transport_charge=parseFloat($("#transport_charge").val()).toFixed(2);
            var previous_balance=parseFloat($("#previous_balance").val()).toFixed(2);
            if(isNaN(total))
            {
                total=0;
            }
            if(isNaN(discount_percent) || (discount_percent>100 && discount_percent<0) )
            {
                discount_percent=0;
            }
            if(isNaN(transport_charge))
            {
                transport_charge=0;
            }
            if(isNaN(previous_balance))
            {
                previous_balance=0;
            }
            var discount_tk=(total*discount_percent)/100;
            $("#discount_tk").val(discount_tk);
            var net_payable_without_previous_balance=total-discount_tk+parseFloat(transport_charge);
            var net_payable=parseFloat(net_payable_without_previous_balance)+parseFloat(previous_balance);
            $("#net_payable").val(net_payable);
            $("#due").val(net_payable);
        });
        //transport charge
        $("#transport_charge").on("change",function(){
            $("#pay").val("");
            var total=parseFloat($("#total").val()).toFixed(2);
            var discount_tk=parseFloat($("#discount_tk").val()).toFixed(2);
            var transport_charge=parseFloat($("#transport_charge").val()).toFixed(2);
            var previous_balance=parseFloat($("#previous_balance").val()).toFixed(2);
            if(isNaN(total))
            {
                total=0;
            }
            if(isNaN(discount_tk))
            {
                discount_tk=0;
            }
            if(isNaN(transport_charge)||transport_charge<0)
            {
                transport_charge=0;
            }
            if(isNaN(previous_balance))
            {
                previous_balance=0;
            }
            var net_payable_without_previous_balance=total-discount_tk+parseFloat(transport_charge);
            var net_payable=parseFloat(net_payable_without_previous_balance)+parseFloat(previous_balance);
            $("#net_payable").val(net_payable);
            $("#due").val(net_payable);
        });
        //pay
        $("#pay").on("change",function(){
            var net_payable=parseFloat($("#net_payable").val()).toFixed(2);
            var pay=parseFloat($("#pay").val()).toFixed(2);
            if(isNaN(net_payable))
            {
                net_payable=0;
            }
            if(isNaN(pay) || pay<0)
            {
                pay=0;
            }
            var totalDue=net_payable-pay;
            $("#due").val(totalDue);
        });

        //payment option
        payment_option();
        $('#payment_option').on("change",function(){
            payment_option();
        });

        function payment_option()
        {
            var value=$("#payment_option").val();
            if(value==="Bank")
            {
                $("#bank_name").prop("disabled",false);
                $("#bank_name").selectpicker("refresh");
                $("#cheque_no").prop("disabled",false);
                $("#cheque_date").prop("disabled",false);
                $("#mature_date").prop("disabled",false);
            }else{
                $("#bank_name").attr("disabled", 'disabled');
                $("#bank_name").selectpicker("refresh");
                $("#cheque_no").attr("disabled", 'disabled');
                $("#cheque_date").attr("disabled", 'disabled');
                $("#mature_date").attr("disabled", 'disabled');
            }
            if(value=="Ledger")
            {
                $("#pay").attr("readonly",true);
                $("#pay").attr("required",false);
            }else{
                $("#pay").attr("readonly",false);
                $("#pay").attr("required",true);
            }
        }
        //final_submit

        $("#final_submit").on("submit",function(e){
            e.preventDefault();
            if(store_data.length>0)
            {
                var customer_id=$("#temp_stock_form #customer_id").val().split("#")[0];
                var url="<?php echo base_url(); ?>sales/add";
                $.ajax({
                    url:url,
                    type:"post",
                    dataType:"json",
                    beforeSend:function()
                    {
                        $body.addClass("loading");
                    },
                    data:$(this).serialize(),
                    success:function(data){
                        if(data.msg=="success")
                        {
                            $.Notification.autoHideNotify('success', 'top right',"Item Add Successfully");
                            location.reload();

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
         /**
         * ========= end main form  part
         */

       /**
         * ========= start modal part
         */

        //customer part
        change_customer_company_id();
        $('#con-close-modal-customer #company_id').on('change',function(e){
            e.preventDefault();
            change_customer_company_id();
        });
        $('#customer_add').on('submit',function(e){
            e.preventDefault();
            var url="<?php echo base_url(); ?>customer/add";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="error")
                    {
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    }
                    else{
                        customer_option_value(data.result_data);
                        $.Notification.autoHideNotify('success', 'top right',"Supplier Add Successfully");
                        $('#customer_add .selectpicker').selectpicker('val', '');
                        document.getElementById("customer_add").reset();
                        $('#con-close-modal-supplier').modal('toggle'); //or  $('#IDModal').modal('hide');
                    }
                    return false;
                }
            });
        });

        //marketing part
        change_m_company_id();
        $('#company_id_m').on('change',function(e){
            e.preventDefault();
            change_m_company_id();
        });
        $('#branch_id_m').on('change',function(e){
            e.preventDefault();
            change_m_branch_id();
        });
        $('#marketing_add').on('submit',function(e){
            e.preventDefault();
            var company_id=$(this).val();
            var url="<?php echo base_url(); ?>marketing/marketingAdd";
            $.ajax({
                url:url,
                type:"post",
                dataType:"json",
                data:$(this).serialize(),
                success:function(data){
                    if(data.msg=="error")
                    {
                        $.Notification.autoHideNotify('error', 'top right', data.result_data);
                    }
                    else{
                        marketing_option_value(data.result_data);
                        $.Notification.autoHideNotify('success', 'top right',"Supplier Add Successfully");
                        $('#marketing_add .selectpicker').selectpicker('val', '');
                        document.getElementById("marketing_add").reset();
                        $('#con-close-modal').modal('toggle'); //or  $('#IDModal').modal('hide');
                    }
                    return false;
                }
            });
        });
        
        function change_m_company_id(){
            var company_id=$("#company_id_m").val();
            var url="<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id},
                success:function(data){
                    $("#branch_id_m").find('option').remove();
                    $("#branch_id_m").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#branch_id_m").append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        $("#branch_id_m").selectpicker('render').selectpicker('refresh');
                    }
                    change_m_branch_id();
                }
            });
        }
        function change_customer_company_id()
        {
            var company_id=$("#con-close-modal-customer #company_id").val();
            var url="<?php echo base_url(); ?>ajax/get_branch_by_company";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"company_id":company_id},
                success:function(data){
                    $("#con-close-modal-customer #branch_id").find('option').remove();
                    $("#con-close-modal-customer #branch_id").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#con-close-modal-customer #branch_id").append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        $("#con-close-modal-customer #branch_id").selectpicker('render').selectpicker('refresh');
                    }
                    change_customer_branch_id();
                }
            });
        }

        function change_customer_branch_id(){
            var branch_id=$("#con-close-modal-customer #branch_id").val();
            var url="<?php echo base_url(); ?>ajax/get_marketing_by_branch";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"branch_id":branch_id},
                success:function(data){
                    $("#con-close-modal-customer #marketing_id").find('option').remove();
                    $("#con-close-modal-customer #marketing_id").selectpicker("refresh");
                    if(data!=''){
                        $("#con-close-modal-customer #marketing_id").append('<option value="">--Select--</option>');
                        $.each(data,function(key,value){
                            $("#con-close-modal-customer #marketing_id").append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                        $("#con-close-modal-customer #marketing_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }
        function change_m_branch_id()
        {
            var branch_id=$("#branch_id_m").val();
            var url="<?php echo base_url(); ?>ajax/get_designation_by_branch";
            $.ajax({
                url:url,
                type:"get",
                dataType:"json",
                data:{"branch_id":branch_id},
                success:function(data){
                    $("#designation_id").find('option').remove();
                    $("#designation_id").selectpicker("refresh");
                    if(data!=''){
                        $.each(data,function(key,value){
                            $("#designation_id").append('<option value="'+ value.id +'">'+ value.designation +'</option>')
                        });
                        $("#designation_id").selectpicker('render').selectpicker('refresh');
                    }
                }
            });
        }
        function marketing_option_value(data)
        {
            $("#customer_add #marketing_id").find('option').remove();
            $("#customer_add #marketing_id").selectpicker("refresh");
            if(data!=''){
                $("#customer_add #marketing_id").append('<option value="">--Select--</option>')
                $.each(data,function(key,value){
                    $("#customer_add #marketing_id").append('<option value="'+ value.id +'#'+value.name+'">'+ value.name +'</option>')
                });
                $("#customer_add #marketing_id").selectpicker('render').selectpicker('refresh');
            }
        }
         /**
         * ========= end modal part
         */
      
    });
</script>