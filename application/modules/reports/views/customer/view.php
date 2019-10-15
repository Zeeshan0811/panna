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
                        <div class="customer-left-section-report ">
                            <p><span class="top_title">Ladger Name:</span> <strong><?php echo @$ledger_name; ?></strong></p>
                            <p class="m-t-10">Starting Date: <?php echo date("d - M - Y",strtotime(@$starting_date)); ?> </p>
                            <p class="m-t-10">Closing Date: &nbsp;<?php echo date("d - M - Y",strtotime(@$closing_date)); ?></p>
                        </div>
                        <div class="customer-right-section-report ">
                            <p class="closing_balance"><span class="closing_balance_title">Opening Balance:</span> <strong><?php echo number_format(abs(@$result['opening_balance']),2) ?><?php if($result['opening_balance']>=0) echo " Dr"; else echo " Cr"; ?></strong></p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class=""><a  href="javascript:void(0)" onclick="window.print();" class="btn bg-primary print_button pull-right m-l-10"><i class="fa fa-print"></i></a>
                            <table id="datatable" class="stock_reports_table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-left">Particluars</th>
                                        <th class="text-right">Debit</th>
                                        <th class="text-right">Credit</th>
                                        <th class="text-right">Balance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if(isset($result['details'])):?>
                                    <?php foreach($result['details'] as $key=>$value): ?>
                                        <tr>
                                            <td class="text-center"><?= @$value['no']; ?></td>
                                            <td class="text-center"><?= $value['date']; ?></td>
                                            <td class="text-left"><?= @$value['particulars']; ?></td>
                                            <td class="text-right"><?= number_format(@$value['debit'],2); ?></td>
                                            <td class="text-right"><?= number_format(@$value['credit'],2); ?></td>
                                            <td class="text-right"><?= number_format(@$value['balance'],2); ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="text-center" colspan="6" style="border:none"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center stock_grand_total" colspan="3">Closing Balance :</td>
                                        <td class="text-center"><strong><?php echo number_format(@$result['total_debit'],2) ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format(@$result['total_credit'],2) ?></strong></td>
                                        <td class="text-center"><strong><?php echo number_format(@abs($result['closing_balance']),2) ?><?php if($result['closing_balance']>=0) echo " Dr"; else echo " Cr"; ?></strong></td>
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