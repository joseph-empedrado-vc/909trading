<?php
$this->load->view('_core/head_define');
$_seo = do_meta_header_data();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">
    <title><?php echo $_seo['title']; ?></title>
    <link rel="shortcut icon" type="image/ico" href="<?php echo _assets_url.'images/favicon.ico';?>" />
    <meta name="description"  content="<?php echo strtolower($_seo['meta_descriptions']); ?>">
    <meta name="keywords" content="<?php echo strtolower($_seo['meta_keywords']); ?>" >
    <?php
        if(@is_array($script['css']))
        {

            foreach($script['css'] as $r){
                echo '<link href="'._assets_url.'css/'.$r.'" rel="stylesheet">';
            }

        }

        if(@is_array($script['js-direct']))
        {

            foreach($script['js-direct'] as $k => $r){

                echo '<script src="//'.$r.'"></script>';

            }

        }

        if(@is_array($script['js-head']))
        {

            foreach($script['js-head'] as $k => $r){

               echo '<script src="'._assets_url.'js/'.$r.'"></script>';

            }

        }

    ?>

    <script type="text/javascript">
        var _base_url = '<?=_base_url;?>';
        var _upload_url = '<?=_upload_url;?>';
        var _index_url = '<?=_index_url;?>';
        var _url_1 = '<?=_url_1;?>';
        var _url_2 = '<?=_url_2;?>';
        var _url_3 = '<?=_url_3;?>';
        var seo_title = '<?php echo $_seo['title']; ?>';


    </script>


</head>

<body>

<?php
    $this->load->view('_core/head_top_content');
?>
<!-- Main Content -->
<div class="container-fluid no-padding" id="main-content">