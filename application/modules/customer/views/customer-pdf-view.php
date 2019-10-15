<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Customer Information</title>
  
    <style>
        .header{
            text-align:center;
        }
        .header .subtitle{
            padding-top:-30px;
        }
        table{
            width:100%;
            margin:0 auto;
        }
        #table td, #table th {
            border: 1px solid #000;
            padding: 3px;
            font-size:11px;
            text-align:center;
        }
        .header{
            width: 300px;
            height:110px;
            margin-left:auto;
            margin-right:auto;
            margin-top:-20px;
        }
        .company_info{
            height:80px;
        }
        .company_logo{
            width:80px;
            padding-left:15px;
            float:left;
        }
        .company_name img{
            width:25px;
            height:25px;
            margin-right:10px;
            margin-top:10px;
        }
        .company_name{
            margin-left:60px;
            font-size:20px;
            margin-top:15px;
            float:left;
        }
        .company_name span{
            padding-left:5px;
        }
        .company_title{
             position: absolute;
            top:50px;
            height:40px;
        }
        tfoot td{
            text-align:right!important;
        }
        .header_title{
            text-align:left!important;
        }
        /* #table tr:nth-child(even){background-color: #f2f2f2;} */
        @media print {
            @page{
            size : A4 portrait;
                margin:0;
                padding:0;
            }
        }
    </style>
</head>
<body>
    <div class="main_wrapper">
        <div class="header">
            <div class="company_info">
                <div class="company_name">
                <img src="<?php echo $company_info["logo"]; ?>"><span><?= $company_info['company_name'] ?></span>
                </div>
            </div>
            <div class="company_title">
                <div class=" branch_name">Branch: <?= $company_info['branch_name'] ?></div>
                <div class="  branch_address"><?= $company_info['branch_address'] ?></div>
            </div>
        </div>
        <div class="body-wrapper">
            <div class="table_wrap">
                <table id="table" class="">
                    <thead>
                        <tr>
                            <th colspan="12" class="text-left header_title">Customer List:</th>
                        </tr>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>CL</th>
                            <th>Marketing Ofiicer</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Telephone No.</th>
                            <th>NID</th>
                            <th>Trade License</th>
                            <th>Security Cheque</th>
                            <th>Bank Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($all_customer)): ?>
                        <?php $i=0; ?>
                        <?php foreach($all_customer as $key=>$value):?>
                            <tr class="">
                                <td><?php echo $value['code']; ?></td>
                                <td><?php echo $value['customer_name']; ?></td>
                                <td><?php echo $value['cl']; ?></td>
                                <td><?php echo $value['marketing_name']; ?></td>
                                <td><?php echo $value['address']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['tel']; ?></td>
                                <td><?php echo $value['national_id']; ?></td>
                                <td><?php echo $value['trade']; ?></td>
                                <td><?php echo $value['security_cheque']; ?></td>
                                <td><?php echo $value['customer_bank']; ?></td>
                                <td><?php echo $value['amount']; ?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">Total Customer: <?= @$total_customer ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>