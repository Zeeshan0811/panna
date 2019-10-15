<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends MY_Model {
    public function get_bank($id=null,$checking_array=null)
    {
        $this->db->select('CB.id as bank_id,
        CB.name as bank_name,CB.*,
        CP.name as company_name,B.name as branch_name');
        $this->db->from('company_bank as CB');
        $this->db->join('company as CP', 'CB.company_id = CP.id');
        $this->db->join('branch as B', 'CB.branch_id = B.id');
        if($id!='')
        {
            $this->db->where("CB.id",$id);
            return $this->db->get()->row_array();
        }else{
            $this->db->where($checking_array);
            return $this->db->get()->result_array();
        }
    }
}
