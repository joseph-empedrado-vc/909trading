<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title font-normal">Contact Us <span class="glyphicon glyphicon-comment"></span></h3>
        </div>
        <div class="panel-body" id="contact_form_container">
            <form id="contact_form" class="form-horizontal" role="form" novalidate="novalidate">
                <div id="full_name_holder" class="form-group">

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
                    </div>
                </div>
                <div id="mobile_number_holder" class="form-group">

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number">
                    </div>
                </div>

                <div id="email_holder" class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>

                <div id="subject_holder" class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                    </div>
                </div>
                <div id="message_holder" class="form-group">
                    <div class="col-md-12">
                        <textarea id="message" name="message" class="form-control" placeholder="Add Message" rows="3"></textarea>

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Captcha Image</label>
                    <div class="col-md-8">
                        <img src="<?=_site_root_url;?>get_captcha" alt="" id="captcha">
                        <span class="glyphicon glyphicon-repeat clickable" id="refresh" title="Refresh"></span>

                    </div>
                </div>

                <div id="captcha_holder" class="form-group">
                    <div class="col-md-12">
                        <input type="text" name="captcha_code" id="captcha_code" class="form-control" placeholder="Captcha Code">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">

                        <input type="hidden" name="__sec_key">
                        <input id="send" type="submit" class="btn btn-primary btn-block" value="Send" style="height: 40px;">
                        <input id="clear" type="reset" class="btn btn-default btn-block" value="Clear Form" style=" height: 40px;">
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(function() {

            $('#refresh').click(function(){
                $('#captcha').attr('src','<?=_site_root_url;?>get_captcha?j='+ Math.random());
            });

            var v = $("#contact_form").validate({
                rules: {
                    full_name: "required",
                    mobile	: {
                        "required" 	: true,
                        "number"	: true
                    }
                    ,email	: {
                        "required"	: true,
                        "email"	:	true
                    },

                    subject	: "required",
                    message	: "required",
                    captcha_code: {
                        required: true,
                        remote: "<?=_site_root_url;?>validate_captcha"
                    }
                },
                messages: {
                    full_name: "Please enter your name",
                    mobile	: "Please enter your mobile #",
                    email	: {
                        required : "Please enter your email",
                        email	: "Please enter a valid email"
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
                    $.post(
                        'send_message',
                        $('#contact_form').serialize(),
                        function(data){

                            var e_code = data.error_code;

                            if(e_code == 'captcha')
                            {

                                $('#captcha').attr('src','<?=_site_root_url;?>get_captcha?j='+ Math.random());
                                msgHtml += 	'<div class="alert alert-danger alert-dismissable col-md-12">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                                '<strong>Error!! </strong> Incorect captcha code. Please try again.'+
                                '</div>';


                                $('#contact_form_container').prepend(msgHtml);
                                setTimeout(function(){
                                    $(".alert-dismissable").fadeOut('slow');
                                    $('div.has-error').removeClass('has-error');
                                },8000);

                            }else if(e_code == 'skey')
                            {
                                msgHtml += 	'<div class="alert alert-danger alert-dismissable col-md-12">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                                '<strong>Error!! </strong> Invalid session. Please refresh the page and try again.'+
                                '</div>';

                                $('#contact_form_container').prepend(msgHtml);
                                setTimeout(function(){
                                    $(".alert-dismissable").fadeOut('slow');
                                    $('div.has-error').removeClass('has-error');
                                },8000);

                            }else if(e_code == 'mail')
                            {
                                msgHtml += 	'<div class="alert alert-danger alert-dismissable col-md-12">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                                '<strong>Error!! </strong> Sorry there was a problem sending your message. Please try again later.'+
                                '</div>';

                                $('#contact_form_container').prepend(msgHtml);
                                setTimeout(function(){
                                    $(".alert-dismissable").fadeOut('slow');
                                    $('div.has-error').removeClass('has-error');
                                },8000);

                            }else if(e_code == '')
                            {
                                msgHtml += 	'<div class="alert alert-success alert-dismissable col-md-12">'+
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                                '<strong>Thank you! </strong> Your message has been sent.'+
                                '</div>';

                                $('#contact_form_container').prepend(msgHtml);
                                $('html, body').animate({
                                    scrollTop: $("#main-content").offset().top
                                }, 2000);
                                setTimeout(function(){
                                    $(".alert-dismissable").fadeOut('slow');
                                    $('div.has-error').removeClass('has-error');
                                },8000);
                                $("#contact_form :input").attr("disabled", true);
                            }
                        },
                        'json'
                    );



                }
            });



        });
    </script>
</div>