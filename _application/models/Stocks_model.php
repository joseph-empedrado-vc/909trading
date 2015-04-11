<?php
class Stocks_model extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    /*
    | -------------------------------------------------------------------
    | Saved Stocks Data
    | -------------------------------------------------------------------
    */
    function add_data($data,$tbl){

        $CI =& get_instance();
        $user_id = $CI->session->userdata('signed_in');
        $data['created_by'] = $user_id;
        $data['date_created'] =  date('d:m:Y h:i:A');


        $table  = $this->db->dbprefix($tbl);
        $this->db->insert_string($table, $data);

        if(isset($data['ID']) && $data['ID']  != ''){
            $where = "ID = ".$data['ID'];
            $sql = $this->db->update_string($table, $data, $where);

        }else{
            $data['status'] = 'active';
            $sql = $this->db->insert_string($table, $data);
        }


        $query = $this->db->query($sql);

        if($query){

            $return = true;

        }else{
            $return = false;
        }

        return $return;

    }

    /*
    | -------------------------------------------------------------------
    | Delete Stocks Data
    | -------------------------------------------------------------------
    */

    function delete_data($tbl,$id){
        $table  = $this->db->dbprefix($tbl);
        $sql = "DELETE FROM ".$table." WHERE ID = ".$id;

        $query = $this->db->query($sql);

        if($query){

            $return = true;

        }else{
            $return = false;
        }

        return $return;
    }

    /*
    | -------------------------------------------------------------------
    | View references data
    | -------------------------------------------------------------------
    */
    function view_list($tbl){


        $table  = $this->db->dbprefix($tbl);

        $fields = '*';

        $sql = "SELECT ".$fields." FROM ".$table;

        $query = $this->db->query($sql);

        $result = $query->result_array();

        if($result){
            return $result;
        }else{
            return false;
        }

    }

}

?>