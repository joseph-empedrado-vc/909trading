<div class="container">
    <h2 class="page-main-title"><?=user_friendly_str(_url_3);?></h2>

    <div class="row">
        <div class="col-md-6">
            <?php
            $error_message = $this->session->flashdata('error_message');
            if($error_message){
                ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$this->session->flashdata('error_message');?>
                </div>
            <?php } ?>
            <?php
            $info_message = $this->session->flashdata('info_message');
            if($info_message){
                ?>
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?=$this->session->flashdata('info_message');?>
                </div>
            <?php } ?>

            <?php $this->load->view($embed_form); ?>
            <?php $this->load->view('embed_admin_common/_inc_menu_reference'); ?>
        </div>
        <div class="col-md-6">
            <?php $this->load->view('embed_admin_common/_inc_list_ref_makers'); ?>
        </div>
    </div>

</div>