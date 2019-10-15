<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customerreports_model extends MY_Model {

    public function get_customer_reports($ledger_name,$ledger_id='',$start_date,$close_date)
    {
        $open_balance=$this->get_open_balance($ledger_id,$start_date);
        $close_balance=$open_balance;
        $this->db->select('CR.sales_amount_id,CR.acc_received_id,CR.open_balance_id');
        $this->db->from('acc_customer_reports as CR');
        $this->db->where('DATE(CR.created_at)>=', $start_date);
        $this->db->where('DATE(CR.created_at)<=', $close_date);
        $result=$this->db->get()->result_array();
        $data=array();
        $details=array();
        $total_debit=0.00;
        $total_credit=0.00;
        if(isset($result))
        {
            foreach ($result as $key => $value) {
                $customer_result=$this->get_details_customer_reports($ledger_id,$start_date,$close_date,$value['acc_received_id'],$value['sales_amount_id'],$value['open_balance_id']);
                if(!empty($customer_result))
                {
                    // $details[]=$customer_result;
                    $details[$key]['date']=date("d/m/Y",strtotime($customer_result['created_at']));
                    if(isset($customer_result['invoice_no']))
                    {
                        $details[$key]['no']=$customer_result['invoice_no'];
                        $details[$key]['particulars']="Sold To ".$ledger_name." Invoice No : ".$customer_result['invoice_no'];
                    }
                    if(isset($customer_result['received_no']))
                    {
                        $details[$key]['no']=$customer_result['received_no'];
                        $details[$key]['particulars']="Cash Received From :  ".$ledger_name." Invoice No : ".$customer_result['received_no'];
                    }
                    if(!isset($customer_result['received_no'])&&!isset($customer_result['invoice_no']))
                    {
                        $details[$key]['no']="-";
                        $details[$key]['particulars']="Opening Balance";
                    }
                    if(isset($customer_result['debit']))
                    {
                        $total_debit+=$customer_result['debit'];
                        $close_balance+=$customer_result['debit'];
                        $details[$key]['balance']=$close_balance;
                        $details[$key]['debit']=$customer_result['debit'];
                        $details[$key]['credit']=0.00;
                    }
                    if(isset($customer_result['credit']))
                    {
                        $total_credit+=$customer_result['credit'];
                        $close_balance-=$customer_result['credit'];
                        $details[$key]['balance']=$close_balance;
                        $details[$key]['debit']=0.00;
                        $details[$key]['credit']=$customer_result['credit'];
                    }

                }
            }
        }
        $data['opening_balance']=$open_balance;
        $data['closing_balance']=$close_balance;
        $data['total_debit']=$total_debit;
        $data['total_credit']=$total_credit;
        $data['details']=$details;
        return $data;
    }
    public function get_details_customer_reports($ledger_id,$start_date,$close_date,$acc_received_id,$sales_amount_id,$open_balance_id)
    {
        if($acc_received_id!='')
        {
            $this->db->select('AR.received_no,AR.created_at,AR.credit');
            $this->db->from('acc_received as AR');
            $this->db->where('AR.id', $acc_received_id);
            $this->db->where('AR.account_id', $ledger_id);
            $this->db->where('DATE(AR.created_at)>=', $start_date);
            $this->db->where('DATE(AR.created_at)<=', $close_date);
            return $this->db->get()->row_array();
            
        }
        if($sales_amount_id!='')
        {
            $this->db->select('SA.invoice_no,SA.created_at,(SA.net_payable-SA.previous_balance) as debit');
            $this->db->from('inv_sales_amount as SA');
            $this->db->where('SA.id', $sales_amount_id);
            $this->db->where('SA.account_id', $ledger_id);
            $this->db->where('DATE(SA.created_at)>=', $start_date);
            $this->db->where('DATE(SA.created_at)<=', $close_date);
            return $this->db->get()->row_array();
        }
        if($open_balance_id!='')
        {
            $this->db->select('OB.debit,OB.created_at');
            $this->db->from('acc_opening_balance as OB');
            $this->db->where('OB.id', $open_balance_id);
            $this->db->where('OB.account_id', $ledger_id);
            $this->db->where('DATE(OB.created_at)>=', $start_date);
            $this->db->where('DATE(OB.created_at)<=', $close_date);
            return $this->db->get()->row_array();
        }
        
    }
    public function get_open_balance($ledger_id='',$start_date)
    {
       $this->db->select('((SUM(SA.net_payable-SA.previous_balance))) as debit');
       $this->db->from('acc_customer_reports as CR');
       $this->db->join('inv_sales_amount SA', 'CR.sales_amount_id = SA.id');
    //    $this->db->join('acc_opening_balance OB', 'SA.account_id = OB.account_id', 'left');
       $this->db->where('SA.account_id', $ledger_id);
       $this->db->where('DATE(CR.created_at)<', $start_date);
       $this->db->where('CR.sales_amount_id!=',null);
       $debit=$this->db->get()->row_array()['debit'];
       if($debit=='')
       {
           $debit=0;
       }
       $this->db->select('SUM(debit) as debit');
       $this->db->from('acc_opening_balance');
       $this->db->where('account_id', $ledger_id);
       $this->db->where('DATE(created_at)<', $start_date);
       $open_debit=$this->db->get()->row_array()['debit'];
       if($open_debit=="")
       {
           $open_debit=0;
       }
       $this->db->select('SUM(AR.credit) as credit');
       $this->db->from('acc_received as AR');
       $this->db->where('AR.account_id', $ledger_id);
       $this->db->where('DATE(AR.created_at)<', $start_date);
       $credit=$this->db->get()->row_array()['credit'];
       if($credit=='')
       {
           $credit=0;
       }
       return ($debit+$open_debit)-$credit;
    }

}

/* End of file Customerreports_model.php */
