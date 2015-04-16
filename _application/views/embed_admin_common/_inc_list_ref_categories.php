<div class="panel panel-success">

    <div class="panel-heading">
        <h3 class="panel-title font-normal">Categories List</h3>
    </div>
    <div class="panel-body">
        <table id="tbl_ref_categories" class="display table table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <?php if (isset($list_type['categories']) && $list_type['categories'] == 'form_stock') { ?>
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
                foreach($categories as $row):
            ?>
                    <tr id="<?=$row['ID'];?>">
                        <?php if (isset($list_type['categories']) && $list_type['categories'] == 'form_stock') { ?>
                            <td class="text-center"><span class="glyphicon glyphicon-plus clickable category-add" title="Add"></span> </td>
                            <td class="text-center"><span class="glyphicon glyphicon-arrow-left clickable category-use" title="Use"></span> </td>
                        <?php } else { ?>
                            <td class="text-center"><span class="glyphicon glyphicon-edit clickable category-edit" title="Edit"></span> </td>
                            <td class="text-center"><span class="glyphicon glyphicon-trash clickable category-delete" title="Delete"></span> </td>
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
        <?php if (isset($list_type['categories']) && $list_type['categories'] == 'form_stock') { ?>

        $('#tbl_ref_categories').DataTable({
            "columnDefs": [
                {
                    "width": "02%",
                    "orderable": false,
                    "targets": [0,1]
                }


            ]
        });

        $('.category-add').click(function(){
            location.href="<?=_index_url.'admin/form/categories';?>";
        });

        $('.category-use').click(function () {
            var nTr = new $(this).closest('tr');
            var val_name = nTr.find('td:eq(2)').text();
            var val_label = nTr.find('td:eq(3)').text();

            $('#FLD_category').val(val_name);
            $('#category').val(val_label);

            $('#modal_ref_categories').modal('hide');

        });

        <?php } else { ?>

            $('#tbl_ref_categories').DataTable({
                "columnDefs": [
                    {
                        "width": "02%",
                        "orderable": false,
                        "targets": [0,1]

                    }


                ]
            });

            $('.category-edit').click(function () {
                var nTr = $(this).closest('tr');
                var val_name = nTr.find('td:eq(2)').text();
                var val_label = nTr.find('td:eq(3)').text();

                $('#FLD_ID').val(nTr.attr('ID'));
                $('#FLD_name').val(val_name);
                $('#FLD_label').val(val_label);

            });

            $('.category-delete').click(function () {
                var nTr = $(this).closest('tr');
                var data_to_delete =    {
                                            FLD_ID: nTr.attr('ID'),
                                            _return: '<?=_index_url.'admin/form/categories';?>',
                                            x__token: $('#x__token').val()
                                        };
                $.form('<?=_index_url;?>form/delete_categories',data_to_delete).submit();
            });
        <?php } ?>
    });
</script>