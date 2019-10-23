<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mainhead extends MY_Controller
{
    public $data = array();
    public $table = "acc_main_head";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mainhead_model', 'main', true);
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'accounts');
    }
    /** ***************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : view main-headview page                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function index()
    {
        if (!hasPermission("main_head", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'main-head');
        $this->layout->title("Main Head");
        $this->data['add'] = true;
        $this->data['all_type'] = $this->main->get("acc_type", "", "id", "ASC");
        $this->data['all_head'] = $this->main->get_main_head(1);
        $this->layout->view('mainhead/mainhead', $this->data);
    }
    /** ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : view main_head data add                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function add()
    {
        if (!hasPermission("main_head", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('acc_type', 'Account Type', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_name');
            $ledger_part = $this->input->post("ledger_part");
            if ($this->form_validation->run() == TRUE) {
                $data['name'] = strtoupper($this->input->post("name"));
                $data['acc_type'] = $this->input->post("acc_type");
                $insert_id = $this->main->insert("acc_main_head", $data);
                if ($insert_id) {
                    if ($ledger_part == "ledger_part") {
                        $result = $this->main->get_list("acc_main_head", array("acc_type" => $data['acc_type'], "status" => 1), "", "", "name", "ASC");
                        echo json_encode($result);
                    } else {
                        $data['all_head'] = $this->main->get_main_head($data['acc_type'], 1);
                        $this->load->view("mainhead/view", $data);
                    }
                } else {
                    if ($ledger_part == "ledger_part") {
                        echo json_encode(array("err" => "Error"));
                    } else {
                        echo "Error";
                    }
                }
            } else {
                if ($ledger_part == "ledger_part") {
                    echo json_encode(array("err" => "Error"));
                } else {
                    echo "Error";
                }
            }
        }
    }
    /** ***************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : main_head update                
     *                       
     * @param           : id
     * @return          : null
     * ********************************************************** */
    public function edit($id = null)
    {
        if (!hasPermission("main_head", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('acc_type', 'Account Type', 'trim|required');
            $this->form_validation->set_rules('name', 'Name', 'trim|required|callback_name');

            if ($this->form_validation->run() == TRUE) {
                $data['name'] = strtoupper($this->input->post("name"));
                $data['acc_type'] = $this->input->post("acc_type");
                $this->main->update($this->table, $data, array("id" => $id));
                setMessage("msg", "success", "Main Head Updated Successfully");
            } else {
                setMessage("msg", "danger", validation_errors());
            }
            redirect("mainhead");
        }
        $this->session->set_userdata('sub_menu', 'main-head');
        $this->layout->title("Main Head");
        $this->data['edit'] = true;
        $this->data['single'] = $this->main->get_single($this->table, array("id" => $id));
        $this->data['all_type'] = $this->main->get("acc_type", "", "id", "ASC");
        $this->data['all_head'] = $this->main->get_main_head($this->data['single']->acc_type);
        $this->layout->view('mainhead/mainhead', $this->data);
    }

    public function name()
    {
        if ($this->input->post('id') == '') {
            $exits_check = $this->main->exits_check($this->table, array("name" => strtoupper($this->input->post('name'))));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->main->exits_check($this->table, array("name" => strtoupper($this->input->post('name'))), $this->input->post('id'));
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
    /**
     * not used
     */
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
        if (!hasPermission("main_head", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->main->get_single($this->table, array("id" => $id));
        $status = 0;
        if (isset($result)) {
            if ($result->status == 0) {
                $status = 1;
                setMessage("msg", "success", "Enabled Successfuly");
            } else {
                setMessage("msg", "success", "Disabled Successfuly");
                $status = 0;
            }
            $this->main->update($this->table, array("status" => $status), array("id" => $id));
        }
        redirect('mainhead');
    }
    /** ***************Function delete**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "main head" data delete                 
     *                       
     * @param           : id
     * @return          : null 
     * ********************************************************** */
    public function delete($id = nul)
    {
        if (!hasPermission("main_head", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            // redirect('dashboard');
            $msg = 2;
        }
        $result = $this->main->get_single($this->table, array("id" => $id));
        if (isset($result)) {
            $this->main->delete($this->table, array("id" => $id));
            setMessage("msg", "success", "Delete Successfuly");
            $msg = 1;
        }
        // redirect('mainhead');
        echo $msg;
    }
}

/* End of file Users.php */
