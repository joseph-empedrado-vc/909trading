<form id="inquiry_form" class="form-horizontal" role="form" novalidate="novalidate">
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