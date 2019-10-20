<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Company extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Company_model', 'company', true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
    /** ***************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "company"  view                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function index()
    {
        if (!hasPermission("company", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'company');
        $this->layout->title("Manage Company");
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->company->get("company", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->company->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
        }
        $this->data['add'] = true;
        $this->layout->view('company', $this->data);
    }
    /** ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : Process "compnay" data add                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function add()
    {
        if (!hasPermission("company", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('name', 'Company Name', 'trim|required|callback_name');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');
            $this->form_validation->set_rules('tel', 'Telephone No', 'trim');
            $this->form_validation->set_rules('email', 'Email Address.', 'trim');
            $this->form_validation->set_rules('web', 'Web.', 'trim');

            if ($this->form_validation->run() == TRUE) {
                $data['name'] = $this->input->post("name");
                $data['address'] = $this->input->post("address");
                $data['mobile'] = $this->input->post("mobile");
                $data['tel'] = $this->input->post("tel");
                $data['email'] = $this->input->post("email");
                $data['web'] = $this->input->post("web");
                if ($_FILES['logo']['name']) {
                    $data['logo'] = "uploads/logo/" . $this->_upload_logo();
                }
                $data['running_year'] = $this->running_year;
                $this->company->insert("company", $data);
                setMessage("msg", "success", "Company Add Successfully");
            } else {
                setMessage("msg", "danger", validation_errors());
            }
        }
        redirect("company");
    }
    /** ***************Function edit**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "compnay" data edit                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function edit($id = null)
    {
        if (!hasPermission("company", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if (logged_in_company_id() == $id || is_super_admin() || is_admin()) {
            $single = $this->company->get_single("company", array("id" => $id));
            if (isset($single)) {
                if ($_POST) {
                    $this->form_validation->set_rules('name', 'Company Name', 'trim|required|callback_name');
                    $this->form_validation->set_rules('address', 'Address', 'trim|required');
                    $this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');
                    $this->form_validation->set_rules('tel', 'Telephone No', 'trim');
                    $this->form_validation->set_rules('email', 'Email Address.', 'trim');
                    $this->form_validation->set_rules('web', 'Web.', 'trim');

                    if ($this->form_validation->run() == TRUE) {
                        $data['name'] = $this->input->post("name");
                        $data['address'] = $this->input->post("address");
                        $data['mobile'] = $this->input->post("mobile");
                        $data['tel'] = $this->input->post("tel");
                        $data['email'] = $this->input->post("email");
                        $data['web'] = $this->input->post("web");
                        if ($_FILES['logo']['name']) {
                            $data['logo'] = "uploads/logo/" . $this->_upload_logo();
                        }
                        $this->company->update("company", $data, array("id" => $id));
                        setMessage("msg", "success", "Company Update Successfully");
                    } else {
                        setMessage("msg", "danger", validation_errors());
                    }
                    redirect("company");
                }
                if (is_super_admin() || is_admin()) {
                    $this->data['all_company'] = $this->company->get("company", "", "name", "ASC");
                } else {
                    $this->data['all_company'] = $this->company->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
                }
                $this->data['single'] = $single;
                $this->session->set_userdata('sub_menu', 'company');
                $this->layout->title("Manage Company");
                $this->data['edit'] = true;
                $this->layout->view('company', $this->data);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
    /** ***************Function delete**********************************
     * @type            : Function
     * @function name   : delete
     * @description     : Process "compnay" data delete                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function delete($id = nul)
    {
        if (!is_super_admin()) {
            $msg = 3;
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->company->get_single("branch", array("company_id" => $id));
        if (isset($result)) {
            $msg = 2;
            setMessage("msg", "danger", "You Can't delete this.");
        } else {
            $prev_photo = $this->company->get_single("company", array("id" => $id))->logo;
            $this->company->delete("company", array("id" => $id));
            @unlink($prev_photo);
            $msg = 1;
            setMessage("msg", "success", "Company Delete Successfully.");
        }

        echo $msg;

        // redirect('company');
    }

    /** ***************Function name**********************************
     * @type            : Function
     * @function name   : name
     * @description     : Unique check for company name" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */
    public function name()
    {
        if ($this->input->post('id') == '') {
            $name = $this->company->duplicate_check("company", "name", $this->input->post('name'));
            if ($name) {
                $this->form_validation->set_message('name', "Company Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $name = $this->company->duplicate_check("company", "name", $this->input->post('name'), $this->input->post('id'));
            if ($name) {
                $this->form_validation->set_message('name', "Company Name Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    public function _upload_logo()
    {
        $name = $_FILES['logo']['name'];
        $arr = explode('.', $name);
        $ext = end($arr);
        $imageName = "DC" . time() . "L.$ext";
        $config['upload_path']          = './uploads/logo';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $imageName;
        $config['max_size']             = 500;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('logo')) {
            setMessage("msg", "danger", "Logo" . $this->upload->display_errors());
            redirect("company");
        } else {
            $this->load->library('image_lib');
            $config['image_library']  = 'gd2';
            $config['source_image'] = './uploads/logo/' . $imageName;
            $config['create_thumb']   = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = 150;
            $config['height']         = 80;
            $config['new_image']      = './uploads/logo/' . $imageName;
            $this->image_lib->initialize($config);
            if ($this->image_lib->resize()) {
                $this->image_lib->clear();
            }
            if ($this->input->post('id')) {
                $prev_photo = $this->company->get_single("company", array("id" => $this->input->post('id')))->logo;
                @unlink($prev_photo);
            }
            return $imageName;
        }
    }
    /** ***************Function companyBank**********************************
     * @type            : Function
     * @function name   : companyBank
     * @description     : Process "company bank"  view                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function companyBank()
    {
        if (!hasPermission("company_bank", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'company-bank');
        $this->layout->title("Manage Company Bank");
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->company->get("company", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->company->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
        }

        $this->data['add'] = true;
        $this->layout->view('company/company-bank', $this->data);
    }
    /** ***************Function addBank**********************************
     * @type            : Function
     * @function name   : addBank
     * @description     : Process "compnay bank" data add                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function addBank()
    {
        if (!hasPermission("company_bank", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
            $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
            $this->form_validation->set_rules('ac_type', 'Account Type', 'trim|required');
            $this->form_validation->set_rules('branch_address', 'Bank Branch Address', 'trim|required');
            $this->form_validation->set_rules('account_no', 'Account No.', 'trim|required|callback_account_no');

            if ($this->form_validation->run() == TRUE) {
                $data['company_id'] = $this->input->post("company_id");
                $data['branch_id'] = $this->input->post("branch_id");
                $data['name'] = $this->input->post("bank_name");
                $data['ac_type'] = $this->input->post("ac_type");
                $data['branch_address'] = $this->input->post("branch_address");
                $data['account_no'] = $this->input->post("account_no");
                $data['running_year'] = $this->running_year;
                $insert_id = $this->company->insert("company_bank", $data);
                if ($insert_id) {
                    $ledger_data['company_bank_id'] = $insert_id;
                    $result = $this->company->get_single("acc_main_head", array("name" => "CASH AT BANK"));
                    $ledger_data['acc_type'] = $result->acc_type;
                    $ledger_data['head_id'] = $result->id;
                    $ledger_data['company_id'] = $data['company_id'];
                    $ledger_data['branch_id'] = $data['branch_id'];
                    $ledger_data['name'] = $data['name'];
                    $this->company->insert("acc_ledger", $ledger_data);
                }
                $send_data['msg'] = "success";
                $send_data['success'] = "Company Bank Add Successfully";
                echo json_encode($send_data);
                exit;
            } else {
                $send_data['msg'] = validation_errors();
                echo json_encode($send_data);
                exit;
            }
        }
        redirect("company/companyBank");
    }
    //ajax bank view
    public function bankview()
    {
        if ($_GET) {
            if (!is_super_admin() && !is_admin()) {
                $checking_array["CB.company_id"] = logged_in_company_id();
                $checking_array["CB.branch_id"] = logged_in_branch_id();
            } else {
                $company_id = $this->input->get("company_id");
                $branch_id = $this->input->get("branch_id");
                $checking_array["CB.company_id"] = $company_id;
                $checking_array["CB.branch_id"] = $branch_id;
            }
            $this->data['all_bank'] = $this->company->get_bank("", $checking_array);
            $result = $this->load->view("bank-view", $this->data, true);
            echo json_encode($result);
            exit;
        }
    }
    /** ***************Function editBank**********************************
     * @type            : Function
     * @function name   : editBank
     * @description     : Process "compnay bank" data edit                 
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function editBank($id = null)
    {
        if (!hasPermission("company_bank", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $single = $this->company->get_bank($id);
        if ($single['company_id'] == logged_in_company_id() || is_super_admin() || is_admin()) {
            if ($_POST) {
                $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
                $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('bank_name', 'Bank Name', 'trim|required');
                $this->form_validation->set_rules('ac_type', 'Account Type', 'trim|required');
                $this->form_validation->set_rules('branch_address', 'Bank Branch Address', 'trim|required');
                $this->form_validation->set_rules('account_no', 'Account No.', 'trim|required|callback_account_no');

                if ($this->form_validation->run() == TRUE) {
                    $data['company_id'] = $this->input->post("company_id");
                    $data['branch_id'] = $this->input->post("branch_id");
                    $data['name'] = $this->input->post("bank_name");
                    $data['ac_type'] = $this->input->post("ac_type");
                    $data['branch_address'] = $this->input->post("branch_address");
                    $data['account_no'] = $this->input->post("account_no");
                    $this->company->update("company_bank", $data, array("id" => $id));
                    //update ledger
                    $ledger_data['company_id'] = $data['company_id'];
                    $ledger_data['branch_id'] = $data['branch_id'];
                    $ledger_data['name'] = $data['name'];
                    $ledger_data['running_year'] = $this->running_year;
                    $this->company->update("acc_ledger", $ledger_data, array("company_bank_id" => $id));

                    setMessage("msg", "success", "Company Bank Updated Successfully");
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("company/companyBank");
            }
            $this->session->set_userdata('sub_menu', 'company-bank');
            $this->layout->title("Manage Company Bank");

            $this->data['single'] = $single;
            if (is_super_admin() || is_admin()) {
                $this->data['all_company'] = $this->company->get("company", "", "name", "ASC");
                $this->data['all_branch'] = $this->company->get_list("branch", array("status" => 1, "company_id" => $single['company_id']), "id,name", "", "", "name", "ASC");
            } else {
                $this->data['all_company'] = $this->company->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
                $this->data['all_branch'] = $this->company->get_list("branch", array("status" => 1, "company_id" => logged_in_company_id()), "id,name", "", "", "name", "ASC");
            }
            $this->data['edit'] = true;
            $this->layout->view('company/company-bank', $this->data);
        } else {
            show_404();
        }
    }

    /** ***************Function account_no**********************************
     * @type            : Function
     * @function name   : account_no
     * @description     : Unique check for company Bank name" data/value                  
     *                       
     * @param           : null
     * @return          : boolean true/false 
     * ********************************************************** */
    public function account_no()
    {
        if ($this->input->post('id') == '') {
            $exits_check = $this->company->exits_check("company_bank", array("account_no" => $this->input->post('account_no'), "company_id" => $this->input->post('company_id'), "branch_id" => $this->input->post('branch_id')));
            if ($exits_check) {
                $this->form_validation->set_message('account_no', "Account No Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->company->exits_check("company_bank", array("account_no" => $this->input->post('account_no'), "company_id" => $this->input->post('company_id'), "branch_id" => $this->input->post('branch_id')), $this->input->post('id'));
            if ($exits_check) {
                $this->form_validation->set_message('account_no', "Account No Already Exits");
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
     * @function name   : deleteBank
     * @description     : Process "compnay" bank delete
     *                       
     * @param           : null
     * @return          : null 
     * ********************************************************** */
    public function deleteBank($id = null)
    {
        if (!hasPermission("company_bank", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            // redirect('dashboard');
            $msg = 3;
        }
        $result = $this->company->get_single("company_bank", array("id" => $id));
        if (isset($result)) {
            @$this->company->delete("company_bank", array("id" => $id));
            @$this->company->delete("acc_ledger", array("company_bank_id" => $id));
            setMessage("msg", "success", "Bank Delete Successfuly");
            $msg = 1;
        }
        // redirect('company/companyBank');
        echo $msg;
    }
}

/* End of file Users.php */
