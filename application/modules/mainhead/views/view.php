<?php if (isset($all_head)) : ?>
    <?php foreach ($all_head as $key => $value) : ?>
        <tr>
            <td class="text-center"><?php echo ++$key; ?></td>
            <td class="text-center"><?php echo strtoupper($value['type_name']); ?></td>
            <td class="text-center"><?php echo $value['id']; ?></td>
            <td class="text-center"><?php echo $value['name']; ?></td>
            <td class="actions btn-group-xs text-center">
                <?php if (hasPermission("main_head", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("mainhead/edit/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("main_head", DELETE)) : ?>
                    <a href="<?php echo site_url("mainhead/delete/" . $value['id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips deleteRow" data-placement="top" data-toggle="tooltip" data-original-title="View" id=""><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>