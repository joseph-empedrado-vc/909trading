<?php
define("_url_1", $this->uri->segment(1,''), true);
define("_url_2", $this->uri->segment(2,''), true);
define("_url_3", $this->uri->segment(3,''), true);
define("_url_4", $this->uri->segment(4,''), true);
define("_url_5", $this->uri->segment(4,''), true);

define("_sha_date", sha1(date('r')), true);
define("_base_url", base_url(), true);
define("_assets_url", base_url().'assets/', true);
define("_upload_url", base_url().'upload/', true);
define("_index_url", base_url().'index.php/', true);

define("_site_root_url", base_url().'index.php/', true);

$myhost = $_SERVER['HTTP_HOST'];
define("_http_host", $myhost, true);

$_seo = do_meta_header_data();
define("_title", $_seo['title'], true);