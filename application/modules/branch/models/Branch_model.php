<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends MY_Model {

    public function get_all_branch($checking_array)
    {
        $this->db->select('B.id as branch_id,B.name as branch_name,B.address,B.contact,B.tel,B.status,B.created_at,C.name as company_name');
        $this->db->from('branch as B');
        $this->db->join('company as C', 'B.company_id = C.id',"left");
        $this->db->order_by('C.name', 'asc');
        $this->db->where($checking_array);
        return $this->db->get()->result_array();
        
    }

}

/* End of file Branch_model.php */
