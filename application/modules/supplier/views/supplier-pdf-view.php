<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Supplier Information</title>
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
                            <th colspan="5" class="text-left header_title">Supplier List:</th>
                        </tr>
                        <tr>
                            <th class="text-center">Code</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telephone No.</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($all_supplier)): ?>
                        <?php foreach($all_supplier as $key=>$value):?>
                            <tr>
                                <td class="text-center"><?php echo $value['code']; ?></td>
                                <td class="text-center"><?php echo $value['supplier_name']; ?></td>
                                <td class="text-center"><?php echo $value['address']; ?></td>
                                <td class="text-center"><?php echo $value['email']; ?></td>
                                <td class="text-center"><?php echo $value['tel']; ?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif; ?>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total Supplier: <?= @$total_supplier ?></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>