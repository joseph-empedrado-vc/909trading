<div class="panel panel-success">

    <div class="panel-heading">
        <h3 class="panel-title font-normal">Stocks</h3>
    </div>
    <div class="panel-body" style="overflow: auto;">
        <?php if(!$stocks || count($stocks) == 0 ) { ?>
                <h4 class="page-sub-title">No data to display</h4>
        <?php }else{ ?>
                <table id="tbl_stocks" class="display table table-bordered table-responsive" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <?php if (isset($list_type['stocks']) && $list_type['stocks'] == 'form_stock') { ?>
                            <th></th>

                        <?php } else { ?>

                        <?php } ?>
                        <th></th>
                        <th>Description / Info</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach($stocks as $row):
                        ?>
                        <tr id="<?=$row['ID'];?>">
                            <?php if (isset($list_type['stocks']) && $list_type['stocks'] == 'form_stock') { ?>
                                <td class="text-center">
                                    <span class="glyphicon glyphicon-arrow-left clickable stock-edit" title="Edit"></span>
                                    <br/>

                                    <span class="glyphicon glyphicon-trash clickable stock-sold" title="Delete"></span>
                                </td>

                            <?php } else { ?>

                            <?php } ?>
                            <td>
                                <img class="clickable"  src="<?=_assets_url;?>images/no_image_sm.png">
                            </td>
                            <td>
                                No: <?=$row['ID'];?>
                                <br/>
                                Maker: <?=$row['maker_label'];?>
                                <br/>
                                Body Type: <?=$row['body_type_label'];?>
                                <br/>
                                Category: <?=$row['category_label'];?>
                                <br/>
                                Status: <?=$row['status'];?>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
        <?php } ?>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#tbl_stocks').dataTable({
            "columnDefs": [
                {
                    "width": "01%",
                    "orderable": false,
                    "targets": [0]
                },
                {
                    "width": "09%",
                    "orderable": false,
                    "targets": [1]
                }


            ]
        });
    });
</script>