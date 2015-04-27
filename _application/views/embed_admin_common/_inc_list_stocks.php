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
                            <th></th>
                            <th>Details</th>
                            <th>Description</th>
                        <?php } else { ?>
                            <th></th>
                            <th>Details</th>
                            <th>Description</th>
                        <?php } ?>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach($stocks as $row):
                        ?>
                        <tr id="<?=$row['ID'];?>">
                            <?php if (isset($list_type['stocks']) && $list_type['stocks'] == 'form_stock') { ?>
                                <td class="text-center" style="font-size: 1.5em;">
                                    <span class="glyphicon glyphicon-arrow-left clickable stock-edit" title="Edit"></span>
                                    <br/>
                                    <span class="glyphicon glyphicon-ban-circle clickable stock-sold" title="Sold"></span>
                                    <br/>
                                    <span class="glyphicon glyphicon-trash clickable stock-delete" title="Delete"></span>
                                </td>

                            <?php } else { ?>

                            <?php } ?>
                            <td>
                                <img src="<?=_base_url.'upload/'.$row['ID'].'/'.get_images($row['ID'],'thumb-1');?>" />
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
                                <?php
                                    if($row['status'] == 'sold'){
                                        echo '<span style="color:#ff0000;">Status : '.$row['status'].'</span>';
                                    }else{
                                        echo '<span style="color:#000;">Status : '.$row['status'].'</span>';
                                    }
                                ?>
                            </td>
                            <td><?=$row['description'];?></td>
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
                    "width": "05%",
                    "orderable": false,
                    "targets": 0
                }

            ]
        });

        $('.stock-sold').click(function () {
            var nTr = $(this).closest('tr');
            var item_data =    {
                FLD_ID: nTr.attr('ID'),
                _return: '<?=_index_url.'admin/form/stocks/new';?>',
                x__token: $('#x__token').val()
            };
            $.form('<?=_index_url;?>admin/form/stocks/sold',item_data).submit();
        });

        $('.stock-delete').click(function () {
            var nTr = $(this).closest('tr');
            var item_data =    {
                FLD_ID: nTr.attr('ID'),
                _return: '<?=_index_url.'admin/form/stocks/new';?>',
                x__token: $('#x__token').val()
            };
            $.form('<?=_index_url;?>admin/form/stocks/delete',item_data).submit();
        });


    });
</script>