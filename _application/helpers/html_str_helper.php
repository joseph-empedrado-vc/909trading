<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('add_hidden_field'))
{
    function add_hidden_field($fld_id,$value=''){

        $htmlStr = '<input type="hidden" id="'.$fld_id.'" name="'.$fld_id.'" value="'.$value.'" />';
        echo $htmlStr;
        return;
    }
}
