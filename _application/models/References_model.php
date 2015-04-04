<?php
class References_model extends MY_Model {

    function __construct()
    {
        parent::__construct();
    }

    /*
    | -------------------------------------------------------------------
    | Saved Makers Data
    | -------------------------------------------------------------------
    */
    function add_data($data,$tbl){


        $table  = $this->db->dbprefix($tbl);
        $this->db->insert_string($table, $data);

        $sql = $this->db->insert_string($table, $data);
        $query = $this->db->query($sql);

        if($query){

            $return = true;

        }else{
            $return = false;
        }

        return $return;

    }


}

?>