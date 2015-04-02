<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if ( ! function_exists('create_fields_str'))
    {
        function create_fields_str($fields=''){

            $fields_str = '';

            if(is_array($fields) && count($fields) > 0 ) {

                foreach($fields as $fv){

                    $fields_str .= '`'.$fv.'`,';

                }
                $fields_str = substr($fields_str,0,-1);

            }else{

                $fields_str = ($fields!='')? $fields : '`id`';
            }

            return $fields_str;

        }
    }


    if ( ! function_exists('create_where_str'))
    {
        function create_where_str($fields=''){

            $fields_str = '';

            if(is_array($fields) && count($fields) > 0 ) {

                foreach($fields as $fv){

                    $fields_str .= '`'.$fv.'`,';

                }
                $fields_str = substr($fields_str,0,-1);

            }else{

                $fields_str = ($fields!='')? $fields : '`id`';
            }

            return $fields_str;

        }
    }
