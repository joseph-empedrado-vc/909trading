<script>
    $(function() {

        $('#refresh').click(function(){
            $('#captcha').attr('src','<?=_site_root_url;?>get_captcha?j='+ Math.random());
        });

        var v = $("#inquiry_form").validate({
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
                    $('#inquiry_form').serialize(),
                    function(data){

                        var e_code = data.error_code;

                        if(e_code == 'captcha')
                        {

                            $('#captcha').attr('src','<?=_site_root_url;?>get_captcha?j='+ Math.random());
                            msgHtml += 	'<div class="alert alert-danger alert-dismissable col-md-12">'+
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                            '<strong>Error!! </strong> Incorect captcha code. Please try again.'+
                            '</div>';


                            $('#inquiry_form_container').prepend(msgHtml);
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

                            $('#inquiry_form_container').prepend(msgHtml);
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

                            $('#inquiry_form_container').prepend(msgHtml);
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

                            $('#inquiry_form_container').prepend(msgHtml);
                            $('html, body').animate({
                                scrollTop: $("#main-content").offset().top
                            }, 2000);
                            setTimeout(function(){
                                $(".alert-dismissable").fadeOut('slow');
                                $('div.has-error').removeClass('has-error');
                            },8000);
                            $('#modal-inquiry').modal('hide');
                        }
                    },
                    'json'
                );



            }
        });



    });
</script>