<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends MY_Controller {

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
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_ref_makers';

        if($this->session->userdata('signed_in'))
        {
            $this->load->view('_core/template',$data);

        }else{
            redirect(base_url().'index.php/admin/login', 'refresh');
        }


    }

    public function body_types(){

        $data['page_title'][]     =   'Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_ref_body_types';

        if($this->session->userdata('signed_in'))
        {
            $this->load->view('_core/template',$data);

        }else{
            redirect(base_url().'index.php/admin/login', 'refresh');
        }

    }

    public function categories(){

        $data['page_title'][]     =   'Form - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['content'] = 'embed_admin/form';
        $data['embed_form'] = 'embed_admin_common/_inc_form_ref_categories';

        if($this->session->userdata('signed_in'))
        {
            $this->load->view('_core/template',$data);

        }else{
            redirect(base_url().'index.php/admin/login', 'refresh');
        }

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
