<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ledger extends MY_Controller
{
    public $data = array();
    public $table = "acc_ledger";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ledger_model', 'ledger', true);
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'ledger');
    }

    /** ***************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : view ledgerview page
     *
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function index()
    {
        if (!hasPermission("ledger", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }

        $this->session->set_userdata('sub_menu', 'ledger');
        $this->layout->title("Ledger");
        $this->data['add'] = true;
        $this->data['all_type'] = $this->ledger->get("acc_type", "", "id", "ASC");
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->ledger->get("company", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->ledger->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
        }
        $this->data['all_head_list'] = $this->ledger->get_list("acc_main_head", array("acc_type" => 1), "", "", "", "name", "ASC");
        $this->layout->view('ledger/ledger', $this->data);
    }

    /** ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : view ledger data add
     *
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function add()
    {
        if (!hasPermission("ledger", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('company_id', 'Company', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
            $this->form_validation->set_rules('acc_type', 'Grand Account Name', 'trim|required');
            $this->form_validation->set_rules('head_id', 'Main Account', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_name');

            if ($this->form_validation->run() == TRUE) {

                $this->ledger->trans_start();

                $data['name'] = $this->input->post("name");
                $data['company_id'] = $this->input->post("company_id");
                $data['branch_id'] = $this->input->post("branch_id");
                $branch = $this->ledger->get_single_data_by_single_column('branch', 'id', $data['branch_id']);
                $branch_name = $branch->name;

                $checking_array['company_id'] = $data['company_id'];
                $head_id_mix = $this->input->post("head_id");
                $head_id_explode = explode("#", $head_id_mix);
                $insert_id = 0;
                if (end($head_id_explode) === "ACCOUNTS RECEIVABLE (DEBITORS)") {
                    $data_code["code"]  = substr($branch_name, 0, 1) . $this->ledger->get_custom_id("customer", "code", 1001, $checking_array);
                    $data_code['running_year'] = $this->running_year;
                    $company_info = array_merge($data, $data_code);
                    $insert_id = $this->ledger->insert("customer", $company_info);
                    $data['customer_id'] = $insert_id;
                } else if (end($head_id_explode) === "ACCOUNTS PAYABLE (CREDITORS)") {
                    $data_code['code'] = substr($branch_name, 0, 1) .  $this->ledger->get_custom_id("supplier", "code", 5001, $checking_array);
                    $data_code['running_year'] = $this->running_year;
                    $supplier_info = array_merge($data, $data_code);
                    $insert_id = $this->ledger->insert("supplier", $supplier_info);
                    $data['supplier_id'] = $insert_id;
                } else if (end($head_id_explode) === "CASH AT BANK") {
                    $data_code['running_year'] = $this->running_year;
                    $company_bank_info = array_merge($data, $data_code);
                    $insert_id = $this->ledger->insert("company_bank", $company_bank_info);
                    $data['company_bank_id'] = $insert_id;
                }
                $data['acc_type'] = $this->input->post("acc_type");
                $acc_type = $this->input->post("acc_type");
                $data['head_id'] = $head_id_explode[0];
                $data['running_year'] = $this->running_year;
                $head_id = $this->input->post("head_id");

                $data['led_Id'] =  substr($branch_name, 0, 1) . ($this->ledger->last_id("acc_ledger", 'id')->id + 1);
                $this->ledger->insert($this->table, $data);

                $this->ledger->trans_complete();
                if ($this->ledger->trans_status() == true) {
                    echo "success";
                } else {
                    echo "Error";
                }
            } else {
                echo "Error";
            }
        }
    }
    /** ***************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : ledger update
     *
     * @param           : id
     * @return          : null
     * ********************************************************** */
    public function edit($id = null)
    {
        if (!hasPermission("ledger", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $single = $this->ledger->get_single($this->table, array("id" => $id));
        if (($single->company_id == logged_in_company_id() && $single->branch_id == logged_in_branch_id()) || is_admin() || is_super_admin()) {

            if ($_POST) {
                $this->form_validation->set_rules('company_id', 'Company', 'trim|required');
                $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('acc_type', 'Account Type', 'trim|required');
                $this->form_validation->set_rules('head_id', 'Main Account Name', 'trim|required');
                $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_name');

                if ($this->form_validation->run() == TRUE) {
                    $data['name'] = $this->input->post("name");
                    $data['company_id'] = $this->input->post("company_id");
                    $data['branch_id'] = $this->input->post("branch_id");
                    $head_id_mix = $this->input->post("head_id");
                    $head_id_explode = explode("#", $head_id_mix);
                    $insert_id = 0;

                    $this->ledger->trans_start();

                    if (end($head_id_explode) === "ACCOUNTS RECEIVABLE (DEBITORS)") {
                        $this->ledger->update("customer", $data, array("id" => $this->data['single']->customer_id));
                    } else if (end($head_id_explode) === "ACCOUNTS PAYABLE (CREDITORS)") {
                        $this->ledger->update("supplier", $data, array("id" => $this->data['single']->supplier_id));
                    } else if (end($head_id_explode) === "CASH AT BANK") {
                        $this->ledger->update("company_bank", $data, array("id" => $this->data['single']->company_bank_id));
                    }
                    $data['acc_type'] = $this->input->post("acc_type");
                    $data['head_id'] = $this->input->post("head_id");
                    $this->ledger->update($this->table, $data, array("id" => $id));

                    $this->ledger->trans_complete();

                    if ($this->ledger->trans_status() == true) {
                        setMessage("msg", "success", "Ledger Updated Successfully");
                    } else {
                        setMessage("msg", "danger", "Something Wrong!");
                    }
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("ledger");
            }
            $this->session->set_userdata('sub_menu', 'ledger');
            $this->layout->title("Main Head");
            $this->data['edit'] = true;
            $this->data['all_type'] = $this->ledger->get("acc_type", "", "id", "ASC");
            if (is_super_admin() || is_admin()) {
                $this->data['all_company'] = $this->ledger->get("company", "", "name", "ASC");
                $this->data['all_branch'] = $this->ledger->get_list("branch", array("status" => 1, "company_id" => $single->company_id), "id,name", "", "", "name", "ASC");
            } else {
                $this->data['all_company'] = $this->ledger->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
                $this->data['all_branch'] = $this->ledger->get_list("branch", array("status" => 1, "company_id" => logged_in_company_id()), "id,name", "", "", "name", "ASC");
            }
            $this->data['all_head'] = $this->ledger->get("acc_main_head", "", "id", "desc");
            $this->data['single_ledger'] = $single;
            $this->layout->view('ledger/ledger', $this->data);
        } else {
            show_404();
        }
    }

    public function name()
    {
        if ($this->input->post('id') == '') {
            $exits_check = $this->ledger->exits_check($this->table, array("name" => $this->input->post('name'), "company_id" => $this->input->post("company_id")));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->ledger->exits_check($this->table, array("name" => $this->input->post('name'), "company_id" => $this->input->post("company_id")), $this->input->post('id'));
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

    /** ***************Function control**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "unit" data control
     *
     * @param           : id
     * @return          : null
     * ********************************************************** */
    public function control($id = nul)
    {
        if (!hasPermission("ledger", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->ledger->get_single($this->table, array("id" => $id));
        $status = 0;
        if (isset($result)) {
            if ($result->status == 0) {
                $status = 1;
                setMessage("msg", "success", "Enabled Successfuly");
            } else {
                setMessage("msg", "success", "Disabled Successfuly");
                $status = 0;
            }
            $this->ledger->update($this->table, array("status" => $status), array("id" => $id));
        }
        redirect('ledger');
    }

    /** ***************Function delete**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "ledger" data delete
     *
     * @param           : id
     * @return          : null
     * ********************************************************** */
    public function delete($id = nul)
    {
        if (!hasPermission("ledger", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->ledger->get_single($this->table, array("id" => $id));
        if (isset($result)) {
            $head = $this->ledger->get_single("acc_main_head", array("id" => $result->head_id));

            $this->ledger->trans_start();
            if (isset($head)) {
                if ($head->name === "ACCOUNTS RECEIVABLE (DEBITORS)") {
                    @$this->ledger->delete($this->table, array("id" => $id));
                    @$this->ledger->delete("customer", array("id" => $result->customer_id));
                } else if ($head->name === "ACCOUNTS PAYABLE (CREDITORS)") {
                    @$this->ledger->delete($this->table, array("id" => $id));
                    @$this->ledger->delete("supplier", array("id" => $result->supplier_id));
                } else if ($head->name === "CASH AT BANK") {
                    @$this->ledger->delete($this->table, array("id" => $id));
                    @$this->ledger->delete("company_bank", array("id" => $result->company_bank_id));
                }
            }
            if ($this->ledger->trans_status() == true) {
                setMessage("msg", "success", "Delete Successfuly");
            } else {
                setMessage("msg", "danger", "Something Wrong!");
            }
        }
        redirect('ledger');
    }
}

/* End of file Users.php */
