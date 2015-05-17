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
                        <?php if (@$list_type['stocks'] == 'form_stock') { ?>
                            <th></th>
                            <th></th>
                            <th>Details</th>
                            <th>Description</th>
                        <?php } ?>
                        <?php if(@$list_type['stocks'] == 'list_stock') { ?>
                            <th></th>
                            <th>Details</th>
                            <th>Description</th>
                            <th></th>
                        <?php } ?>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach($stocks as $row):
                        ?>
                        <tr id="<?=$row['ID'];?>">

                            <!-- Form Stock -->
                            <?php if (isset($list_type['stocks']) && $list_type['stocks'] == 'form_stock') { ?>

                                <td class="text-center" style="font-size: 1.5em;">
                                    <span class="glyphicon glyphicon-arrow-left clickable stock-edit" title="Edit"></span>
                                    <br/>
                                    <span class="glyphicon glyphicon-ban-circle clickable stock-sold" title="Sold"></span>
                                    <br/>
                                    <span class="glyphicon glyphicon-trash clickable stock-delete" title="Delete"></span>
                                </td>
                                <td class="view-item-full">
                                    <img src="<?=_base_url.'upload/'.$row['ID'].'/'.get_images($row['ID'],'thumb-1');?>"
                                          />
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
                            <!-- End Form Stock -->
                            <?php } ?>


                            <?php if(@$list_type['stocks'] == 'list_stock') { ?>

                                <td>
                                    <img class="slide-show clickable" src="<?=_base_url.'upload/'.$row['ID'].'/'.get_images($row['ID'],'thumb-1');?>"
                                         title="<?=$row['maker_label'].' | '.$row['body_type_label'].' | '.$row['category_label'].' | '.$row['ID'];?> " />
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
                                <td>
                                    <button type="button"
                                            class="inquire-item btn btn-primary btn-block"
                                            data="<?=$row['maker_label'].' | '.$row['body_type_label'].' | '.$row['category_label'].' | '.$row['ID'];?> ">
                                        Inquire
                                    </button>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
        <?php } ?>
    </div>

</div>

<?php if(@$list_type['stocks'] == 'list_stock') { ?>

    <!-- Modal -->
    <div class="modal fade" id="modal-inquiry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Inquire</h4>
                </div>
                <div class="modal-body" id="inquiry_form_container">
                    <?php $this->load->view('embed_common/_inc_form_inquiry_message'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('embed_common/_inc_form_inquiry_message_js'); ?>
<?php } ?>

<?php if(@$list_type['stocks'] == 'list_stock') { ?>

    <!-- Modal -->
    <div class="modal fade" id="modal-stock-slide" tabindex="-1" role="dialog" aria-labelledby="modal-image-slide-label" aria-hidden="true">
        <div class="modal-dialog" style="width: 80% !important;">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-image-slide-label">Stock</h4>
                </div>
                <div class="modal-body" id="image-slide_container">
                    <?php $this->load->view('embed_common/_inc_image-slide'); ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        echo create_csrf_token();
    ?>
<?php } ?>



<script>

    $(document).ready(function() {
        $('#tbl_stocks').dataTable({
            "columnDefs": [
                {
                    "width": "05%",
                    "orderable": false,
                    "targets": 0
                }
                ,{
                    "width": "05%",
                    "orderable": false,
                    "targets": 3
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

        $('#modal-inquiry').modal('hide');
        $('.inquire-item').click(function(){
            var ttlArr = $(this).attr('data').split('|');
            var _subject = 'Stock No:'+ttlArr[3]+' Enquiry';
            var _msg = 'Hello, Please, send me more information about '+ttlArr[0]+' '+ttlArr[1]+' '+ttlArr[2]+'. Thank you';
            $('#message').val(_msg);
            $('#subject').val(_subject);
            $('#modal-inquiry').modal('show');
        });

        // Stock Image Slide
        $('.slide-show').click(function(){
            var nTr = $(this).closest('tr');
            var ttlArr = $(this).attr('title').split('|');
            var _header = 'Stock No:'+ttlArr[3]+' '+ttlArr[0]+' '+ttlArr[1]+' '+ttlArr[2];
            var item_data =    {
                    FLD_ID: nTr.attr('ID'),
                    r_type : 'ajax-big',
                    x__token: $('#x__token').val()
            };

            $.post(
                'ajax/get_images',
                item_data,
                function(data){

                    if(data.cnt > 0){
                        $("#image-slide-carousel-indicators").html('');
                        $("#image-slide-carousel-inner").html('');
                        $('#modal-image-slide-label').html(_header);
                        var iHtml ='';
                        $.each(data.files, function(index, val){

                            if(index == 0){
                                $("#image-slide-carousel-indicators").append('<li data-target="#image-slide-carousel-top" data-slide-to="0" class="active"><\/li>');
                            }else{
                                $("#image-slide-carousel-indicators").append('<li data-target="#image-slide-carousel-top" data-slide-to="'+index+'"><\/li>');
                            }

                            if(index == 0) {
                                 iHtml += '<div class="item active">';
                            }else{
                                 iHtml += '<div class="item">';
                            }
                            iHtml += '<img  style="width:100%;" src="' + _upload_url + nTr.attr('ID') + '\/' + val + '" alt="Stock">';

                            iHtml += '<div class="carousel-caption">';
                            //iHtml +=    '<h2 class="font-normal text-uppercase font-white-black">'+ttlArr[0]+' '+ttlArr[1]+'<\/h2>';
                            iHtml +=    '<p class="text-shadow">'+_header+'<\/p>';
                            iHtml += '<\/div>';

                            iHtml += '<\/div>';


                        });
                        $('#image-slide-carousel-inner').html(iHtml);
                        $('#modal-stock-slide').modal('show');
                    }

                },
                'json'
            );


        });

    });
</script>