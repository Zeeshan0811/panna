<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Section_model extends MY_Model {
    
    public function get_section($id=null,$checking_array=null)
    {
        $this->db->select('S.*,S.id as section_id,S.name as section_name,S.status,B.name as branch_name,S.created_at,C.name as company_name');
        $this->db->from('section as S');
        $this->db->join('branch as B', 'S.branch_id = B.id','left');
        $this->db->join('company as C', 'S.company_id = C.id','left');
        $this->db->order_by('C.name', 'asc');
        if($id!='')
        {
            $this->db->where('S.id', $id);
            return $this->db->get()->row_array();
        }
        else{
            $this->db->where($checking_array);
            return $this->db->get()->result_array();
        }
    }



}

/* End of file Section_model.php */
