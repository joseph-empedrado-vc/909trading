<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends MY_Controller {

    public function index()
    {
        $this->home();
    }

    public function home()
    {

        $data['page_title'][]     =   'Admin Page - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['content'] = 'admin/index.php';

        if($this->session->userdata('signed_in'))
        {

            $this->load->view('_core/template',$data);
        }else{
            redirect(base_url().'index.php/admin/login', 'refresh');
        }


    }


    public function login()
    {
        $data['page_title'][]     =   'Admin Page - 909Trading ';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-body'][] = 'bootstrap.min.js';
        $data['script']['js-body'][] = 'jquery.validate.js';

        $data['content'] = 'admin/login.php';

        if($this->session->userdata('signed_in'))
        {
            redirect(base_url().'index.php/admin', 'refresh');
        }else{
            $this->load->view('_core/template',$data);
        }

    }

    public function logout(){
        session_destroy();
        redirect(base_url().'index.php/admin', 'refresh');
    }


    public function validate_login(){

        if(is_posted()===false){
            redirect(base_url().'index.php/admin', 'refresh');
        }

        $post = do_post();

        if(isset($post['msg'])){
            $this->session->set_flashdata('error_message',  '<p>'.$post['msg'].'</p>');
            redirect($this->input->post('_return'), 'refresh');
            return;
        }

        $this->load->model('Users_model','users');
        $login_result = $this->users->validate_login($post);

        if($login_result)
        {
            $login_result['signed_in'] = true;
            $this->session->set_userdata($login_result);
            redirect($this->input->post('_return'), 'refresh');
        }else
        {
            $this->session->set_flashdata('error_message',  '<p>Invalid Username Password</p>');
            redirect($this->input->post('_return'), 'refresh');
        }

        return;
    }

}
