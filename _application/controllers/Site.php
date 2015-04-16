<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function index()
	{
		$this->home();
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


	public function send_message()
	{

		if(!$this->is_posted()) { return; };


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
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "909trading@gmail.com";
		$config['smtp_pass'] = "909Trad1ng";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$CI->email->initialize($config);
		//sales@909trading.com   SubicSales100%
		$CI->email->from('trading909@gmail.com', '909Trading Mailer Bot');
		$list = array('info@909trading.com');
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
		}
		echo json_encode($return);

		return;
	}


}
