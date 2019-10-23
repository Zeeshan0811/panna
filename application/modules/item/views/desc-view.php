<?php if (isset($all_desc)) : ?>
    <?php foreach ($all_desc as $key => $value) : ?>
        <tr>
            <td class="text-center"><?php echo $value['code']; ?></td>
            <td class="text-center"><?php echo $value['company_name']; ?></td>
            <td class="text-center"><?php echo $value['branch_name']; ?></td>
            <td class="text-center"><?php echo $value['item_name']; ?></td>
            <td class="text-center"><?php echo $value['item_desc']; ?></td>
            <td class="text-center"><?php echo $value['purchase_price']; ?></td>
            <td class="text-center"><?php echo $value['re_qty']; ?></td>
            <td class="text-center"><?php echo $value['sale_price']; ?></td>
            <td class="actions btn-group-xs text-center">
                <?php if (hasPermission("item_description", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("item/itemdescription/edit/" . $value['desc_id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("item_description", DELETE)) : ?>
                    <a href="<?php echo site_url("item/itemdescription/delete/" . $value['desc_id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips deleteRow" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>