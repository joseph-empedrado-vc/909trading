<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('signed_in'))
        {
            redirect(base_url().'index.php/admin/login', 'refresh');
        }
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {

        $data['page_title'][]     =   'Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';

        $data['content'] = 'embed_common/_inc_invalid_parameters';

        if($this->session->userdata('signed_in'))
        {
            $this->load->view('_core/template',$data);
        }else{
            redirect(base_url().'index.php/admin/login', 'refresh');
        }


    }
    public function makers()
    {

        $data['page_title'][]     =   'Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'jquery.dataTables.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-head'][] = 'jquery.dataTables.js';
        $data['script']['js-head'][] = 'jquery.custom-script.js';

        $data['script']['js-body'][] = 'bootstrap.min.js';

        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['list_content'] = 'ref_makers';
        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_ref_makers';

        $this->load->model('References_model','ref');
        $data['makers'] =  $this->ref->view_list('ref_makers');

        if($this->session->userdata('signed_in'))
        {
            $this->load->view('_core/template',$data);

        }


    }

    public function delete_makers (){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        if($post['ID'] == '' || !isset($post['ID'])){
            return;
        }

        $this->load->model('References_model','ref');

        $delete_data = $this->ref->delete_data('ref_makers',$post['ID']);

        if($delete_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully deleted</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not deleted</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;

    }

    public function body_types(){

        $data['page_title'][]     =   'Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'jquery.dataTables.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-head'][] = 'jquery.dataTables.js';
        $data['script']['js-head'][] = 'jquery.custom-script.js';

        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $this->load->model('References_model','ref');
        $data['body_types'] =  $this->ref->view_list('ref_body_types');

        $data['list_content'] = 'ref_body_types';
        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_ref_body_types';


        $this->load->view('_core/template',$data);

    }

    public function delete_body_types (){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        if($post['ID'] == '' || !isset($post['ID'])){
            return;
        }

        $this->load->model('References_model','ref');

        $delete_data = $this->ref->delete_data('ref_body_types',$post['ID']);

        if($delete_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully deleted</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not deleted</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;

    }

    public function categories(){

        $data['page_title'][]     =   'Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'jquery.dataTables.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-head'][] = 'jquery.dataTables.js';
        $data['script']['js-head'][] = 'jquery.custom-script.js';

        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $this->load->model('References_model','ref');
        $data['categories'] =  $this->ref->view_list('ref_categories');

        $data['list_content'] = 'ref_categories';
        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_ref_categories';


        $this->load->view('_core/template',$data);



    }

    public function delete_categories (){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        if($post['ID'] == '' || !isset($post['ID'])){
            return;
        }

        $this->load->model('References_model','ref');

        $delete_data = $this->ref->delete_data('ref_categories',$post['ID']);

        if($delete_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully deleted</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not deleted</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;

    }


    public function stocks(){

        $segment_4 = $this->uri->segment(4);
        switch($segment_4):
            case"new":
                $this->_new_stock();
            break;
            case"edit":
                $this->_edit_stock();
            break;
            case"sold":
                $this->_sold_stock();
            break;
            case"delete":
                $this->_delete_stock();
                break;
        endswitch;
    }

    private function _new_stock(){
        $data['page_title'][]     =   'New Stock Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'jquery.dataTables.min.css';
        $data['script']['css'][] = 'jquery.fs.dropper.css';
        $data['script']['css'][] = 'style.css';



        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-head'][] = 'jquery.dataTables.js';
        $data['script']['js-head'][] = 'jquery.custom-script.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';
        $data['script']['js-body'][] = 'jquery.fs.dropper.js';



        $this->load->model('References_model','ref');
        $this->load->model('stocks_model','stock');

        //load Makers / Manufacturers
        $data['list_type']['makers'] = 'form_stock';
        $data['makers'] =  $this->ref->view_list('ref_makers');
        //load Categories
        $data['list_type']['categories'] = 'form_stock';
        $data['categories'] =  $this->ref->view_list('ref_categories');
        //load Body Types
        $data['list_type']['body_types'] = 'form_stock';
        $data['body_types'] =  $this->ref->view_list('ref_body_types');
        //load Stocks
        $data['list_type']['stocks'] = 'form_stock';
        $data['stocks'] =  $this->stock->view_list('vw_stocks');

        $data['list_content'] = 'stocks';
        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_stocks_new';

        $data['temp_folder'] = str_pad(rand(0,99999),5,STR_PAD_LEFT);

        $this->load->view('_core/template',$data);


    }



    private function _edit_stock(){

    }

    private function _sold_stock(){
        $post = do_post();
        if(is_posted()===false){
            redirect(base_url().'index.php/admin/form/stocks/new', 'refresh');
        }

        $post = do_post();

        $this->load->model('Stocks_model','stocks');

        $update_data = $this->stocks->add_data($post,'stocks');

        if($update_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }


    private function _delete_stock(){
        $post = do_post();
        if(is_posted()===false){
            redirect(base_url().'index.php/admin/form/stocks/new', 'refresh');
        }

        $post = do_post();

        $this->load->model('Stocks_model','stocks');

        $update_data = $this->stocks->delete_data('stocks',$post['ID']);

        if($update_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Record has been successfully deleted.</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }


    public function upload_photo(){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }
        //chmod('upload', 0777);
        $temp_dir = 'upload/'.$this->input->post('_tmp_');
        //$temp_dir = 'upload';
        if (!is_dir($temp_dir)) {
            if(!mkdir($temp_dir,0777,TRUE)){
                die('Failed to create folder.');
            }

        }

        $config['upload_path']          = $temp_dir.'/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1024;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['file_ext_tolower']     = true;
        $config['encrypt_name']         = true;



        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());

            $return['msg'] = $this->upload->display_errors();


        }
        else
        {
            $data = array('upload_data' => $this->upload->data());


            $config_xs['image_library'] = 'gd2';
            $config_xs['source_image'] = $this->upload->data('full_path');
            $config_xs['new_image'] = $temp_dir.'/';
            $config_xs['create_thumb'] = TRUE;
            $config_xs['maintain_ratio'] = TRUE;
            $config_xs['thumb_marker'] = '_xs';
            $config_xs['width']         = 150;
            $config_xs['height']        = 100;

            $this->load->library('image_lib', $config_xs);

            $this->image_lib->resize();
            $return['msg'] =  'ok';
            $return['filename'] =  $this->upload->data('raw_name').'_xs'.$this->upload->data('file_ext');


        }
        echo json_encode($return);
        return;
    }


    public function validate_makers(){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        $this->load->model('References_model','ref');

        $add_data = $this->ref->add_data($post,'ref_makers');

        if($add_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }

    public function validate_body_types(){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        $this->load->model('References_model','ref');

        $add_data = $this->ref->add_data($post,'ref_body_types');

        if($add_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }

    public function validate_categories(){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        $this->load->model('References_model','ref');

        $add_data = $this->ref->add_data($post,'ref_categories');

        if($add_data)
        {
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }


    public function validate_stocks(){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin/form/stocks/new', 'refresh');
        }

        $post = do_post();

        $this->load->model('Stocks_model','stocks');

        $add_data = $this->stocks->add_data($post,'stocks');

        if($add_data)
        {
            rename('upload/'.$_POST['_tmp_'],'upload/'.$add_data);
            $this->session->set_flashdata('info_message',  '<p>Your data has been successfully saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Data was not saved</p>');

            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }


}
