<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ajax_model", 'ajax', true);
    }

    public function index()
    { }

    public function add_parent()
    {
        if ($_POST) {
            $data = array();
            $this->data['name'] = $this->input->post("name");
            if (strtolower($this->data['name']) != "module") {
                $this->data['position'] = $this->input->post("position");
                $this->data['link'] = strtolower(str_replace(" ", "-", $this->data['name']));
                $this->data['short_code'] = strtolower(str_replace(" ", "_", $this->data['name']));
                $check = $this->ajax->get_single("permission_group", array("short_code" => $this->data['short_code']));
                if (empty($check)) {
                    $insert_id = $this->ajax->insert("permission_group", $this->data);
                    $this->data['perm_group_id'] = $insert_id;
                    $this->ajax->insert("permission_category", $this->data);
                }
                $result = $this->ajax->get("permission_group", "id,name", "name", "ASC");
                echo json_encode($result);
            } else {
                echo json_encode(array("failed"));
            }
        }
    }
    public function get_user_by_role_id()
    {
        if ($_GET) {
            $role_id = $this->input->get("role_id");
            $check = $this->ajax->get_list("admin", array("role_id" => $role_id), "", "", "username", "ASC");
            echo json_encode($check);
        }
    }
    public function get_branch_by_company()
    {
        if ($_GET) {
            $company_id = $this->input->get("company_id");
            if (is_super_admin() || is_admin()) {
                $result = $this->ajax->get_list("branch", array("company_id" => $company_id), "", "", "", "name", "ASC");
            } else {
                $result = $this->ajax->get_list("branch", array("id" => logged_in_branch_id(), "company_id" => $company_id), "", "", "", "name", "ASC");
            }
            echo json_encode($result);
        }
    }
    public function get_section_by_branch()
    {
        if ($_GET) {
            $branch_id = $this->input->get("branch_id");
            $result = $this->ajax->get_list("section", array("branch_id" => $branch_id), "", "", "name", "ASC");
            echo json_encode($result);
        }
    }
    public function get_designation_by_branch()
    {
        if ($_GET) {
            $branch_id = $this->input->get("branch_id");
            $result = $this->ajax->get_list("designation", array("branch_id" => $branch_id), "", "", "designation", "ASC");
            echo json_encode($result);
        }
    }
    public function get_marketing_by_branch()
    {
        if ($_GET) {
            $branch_id = $this->input->get("branch_id");
            $result = $this->ajax->get_list("marketing", array("branch_id" => $branch_id), "", "", "name", "ASC");
            echo json_encode($result);
        }
    }
    public function get_subparent()
    {
        if ($_POST) {
            $parent_id = $this->input->post("parent_id");
            $result = $this->ajax->get_list("permission_category", array("perm_group_id" => $parent_id, "submenu" => 1, "subparent" => 0), "", "", "name", "ASC");
            echo json_encode($result);
        }
    }
    /**
     * =======================
     *  inventory/account section
     * =======================
     */
    public function get_main_id_by_type()
    {
        if ($_POST) {
            $acc_type = $this->input->post("acc_type");
            $result = $this->ajax->get_single("acc_type", array("id" => $acc_type), "id");
            echo json_encode($result);
        }
    }
    public function get_main_head_by_type()
    {
        if ($_POST) {
            $acc_type = $this->input->post("acc_type");
            $msg = $this->input->post("msg");
            $data['all_head'] = $this->ajax->get_main_head($acc_type, 1);
            if ($msg == "mainhead") {
                $this->load->view("mainhead/view", $data);
            } else {
                echo json_encode($data['all_head']);
            }
        }
    }
    public function get_ledger_by_head()
    {
        if ($_POST) {
            $head_id = $this->input->post("head_id");
            $acc_type = $this->input->post("acc_type");
            $company_id = $this->input->post("company_id");
            $branch_id = $this->input->post("branch_id");
            if (!is_super_admin() && !is_admin()) {
                $checking_array["L.company_id"] = logged_in_company_id();
                $checking_array["L.branch_id"] = logged_in_branch_id();
            } else {
                $checking_array["L.company_id"] = $company_id;
                $checking_array["L.branch_id"] = $branch_id;
            }
            $msg = $this->input->post("msg");
            if ($head_id != '') {
                $checking_array['L.head_id'] = $head_id;
            }
            if ($acc_type != '') {
                $checking_array['L.acc_type'] = $acc_type;
            }
            $data['all_ledger'] = $this->ajax->get_ledger($checking_array);
            if ($msg == "ledger") {
                $this->load->view("ledger/view", $data);
            } else {
                echo json_encode($data['all_ledger']);
            }
        }
    }
    public function get_supplier_by_company_branch()
    {
        if ($_GET) {
            $company_id = $this->input->get("company_id");
            $branch_id = $this->input->get("branch_id");
            $checking_array = array();
            if ($company_id != '') {
                $checking_array['company_id'] = $company_id;
            }
            if ($branch_id != '') {
                $checking_array['branch_id'] = $branch_id;
            }
            $checking_array['status'] = 1;
            $result = $this->ajax->get_list("supplier", $checking_array, "id,name", "", "", "name", "ASC");
            echo json_encode($result);
        }
    }
    public function get_supplier_details_by_id()
    {
        if ($_GET) {
            $supplier_id = $this->input->get("supplier_id");
            $checking_array = array();
            $checking_array['id'] = $supplier_id;
            $checking_array['status'] = 1;
            $result = $this->ajax->get_supplier_details_by_id($checking_array);
            echo json_encode($result);
        }
    }
    public function get_item_unit()
    {
        if ($_GET) {
            $item_id = $this->input->get("item_id");
            $result = $this->ajax->get_item_unit($item_id);
            echo json_encode($result);
        }
    }
    public function get_all_item()
    {
        if ($_GET) {
            $invoice_no = $this->input->get("invoice_no");
            $purchase_return = $this->input->get("purchase_return");
            $sales_return = $this->input->get("sales_return");
            $company_id = $this->input->get("company_id");
            if ($purchase_return != '') {
                $send_data['result_data'] = $this->ajax->get_all_stock_item($invoice_no);
            } else if ($sales_return != '') {
                $send_data['result_data'] = $this->ajax->get_all_sales_item($invoice_no);
            } else {
                $send_data['result_data'] = $this->ajax->get_list("item", array("status" => 1, "company_id" => $company_id), "id,name", "", "", "name", "ASC");
            }
            $result = $send_data;
            echo json_encode($result);
        }
    }
    public function get_item_description_list()
    {
        if ($_GET) {
            $company_id = $this->input->get("company_id");
            $branch_id = $this->input->get("branch_id");
            $invoice_no = $this->input->get("invoice_no");
            $purchase_return = $this->input->get("purchase_return");
            $sales_return = $this->input->get("sales_return");
            $checking_array = array();
            if ($purchase_return != '') {
                $checking_array['SA.invoice_no'] = $invoice_no;
                $send_data['result_data'] = $this->ajax->get_stock_item_desc_list($checking_array);
            } else if ($sales_return != '') {
                $checking_array['SA.invoice_no'] = $invoice_no;
                $checking_array['SA.section'] = "sales";
                $send_data['result_data'] = $this->ajax->get_sales_item_desc_list($checking_array);
            } else {
                if ($company_id != '') {
                    $checking_array['company_id'] = $company_id;
                }
                if ($branch_id != '') {
                    $checking_array['branch_id'] = $branch_id;
                }
                $checking_array['status'] = 1;
                $send_data['result_data'] = $this->ajax->get_list("item_description", $checking_array, "id,item_desc,code", "", "", "item_desc", "ASC");
            }
            $result = $send_data;
            echo json_encode($result);
        }
    }
    public function get_item_description()
    {
        if ($_GET) {
            $item_id = $this->input->get("item_id");
            $company_id = $this->input->get("company_id");
            $branch_id = $this->input->get("branch_id");
            $invoice_no = $this->input->get("invoice_no");
            $purchase_return = $this->input->get("purchase_return");
            $sales_return = $this->input->get("sales_return");
            $checking_array = array();
            if ($item_id != '') {
                $checking_array['item_id'] = $item_id;
            }
            if ($company_id != '') {
                $checking_array['company_id'] = $company_id;
            }
            if ($branch_id != '') {
                $checking_array['branch_id'] = $branch_id;
            }
            $checking_array['status'] = 1;
            if ($purchase_return != '') {
                if ($invoice_no != '') {
                    $index_array['SA.invoice_no'] = $invoice_no;
                }
                if ($item_id != '') {
                    $index_array['ID.item_id'] = $item_id;
                }
                $send_data['result_data'] = $this->ajax->get_stock_item_description($index_array);
            } else if ($sales_return != '') {
                if ($invoice_no != '') {
                    $index_array['SA.invoice_no'] = $invoice_no;
                }
                if ($item_id != '') {
                    $index_array['ID.item_id'] = $item_id;
                }
                $send_data['result_data'] = $this->ajax->get_sales_item_description($index_array);
            } else {
                if ($item_id != '') {
                    $send_data['result_data'] = $this->ajax->get_list("item_description", $checking_array, "id,item_desc,code", "", "", "item_desc", "ASC");
                } else {
                    $send_data['result_data'] = $this->ajax->get_list("item_description", array("status" => 1), "id,item_desc,code", "", "", "item_desc", "ASC");
                }
            }
            $result = $send_data;
            echo json_encode($result);
        }
    }
    public function get_single_item_description()
    {
        if ($_GET) {
            $item_desc_code = $this->input->get("item_desc_code");
            $item_desc_id = $this->input->get("item_desc_id");
            // $item_id=$this->input->get("item_id");
            $company_id = $this->input->get("company_id");
            $branch_id = $this->input->get("branch_id");
            $msg = $this->input->get("msg");
            $invoice_no = $this->input->get("invoice_no");
            $purchase_return = $this->input->get("purchase_return");
            $sales_return = $this->input->get("sales_return");
            $checking_array = array();
            if ($purchase_return != '' || $sales_return != '') {
                $checking_array['SA.invoice_no'] = $invoice_no;
                if ($item_desc_code != '') {
                    $checking_array['ID.code'] = $item_desc_code;
                }
                if ($item_desc_id != '') {
                    $checking_array['ID.id'] = $item_desc_id;
                }
                if ($item_desc_code == "" && $item_desc_id == "") {
                    $checking_array['status'] = 1;
                    $send_data['msg'] = "all";
                    if ($sales_return != '') {
                        $send_data['result_data'] = $this->ajax->get_sales_item_desc_list($checking_array);
                        $send_data['item_list'] = $this->ajax->get_all_sales_item($invoice_no);
                    }
                    if ($purchase_return != '') {
                        $send_data['result_data'] = $this->ajax->get_stock_item_desc_list($checking_array);
                        $send_data['item_list'] = $this->ajax->get_all_stock_item($invoice_no);
                    }
                    $result = $send_data;
                } else {
                    $send_data['msg'] = $msg;
                    if ($sales_return != '') {
                        $send_data['result_data'] = $this->ajax->get_single_sales_item_by_invoice($checking_array);
                        $send_data['item_list'] = $this->ajax->get_all_sales_item($invoice_no);
                    }
                    if ($purchase_return != '') {
                        $send_data['result_data'] = $this->ajax->get_single_stock_item_by_invoice($checking_array);
                        $send_data['item_list'] = $this->ajax->get_all_stock_item($invoice_no);
                    }
                    $result = $send_data;
                }
            } else {
                if ($item_desc_code != '') {
                    $checking_array['ID.code'] = $item_desc_code;
                    $checking_array['ID.company_id'] = $company_id;
                    $checking_array['ID.branch_id'] = $branch_id;
                }
                if ($item_desc_id != '') {
                    $checking_array['ID.id'] = $item_desc_id;
                }
                if ($item_desc_code == "" && $item_desc_id == "") {
                    $checking_array['company_id'] = $company_id;
                    $checking_array['branch_id'] = $branch_id;
                    $checking_array['status'] = 1;
                    $send_data['msg'] = "all";
                    $send_data['result_data'] = $this->ajax->get_list("item_description", $checking_array, "id,item_desc,code", "", "", "item_desc", "ASC");
                    $send_data['item_list'] = $this->ajax->get_list("item", array("status" => 1), "id,name", "", "", "name", "ASC");
                    $result = $send_data;
                } else {
                    $send_data['msg'] = $msg;
                    $send_data['result_data'] = $this->ajax->get_single_item($checking_array);
                    $send_data['item_list'] = $this->ajax->get_list("item", array("status" => 1), "id,name", "", "", "name", "ASC");
                    $result = $send_data;
                }
            }
            // debug_r($result);
            echo json_encode($result);
        }
    }
    public function get_supplier_by_invoice()
    {
        if ($_GET) {
            $invoice_no = $this->input->get("invoice_no");
            $result = $this->ajax->get_supplier_by_invoice($invoice_no);
            echo json_encode($result);
        }
    }
    public function get_customer_by_branch()
    {
        if ($_GET) {
            $branch_id = $this->input->get("branch_id");
            $result = $this->ajax->get_list("customer", array("branch_id" => $branch_id), "id,name", "", "", "name", "ASC");
            echo json_encode($result);
        }
    }
    public function get_customer_details_by_id()
    {
        if ($_GET) {
            $customer_id = $this->input->get("customer_id");
            $result = $this->ajax->get_customer_details_by_id($customer_id);
            echo json_encode($result);
        }
    }
    public function get_available_stock()
    {
        if ($_GET) {
            $company_id = $this->input->get("company_id");
            $branch_id = $this->input->get("branch_id");
            $item_desc_id = $this->input->get("item_desc_id");
            $checking_array['company_id'] = $company_id;
            $checking_array['branch_id'] = $branch_id;
            if ($item_desc_id != '') {
                $checking_array['item_desc_id'] = $item_desc_id;
            }
            $send_data['result_data'] = $this->ajax->get_available_stock($checking_array);
            $result = $send_data;
            echo json_encode($result);
        }
    }
    public function get_customer_previous_balance()
    {
        if ($_POST) {
            $customer_id = $this->input->post("customer_id");
            $result = $this->ajax->get_single("acc_ledger", array("customer_id" => $customer_id), "credit,debit");
            $banalce = $result->debit - $result->credit;
            echo json_encode($banalce);
        }
    }
    public function get_customer_by_invoice()
    {
        if ($_GET) {
            $invoice_no = $this->input->get("invoice_no");
            $result = $this->ajax->get_customer_by_invoice($invoice_no);
            echo json_encode($result);
        }
    }
    /**
     * open balance,payment,received
     */
    public function get_ledger_for_mixed()
    {
        if ($_GET) {
            $company_id = $this->input->get("company_id");
            $branch_id = $this->input->get("branch_id");
            $type = $this->input->get("type");
            $checking_array = array();
            $checking_array['AL.company_id'] = $company_id;
            if ($branch_id != '') {
                $checking_array['AL.branch_id'] = $branch_id;
            }
            $result = $this->ajax->get_ledger_for_mixed($checking_array, $type);
            echo json_encode($result);
        }
    }
    public function get_ledger_address()
    {
        if ($_GET) {
            $ledger = $this->input->get("ledger_id");
            $ledger_id = '';
            if ($ledger != '') {
                $ledger_id = explode("#", $ledger)[0];
            }
            $type = $this->input->get("type");
            $checking_array['AL.id'] = $ledger_id;
            $result = $this->ajax->get_ledger_address($checking_array, $type);
            echo json_encode($result);
        }
    }
}

/* End of file Ajax.php */
