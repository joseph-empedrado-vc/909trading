<div class="panel panel-success">

    <div class="panel-heading">
        <h3 class="panel-title font-normal">Body Types List</h3>
    </div>
    <div class="panel-body">
        <table id="tbl_ref_body_types" class="display table table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <?php if (isset($list_type['body_type']) && $list_type['body_type'] == 'form_stock') { ?>
                    <th></th>
                    <th></th>
                <?php } else { ?>
                    <th></th>
                    <th></th>
                <?php } ?>
                <th>Short Name</th>
                <th>Name</th>
            </tr>
            </thead>

            <tbody>
            <?php
                foreach($body_types as $row):
            ?>
                    <tr id="<?=$row['ID'];?>">
                        <?php if (isset($list_type['body_types']) && $list_type['body_types'] == 'form_stock') { ?>
                            <td class="text-center"><span class="glyphicon glyphicon-plus clickable body-type-add" title="Add"></span> </td>
                            <td class="text-center"><span class="glyphicon glyphicon-arrow-left clickable body-type-use" title="Use"></span> </td>
                        <?php } else { ?>
                        <td class="text-center"><span class="glyphicon glyphicon-edit clickable body-type-edit" title="Edit"></span> </td>
                        <td class="text-center"><span class="glyphicon glyphicon-trash clickable body-type-delete" title="Delete"></span> </td>
                        <?php } ?>
                        <td><?=$row['name'];?></td>
                        <td><?=$row['label'];?></td>
                    </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>

    </div>

</div>

<script>
    $(document).ready(function() {
        <?php if (isset($list_type['body_types']) && $list_type['body_types'] == 'form_stock') { ?>

        $('#tbl_ref_body_types').DataTable({
            "columnDefs": [
                {
                    "width": "02%",
                    "orderable": false,
                    "targets": [0,1]
                }


            ]
        });

        $('.body-type-add').click(function(){
            location.href="<?=_index_url.'admin/form/body_types';?>";
        });

        $('.body-type-use').click(function () {
            var nTr = $(this).closest('tr');
            var val_name = nTr.find('td:eq(2)').text();
            var val_label = nTr.find('td:eq(3)').text();


            $('#FLD_body_type').val(val_name);
            $('#body_type').val(val_label);

            $('#modal_ref_body_types').modal('hide');

        });

        <?php } else { ?>

            $('#tbl_ref_body_types').DataTable({
                "columnDefs": [
                    {
                        "width": "02%",
                        "orderable": false,
                        "targets": [0,1]

                    }


                ]
            });

            $('.body-type-edit').click(function () {
                var nTr = $(this).closest('tr');
                var val_name = nTr.find('td:eq(2)').text();
                var val_label = nTr.find('td:eq(3)').text();

                $('#FLD_ID').val(nTr.attr('ID'));
                $('#FLD_name').val(val_name);
                $('#FLD_label').val(val_label);

            });

            $('.body-type-delete').click(function () {
                var nTr = $(this).closest('tr');
                var data_to_delete =    {
                                            FLD_ID: nTr.attr('ID'),
                                            _return: '<?=_site_root_url.'admin/form/body_types';?>',
                                            x__token: $('#x__token').val()
                                        };
                $.form('<?=_site_root_url;?>form/delete_body_types',data_to_delete).submit();
            });
        <?php } ?>
    });
</script>