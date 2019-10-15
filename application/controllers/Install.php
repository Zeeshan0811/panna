<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends MY_Controller {

    public function index()
    {
        
    }
    public function truncate($table="all")
    {
        if($table=="all")
        {
            $this->db->truncate("acc_customer_reports");
            $this->db->truncate("acc_ledger");
            // $this->db->truncate("acc_main_head");
            $this->db->truncate("acc_opening_balance");
            $this->db->truncate("acc_payment");
            $this->db->truncate("acc_received");
            // $this->db->truncate("acc_type");
            // $this->db->truncate("admin");
            $this->db->truncate("branch");
            $this->db->truncate("company");
            $this->db->truncate("company_bank");
            $this->db->truncate("customer");
            $this->db->truncate("customer_bank");
            $this->db->truncate("designation");
            $this->db->truncate("inv_purchase_return");
            $this->db->truncate("inv_sales_amount");
            $this->db->truncate("inv_sales_details");
            $this->db->truncate("inv_sales_return");
            $this->db->truncate("inv_stock_amount");
            $this->db->truncate("inv_stock_details");
            $this->db->truncate("inv_stock_reports");
            // $this->db->truncate("item");
            $this->db->truncate("item_description");
            $this->db->truncate("marketing");
            // $this->db->truncate("permission_category");
            // $this->db->truncate("permission_group");
            // $this->db->truncate("roles");
            // $this->db->truncate("roles_permissions");
            $this->db->truncate("section");
            // $this->db->truncate("session");
            // $this->db->truncate("setting");
            $this->db->truncate("supplier");
            // $this->db->truncate("unit");
        }else{
            if($this->db->table_exists($table))
            {
                $this->db->truncate($table);
            }
        }
    }

}

/* End of file Install.php */
