<?php if(isset($all_supplier)): ?>
    <?php foreach($all_supplier as $key=>$value):?>
        <tr>
            <td class="text-center"><?php echo $value['code']; ?></td>
            <td class="text-center"><?php echo $value['company_name']; ?></td>
            <td class="text-center"><?php echo $value['branch_name']; ?></td>
            <td class="text-center"><?php echo $value['supplier_name']; ?></td>
            <td class="text-center"><?php echo $value['address']; ?></td>
            <td class="text-center"><?php echo $value['email']; ?></td>
            <td class="text-center"><?php echo $value['tel']; ?></td>
            <td class="actions btn-group-xs text-center status">
                <?php if (hasPermission("supplier_info", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("supplier/edit/" . $value['supplier_id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("supplier_info", DELETE)) : ?>
                    <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("supplier/delete/" . $value['supplier_id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>