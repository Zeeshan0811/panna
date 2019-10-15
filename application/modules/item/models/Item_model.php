<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends MY_Model {

    public function get_item($id=null)
    {
        $this->db->select('I.id as item_id,I.company_id,I.name as item_name,I.unit_id,I.status,U.name as unit,C.name as company_name');
        $this->db->from('item as I');
        $this->db->join('unit as U', 'I.unit_id = U.id');
        $this->db->join('company as C', 'I.company_id = C.id',"left");
        if($id!='')
        {
            $this->db->where("I.id",$id);
            return $this->db->get()->row_array();
        }else{
            return $this->db->get()->result_array();
        }
    }
    public function all_item_description($id=null,$checking_array=null)
    {
        $this->db->select('ID.id as desc_id,ID.*,I.name as item_name,C.name as company_name,B.name as branch_name');
        $this->db->from('item_description as ID');
        $this->db->join('item as I', 'ID.item_id = I.id');
        $this->db->join('company as C', 'ID.company_id = C.id');
        $this->db->join('branch as B', 'ID.branch_id = B.id');
        if(!is_super_admin() && !is_admin())
        {
            $this->db->where("ID.company_id",logged_in_company_id());
            $this->db->where("ID.branch_id",logged_in_branch_id());
        }
        if(is_admin())
        {
            $this->db->where("ID.company_id",logged_in_company_id());
        }
        if(is_super_admin())
        {
            if($checking_array!='')
            {
                $this->db->where($checking_array);
            }
        }
        if($id!="")
        {
            $this->db->where("ID.id",$id);
            return $this->db->get()->row_array();
        }else{
            return $this->db->get()->result_array();
        }
        
    }
    public function get_item_description()
    {
        $this->db->select('I.id,I.name as item_name');
        $this->db->from('item_description as ID');
        $this->db->join('item as I',"ID.item_id=I.id");
        $result=$this->db->get()->result_array();
        $data=array();
        if(isset($result))
        {
            foreach($result as $key=>$value)
            {
                $data[$key]['item_name']=$value['item_name'];
                $data[$key][$value['item_name']]=$this->get_company($value['id']);
            }
        }

        return $data;
    }
    public function get_company($item_id)
    {
        $this->db->select('ID.id,C.name as company_name,C.id as company_id');
        $this->db->from('item_description as ID');
        $this->db->join('company as C', 'ID.company_id = C.id');
        $this->db->where('ID.item_id', $item_id);
        $result=$this->db->get()->result_array();
        $data=array();
        if(isset($result))
        {
            foreach($result as $key=>$value)
            {
                $data[$key]['company_name']=$value['company_name'];
                $data[$key][$value['company_name']]=$this->get_branch($item_id,$value['company_id']);
            }
        }
        return $data;
    }
    public function get_branch($item_id,$company_id)
    {
        $this->db->select('ID.id,B.name as branch_name,B.id as company_id');
        $this->db->from('item_description as ID');
        $this->db->join('branch as B', 'ID.branch_id = B.id');
        $this->db->where('ID.item_id', $item_id);
        $this->db->where('ID.company_id', $company_id);
        $result=$this->db->get()->result_array();
        $data=array();
        if(isset($result))
        {
            foreach($result as $key=>$value)
            {
                $data[$key]['branch_name']=$value['branch_name'];
                $data[$key][$value['branch_name']]=$value['branch_name'];
                $data[$key][$value['branch_name']]=$this->get_description($item_id,$company_id,$value['id']);
            }
        }
        return $data;
    }
    public function get_description($item_id,$company_id,$desc_id)
    {
        $this->db->select('*');
        $this->db->from('item_description');
        $this->db->where('item_id', $item_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('id', $desc_id);
        return $this->db->get()->result_array();
    }

}

/* End of file Item_model.php */
