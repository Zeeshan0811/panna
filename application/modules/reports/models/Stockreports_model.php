<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stockreports_model extends MY_Model {

    public function get_stock_reports($company_id,$branch_id,$item_id='',$item_desc_id='',$start_date,$close_date)
    {
        $open_balance=$this->get_open_balance($company_id,$branch_id,$item_id,$item_desc_id,$start_date);
        $close_balance=$open_balance;
        $this->db->select('SR.id,SR.stock_amount_id,SR.sales_amount_id');
        $this->db->from('inv_stock_reports as SR');
        $this->db->where('DATE(SR.created_at)>=', $start_date);
        $this->db->where('DATE(SR.created_at)<=', $close_date);
        $result=$this->db->get()->result_array();
        $data=array();
        $details=array();
        $total_in=0;
        $total_out=0;
        if(isset($result))
        {
            foreach ($result as $key => $value) {
                $stock_result=$this->get_details_stock_reports($company_id,$branch_id,$item_id,$item_desc_id,$start_date,$close_date,$value['stock_amount_id'],$value["sales_amount_id"]);
                // $details[]=$stock_result;
                if(isset($stock_result['in_qty'])||isset($stock_result['out_qty']))
                {
                    $details[$key]['date']=date("d/m/Y",strtotime($stock_result['created_at']));
                    $details[$key]['type']=ucwords(str_replace("_"," ",$stock_result['section']));
                    $details[$key]['invoice_no']=$stock_result['invoice_no'];
                    if(isset($stock_result['in_qty']))
                    {
                        $total_in+=$stock_result['in_qty'];
                        $close_balance+=$stock_result['in_qty'];
                        $details[$key]['balance']=$close_balance;
                        $details[$key]['in_qty']=$stock_result['in_qty'];
                        $details[$key]['out_qty']=0;
                    }
                    if(isset($stock_result['out_qty']))
                    {
                        $total_out+=$stock_result['out_qty'];
                        $close_balance-=$stock_result['out_qty'];
                        $details[$key]['balance']=$close_balance;
                        $details[$key]['in_qty']=0;
                        $details[$key]['out_qty']=$stock_result['out_qty'];
                    }
                }
            }
        }
        $data['total_in']=$total_in;
        $data['total_out']=$total_out;
        $data['opening_balance']=$open_balance;
        $data['closing_balance']=$close_balance;
        $data['details']=$details;
        return $data;
    }
    public function get_details_stock_reports($company_id,$branch_id,$item_id='',$item_desc_id='',$start_date,$close_date,$stock_amount_id,$sales_amount_id)
    {
        if($stock_amount_id!='')
        {
            $this->db->select('SA.invoice_no,SA.id as stock_amount_id,SA.created_at,SUM(SD.qty) as in_qty,SA.section');
            $this->db->from('inv_stock_amount as SA');
            $this->db->join('inv_stock_details as SD', 'SA.id = SD.stock_amount_id');
            $this->db->where('DATE(SD.created_at)>=', $start_date);
            $this->db->where('DATE(SD.created_at)<=', $close_date);
            $this->db->where('SA.id', $stock_amount_id);
            $this->db->where('SD.stock_amount_id', $stock_amount_id);
            $this->db->where('SD.company_id', $company_id);
            $this->db->where('SD.branch_id', $branch_id);
            if($item_desc_id!='')
            {
                $this->db->where('SD.item_desc_id', $item_desc_id);
            }
            $this->db->where('SD.item_id', $item_id);
            return $this->db->get()->row_array();
            
        }
        if($sales_amount_id!='')
        {
            $this->db->select('SA.invoice_no,SA.id as sales_amount_id,SA.created_at,SUM(SD.qty) as out_qty,SA.section');
            $this->db->from('inv_sales_amount as SA');
            $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
            $this->db->where('DATE(SD.created_at)>=', $start_date);
            $this->db->where('DATE(SD.created_at)<=', $close_date);
            $this->db->where('SA.id', $sales_amount_id);
            $this->db->where('SD.sales_amount_id', $sales_amount_id);
            $this->db->where('SD.company_id', $company_id);
            $this->db->where('SD.branch_id', $branch_id);
            if($item_desc_id!='')
            {
                $this->db->where('SD.item_desc_id', $item_desc_id);
            }
            $this->db->where('SD.item_id', $item_id);
            return $this->db->get()->row_array();
        }
        
    }
    public function get_open_balance($company_id,$branch_id,$item_id='',$item_desc_id='',$start_date)
    {
        $this->db->select('SUM(SD.qty) as in_qty');
        $this->db->from('inv_stock_reports as SR');
        $this->db->join('inv_stock_amount as SA', 'SR.stock_amount_id = SA.id');
        $this->db->join('inv_stock_details as SD', 'SA.id =SD.stock_amount_id', 'left');
        $this->db->where('DATE(SR.created_at)<', $start_date);
        $this->db->where('SD.company_id', $company_id);
        $this->db->where('SD.branch_id', $branch_id);
        if($item_id!='')
        {
            $this->db->where('SD.item_id', $item_id);
        }
        if($item_desc_id!='')
        {
            $this->db->where('SD.item_desc_id', $item_desc_id);
        }
        $in_qty=$this->db->get()->row_array()['in_qty'];

        $this->db->select('SUM(SD.qty) as in_qty');
        $this->db->from('inv_stock_reports as SR');
        $this->db->join('inv_sales_amount as SA', 'SR.sales_amount_id = SA.id');
        $this->db->join('inv_sales_details as SD', 'SA.id =SD.sales_amount_id', 'left');
        $this->db->where('DATE(SR.created_at)<', $start_date);
        $this->db->where('SD.company_id', $company_id);
        $this->db->where('SD.branch_id', $branch_id);
        if($item_id!='')
        {
            $this->db->where('SD.item_id', $item_id);
        }
        if($item_desc_id!='')
        {
            $this->db->where('SD.item_desc_id', $item_desc_id);
        }
        $out_qty=$this->db->get()->row_array()['in_qty'];

        return $in_qty-$out_qty;
        
    }

}

/* End of file Stockreports_model.php */
