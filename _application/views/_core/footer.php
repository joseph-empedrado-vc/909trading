
</div>
<!-- / Main Content -->
<!-- Site footer -->

<div id="footer-container" class="container-fluid" >
    <?php $this->load->view('embed_common/_inc_footer_links'); ?>
    <?php $this->load->view('embed_common/_inc_copyright'); ?>
</div>

<!-- Bootstrap core JavaScript                                   -->
<!-- Placed at the end of the document so the pages load faster  -->
<?php

if(@is_array($script['js-body']))
{

    foreach($script['js-body'] as $r){
        echo '<script src="'._assets_url.'js/'.$r.'"></script>';
    }

}
?>
</body>
</html>