<?php if(isset($balance_details)): ?>
    <?php foreach($balance_details as $key=>$value): ?>
        <tr>
            <td class="text-center"><?= $value['name'] ?></td>
            <td class="text-center"><?php  echo $value['debit']!=''?$value['debit']:"0";  ?></td>
            <td class="text-center"><?php  echo $value['credit']!=''?$value['credit']:"0";  ?></td>
            <td class="actions btn-group-xs text-center status">
                <?php if (hasPermission("opening_balance", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("openbalance/edit/" . $value['id']); ?>" class=" btn btn-primary btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach;?>
<?php endif;?>