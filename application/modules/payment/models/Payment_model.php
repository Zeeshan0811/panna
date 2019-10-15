<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends MY_Model {

    public function get_payment($cheking_array=null,$id=null)
    {
        $this->db->select('AP.*,
        AL.name,B.name as branch_name,AT.type,S.address');
        $this->db->from('acc_payment as AP');
        $this->db->join('acc_ledger as AL', 'AP.account_id = AL.id');
        $this->db->join('acc_type as AT', 'AL.acc_type = AT.id');
        $this->db->join('supplier as S', 'AL.supplier_id = S.id');
        $this->db->join('branch as B', 'AP.branch_id = B.id');
        $this->db->order_by('AP.id', 'desc');
        if($id!='')
        {
            $this->db->where("AP.id",$id);
            $data=$this->db->get()->row_array();
        }else{
            $this->db->where($cheking_array);
           $data=$this->db->get()->result_array();
          
        }
       return $data;
    }
}

/* End of file Payment_model.php */
