<div class="col-md-6 col-md-push-3">
    <?php
    $error_message = $this->session->flashdata('error_message');
        if($error_message){
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?=$this->session->flashdata('error_message');?>
    </div>
    <?php } ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title font-normal">Admin Login <span class="glyphicon glyphicon-user pull-right"></span></h3>
        </div>
        <div class="panel-body" id="login_form_container">
            <form id="login_form" action="<?=_index_url;?>admin/validate_login" method="post" class="form-horizontal" role="form" novalidate="novalidate">
                <div id="FLD_username_holder" class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="FLD_username" id="FLD_username" placeholder="Username">
                    </div>
                </div>

                <div id="FLP_password_holder" class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="FLP_password" id="FLP_password" placeholder="Password">
                    </div>
                </div>

                <?php
                    echo create_csrf_token();
                    echo add_hidden_field('_return',_index_url.'admin/login');
                ?>
                <div class="form-group">
                    <div class="col-md-12">

                        <input id="send" type="submit" class="btn btn-primary btn-block" value="Send" style="height: 40px;">
                        <input id="clear" type="reset" class="btn btn-default btn-block" value="Clear Form" style=" height: 40px;">
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>
<script>
    $(function() {

        var v = $("#login_form").validate({
            rules: {
                FLD_username: "required",
                FLP_password: "required"
            },
            messages: {
                FLD_username: "Please enter your Username",
                FLP_password: "Please enter your Password"

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

                $("#login_form").submit();
            }

        });

    });
</script>