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
                    <td  valign="middle" rowspan="<?php echo $date_row; ?>" class="text-center"><?= $item_value['date']; ?></td>
                <?php endif;?>
                <?php if($row==$item_value[$item_value['item_name']]): ?>
                    <td  valign="middle" rowspan="<?php echo $row; ?>" class="text-center"><?= $item_value['item_name']; ?></td>
                <?php endif;?>
                <td  class="text-center"><?= $item_value['item_desc']; ?></td>
                <td  class="text-center"><?= $item_value['qty']; ?></td>
                <td  class="text-center"><?= $item_value['purchase_price']; ?></td>
                <td  class="text-center"><?= $item_value['unit']; ?></td>
                <td  class="text-center btn-group-xs">
                    <a class="btn btn-info" href="<?= site_url("openstock/edit/".$item_value['stock_id']) ; ?>"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            <?php $row--; ?>
            <?php $date_row--; ?>
            <?php endforeach;?>
        <?php endif;?>
    <?php endforeach;?>
<?php endif;?>