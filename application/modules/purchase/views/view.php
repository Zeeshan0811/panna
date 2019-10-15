<?php if(isset($all_stock)): ?>
    <?php foreach($all_stock as $key=>$item): ?>
        <?php if(isset($item)): ?>
            <?php $date_row=0; ?>
            <?php $row=0; ?>
            <?php foreach($item["date"] as $key=>$item_value): ?>
                <?php if($row<=0): ?>
                    <?php $date_row=$item_value[$item_value['item_name']]; ?>
                    <?php $row=$item_value[$item_value['item_name']]; ?>
                <?php endif; ?>
            <tr>
                <td class="text-center"><?= ++$key; ?></td>
                <?php if($date_row==$item_value[$item_value['item_name']]): ?>
                    <td  rowspan="<?php echo $date_row; ?>" class="text-center"><?= $item_value['date']; ?></td>
                <?php endif;?>
                <?php if($row==$item_value[$item_value['item_name']]): ?>
                    <td  valign="middle" rowspan="<?php echo $row; ?>" class="text-center"><?= $item_value['item_name']; ?></td>
                <?php endif;?>
                <td  class="text-center"><?= $item_value['item_desc']; ?></td>
                <td  class="text-center"><?= $item_value['qty']; ?></td>
                <td  class="text-center"><?= $item_value['purchase_price']; ?></td>
                <td  class="text-center"><?= $item_value['unit']; ?></td>
                <td class="actions btn-group-xs text-center">
                    <?php if (hasPermission("purchase", EDIT)) : ?>
                        <a title="Edit" href="<?php echo site_url("purchase/edit/" . $item_value['stock_id']); ?>" class=" btn btn-primary btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                    <?php endif; ?>
                    <?php if (hasPermission("purchase", EDIT)) : ?>
                        <a title="Total Edit" href="<?php echo site_url("purchase/editMain/" . $item_value['stock_amount_id']); ?>" class=" btn btn-info btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php $row--; ?>
            <?php $date_row--; ?>
            <?php endforeach;?>
        <?php endif;?>
    <?php endforeach;?>
<?php endif;?>