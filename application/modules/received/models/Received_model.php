<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Received_model extends MY_Model {

    public function get_received($cheking_array=null,$id=null)
    {
        $this->db->select('AR.*,
        AL.name,B.name as branch_name,AT.type,C.address');
        $this->db->from('acc_received as AR');
        $this->db->join('acc_ledger as AL', 'AR.account_id = AL.id');
        $this->db->join('acc_type as AT', 'AL.acc_type = AT.id');
        $this->db->join('customer as C', 'AL.customer_id = C.id');
        $this->db->join('branch as B', 'AR.branch_id = B.id');
        $this->db->order_by('AR.id', 'desc');
        if($id!='')
        {
            $this->db->where("AR.id",$id);
            $data=$this->db->get()->row_array();
        }else{
            $this->db->where($cheking_array);
           $data=$this->db->get()->result_array();
          
        }
       return $data;
    }
}

/* End of file received_model.php */
