<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function index()
	{
		$this->home();
	}

    public function maintenance(){
        $this->load->view('admin/maintenance');
    }


	public function home()
	{
		$data['page_title'][]     =   '909Trading';

		$data['script']['css'][] = 'bootstrap.min.css';
		$data['script']['css'][] = 'bootstrap-yeti.min.css';
		$data['script']['css'][] = 'style.css';

		$data['script']['js-head'][] = 'jquery-1.11.0.min.js';
		$data['script']['js-body'][] = 'bootstrap.min.js';
		$data['script']['js-body'][] = 'jquery.validate.js';

		$data['content'] = 'site/home.php';

		$this->load->view('_core/template',$data);
	}

	public function aboutus(){

		$data['page_title'][]     =   '909Trading - About Us';

		$data['script']['css'][] = 'bootstrap.min.css';
		$data['script']['css'][] = 'bootstrap-yeti.min.css';
		$data['script']['css'][] = 'style.css';

		$data['script']['js-head'][] = 'jquery-1.11.0.min.js';
		$data['script']['js-body'][] = 'bootstrap.min.js';
		$data['script']['js-body'][] = 'jquery.validate.js';

		$data['content'] = 'site/about-us.php';

		$this->load->view('_core/template',$data);
	}

	public function company_profile(){

		$data['page_title'][]     =   '909Trading - Company Profile';

		$data['script']['css'][] = 'bootstrap.min.css';
		$data['script']['css'][] = 'bootstrap-yeti.min.css';
		$data['script']['css'][] = 'style.css';

		$data['script']['js-head'][] = 'jquery-1.11.0.min.js';
		$data['script']['js-body'][] = 'bootstrap.min.js';
		$data['script']['js-body'][] = 'jquery.validate.js';

		$data['content'] = 'site/company-profile.php';

		$this->load->view('_core/template',$data);
	}

    public function stocks(){


        $data['page_title'][]     =   '909Trading - Contact Us';

        $data['script']['css'][] = 'bootstrap.min.css';
        $data['script']['css'][] = 'jquery.dataTables.min.css';
        $data['script']['css'][] = 'bootstrap-yeti.min.css';
        $data['script']['css'][] = 'style.css';

        $data['script']['js-head'][] = 'jquery-1.11.0.min.js';
        $data['script']['js-head'][] = 'jquery.dataTables.js';
        $data['script']['js-body'][] = 'bootstrap.js';
        $data['script']['js-body'][] = 'jquery.validate.js';


        $this->load->model('stocks_model','stock');
        $data['stocks'] =  $this->stock->view_list('vw_stocks');

        $data['list_type']['stocks'] = 'list_stock';

        $data['content'] = 'site/stocks.php';
        $this->load->view('_core/template',$data);

    }

	public function contact(){

		$data['page_title'][]     =   '909Trading - Contact Us';

		$data['script']['css'][] = 'bootstrap.min.css';
		$data['script']['css'][] = 'bootstrap-yeti.min.css';
		$data['script']['css'][] = 'style.css';

		$data['script']['js-head'][] = 'jquery-1.11.0.min.js';
		$data['script']['js-body'][] = 'bootstrap.min.js';
		$data['script']['js-body'][] = 'jquery.validate.js';

		$data['content'] = 'site/contact.php';

		$this->load->view('_core/template',$data);
	}

	public function financing(){
		$data['page_title'][]     =   '909Trading - Financing Partners';

		$data['script']['css'][] = 'bootstrap.min.css';
		$data['script']['css'][] = 'bootstrap-yeti.min.css';
		$data['script']['css'][] = 'style.css';

		$data['script']['js-head'][] = 'jquery-1.11.0.min.js';
		$data['script']['js-body'][] = 'bootstrap.min.js';
		$data['script']['js-body'][] = 'jquery.validate.js';

		$data['content'] = 'site/financing.php';

		$this->load->view('_core/template',$data);

	}

	public function how_to_get_there(){
		$data['page_title'][]     =   '909Trading - Contact Us';

		$data['script']['css'][] = 'bootstrap.min.css';
		$data['script']['css'][] = 'bootstrap-yeti.min.css';
		$data['script']['css'][] = 'style.css';

		$data['script']['js-head'][] = 'jquery-1.11.0.min.js';
		$data['script']['js-body'][] = 'bootstrap.min.js';
		$data['script']['js-body'][] = 'jquery.validate.js';

		$data['content'] = 'site/how-to-get-there.php';

		$this->load->view('_core/template',$data);

	}

	public function get_captcha(){

		$string = '';

		for ($i = 0; $i < 5; $i++) {
			$string .= chr(rand(97, 122));
		}

		$_SESSION['random_number'] = $string;

		$dir = 'assets/fonts/';

		$image = imagecreatetruecolor(165, 60);

		// random number 1 or 2
		$num = rand(1,2);
		if($num==1)
		{
			$font = "ERASDEMI.TTF"; // font style
		}
		else
		{
			$font = "HARLOWSI.TTF";// font style
		}

		// random number 1 or 2
		$num2 = rand(1,2);
		if($num2==1)
		{
			$color = imagecolorallocate($image, 113, 193, 217);// color
		}
		else
		{
			$color = imagecolorallocate($image, 163, 197, 82);// color
		}

		$white = imagecolorallocate($image, 255, 255, 255); // background color white
		imagefilledrectangle($image,0,0,399,99,$white);

		imagettftext ($image, 30, 0, 10, 40, $color, $dir.$font, $_SESSION['random_number']);

		header("Content-type: image/png");
		imagepng($image);
		return;
	}

	public function validate_captcha(){

		$captcha = $this->_compare_captcha($_GET['captcha_code']);


		if(!$captcha)
		{

			echo 'false';
			return ;
		}

		echo 'true';
		return;

	}

	private function _compare_captcha($str)
	{
		$random_number = $_SESSION['random_number'];

		if($random_number == $str){
			return true;
		}else{
			return false;
		}
	}

    public function get_images(){

        if(is_posted()===false) { return; };

        $this->load->helper('directory');

        $r_type = $this->input->post('r_type');

        if($r_type == 'ajax-big'){
            $files = directory_map('upload/'.$this->input->post('FLD_ID'));
            $i = 0;
            foreach($files as $k => $name){
                $nameArr = explode('.',$name);
                if((substr($nameArr[0],-3) != '_xs') && ($nameArr[1] =='gif' || $nameArr[1] =='jpg' || $nameArr[1] =='png') ){
                    $files_large[$i] = $name;
                    $i++;
                }
            }
            $return['cnt'] = $i;
            $return['files'] = $files_large;
            $return = json_encode($return);
            echo $return;
        }

    }


	public function send_message()
	{

		if(is_posted()===false) { return; };


		$message 		= $_POST['message'];
		$subject 		= $_POST['subject'];
		$sender_name 	= $_POST['full_name'];
		$sender_mobile 	= $_POST['mobile'];
		$sender_email 	= $_POST['email'];
		$message		= '(From: '.$sender_name.' - '.$sender_email.') - '.date("d-m-Y H:i:s").'<br/>';
		$message 		.= 'Mobile No.: '.$sender_mobile.'<br/><br/>';
		$message 		.= $_POST['message'];


		// Mail it

		$CI = get_instance();
		$CI->load->library('email');
		$config['protocol'] = "mail";
//		$config['smtp_host'] = "ssl://smtp.gmail.com";
//		$config['smtp_port'] = "465";
//		$config['smtp_user'] = "909trading@gmail.com";
//		$config['smtp_pass'] = "909Trad1ng";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$CI->email->initialize($config);
		//sales@909trading.com   SubicSales100%
		$CI->email->from('trading909@gmail.com', '909Trading Mailer Bot');
        $this->email->reply_to($sender_email);
		$list = array('sales@909trading.com');
		$CI->email->to($list);
		$CI->email->reply_to($sender_email, $sender_name);
		$CI->email->subject($subject);
		$CI->email->message($message);
		$mail = $CI->email->send();

		if($mail)
		{
			$return['error_code'] = '';
		}else
		{
			$return['error_code'] = 'mail';
            $return['error_message'] = $this->email->print_debugger();
		}
		echo json_encode($return);

		return;
	}



    public function send_email()
    {

        $subject 		= 'Clients seminar request';
        $sender_name 	= 'Mae Balmer';
        $message 		= '<p>Dear Joseph</p>';
        $message 		.= '<p>Your client wish you to attend the seminar on May 1, 2015 about Australian culture and Australians.</p>';
        $message 		.= 'Venue is at U 818 8F City & Land Mega Plaza<br/>
ADB Ave. cor. Garnet Road<br/>
Ortigas Centre, Pasig City 1605<br/>
Philippines<br/>
(at the back of Robinson Galleria Mall).<br/><br/>';
        $message 		.= 'Your,<br/>';
        $message 		.= 'Mae Balmer,<br/>';



        $message 		= addslashes($message);
        //$message 		= '<p>sss</p>';
        $subject 		= 'Clients seminar request';
        $sender_name 	= 'Mae Balmer';
        $sender_email 	= 'mae@virtualcoworker.com';

        $to  = 'princejoseph_gapo@yahoo.com';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'From: '.$sender_name.' <mae@virtualcoworker.com>' . "\r\n";

        // Mail it

        @$mail = mail($to, $subject, $message, $headers);

        var_dump($mail);
        if($mail)
        {
            $return['error_code'] = '';
        }else
        {
            $return['error_code'] = 'mail';
        }
        echo json_encode($return);

        return;
    }




}
