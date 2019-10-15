<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_model extends MY_Model {
   public function get_sales_item($checking_array)
   {
       $this->db->select('SD.date');
       $this->db->from('inv_sales_details as SD');
       $this->db->group_by('SD.date');
       $this->db->select_max("SD.date","max_date");
       $this->db->order_by('SD.date', 'desc');
       $result=$this->db->get()->result_array();
       $data=array();
       $temp_date=array();
       if(isset($result))
       {
           foreach ($result as $key => $value) {
               $item_desc=$this->get_item_desc($checking_array,$value["date"]);
               $data[$key]["date"]=$item_desc;
           }
       }
      
      return $data;
   }   
   public function get_item_desc($checking_array,$date)
   {
       $this->db->select('SD.*,SD.id as sales_id,SD.sales_price as sales_price,SA.invoice_no,SA.section,I.name as item_name,ID.item_desc,U.name as unit');
       $this->db->from('inv_sales_details as SD');
       $this->db->join('item_description ID', 'SD.item_desc_id = ID.id');
       $this->db->join('inv_sales_amount SA', 'SD.sales_amount_id = SA.id');
       $this->db->join('item as I', 'SD.item_id = I.id');
       $this->db->join('unit U', 'I.unit_id = U.id');
       $this->db->where($checking_array);
       $this->db->where("SD.date",$date);
       $this->db->order_by('I.name', 'ASC');
       $this->db->order_by('SD.id', 'desc');
       $result=$this->db->get()->result_array();
       $data=array();
       if(isset($result))
       {
           foreach ($result as $key => $value) {
               $data[$key]['sales_id']=$value['sales_id'];
               $data[$key]['invoice_no']=$value['invoice_no'];
               $data[$key]['sales_amount_id']=$value['sales_amount_id'];
               $data[$key]['item_id']=$value['item_id'];
               $data[$key]['item_name']=$value['item_name'];
               $data[$key]['item_desc']=$value['item_desc'];
               $data[$key]['qty']=$value['qty'];
               $data[$key]['sales_price']=$value['sales_price'];
               $data[$key]['section']=$value['section'];
               $data[$key]['unit']=$value['unit'];
               $data[$key]['date']=date("d-m-Y",strtotime($value['date']));
               $chek_array=array(
                "item_id"=>$value['item_id'],
                "date"=>$value['date']
               );

               $new_condition=array_merge($checking_array,$chek_array);
               $data[$key][$value['item_name']]=$this->count_all("inv_sales_details as SD",$new_condition);
           }
       }
       return $data;
   }
   public function get_all_sales_type()
   {
       $this->db->select('AL.id,AL.name');
       $this->db->from('acc_main_head as AH');
       $this->db->join('acc_ledger as AL', 'AH.id = AL.head_id');
       $this->db->where('AH.name', "SALES OF PRODUCT");
       return $this->db->get()->result_array();
   }
   public function get_single_sales_item($id)
    {
        $this->db->select('SD.*,C.code as customer_code,SA.invoice_no,SA.sales_type_id,C.name as customer_name,AL.id as account_id,AL.name as ledger_name,AL2.name as sales_type,MH.name as account_head_name,ID.code as item_desc_code,U.name as unit_name,B.name as branch_name,M.name as marketing_name');
        $this->db->from('inv_sales_details as SD');
        $this->db->join('customer as C', 'SD.customer_id = C.id',"left");
        $this->db->join('marketing as M', 'C.marketing_id = M.id',"left");
        $this->db->join('inv_sales_amount as SA', 'SD.sales_amount_id = SA.id',"left");
        $this->db->join('acc_ledger as AL', 'C.id = AL.customer_id',"left");
        $this->db->join('acc_ledger as AL2', 'SA.sales_type_id = AL2.id',"left");
        $this->db->join('acc_main_head as MH', 'AL.head_id = MH.id',"left");
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id',"left");
        $this->db->join('item as I', 'SD.item_id = I.id',"left");
        $this->db->join('unit as U', 'I.unit_id = U.id',"left");
        $this->db->join('branch as B', 'SD.branch_id = B.id',"left");
        $this->db->where('SD.id', $id);
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
    public function get_single_sales_details($checking_array)
    {
        $this->db->select('SD.qty');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id');
        $this->db->where($checking_array);
        return $this->db->get()->row_array();
    }
    public function get_sales_invoice($id)
    {
        $this->db->select('SA.created_at,SA.sales_by,SA.total,SA.invoice_no,SA.previous_balance,SA.net_payable,SA.due,SA.discount_tk,SA.transport_charge,SA.remarks,SA.pay,C.name as customer_name,C.address,C.tel,M.name as marketing_name,B.name as branch_name');
        $this->db->from('inv_sales_amount as SA');
        $this->db->join('inv_sales_details as SD', 'SA.id = SD.sales_amount_id',"left");
        $this->db->join('branch as B', 'SD.branch_id = B.id',"left");
        $this->db->join('customer as C', 'SD.customer_id = C.id',"left");
        $this->db->join('marketing as M', 'C.marketing_id = M.id',"left");
        $this->db->where('SA.id', $id);
        $result= $this->db->get()->row_array();
        if(isset($result))
        {
         $result[$result['invoice_no']]=$this->get_sales_item_list($id);   
        }
        return $result;
    }
    public function get_sales_item_list($id)
    {
        $this->db->select('SD.qty,SD.sales_price,SD.sub_total,ID.item_desc');
        $this->db->from('inv_sales_details as SD');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->where('SD.sales_amount_id', $id);
        return $this->db->get()->result_array();
    }
}