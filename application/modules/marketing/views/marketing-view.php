<?php if(isset($all_marketing)): ?>
    <?php foreach($all_marketing as $key=>$value):?>
        <tr>
            <td class="text-center"><?php echo ++$key; ?></td>
            <td class="text-center"><?php echo $value['company_name']; ?></td>
            <td class="text-center"><?php echo $value['branch_name']; ?></td>
            <td class="text-center"><?php echo $value['marketing_name']; ?></td>
            <td class="text-center"><?php echo $value['designation']; ?></td>
            <td class="text-center"><?php echo $value['present_address']; ?></td>
            <td class="text-center"><?php echo $value['permanent_address']; ?></td>
            <td class="text-center"><?php echo $value['mobile']; ?></td>
            <td class="text-center"><?php echo $value['tel']; ?></td>
            <td class="actions btn-group-xs text-center">
                <?php if (hasPermission("marketing", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("marketing/marketingEdit/" . $value['marketing_id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("marketing", DELETE)) : ?>
                    <a onclick="return confirm('Are You Sure?')" href="<?php echo site_url("marketing/delete/" . $value['marketing_id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach;?>
<?php endif; ?>