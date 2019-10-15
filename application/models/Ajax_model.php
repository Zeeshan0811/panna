<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_model extends MY_Model {
    public function get_supplier_details_by_id($cheking_array)
    {
        $this->db->select('S.id,S.name,S.code,AL.id ledger_id,MH.name as account_head_name');
        $this->db->from('supplier as S');
        $this->db->join('acc_ledger as AL', 'S.id = AL.supplier_id');
        $this->db->join('acc_main_head as MH', 'AL.head_id = MH.id');
        $this->db->where('S.id',$cheking_array['id']);
        $this->db->where('S.status',$cheking_array['status']);
        return $this->db->get()->row_array();
    }
    public function get_item_unit($item_id)
    {
        $this->db->select('U.name');
        $this->db->from('item as I');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->where('I.id',$item_id);
        return $this->db->get()->row_array();
    }
    public function get_single_item($index_array)
    {
        $this->db->select('ID.item_desc,ID.id as item_desc_id,ID.code,ID.purchase_price,ID.sale_price,I.name,I.id as item_id,U.name as unit_name');
        $this->db->from('item_description as ID');
        $this->db->join('item as I', 'ID.item_id = I.id', 'left');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->where($index_array);
        return $this->db->get()->row_array();
    }
    //all by invoice no
    public function get_all_stock_item($invoice_no)
    {
        $this->db->select('I.name,I.id');
        $this->db->from('inv_stock_amount as SA');
        $this->db->join('inv_stock_details as SD', 'SA.id = SD.stock_amount_id');
        $this->db->join('item as I', 'SD.item_id = I.id');
        $this->db->group_by('SD.item_id');
        $this->db->where('SA.invoice_no', $invoice_no);
        return $this->db->get()->result_array();
    }
    public function get_all_sales_item($invoice_no)
    {
        $this->db->select('I.name,I.id');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
        $this->db->join('item as I', 'SD.item_id = I.id');
        $this->db->group_by('SD.item_id');
        $this->db->where('SA.invoice_no', $invoice_no);
        $this->db->where('SA.section', "sales");
        return $this->db->get()->result_array();
    }
    public function get_stock_item_desc_list($cheking_array)
    {
        $this->db->select('ID.item_desc,ID.id');
        $this->db->from('inv_stock_amount as SA');
        $this->db->join('inv_stock_details as SD', 'SA.id = SD.stock_amount_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->group_by('SD.item_desc_id');
        $this->db->where($cheking_array);
        return $this->db->get()->result_array();
    }
    public function get_sales_item_desc_list($cheking_array)
    {
        $this->db->select('ID.item_desc,ID.id');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->group_by('SD.item_desc_id');
        $this->db->where($cheking_array);
        return $this->db->get()->result_array();
    }
    public function get_stock_item_description($cheking_array)
    {
        $this->db->select('ID.item_desc,ID.id,U.name');
        $this->db->from('inv_stock_amount as SA');
        $this->db->join('inv_stock_details as SD', 'SA.id = SD.stock_amount_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->join('item as I', 'ID.item_id = I.id');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->group_by('SD.item_desc_id');
        $this->db->where($cheking_array);
        return $this->db->get()->result_array();
    }
    public function get_sales_item_description($cheking_array)
    {
        $this->db->select('ID.item_desc,ID.id,U.name');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->join('item as I', 'ID.item_id = I.id');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->group_by('SD.item_desc_id');
        $this->db->where($cheking_array);
        return $this->db->get()->result_array();
    }
    
    public function get_single_stock_item_by_invoice($index_array)
    {
        $this->db->select('ID.item_desc,ID.id as item_desc_id,ID.code,SD.purchase_price,SD.qty,I.name,I.id as item_id,U.name as unit_name');
        $this->db->from('inv_stock_amount as SA');
        $this->db->join('inv_stock_details as SD', 'SA.id = SD.stock_amount_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->join('item as I', 'ID.item_id = I.id');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->where($index_array);
        return $this->db->get()->row_array();
    }
    public function get_single_sales_item_by_invoice($index_array)
    {
        $this->db->select('ID.item_desc,ID.id as item_desc_id,ID.code,SD.sales_price,SD.qty,I.name,I.id as item_id,U.name as unit_name');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->join('item as I', 'ID.item_id = I.id');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->where($index_array);
        return $this->db->get()->row_array();
    }
    public function get_supplier_by_invoice($invoice_no)
    {
        $this->db->select('S.id,S.name');
        $this->db->from('inv_stock_amount as SA');
        $this->db->join('inv_stock_details as SD', 'SA.id = SD.stock_amount_id');
        $this->db->join('supplier as S', 'SD.supplier_id = S.id');
        $this->db->where("SA.invoice_no",$invoice_no);
        return $this->db->get()->row_array();
    }
    public function get_customer_details_by_id($customer_id)
    {
        $this->db->select('C.id,C.name,C.code,AL.id ledger_id,MH.name as account_head_name,M.name as marketing_name');
        $this->db->from('customer as C');
        $this->db->join('acc_ledger as AL', 'C.id = AL.customer_id');
        $this->db->join('acc_main_head as MH', 'AL.head_id = MH.id');
        $this->db->join('marketing as M', 'C.marketing_id = M.id',"left");
        $this->db->where('C.id',$customer_id);
        return $this->db->get()->row_array();
    }
    public function get_available_stock($cheking_array)
    {
        $this->db->select('sum(qty) as total_stock');
        $this->db->from('inv_stock_details');
        $this->db->where($cheking_array);
        $total_stock=$this->db->get()->row_array()["total_stock"];

        $this->db->select('sum(qty) as total_sales');
        $this->db->from('inv_sales_details');
        $this->db->where($cheking_array);
        $total_sales=$this->db->get()->row_array()["total_sales"];
        return $total_stock-$total_sales;
    }
    public function get_customer_previous_balance($customer_id)
    {
        $this->db->select('credit,debit');
        $this->db->from('acc_ledger');
        $this->db->limit(1);
        $this->db->where("customer_id",$customer_id);
        $total_stock=$this->db->get()->row_array();
        return $total_stock-$total_sales;
    }
    
    public function get_customer_by_invoice($invoice_no)
    {
        $this->db->select('C.id,C.name');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
        $this->db->join('customer as C', 'SD.customer_id = C.id');
        $this->db->where("SA.invoice_no",$invoice_no);
        return $this->db->get()->row_array();
    }
    public function get_ledger_for_mixed($cheking_array,$type)
    {
        $this->db->select('AL.id,AL.name,AT.type');
        $this->db->from('acc_ledger as AL');
        $this->db->join('acc_type as AT', 'AL.acc_type = AT.id');
        $this->db->order_by('AL.name', 'ASC');
        $this->db->where($cheking_array);
        if($type=="payment")
        {
            $this->db->where("AL.supplier_id!=",null);
        }
        if($type=="received")
        {
            $this->db->where("AL.customer_id!=",null);
        }
        return $this->db->get()->result_array();
    }
    public function get_ledger_address($cheking_array,$type)
    {
        if($type=="supplier")
        {
            $this->db->select('S.address');
            $this->db->from('acc_ledger as AL');
            $this->db->join('supplier as S', 'AL.supplier_id = S.id');
        }
        if($type=="customer")
        {
            $this->db->select('C.address,M.name,B.name as branch_name');
            $this->db->from('acc_ledger as AL');
            $this->db->join('customer as C', 'AL.customer_id = C.id');
            $this->db->join('branch as B', 'AL.branch_id = B.id');
            $this->db->join('marketing as M', 'C.marketing_id = M.id',"left");
        }
        $this->db->where($cheking_array);
        return $this->db->get()->row_array();
    }
}

/* End of file Ajax.php */
