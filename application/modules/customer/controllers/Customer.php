<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model', 'customer', true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
    public function index()
    {
        if (!hasPermission("customer_info", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'customer-info');
        $this->layout->title("Customer Information");

        $this->data['all_bank'] = $this->customer->get("customer_bank", "", "name", "ASC");
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->customer->get_list("company", array("status" => 1), "id,name", "", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->customer->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "id,name", "", "", "name", "ASC");
        }
        $this->data['add'] = true;
        $this->layout->view('customer', $this->data);
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
        if (!hasPermission("customer_info", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {

            $this->_get_customer_validation();
            if ($this->form_validation->run() == TRUE) {
                $data = $this->_get_customer_posted_data();
                $checking_array['company_id'] = $data['company_id'];
                $code = $this->customer->get_custom_id("customer", "code", 1001, $checking_array);
                $branch = $this->customer->get_company_info($data["company_id"], $data["branch_id"]);
                // $data["code"] = substr($branch['branch_name'], 0, 1) . $code;
                $this->customer->trans_start();
                $insert_id = $this->customer->insert("customer", $data);
                if ($insert_id) {
                    $ledger_data['customer_id'] = $insert_id;
                    $result = $this->customer->get_single("acc_main_head", array("name" => "ACCOUNTS RECEIVABLE (DEBITORS)"));
                    $ledger_data['acc_type'] = $result->acc_type;
                    $ledger_data['head_id'] = $result->id;
                    $ledger_data['company_id'] = $data['company_id'];
                    $ledger_data['branch_id'] = $data['branch_id'];
                    $ledger_data['name'] = $data['name'];
                    $ledger_data['running_year'] = $this->running_year;
                    $this->customer->insert("acc_ledger", $ledger_data);
                }
                $this->customer->trans_complete();
                if ($this->customer->trans_status() == true) {
                    if ($this->input->post("stock_modal") != '') {
                        $checking_array = array(
                            "company_id" => $data['company_id'],
                            "branch_id" => $data['branch_id'],
                            "status" => 1,
                        );
                        $send_data['msg'] = "success";
                        $send_data['result_data'] = $this->customer->get_list("customer", $checking_array, "id,name", "", "", "", "name", "ASC");
                        echo json_encode($send_data);
                        exit;
                    } else {
                        $send_data['msg'] = "success";
                        $send_data['result_data'] = "Customer Add Successfully";
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
        redirect("customer");
    }
    public function get_custom_code()
    {
        if ($_GET) {
            $checking_array['company_id'] = $this->input->get("company_id", true);
            $result = $this->customer->get_custom_id("customer", "code", 1001, $checking_array);
            echo json_encode($result);
            exit;
        }
    }
    //customer ajax view
    public function view()
    {
        if ($_GET) {
            if (!is_super_admin() && !is_admin()) {
                $checking_array["C.company_id"] = logged_in_company_id();
                $checking_array["C.branch_id"] = logged_in_branch_id();
            } else {
                $company_id = $this->input->get("company_id");
                $branch_id = $this->input->get("branch_id");
                $checking_array["C.company_id"] = $company_id;
                $checking_array["C.branch_id"] = $branch_id;
            }
            $this->data['all_customer'] = $this->customer->get_customer("", $checking_array);
            $send_data['total_customer'] = count($this->data['all_customer']);
            $send_data['result_data'] = $this->load->view("customer-view", $this->data, true);
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
        if (!hasPermission("customer_info", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'customer-info');
        $single = $this->customer->get_customer($id);
        if ($single['company_id'] == logged_in_company_id() || is_super_admin() || is_admin()) {
            if ($_POST) {
                $this->_get_customer_validation();
                if ($this->form_validation->run() == TRUE) {
                    $data = $this->_get_customer_posted_data();
                    // if ($data['company_id'] != $single['company_id']) {
                    //     $checking_array['company_id'] = $data['company_id'];
                    //     $data["code"] = $this->customer->get_custom_id("customer", "code", 1001, $checking_array);
                    // } else {
                    //     $data['code'] = $single['code'];
                    // }
                    // debug_r($data);
                    $this->customer->trans_start();
                    //customer update
                    $this->customer->update("customer", $data, array("id" => $id));
                    //ledger update
                    $ledger_data['company_id'] = $data['company_id'];
                    $ledger_data['branch_id'] = $data['branch_id'];
                    $ledger_data['name'] = $data['name'];
                    $this->customer->update("acc_ledger", $ledger_data, array("customer_id" => $id));
                    $this->customer->trans_complete();
                    if ($this->customer->trans_status() == true) {
                        setMessage("msg", "success", "Customer Updated Successfully");
                    } else {
                        setMessage("msg", "danger", "Something Wrong!");
                    }
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("customer");
            }
            $this->session->set_userdata('sub_menu', 'customer-info');
            $this->layout->title("Customer Information");
            if (is_super_admin() || is_admin()) {
                $this->data['all_company'] = $this->customer->get_list("company", array("status" => 1), "id,name", "", "", "name", "ASC");
                $this->data['all_branch'] = $this->customer->get_list("branch", array("status" => 1, "company_id" => $single['company_id']), "id,name", "", "", "name", "ASC");
                $this->data['all_marketing'] = $this->customer->get_list("marketing", array("status" => 1, "company_id" => $single['company_id'], "branch_id" => $single['branch_id']), "id,name", "", "", "name", "ASC");
            } else {
                $this->data['all_company'] = $this->customer->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "id,name", "", "", "name", "ASC");
                $this->data['all_branch'] = $this->customer->get_list("branch", array("status" => 1, "company_id" => logged_in_company_id()), "id,name", "", "", "name", "ASC");
                $this->data['all_marketing'] = $this->customer->get_list("marketing", array("status" => 1, "company_id" => logged_in_company_id(), "branch_id" => logged_in_branch_id()), "id,name", "", "", "name", "ASC");
            }
            $this->data['all_bank'] = $this->customer->get("customer_bank", "", "name", "ASC");
            $this->data['single'] = $single;
            $this->data['edit'] = true;
            $this->layout->view('customer', $this->data);
        } else {
            show_404();
        }
    }
    /** ***************Function delete**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "customer" data delete                 
     *                       
     * @param           : id
     * @return          : null 
     * ********************************************************** */
    public function delete($id = null)
    {
        if (!hasPermission("customer_info", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            // redirect('dashboard');
            $msg = 3;
        }
        $result = $this->customer->get_single("customer", array("id" => $id));
        if (isset($result)) {
            $this->customer->trans_start();
            @$this->customer->delete("acc_ledger", array("customer_id" => $id));
            @$this->customer->delete("customer", array("id" => $id));
            $this->customer->trans_complete();
            if ($this->customer->trans_status() == true) {
                setMessage("msg", "success", "Customer Delete Successfuly");
                $msg = 1;
            } else {
                setMessage("msg", "danger", "Something Wrong!");
                $msg = 2;
            }
        }
        // redirect('customer');
        echo $msg;
    }
    public function _get_customer_validation()
    {
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
        $this->form_validation->set_rules('name', 'Customer Name', 'trim|required|callback_name');
        $this->form_validation->set_rules('code', 'Code', 'trim');
        $this->form_validation->set_rules('cl', 'CL', 'trim|required');
        $this->form_validation->set_rules('marketing_id', 'Marketing', 'trim');
        $this->form_validation->set_rules('address', 'Address', 'trim');
        $this->form_validation->set_rules('owner_name', 'Owner Name', 'trim');
        $this->form_validation->set_rules('tel', 'Telephone No.', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('national_id', 'National Id', 'trim');
        $this->form_validation->set_rules('trade', 'Trade', 'trim');
        $this->form_validation->set_rules('security_cheque', 'Security Cheque No.', 'trim');
        $this->form_validation->set_rules('amount', 'Amount', 'trim');
        $this->form_validation->set_rules('bank_id', 'Bank Name', 'trim');
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
            $exits_check = $this->customer->exits_check("customer", array("name" => $this->input->post('name')));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->customer->exits_check("customer", array("name" => $this->input->post('name')), $this->input->post('id'));
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
    /** ***************Function _get_customer_posted_data**********************************
     * @type            : Function
     * @function name   : _get_customer_posted_data
     * @description     : get Marketing data/value                  
     *                       
     * @param           : null
     * @return          : data array 
     * ********************************************************** */
    public function _get_customer_posted_data()
    {
        $items = array();
        $items[] = "company_id";
        $items[] = "branch_id";
        $items[] = "name";
        $items[] = "marketing_id";
        $items[] = "address";
        $items[] = "owner_name";
        $items[] = "tel";
        $items[] = "email";
        $items[] = "national_id";
        $items[] = "trade";
        $items[] = "security_cheque";
        $items[] = "amount";
        $items[] = "bank_id";
        $items[] = "cl";
        $items[] = "code";
        $data = elements($items, $_POST);
        if ($_FILES['picture']['name']) {
            $data['picture'] = "uploads/customer/" . $this->_upload_picture();
        }
        $data['running_year'] = $this->running_year;
        return $data;
    }
    public function _upload_picture()
    {
        $name = $_FILES['picture']['name'];
        $arr = explode('.', $name);
        $ext = end($arr);
        $imageName = time() . ".$ext";
        $config['upload_path']          = './uploads/customer';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            = $imageName;
        $config['max_size']             = 500;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('picture')) {
            setMessage("msg", "danger", "Picture" . $this->upload->display_errors());
            redirect("customer");
        } else {
            $this->load->library('image_lib');
            $config['image_library']  = 'gd2';
            $config['source_image'] = './uploads/customer/' . $imageName;
            $config['create_thumb']   = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 140;
            $config['height']         = 150;
            $config['new_image']      = './uploads/customer/' . $imageName;
            $this->image_lib->initialize($config);
            if ($this->image_lib->resize()) {
                $this->image_lib->clear();
            }
            if ($this->input->post('id')) {
                $prev_photo = $this->customer->get_single("customer", array("id" => $this->input->post('id')))->picture;
                @unlink($prev_photo);
            }
            return $imageName;
        }
    }
    //customer information print
    public function print_customer($company_id = null, $branch_id = null)
    {
        $this->session->set_userdata('sub_menu', 'customer-info');
        if (!is_super_admin() && !is_admin()) {
            $checking_array["C.company_id"] = logged_in_company_id();
            $checking_array["C.branch_id"] = logged_in_branch_id();
        } else {
            $checking_array["C.company_id"] = $company_id;
            $checking_array["C.branch_id"] = $branch_id;
        }
        $this->data['all_customer'] = $this->customer->get_customer("", $checking_array);
        $this->data['total_customer'] = count($this->data['all_customer']);
        $this->data['company_info'] = $this->customer->get_company_info($company_id, $branch_id);
        $this->load->library("Pdfgenerator");
        $html = $this->load->view("customer-pdf-view", $this->data, true);
        $filename = "Customer Information";


        $this->pdfgenerator->generate($html, $filename, TRUE, 'A4', "portrait");
    }
    //import csv file
    public function import_csv()
    {
        if (!hasPermission("import_customer", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $fileName = $_FILES['csv_file']['name'];
            $uploadData = array();
            if (!empty($fileName)) {
                $config['upload_path'] = './uploads/csv';
                $config['allowed_types'] = 'csv';
                $config['max_size'] = 2048;
                $config['remove_spaces'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('csv_file')) {
                    setMessage("msg", "danger", "CSV" . $this->upload->display_errors());
                    redirect("customer");
                } else {
                    $uploadData = array('upload_data' => $this->upload->data());
                }
            } //if
            if (!empty($uploadData)) {
                $fileName = $uploadData['upload_data']['file_name'];
                $code = $this->customer->get_custom_id("customer", "code", 1001);
                // debug_r($code+1);
                $data = array(); //empty array;
                $handle = fopen(base_url() . 'uploads/csv/' . $fileName, "r");
                $row = 0;
                $insert_data = array();
                $temp_data = array();
                $data = fgetcsv($handle, 1000, ",");
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    if ($row >= 1) {
                        for ($c = 0; $c < $num; $c++) {
                            $temp_data['company_id'] = $data[0];
                            $temp_data['branch_id'] = $data[1];
                            $temp_data['name'] = $data[2];
                            $temp_data['marketing_id'] = $data[3];
                            $temp_data['owner_name'] = $data[4];
                            $temp_data['address'] = $data[5];
                            $temp_data['email'] = $data[6];
                            $temp_data['tel'] = $data[7];
                            $temp_data['national_id'] = $data[8];
                            $temp_data['trade'] = $data[9];
                            $temp_data['security_cheque'] = $data[10];
                            $temp_data['bank_id'] = $data[11];
                            $temp_data['amount'] = $data[12];
                            $temp_data['code'] = $code;
                        }
                        $insert_data[$row] = $temp_data;
                        $code = $code + 1;
                    }
                    $row++;
                }
                $this->customer->trans_start();
                $insert_id = $this->customer->insert_batch("customer", $insert_data);
                if ($insert_id) {
                    $result = $this->customer->get_single("acc_main_head", array("name" => "ACCOUNTS RECEIVABLE (DEBITORS)"));
                    for ($i = 1; $i <= count($insert_data); $i++) {
                        $ledger_data['customer_id'] = $insert_id;
                        $ledger_data['acc_type'] = $result->acc_type;
                        $ledger_data['head_id'] = $result->id;
                        $ledger_data['company_id'] = $insert_data[$i]['company_id'];
                        $ledger_data['branch_id'] = $insert_data[$i]['branch_id'];
                        $ledger_data['name'] = $insert_data[$i]['name'];
                        $ledger_data['running_year'] = $this->running_year;
                        $this->customer->insert("acc_ledger", $ledger_data);
                        $insert_id++;
                    }
                }
                $this->customer->trans_complete();
                if ($this->customer->trans_status() == true) {
                    setMessage("msg", "success", "Customer Import Successfully");
                } else {
                    setMessage("msg", "danger", "Something Wrong!");
                }
                fclose($handle);
                redirect("customer");
            }
        }
    }
    /** ***************Function customerBank**********************************
     * @type            : Function
     * @function name   : customerBank
     * @description     : view customer bank info page                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function customerBank(Type $var = null)
    {
        if (!hasPermission("customer_bank", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'customer-bank');
        $this->layout->title("Customer Bank Information");
        $this->data['all_bank'] = $this->customer->get("customer_bank", "", "name", "ASC");
        $this->data['add'] = true;
        $this->layout->view('customer/customer-bank', $this->data);
    }
    /** ***************Function addBank**********************************
     * @type            : Function
     * @function name   : addBank
     * @description     : view customer bank info add                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function addBank()
    {
        if (!hasPermission("customer_bank", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required|callback_bank_name');

            if ($this->form_validation->run() == TRUE) {
                $data['name'] = $this->input->post("bank_name");
                $this->customer->insert("customer_bank", $data);
                setMessage("msg", "success", "Bank Add Successfully");
            } else {
                setMessage("msg", "danger", validation_errors());
            }
        }
        redirect("customer/customerBank");
    }
    /** ***************Function editBank**********************************
     * @type            : Function
     * @function name   : editBank
     * @description     : view customer bank info edit                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function editBank($id = null)
    {
        if (!hasPermission("customer_bank", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required|callback_bank_name');

            if ($this->form_validation->run() == TRUE) {
                $data['name'] = $this->input->post("bank_name");
                $this->customer->update("customer_bank", $data, array("id" => $id));
                setMessage("msg", "success", "Bank Updated Successfully");
            } else {
                setMessage("msg", "danger", validation_errors());
            }
            redirect("customer/customerBank");
        }
        $this->session->set_userdata('sub_menu', 'customer-bank');
        $this->layout->title("Customer Bank Information");
        $this->data['all_bank'] = $this->customer->get("customer_bank", "", "name", "ASC");
        $this->data['single'] = $this->customer->get_single("customer_bank", array("id" => $id));
        $this->data['edit'] = true;
        $this->layout->view('customer/customer-bank', $this->data);
    }

    public function bank_name()
    {
        if ($this->input->post('id') == '') {
            $exits_check = $this->customer->exits_check("customer_bank", array("name" => $this->input->post('bank_name')));
            if ($exits_check) {
                $this->form_validation->set_message('bank_name', "Bank Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->customer->exits_check("customer_bank", array("name" => $this->input->post('bank_name')), $this->input->post('id'));
            if ($exits_check) {
                $this->form_validation->set_message('bank_name', "Bank Name Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    /** ***************Function deleteBank**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "customer bank" data delete                 
     *                       
     * @param           : id
     * @return          : null 
     * ********************************************************** */
    public function deleteBank($id = null)
    {
        if (!hasPermission("customer_bank", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            // redirect('dashboard');
            $msg = 3;
        }
        $result = $this->customer->get_single("customer_bank", array("id" => $id));
        if (isset($result)) {
            setMessage("msg", "success", "Bank Delete Successfuly");
            $msg = 1;
            $this->customer->delete("customer_bank", array("id" => $id));
        }
        // redirect('customer/customerBank');
        echo $msg;
    }
}

/* End of file Users.php */
