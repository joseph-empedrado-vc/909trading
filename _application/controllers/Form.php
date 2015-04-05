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
        $data['script']['js-head'][] = 'jquery.form.js';

        $data['script']['js-body'][] = 'bootstrap.min.js';

        $data['script']['js-body'][] = 'jquery.validate.js';

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
        $data['script']['js-head'][] = 'jquery.form.js';

        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $this->load->model('References_model','ref');
        $data['body_types'] =  $this->ref->view_list('ref_body_types');

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
        $data['script']['js-head'][] = 'jquery.form.js';

        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $this->load->model('References_model','ref');
        $data['categories'] =  $this->ref->view_list('ref_categories');

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
        endswitch;
    }

    private function _new_stock(){
        $data['page_title'][]     =   'New Stock Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_stocks_new';

        $this->load->view('_core/template',$data);


    }

    private function _edit_stock(){

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


}
