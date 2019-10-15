<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="">
                        <h1 class="title text-center"><img src="<?php echo @$logo; ?>"><h1>
                        <h4 class=" text-center m-t-5"><?php echo @$address; ?></h4>
                    </div>
                    <div class="top_details m-b-15">
                        <div class="left-section-report ">
                            <p><span class="top_title">Product Name:</span> <strong><?php echo @$item_name; ?></strong></p>
                            <p class="m-t-10"><span class="top_title">Description: </span><strong><?php echo @$item_desc_name; ?></strong></p>
                            <p class="m-t-10">Starting Date: <?php echo date("d - M - Y",strtotime(@$starting_date)); ?> Closing Date: <?php echo date("d - M - Y",strtotime(@$closing_date)); ?></p>
                        </div>
                        <div class="right-section-report ">
                            <p class="closing_balance"><span class="closing_balance_title">Closing Balance:</span> <strong><?php echo @$result['closing_balance'] ?></strong></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class=""><a  href="javascript:void(0)" onclick="window.print();" class="btn bg-primary print_button pull-right m-l-10"><i class="fa fa-print"></i></a>
                            <table id="datatable" class="stock_reports_table">
                                <thead>
                                    <tr>
                                        <th class="text-center">SL.</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Inv. No</th>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">In</th>
                                        <th class="text-center">Out</th>
                                        <th class="text-center">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center " style="border-right:none" colspan="6"><span class="opening_balance">Opening Balance:</span></td>
                                    <td class="text-center open_td_balance"><span class=""><?php echo @$result['opening_balance'] ?></span></td>
                                </tr>
                                <?php if(isset($result['details'])): $i=1;?>
                                    <?php foreach($result['details'] as $key=>$value): ?>
                                        <tr>
                                            <td class="text-center"><?= $i; $i++;?></td>
                                            <td class="text-center"><?= $value['date']; ?></td>
                                            <td class="text-center"><?= $value['invoice_no']; ?></td>
                                            <td class="text-center"><?= $value['type']; ?></td>
                                            <td class="text-center"><?= @$value['in_qty']; ?></td>
                                            <td class="text-center"><?= @$value['out_qty']; ?></td>
                                            <td class="text-center"><?= @$value['balance']; ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center" colspan="7" style="border:none"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center stock_grand_total" colspan="4">Grand Total :</td>
                                        <td class="text-center"><strong><?php echo @$result['total_in'] ?></strong></td>
                                        <td class="text-center"><strong><?php echo @$result['total_out'] ?></strong></td>
                                        <td class="text-center"><strong><?php echo @$result['closing_balance'] ?></strong></td>
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
    
<style>
    @page 
    {
        size: A4 portrait;   /* auto is the current printer page size */
        margin:0;
    }
    @media print {
        body *{
            margin:0px!important;
        }
        .topbar,.side-menu ,.footer,.no_print,.print_button,.box-head {
            display: none; 
            position:absolute;
        }
        #datatable,.top_details{
            margin-top:15px!important;
        }
        #print_div {
            width:100%;
            height:100%;
            background-color: white;
            margin:0 auto!important;
            padding: 0;
            font-size: 14px;
            line-height: 18px;
        }
    }
</style>