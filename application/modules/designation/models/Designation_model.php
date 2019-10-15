<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Designation_model extends MY_Model {

    
    public function get_designation($id=null,$checking_array=null)
    {
        $this->db->select('D.id as designation_id,D.company_id,D.branch_id,D.section_id,D.status,D.designation,C.name as company_name,B.name as branch_name,S.name as section_name');
        $this->db->from('designation as D');
        $this->db->join('company as C', 'D.company_id = C.id');
        $this->db->join('branch as B', 'D.branch_id = B.id');
        $this->db->join('section as S', 'D.section_id = S.id');
        if($id!='')
        {
            $this->db->where("D.id",$id);
            return $this->db->get()->row_array();
        }else{
            $this->db->where($checking_array);
            return $this->db->get()->result_array();
        }
    }

}

/* End of file Designation_model.php */
