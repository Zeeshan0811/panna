<?php if (isset($all_bank)) : ?>
    <?php foreach ($all_bank as $key => $value) : ?>
        <tr>
            <td class="text-center"><?php echo ++$key; ?></td>
            <td class="text-center"><?php echo $value['company_name']; ?></td>
            <td class="text-center"><?php echo $value['branch_name']; ?></td>
            <td class="text-center"><?php echo $value['bank_name']; ?></td>
            <td class="text-center"><?php echo $value['branch_address']; ?></td>
            <td class="text-center"><?php echo $value['ac_type']; ?></td>
            <td class="text-center"><?php echo $value['account_no']; ?></td>
            <td class="actions btn-group-xs text-center">
                <?php if (hasPermission("company_bank", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("company/editBank/" . $value['bank_id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("company_bank", DELETE)) : ?>
                    <a href="<?php echo site_url("company/deleteBank/" . $value['bank_id']); ?>" title="Delete" class=" deleteRow text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>


<script>
    $('.deleteRow').click(function(e) {
        e.preventDefault();
        // debugger;
        var element = $(this);
        var confirmation = confirm('Are You sure want to delete this?');
        var url = element.attr('href');

        if (confirmation != true) {
            return false;
        } else {
            $.ajax({
                url: url,
                cache: false,
                success: function(data) {
                    if (data == 1) {
                        element.closest('tr').remove();
                    } else if (data == 3) {
                        alert('Warning! Permission Denied.');
                    } else {
                        alert('Danger! Can\'t Delete this.');
                    }
                    console.log(data);
                }
            });
        }
    });
</script>