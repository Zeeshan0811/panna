<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="print_div">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="clearfix">
                                <h4 class="text-center"><img src="<?php echo base_url().$this->logo ?>" alt="velonic"></h4>
                                <p class="text-center"><u>Invoice/Bill</u></p>
                            </div>
                            <div class="row ">
                                <div class="col-md-12 main-section">
                                    <div class="left-section m-t-15">
                                        <p><strong>Invoice No:</strong> <?= @$sales_invoice['invoice_no'] ?></p>
                                        <p class="m-t-10"><strong>Customer Name:</strong> <?= @$sales_invoice['customer_name'] ?></p>
                                        <p class="m-t-10"><strong>Referance:</strong> <?php echo  ($sales_invoice['marketing_name']!='')?$sales_invoice['marketing_name']:$sales_invoice['branch_name']; ?></p>
                                    </div>
                                    <div class=" middle-section m-t-15">
                                        <p><strong>Date: </strong> <?= @date("d/m/Y",strtotime($sales_invoice['created_at'])) ?></p>
                                        <p class="m-t-10"><strong>Address: </strong><?= @$sales_invoice['address'] ?></p>
                                        <p class="m-t-10"><strong>Sold By: </strong> <?= @$sales_invoice['sales_by'] ?></p>
                                    </div>
                                    <div class="right-section m-t-15">
                                        <p><strong>Time: </strong> <?= @date("h:i A",strtotime($sales_invoice['created_at']))?></p>
                                        <p class="m-t-10"><strong>Mobile: </strong><?= @$sales_invoice['tel'] ?></p>
                                        <p class="m-t-10"><strong>Remarks: </strong> <?= @$sales_invoice['remarks'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="sales_invoice" class="m-t-30">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">SL.</th>
                                                    <th class="text-center">Description</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Unit Price</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($sales_invoice[$sales_invoice["invoice_no"]] as $key=>$value): ?>
                                                <tr>
                                                    <td class="text-center"><?= ++$key ?></td>
                                                    <td class="text-center"><?= $value['item_desc'] ?></td>
                                                    <td class="text-center"><?= $value['qty'] ?></td>
                                                    <td class="text-center"><?= $value['sales_price'] ?></td>
                                                    <td class="text-center"><?= $value['sub_total'] ?></td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left m-t-30 text-right ">
                                        <p><strong>Previous Due:</strong> <?= @$sales_invoice['previous_balance'] ?></p>
                                        <p class="m-t-10"><strong>Current Sale:</strong> <?= @$sales_invoice['net_payable'] ?></p>
                                        <p class="m-t-10"><strong>Collected:</strong> <?= @$sales_invoice['pay'] ?></p>
                                        <p class="m-t-10"><strong>Net Outstanding:</strong> <?= @$sales_invoice['due'] ?></p>
                                    </div>
                                    <div class="pull-right m-t-30  text-right">
                                        <p><strong>Total Amount: </strong> <?= @$sales_invoice['total'] ?></p>
                                        <p class="m-t-10"><strong>Transport Cost: </strong> <?= @$sales_invoice['transport_charge'] ?></p>
                                        <p class="m-t-10"><strong>Discount: </strong> <?= @$sales_invoice['discount_tk'] ?></p>
                                        <p class="m-t-10"><strong>Net Payable: </strong> <?= @$sales_invoice['net_payable'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="m-t-10 text-center"><strong>In words:</strong> <?= @numbertowords(round(abs($sales_invoice['net_payable']))) ?> TK Only</p>
                                    <div class="pull-left m-l-15 m-t-30">
                                            -----------------------
                                        <p><strong>Customer Signature </strong></p>
                                    </div>
                                    <div class="pull-right m-t-30 m-r-15">
                                        -----------------------
                                        <p><strong>Authorized Signature </strong></p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <!-- <button id="print" onclick="printdiv('print_div')" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></button> -->
                                    <button  id="print" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   
                </div>
            </div>

        </div>
    </div> <!-- container -->          
</div> <!-- content -->
<style>
    @media print {
    @page 
        {
            size: A4;   /* auto is the current printer page size */
            margin:0;
        }
    html
        {
            background-color: #FFFFFF; 
            margin: 0px;  /* this affects the margin on the html before sending to printer */
        }
        .topbar,.side-menu ,.footer {
            display: none; 
        }
        #print_div{
            background-color: white;
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            margin: 0;
            padding: 15px;
            font-size: 14px;
            line-height: 18px;
        }
    }
</style>