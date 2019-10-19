<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ledger_model extends MY_Model
{

    // Get Single cell 
    function get_single_cell_by_single_column($table, $column_name, $column_value, $select)
    {
        $query = $this->db->select($select)->get_where($table, array($column_name => $column_value));
        return $query;
    }
}

/* End of file Ledger_model.php */
