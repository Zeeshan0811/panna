<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Openstock_model extends MY_Model {
    
    public function get_single_stock_item($id)
    {
        $this->db->select('SD.*,S.code as supplier_code,S.name as supplier_name,AL.id as account_id,ID.code as item_desc_code,U.name as unit_name,B.name as branch_name');
        $this->db->from('inv_stock_details as SD');
        $this->db->join('supplier as S', 'SD.supplier_id = S.id');
        $this->db->join('acc_ledger as AL', 'S.id = AL.supplier_id');
        $this->db->join('item_description as ID', 'SD.item_desc_id = ID.id');
        $this->db->join('item as I', 'SD.item_id = I.id');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->join('branch as B', 'SD.branch_id = B.id');
        $this->db->where('SD.id', $id);
        return $this->db->get()->row_array();
    }
    public function check_item_exits($index_array)
    {
        $this->db->select('I.item_desc,I.code');
        $this->db->from('inv_stock_details SD');
        $this->db->join('item_description I', 'SD.item_desc_id = I.id', 'left');
        $this->db->where($index_array);
        return $this->db->get()->row_array();
    }
    public function get_stock($checking_array)
    {
        $this->db->select('SD.date');
        $this->db->from('inv_stock_details as SD');
        $this->db->group_by('SD.date');
        $this->db->select_max("SD.date","max_date");
        $this->db->order_by('SD.date', 'desc');
        $this->db->where('SD.section', "opening_stock");
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
        $this->db->select('SD.*,SD.id as stock_id,SD.purchase_price as purchase_price,I.name as item_name,ID.item_desc,U.name as unit');
        $this->db->from('inv_stock_details as SD');
        $this->db->join('item_description ID', 'SD.item_desc_id = ID.id');
        $this->db->join('item as I', 'SD.item_id = I.id');
        $this->db->join('unit U', 'I.unit_id = U.id');
        $this->db->where($checking_array);
        $this->db->where("SD.date",$date);
        $this->db->order_by('I.name', 'ASC');
        $this->db->order_by('SD.id', 'desc');
        $this->db->where('SD.section', "opening_stock");
        $result=$this->db->get()->result_array();
        $data=array();
        if(isset($result))
        {
            foreach ($result as $key => $value) {
                $data[$key]['stock_id']=$value['stock_id'];
                $data[$key]['item_id']=$value['item_id'];
                $data[$key]['item_name']=$value['item_name'];
                $data[$key]['item_desc']=$value['item_desc'];
                $data[$key]['qty']=$value['qty'];
                $data[$key]['purchase_price']=$value['purchase_price'];
                $data[$key]['unit']=$value['unit'];
                $data[$key]['date']=date("d-m-Y",strtotime($value['date']));
                $chek_array=array(
                    "item_id"=>$value['item_id'],
                    "date"=>$value['date'],
                    "section"=>"opening_stock"
                );
                $new_condition=array_merge($checking_array,$chek_array);
                $data[$key][$value['item_name']]=$this->count_all("inv_stock_details as SD",$new_condition);
            }
        }
        return $data;
    }


}

/* End of file Openstock_model.php */
