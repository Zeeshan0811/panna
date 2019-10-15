<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model {

    public function get_user($checking_array=null)
    {
        $this->db->select('A.*,A.id as admin_id,R.name as role_name,C.name as company_name,B.name as branch_name');
        $this->db->from('admin as A');
        $this->db->join('roles as R', 'A.role_id = R.id');
        $this->db->join('company as C', 'A.company_id = C.id',"left");
        $this->db->join('branch as B', 'A.branch_id = B.id',"left");
        $this->db->order_by('A.id', 'desc');
        $this->db->where('R.name!=',"Super Admin");
        $this->db->where($checking_array);
        return $this->db->get()->result_array();
    }

}

/* End of file Users_model.php */
