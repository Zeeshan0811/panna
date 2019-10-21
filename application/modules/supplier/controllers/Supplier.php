<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Supplier_model', 'supplier', true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
    public function index()
    {
        if (!hasPermission("supplier_info", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'supplier-info');
        $this->layout->title("Supplier Information");
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->supplier->get_list("company", array("status" => 1), "id,name", "", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->supplier->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "id,name", "", "", "name", "ASC");
        }

        $this->data['add'] = true;
        $this->layout->view('supplier', $this->data);
    }
    public function get_custom_code()
    {
        if ($_GET) {
            $checking_array['company_id'] = $this->input->get("company_id", true);
            $result = $this->supplier->get_custom_id("supplier", "code", 5001, $checking_array);
            echo json_encode($result);
            exit;
        }
    }
    /** ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : Process "customer" data add                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function add()
    {
        if (!hasPermission("supplier_info", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->_get_supplier_validation();
            if ($this->form_validation->run() == TRUE) {
                $data = $this->_get_supplier_posted_data();
                // $checking_array['company_id'] = $data['company_id'];
                // $data["code"] = $this->supplier->get_custom_id("supplier", "code", 5001, $checking_array);
                $this->supplier->trans_start();
                $insert_id = $this->supplier->insert("supplier", $data);
                if ($insert_id) {
                    $ledger_data['supplier_id'] = $insert_id;
                    $result = $this->supplier->get_single("acc_main_head", array("name" => "ACCOUNTS PAYABLE (CREDITORS)"));
                    $ledger_data['acc_type'] = $result->acc_type;
                    $ledger_data['head_id'] = $result->id;
                    $ledger_data['company_id'] = $data['company_id'];
                    $ledger_data['branch_id'] = $data['branch_id'];
                    $ledger_data['name'] = $data['name'];
                    $this->supplier->insert("acc_ledger", $ledger_data);
                }
                $this->supplier->trans_complete();
                if ($this->supplier->trans_status() == true) {
                    if ($this->input->post("stock_modal") != '') {
                        $checking_array = array(
                            "company_id" => $data['company_id'],
                            "branch_id" => $data['branch_id'],
                            "status" => 1,
                        );
                        $send_data['msg'] = "success";
                        $send_data['result_data'] = $this->supplier->get_list("supplier", $checking_array, "id,name", "", "", "", "name", "ASC");
                        echo json_encode($send_data);
                        exit;
                    } else {
                        $send_data['msg'] = "success";
                        $send_data['result_data'] = "Supplier Add Successfully";
                        echo json_encode($send_data);
                        exit;
                    }
                } else {
                    $send_data['msg'] = "error";
                    $send_data['result_data'] = "Something Wrong!";
                    echo json_encode($send_data);
                    exit;
                }
            } else {
                $send_data['msg'] = "error";
                $send_data['result_data'] = validation_errors();
                echo json_encode($send_data);
                exit;
            }
        }
        redirect("supplier");
    }
    //supplier ajax view
    public function view()
    {
        if ($_GET) {
            if (!is_super_admin() && !is_admin()) {
                $checking_array["S.company_id"] = logged_in_company_id();
                $checking_array["S.branch_id"] = logged_in_branch_id();
            } else {
                $company_id = $this->input->get("company_id");
                $branch_id = $this->input->get("branch_id");
                $checking_array["S.company_id"] = $company_id;
                $checking_array["S.branch_id"] = $branch_id;
            }
            $this->data['all_supplier'] = $this->supplier->get_supplier("", $checking_array);
            $send_data['total_supplier'] = count($this->data['all_supplier']);
            $send_data['result_data'] = $this->load->view("supplier-view", $this->data, true);
            echo json_encode($send_data);
            exit;
        }
    }
    /** ***************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : Process "marketing" data update                 
     *                       
     * @param           : id
     * @return          : null 
     * ********************************************************** */
    public function edit($id = null)
    {
        if (!hasPermission("supplier_info", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $single = $this->supplier->get_supplier($id);
        if ($single['company_id'] == logged_in_company_id() || is_super_admin() || is_admin()) {
            if ($_POST) {
                $this->_get_supplier_validation();
                if ($this->form_validation->run() == TRUE) {
                    $data = $this->_get_supplier_posted_data();
                    // if ($data['company_id'] != $single['company_id']) {
                    //     $checking_array['company_id'] = $data['company_id'];
                    //     $data["code"] = $this->supplier->get_custom_id("supplier", "code", 5001, $checking_array);
                    // } else {
                    //     $data['code'] = $single['code'];
                    // }

                    $ledger_data['company_id'] = $data['company_id'];
                    $ledger_data['branch_id'] = $data['branch_id'];
                    $ledger_data['name'] = $data['name'];
                    $ledger_data['running_year'] = $this->running_year;

                    $this->supplier->trans_start();
                    //update supplier
                    $this->supplier->update("supplier", $data, array("id" => $id));
                    //update ledger
                    $this->supplier->update("acc_ledger", $ledger_data, array("supplier_id" => $id));

                    $this->supplier->trans_complete();
                    if ($this->supplier->trans_status() == true) {
                        setMessage("msg", "success", "Supplier Updated Successfully");
                    } else {
                        setMessage("msg", "success", "Something Wrong!");
                    }
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("supplier");
            }
            $this->session->set_userdata('sub_menu', 'supplier-info');
            $this->layout->title("Supplier Information");
            if (is_super_admin()) {
                $this->data['all_company'] = $this->supplier->get_list("company", array("status" => 1), "id,name", "", "", "name", "ASC");
                $this->data['all_branch'] = $this->supplier->get_list("branch", array("status" => 1, "company_id" => $single['company_id']), "id,name", "", "", "name", "ASC");
            } else {
                $this->data['all_company'] = $this->supplier->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "id,name", "", "", "name", "ASC");
                $this->data['all_branch'] = $this->supplier->get_list("branch", array("status" => 1, "company_id" => logged_in_company_id()), "id,name", "", "", "name", "ASC");
            }
            $this->data['single'] = $single;
            $this->data['edit'] = true;
            $this->layout->view('supplier', $this->data);
        } else {
            show_404();
        }
    }
    /** ***************Function delete**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "supplier" data delete                 
     *                       
     * @param           : id
     * @return          : null 
     * ********************************************************** */
    public function delete($id = null)
    {
        if (!hasPermission("supplier_info", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            // redirect('dashboard');
            $msg = 3;
        }
        $result = $this->supplier->get_single("supplier", array("id" => $id));
        if (isset($result)) {
            $this->supplier->trans_start();

            @$this->supplier->delete("supplier", array("id" => $id));
            @$this->supplier->delete("acc_ledger", array("supplier_id" => $id));

            $this->supplier->trans_complete();
            if ($this->supplier->trans_status() == true) {
                setMessage("msg", "success", "Supplier Delete Successfuly");
                $msg = 1;
            } else {
                setMessage("msg", "success", "Something Wrong!");
                $msg = 2;
            }
        }
        echo $msg;
        // redirect('supplier');
    }
    public function _get_supplier_validation()
    {
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
        $this->form_validation->set_rules('name', 'Supplier Name', 'trim|required|callback_name');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim|required');
        $this->form_validation->set_rules('tel', 'Telephone No.', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('code', 'Code', 'trim|required');
        // $this->form_validation->set_rules('section_id', 'Section Name', 'trim|required');
    }

    /** ***************Function name check**********************************
     * @type            : Function
     * @function name   : name
     * @description     : Unique check for name field" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */

    public function name()
    {
        if ($this->input->post('id') == '') {
            $exits_check = $this->supplier->exits_check("supplier", array("name" => $this->input->post('name')));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->supplier->exits_check("supplier", array("name" => $this->input->post('name')), $this->input->post('id'));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Name Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    //supplier information print
    public function print_supplier($company_id = null, $branch_id = null)
    {
        $this->session->set_userdata('sub_menu', 'supplier-info');
        if (!is_super_admin() && !is_admin()) {
            $checking_array["S.company_id"] = logged_in_company_id();
            $checking_array["S.branch_id"] = logged_in_branch_id();
        } else {
            $checking_array["S.company_id"] = $company_id;
            $checking_array["S.branch_id"] = $branch_id;
        }
        $this->data['all_supplier'] = $this->supplier->get_supplier("", $checking_array);
        $this->data['total_supplier'] = count($this->data['all_supplier']);
        $this->data['company_info'] = $this->supplier->get_company_info($company_id, $branch_id);
        $this->load->library("Pdfgenerator");
        $html = $this->load->view("supplier-pdf-view", $this->data, true);
        $filename = "Supplier Information";
        $this->pdfgenerator->generate($html, $filename, TRUE, 'A4', "portrait");
    }
    /** ***************Function _get_supplier_posted_data**********************************
     * @type            : Function
     * @function name   : _get_supplier_posted_data
     * @description     : get Marketing data/value                  
     *                       
     * @param           : null
     * @return          : data array 
     * ********************************************************** */

    public function _get_supplier_posted_data()
    {
        $items = array();
        $items[] = "company_id";
        $items[] = "branch_id";
        $items[] = "name";
        $items[] = "address";
        $items[] = "owner_name";
        $items[] = "tel";
        $items[] = "email";
        $items[] = "code";
        $data = elements($items, $_POST);
        $data['running_year'] = $this->running_year;
        return $data;
    }
}

/* End of file Users.php */
