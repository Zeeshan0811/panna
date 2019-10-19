<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends MY_Model
{
    public function get_customer($id = null, $checking_array = null)
    {
        $this->db->select('C.id as customer_id,M.id as marketing_id,
        C.name as customer_name,C.*,IFNULL(C.marketing_id,0),IFNULL(C.bank_id,0),
        M.name as marketing_name,CP.name as company_name,B.name as branch_name,CB.name as customer_bank');
        $this->db->from('customer as C');
        $this->db->join('company as CP', 'C.company_id = CP.id', "left");
        $this->db->join('branch as B', 'C.branch_id = B.id', "left");
        $this->db->join('marketing as M', 'C.marketing_id = M.id', "left");
        $this->db->join('customer_bank as CB', 'C.bank_id = CB.id', "left");
        if ($id != '') {
            $this->db->where("C.id", $id);
            return $this->db->get()->row_array();
        } else {
            $this->db->where($checking_array);
            return $this->db->get()->result_array();
        }
    }
    public function get_company_info($company_id, $branch_id)
    {
        $company = $this->get_single("company", array("id" => $company_id));
        $branch = $this->get_single("branch", array("id" => $branch_id));
        if (isset($company)) {
            $send_data['company_name'] = $company->name;
            $send_data['company_address'] = $company->address;
            $send_data['logo'] = $company->logo;
        } else {
            $send_data['company_name'] = "";
            $send_data['company_address'] = "";
            $send_data['logo'] = "";
        }
        if (isset($branch)) {
            $send_data['branch_name'] = $branch->name;
            $send_data['branch_address'] = $branch->address;
        } else {
            $send_data['branch_name'] = "";
            $send_data['branch_address'] = "";
        }
        return $send_data;
    }

    // Get Single cell 
    function get_single_cell_by_single_column($table, $column_name, $column_value, $select)
    {
        $query = $this->db->select($select)->get_where($table, array($column_name => $column_value));
        return $query;
    }
}

/* End of file Setup_model.php */
