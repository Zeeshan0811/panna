<?php if (isset($all_ledger)) : ?>
    <?php foreach ($all_ledger as $key => $value) : ?>
        <tr>
            <td class="text-center"><?php echo ++$key; ?></td>
            <td class="text-center"><?php echo strtoupper($value['head_name']); ?></td>
            <td class="text-center"><?php echo $value['led_Id']; ?></td>
            <td class="text-center"><?php echo $value['name']; ?></td>
            <td class="actions btn-group-xs text-center">
                <?php if (hasPermission("ledger", EDIT)) : ?>
                    <a title="Edit" href="<?php echo site_url("ledger/edit/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (hasPermission("ledger", DELETE)) : ?>
                    <a href="<?php echo site_url("ledger/delete/" . $value['id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips deleteRow" data-placement="top" data-toggle="tooltip" data-original-title="View" id=""><i class="fa fa-trash"></i></a>
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