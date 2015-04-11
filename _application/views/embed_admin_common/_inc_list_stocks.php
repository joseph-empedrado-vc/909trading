<div class="panel panel-success">

    <div class="panel-heading">
        <h3 class="panel-title font-normal">Stocks</h3>
    </div>
    <div class="panel-body">
        <table id="tbl_stocks" class="display table table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <?php if (isset($ref_list_type) && $ref_list_type == 'for_stock_form') { ?>
                    <th></th>
                    <th></th>
                <?php } else { ?>
                    <th></th>
                    <th></th>
                <?php } ?>
                <th>No</th>
                <th>Maker</th>
                <th>Body Type</th>
                <th>Category</th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($stocks as $row):
                ?>
                <tr id="<?=$row['ID'];?>">
                    <?php if (isset($ref_list_type) && $ref_list_type == 'for_stock_form') { ?>
                        <td class="text-center"><span class="glyphicon glyphicon-plus clickable body-type-add" title="Add"></span> </td>
                        <td class="text-center"><span class="glyphicon glyphicon-arrow-left clickable body-type-use" title="Use"></span> </td>
                    <?php } else { ?>
                        <td class="text-center"><span class="glyphicon glyphicon-edit clickable body-type-edit" title="Edit"></span> </td>
                        <td class="text-center"><span class="glyphicon glyphicon-trash clickable body-type-delete" title="Delete"></span> </td>
                    <?php } ?>
                    <td><?=$row['ID'];?></td>
                    <td><?=$row['maker_label'];?></td>
                    <td><?=$row['body_type_label'];?></td>
                    <td><?=$row['category_label'];?></td>
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

    });
</script>