<div class="panel panel-success">

    <div class="panel-heading">
        <h3 class="panel-title font-normal">Makers List</h3>
    </div>
    <div class="panel-body">
        <table id="tbl_ref_makers" class="display table table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Short Name</th>
                <th>Name</th>
            </tr>
            </thead>

            <tbody>
            <?php
                foreach($makers as $row):
            ?>
                    <tr id="<?=$row['ID'];?>">
                        <td class="text-center"><span class="glyphicon glyphicon-edit clickable edit" title="Edit"></span> </td>
                        <td class="text-center"><span class="glyphicon glyphicon-trash clickable delete" title="Delete"></span> </td>
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
        $('#tbl_ref_makers').DataTable({
            "columnDefs": [
                {
                    "width": "02%",
                    "orderable": false,
                    "targets": [0,1]

                }


            ]
        });

        $('.edit').click(function () {
            var nTr = $(this).closest('tr');
            var val_name = nTr.find('td:eq(2)').text();
            var val_label = nTr.find('td:eq(3)').text();

            $('#FLD_ID').val(nTr.attr('ID'));
            $('#FLD_name').val(val_name);
            $('#FLD_label').val(val_label);

        });

        $('.delete').click(function () {
            var nTr = $(this).closest('tr');
            var data_to_delete =    {
                                        FLD_ID: nTr.attr('ID'),
                                        _return: '<?=_index_url.'admin/form/makers';?>',
                                        x__token: $('#x__token').val()
                                    };
            $.form('<?=_index_url;?>form/delete_makers',data_to_delete).submit();
        });
    });
</script>