<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('create_title'))
{
    function create_title($array){
        $title_str = '';

        if(@is_array($array))
        {

            foreach($array as $r){
                $title_str .= $r.' ';
            }

        }
        $append_str = ($title_str=='') ?'909Trading Japan Surplus Used Trucks Heavy Equipment Philippines' : '- Subic';
        return ucwords(user_friendly_str($title_str.$append_str));
    }
}


if( ! function_exists('seo_url_friendly')){

    function seo_url_friendly($url){

        $new_url = strtolower(str_replace(' ','-',$url));
        return $new_url;

    }

}

if( ! function_exists('user_friendly_str')){

    function user_friendly_str($url){

        $new_url = strtolower(str_replace('-',' ',$url));
        $new_url = strtolower(str_replace('/',' ',$new_url));
        $user_friendly_str = strtolower(str_replace('%20',' ',$new_url));
        return $user_friendly_str;

    }

}

if(!function_exists('do_meta_header_data')){

    function do_meta_header_data()
    {

        $main_words = 'Japan Surplus Used Trucks Heavy Equipment ';
        $uri_string = uri_string();
        $_page_title = do_page_title();

        $meta_data['title'] = $_page_title;
        $meta_data['meta_descriptions'] = do_meta_description($_page_title);
        $meta_data['meta_keywords'] = do_meta_keywords($_page_title);
        $meta_data['meta_headers'] = do_meta_headers($_page_title);
        $return = $meta_data;
        return $return;
    }

}

if(!function_exists('do_page_title')){

    function do_page_title(){

        $uri_string = uri_string();

        $user_friendly_str = user_friendly_str($uri_string);

        $get_unique_words = get_unique_words($user_friendly_str).append_seo_words();

        // $append_str = ($user_friendly_str=='') ?'Field Management System Software - ServeUs Centre Australia' : '- ServeUs Centre Australia';

        $return = ucwords(character_limiter($get_unique_words,55,'')).' Japan Surplus Used Trucks Heavy Equipment ';

        return $return;


    }
}


if(!function_exists('do_meta_description')){

    function do_meta_description($page_title){

        $page_title_arr = explode(' ',$page_title);

        $return = character_limiter($page_title.','.implode(',',$page_title_arr).' '. implode(',',shuffle_words(append_seo_words())),160,'');
        return $return;
    }
}

if(!function_exists('do_meta_keywords')){

    function do_meta_keywords($page_title){

        $page_title_arr = explode(' ',$page_title);

        $return = character_limiter(implode(',',$page_title_arr).' '. implode(',',shuffle_words(append_seo_words())),150,'');
        return $return;
    }
}

if(!function_exists('do_meta_headers')){

    function do_meta_headers($page_title){

        $page_title_arr = explode(' ',$page_title);

        $return['h1'] = word_limiter($page_title.' '. implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h2'][] = word_limiter($page_title.' '. implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h2'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h3'][] = word_limiter($page_title.' '. implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h3'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h3'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h3'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h4'][] = word_limiter($page_title.' '. implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h4'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h5'][] = word_limiter($page_title.' '. implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h5'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h6'][] = word_limiter($page_title.' '. implode(',',shuffle_words(append_seo_words())),8,'');
        $return['h6'][] = word_limiter(implode(',',shuffle_words(append_seo_words())),8,'');
        return $return;
    }
}

if(!function_exists('get_unique_words')){

    function get_unique_words($phrase){

        $str_explode = explode(' ',$phrase);
        $str_unique = array_unique($str_explode);
        $str_implode = implode(" ", $str_unique);
        $return = $str_implode;

        return $return;

    }
}

if(!function_exists('append_seo_words')){

    function append_seo_words($phrase=''){

        $x_words =   '909Trading Philippines';
        $return = $phrase.' '.$x_words;
        return $return;
    }
}


if(!function_exists('shuffle_words')){

    function shuffle_words($phrase){

        $str_explode = explode(' ',$phrase);
        $str_unique = array_unique($str_explode);

        $new_array = array();


        $cnt = count($str_unique);

        for($i=1; $i<= $cnt; )
        {

            shuffle($str_unique);

            $str_implode = implode(" ", $str_unique);

            if (! in_array($str_implode, $new_array)) {
                $new_array[] = $str_implode;

                $i++;
            }

        }


        $return = $new_array;

        return $return  ;

    }
}


if( ! function_exists('is_posted')){

    function is_posted(){
        $rm = $_SERVER['REQUEST_METHOD'];
        if($rm === 'POST'){
            return true;
        }else{
            return false;
        }

    }
}

if( ! function_exists('do_post')){

    function do_post($sanitize=true){

        $CI =& get_instance();

        $data = $CI->input->post();

        if(validate_token()===FALSE){
            $return['msg'] = 'Invalid token please refresh your browser or do login again.';
            return $return;
        };

        if(is_posted() === TRUE){

            if(is_array($data)){

                if(array_key_exists('_datatable',$data)){

                    foreach($data as $k => $v){
                        $sanitized_data[$k] = $CI->security->xss_clean($v);
                    }

                }else{

                    foreach($data as $k => $v){

                        if(substr($k,0,4) == 'FLD_') {
                            $key = substr($k,4);
                            $sanitized_data[$key] = $CI->security->xss_clean($v);
                        }
                        if(substr($k,0,4) == 'FLP_') {
                            $key = substr($k,4);
                            $sanitized_data[$key] = $CI->encrypt->encode($CI->security->xss_clean($v));;
                        }
                    }
                }



                return $sanitized_data;


            }else{
                return false;
            }

        }else{
            return false;
        }

    }
}

if ( ! function_exists('create_csrf_token')) {

    function create_csrf_token(){
        $CI =& get_instance();

        $etoken = $CI->encrypt->encode('token');

        $sid = $CI->session->session_id;

        $esid = $CI->encrypt->encode($sid);
        $token = $sid.':'.$esid;

        $htmlStr = '<input name="x__token" id="x__token" type="hidden" value="'.$token.'" >';

        echo $htmlStr;
        return;
    }
}

if ( ! function_exists('do_json_post')) {

    function do_json_post(){

        $htmlStr = '<input name="json_post" type="hidden" value="" >';
        echo $htmlStr;
        return;
    }
}



if ( ! function_exists('validate_token')) {

    function validate_token(){

        $CI =& get_instance();
        $data = $CI->input->post();
        $sid = $CI->session->session_id;


        $data_arr = explode(":",  $data['x__token'] );

        $data_arr_sid   = $data_arr[0];
        $data_arr_esid  = $data_arr[1];

        $decoded_esid  = $CI->encrypt->decode($data_arr_esid);

        if($data_arr_sid == $sid && $decoded_esid == $sid){
            return TRUE;
        }else{
            return FALSE;
        }


    }
}


if ( ! function_exists('printR'))
{
    function printR($array,$title=''){

        if(ENVIRONMENT == 'development')
        {

            if(is_array($array)){

                echo @$title."<br/>".
                    "||---------------------------------||<br/>".
                    "<pre>";
                print_r($array);
                echo "</pre>".
                    "END ".$title."<br/>".
                    "||---------------------------------||<br/>";

            }else{
                echo $title." is not an array.: ".$array ;
            }
        }
    }
}

