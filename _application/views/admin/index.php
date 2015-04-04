<div class="container">
    <h2 class="page-main-title">Control</h2>
    <?php
//    var_dump($this->session->get_userdata());
//    var_dump($this->session->userdata('signed_in'));
    ?>

    <div class="row">
        <div class="col-md-4 pull-right">
            <?php $this->load->view('embed_user/_inc_user_profile'); ?>
        </div>
        <div class="col-md-8">
            <?php $this->load->view('embed_admin_common/_inc_menu_reference'); ?>
            <?php $this->load->view('embed_admin_common/_inc_menu_stock'); ?>
        </div>


    </div>
</div>