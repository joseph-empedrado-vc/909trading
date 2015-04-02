<?php
class Users_model extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    /*
    | -------------------------------------------------------------------
    | Validate user login credential
    | -------------------------------------------------------------------
    */
    function validate_login($data){


        $table  = $this->db->dbprefix('users');
        $fields = 'email,password';
        $email  = $data['username'];
        $password = $data['password'];

        $sql = "SELECT ".$fields." FROM ".$table." WHERE email = ? LIMIT 0, 1";

        $query = $this->db->query($sql, array($email));

        //echo $this->db->last_query();

        $result = $query->row_array();
        if($result){

            $CI =& get_instance();

            $decoded_password = $CI->encrypt->decode($result['password']);
            $password = $CI->encrypt->decode($data['password']);

            if($password == $decoded_password){
                $return = $this->get_user_data($email);
            }else{
                $return = false;
            }

        }else{
            $return = false;
        }

        return $return;

    }

    public function get_user_data($email){

        $table  = $this->db->dbprefix('users');
        $fields = '*';

        $sql = "SELECT ".$fields." FROM ".$table." WHERE email = ? LIMIT 0, 1";

        $query = $this->db->query($sql, array($email));

        $result = $query->row_array();

        if($result){
            return $result;
        }else{
            return false;
        }
    }

}

?>