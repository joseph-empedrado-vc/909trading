<?php
class References_model extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    /*
    | -------------------------------------------------------------------
    | Saved References Data
    | -------------------------------------------------------------------
    */
    function add_data($data,$tbl){


        $table  = $this->db->dbprefix($tbl);
        $this->db->insert_string($table, $data);

        if(isset($data['ID']) && $data['ID']  != ''){
            $where = "ID = ".$data['ID'];
            $sql = $this->db->update_string($table, $data, $where);

        }else{
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
    | Delete References Data
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