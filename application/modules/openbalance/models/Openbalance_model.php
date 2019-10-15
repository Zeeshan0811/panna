<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Openbalance_model extends MY_Model {

    
    public function get_opening_balance($cheking_array=null,$id=null)
    {
        $this->db->select('AB.id,AB.debit,AB.credit,AB.company_id,AB.branch_id,AB.account_id,AL.name,B.name as branch_name,AT.type');
        $this->db->from('acc_opening_balance as AB');
        $this->db->join('acc_ledger as AL', 'AB.account_id = AL.id');
        $this->db->join('acc_type as AT', 'AL.acc_type = AT.id');
        $this->db->join('branch as B', 'AB.branch_id = B.id');
        if($id!='')
        {
            $this->db->where("AB.id",$id);
            $data=$this->db->get()->row_array();
        }else{
            $this->db->where($cheking_array);
           $result=$this->db->get()->result_array();
           $debit_balance=0;
           $credit_balance=0;
           if(isset($result))
           {
               foreach ($result as $key => $value) {
                   $debit_balance+=$value['debit'];
                   $credit_balance+=$value['credit'];
               }
           }
           $data['balance_details']=$result;
           $data['debit_balance']=$debit_balance;
           $data['credit_balance']=$credit_balance;
        }
       return $data;
    }

}

/* End of file Openbalance_model.php */
