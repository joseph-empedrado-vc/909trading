<div class="row">

    <div class="col-md-12">

        <div class="panel panel-success">

            <div class="panel-heading">
                <h3 class="panel-title font-normal">Form</h3>
            </div>
            <div class="panel-body">

                <form id="form_stocks"  enctype="multipart/form-data" action="<?=_index_url;?>form/validate_stocks" method="post" class="form-horizontal" role="form" novalidate="novalidate">


                    <?php $this->load->view('embed_admin_common/_inc_form_upload_files'); ?>



                    <div id="FLD_maker_holder" class="form-group">

                        <label for="FLD_maker" class="col-md-3 control-label">Maker </label>

                        <div class="col-md-9">
                            <input type="hidden" class="form-control" name="FLD_maker" id="FLD_maker">
                            <input type="text" readonly class="form-control bg-white" name="maker" id="maker" placeholder="Makers">
                        </div>
                    </div>



                    <div id="FLD_body_type_holder" class="form-group">
                        <label for="FLD_body_type" class="col-md-3 control-label">Body Type</label>
                        <div class="col-md-9">
                            <input type="hidden" class="form-control" name="FLD_body_type" id="FLD_body_type">
                            <input type="text"  readonly class="form-control bg-white" name="body_type" id="body_type" placeholder="Body Type">
                        </div>
                    </div>

                    <div id="FLD_category_holder" class="form-group">
                        <label for="FLD_category" class="col-md-3 control-label">Category</label>
                        <div class="col-md-9">
                            <input type="hidden" class="form-control" name="FLD_category" id="FLD_category">
                            <input type="text"  readonly class="form-control bg-white" name="category" id="category" placeholder="Category">
                        </div>
                    </div>

                    <div id="FLD_year_holder" class="form-group">
                        <label for="FLD_year" class="col-md-3 control-label">Year</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="FLD_year" id="FLD_year" placeholder="Year">
                        </div>
                    </div>

                    <div id="FLD_descrption" class="form-group">
                        <label for="FLD_descrption" class="col-md-3 control-label">Description</label>
                        <div class="col-md-9">
                            <textarea rows="4" class="form-control" name="FLD_description" id="FLD_description" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div id="FLD_mileage_holder" class="form-group">
                        <label for="FLD_mileage" class="col-md-3 control-label">Mileage</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="FLD_mileage" id="FLD_mileage" placeholder="Mileage">
                        </div>
                    </div>

                    <?php
                    echo create_csrf_token();
                    echo add_hidden_field('_return',_index_url.'admin/form/stocks/new');
                    ?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input id="send" type="submit" class="btn btn-primary btn-block" value="Save" style="height: 40px;">
                        </div>
                        <div class="col-md-6">
                            <input id="clear" type="reset" class="btn btn-default btn-block" value="Clear" style="height: 40px;">
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<?php $this->load->view('embed_admin_common/_inc_modal_ref_makers'); ?>
<?php $this->load->view('embed_admin_common/_inc_modal_ref_categories'); ?>
<?php $this->load->view('embed_admin_common/_inc_modal_ref_body_types'); ?>

<script>
    $(function() {

        var v = $("#form_stocks").validate({
            rules: {
                maker: {
                    required:true
                },
                category: {
                    required:true
                },
                body_type: {
                    required:true
                },
                FLD_description: {
                    required:true
                }

            },
            highlight: function (element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            success: function (element) {
                element.closest('.form-group').removeClass('has-error');
                element.remove();
            },
            submitHandler: function() {
                var msgHtml =	'';
                $("#form_stocks").submit();
            }

        });

        $('#maker').focus(function(){
            $('#modal_ref_makers').modal('show');
        });
        $('#category').focus(function(){
            $('#modal_ref_categories').modal('show');
        });
        $('#body_type').focus(function(){
            $('#modal_ref_body_types').modal('show');
        });

    });
</script>