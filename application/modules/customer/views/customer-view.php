<?php if(isset($all_customer)): ?>
    <?php foreach($all_customer as $key=>$value):?>
        <tr>
            <td class="text-center"><?php echo $value['code']; ?></td>
            <td class="text-center"><?php echo $value['company_name']; ?></td>
            <td class="text-center"><?php echo $value['branch_name']; ?></td>
            <td class="text-center"><?php echo $value['customer_name']; ?></td>
            <td class="text-center"><?php echo $value['cl']; ?></td>
            <?php if($value['picture']!=''): ?>
            <td class="text-center"><img src="<?php echo base_url()."/".$value['picture']; ?>" class="img-responsive img-circle thumb-sm"></td>
            <?php else:?>
            <td class="text-center"><img src="<?php echo base_url()."/assets/images/default.png" ?>" class="img-responsive img-circle thumb-sm"></td>
            <?php endif;?>
            <td class="text-center"><?php echo $value['marketing_name']; ?></td>
            <td class="text-center"><?php echo $value['address']; ?></td>
            <td class="text-center"><?php echo $value['email']; ?></td>
            <td class="text-center"><?php echo $value['tel']; ?></td>
            <td class="text-center"><?php echo $value['national_id']; ?></td>
            <td class="text-center"><?php echo $value['trade']; ?></td>
            <td class="text-center"><?php echo $value['security_cheque']; ?></td>
            <td class="text-center"><?php echo $value['customer_bank']; ?></td>
            <td class="text-center"><?php echo $value['amount']; ?></td>
            <td class="actions btn-group-xs text-center status">
                <?php if (hasPermission("customer_info", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("customer/edit/" . $value['customer_id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("customer_info", DELETE)) : ?>
                    <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("customer/delete/" . $value['customer_id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>