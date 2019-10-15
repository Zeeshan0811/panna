<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_model extends MY_Model {

    public function get_marketing($id=null,$checking_array=null)
    {
        $this->db->select('M.id as marketing_id,M.company_id,M.branch_id,M.status,M.designation_id,
        M.present_address,M.permanent_address,M.mobile,M.tel,
        M.name as marketing_name,C.name as company_name,B.name as branch_name,D.designation as designation');
        $this->db->from('marketing as M');
        $this->db->join('company as C', 'M.company_id = C.id','left');
        $this->db->join('branch as B', 'M.branch_id = B.id','left');
        $this->db->join('designation as D', 'M.designation_id = D.id','left');
        if($id!='')
        {
            $this->db->where("M.id",$id);
            return $this->db->get()->row_array();
        }else{
            $this->db->where($checking_array);
            return $this->db->get()->result_array();
        }
    }

}

/* End of file Marketing_model.php */
