<div class="row">

    <div class="col-md-12">

        <div class="panel panel-success">

            <div class="panel-heading">
                <h3 class="panel-title font-normal">Form</h3>
            </div>
            <div class="panel-body">

                <form id="form_body_types" action="<?=_index_url;?>form/validate_body_types" method="post" class="form-horizontal" role="form" novalidate="novalidate">

                    <div id="FLD_name_holder" class="form-group">
                        <label for="FLD_name" class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="FLD_name" id="FLD_name" placeholder="Name">
                            <p class="text-primary text-justify f14">Name must not contain special characters and space.</p>
                            <p class="text-primary text-justify f14">ie: tractor_head</p>
                        </div>
                    </div>

                    <div id="FLD_label_holder" class="form-group">
                        <label for="FLD_name" class="col-md-3 control-label">Label</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="FLD_label" id="FLD_label" placeholder="Label">
                            <p class="text-primary text-justify f14">ie: Tractor Head.</p>
                        </div>
                    </div>
                    <?php
                        echo create_csrf_token();
                        echo add_hidden_field('_return',_site_root_url.'admin/form/body_types');
                        echo add_hidden_field('FLD_ID','');

                    ?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input id="send" type="submit" class="btn btn-primary btn-block" value="Save" style="height: 40px;">
                        </div>
                        <div class="col-md-6">
                            <input id="clear" type="reset" class="btn btn-default btn-block" value="Clear" style=" height: 40px;">
                        </div>
                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<script>
    $(function() {
        $.validator.addMethod("regex", function(value, element, regexpr) {
            return regexpr.test(value);
        }, "Please enter a valid value.");

        var v = $("#form_body_types").validate({
            rules: {
                FLD_name: {
                    required:true,
                    regex:/^[a-zA-Z0-9_]*$/
                },
                FLD_label:{
                    required:true
                }

            },
            messages: {
                FLD_name: {
                    required:"Please enter body types name",
                    regex:"Please enter a valid name"
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

                $("#form_body_types").submit();
            }

        });

    });
</script>