<?php if(isset($payment_details)): ?>
    <?php foreach($payment_details as $key=>$value): ?>
        <tr>
            <td class="text-center"><?= ++$key ?></td>
            <td class="text-center"><?= date("d-m-Y",strtotime($value['date'])) ?></td>
            <td class="text-center"><?= $value['name'] ?></td>
            <td class="text-center"><?= $value['pay_type'] ?></td>
            <td class="text-center"><?= $value['debit']  ?></td>
            <td class="text-center"><?= $value['description']  ?></td>
            <td class="actions btn-group-xs text-center status">
                <?php if (hasPermission("payment", EDIT)) : ?>
                    <?php if($value['stock_amount_id']!=''): ?>
                        <a title="Edit" href="<?php echo site_url("purchase/editMain/" . $value['stock_amount_id']); ?>" class=" btn btn-primary btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                    <?php else:?>
                        <a title="Edit" href="<?php echo site_url("payment/edit/" . $value['id']); ?>" class=" btn btn-primary btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach;?>
<?php endif;?>