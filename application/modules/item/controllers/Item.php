<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends MY_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model', 'item', true);
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
    }
    /** ***************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : view item view page                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function index()
    {
        if (!hasPermission("item_name", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'item-name');
        $this->layout->title("Item Information");
        $this->data['all_unit'] = $this->item->get("unit", "", "name", "ASC");
        $this->data['all_item'] = $this->item->get_item();
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->item->get("company", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->item->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
        }
        $this->data['add'] = true;
        $this->layout->view('item', $this->data);
    }
    /** ***************Function add**********************************
     * @type            : Function
     * @function name   : add
     * @description     : view item data add                  
     *                       
     * @param           : null
     * @return          : null
     * ********************************************************** */
    public function add()
    {
        if (!hasPermission("item_name", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('name', 'Item Name', 'trim|required|callback_name');
            if (!$this->input->post("old_unit_id") && !$this->input->post("new_unit_id")) {
                $this->form_validation->set_rules('old_unit_id', 'Unit', 'trim|required');
            }
            if ($this->form_validation->run() == TRUE) {
                $data['name'] = $this->input->post("name");
                $data['company_id'] = $this->input->post("company_id");
                if ($this->input->post("old_unit_id") != "") {
                    $data['unit_id'] = $this->input->post("old_unit_id");
                } else {
                    $unit_name = $this->input->post("new_unit_id");
                    $exits = $this->item->get_single("unit", array("name" => $unit_name));
                    if (isset($exits)) {
                        $data['unit_id'] = $exits->id;
                    } else {
                        $insert_unit_id = $this->item->insert("unit", array("name" => $unit_name));
                        $data['unit_id'] = $insert_unit_id;
                    }
                }
                $this->item->insert("item", $data);
                if ($this->input->post("stock_item_model") != '') {
                    $send_data['msg'] = "success";
                    $send_data['result_data'] = $this->item->get_list("item", array("status" => 1), "id,name", "", "", "name", "ASC");
                    echo json_encode($send_data);
                    exit;
                }
                setMessage("msg", "success", "Item Add Successfully");
            } else {
                if ($this->input->post("stock_item_model") != '') {
                    $send_data['msg'] = "error";
                    $send_data['result_data'] = validation_errors();
                    echo json_encode($send_data);
                    exit;
                } else {

                    setMessage("msg", "danger", validation_errors());
                }
            }
        }
        redirect("item");
    }
    /** ***************Function edit**********************************
     * @type            : Function
     * @function name   : edit
     * @description     : unit update                
     *                       
     * @param           : id
     * @return          : null
     * ********************************************************** */
    public function edit($id = null)
    {
        if (!hasPermission("item_name", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if ($_POST) {
            $this->form_validation->set_rules('name', 'Item Name', 'trim|required|callback_name');
            $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
            if (!$this->input->post("old_unit_id") && !$this->input->post("new_unit_id")) {
                $this->form_validation->set_rules('old_unit_id', 'Unit', 'trim|required');
            }
            if ($this->form_validation->run() == TRUE) {
                $data['name'] = $this->input->post("name");
                $data['company_id'] = $this->input->post("company_id");
                if ($this->input->post("old_unit_id") != "") {
                    $data['unit_id'] = $this->input->post("old_unit_id");
                } else {
                    $unit_name = $this->input->post("new_unit_id");
                    $exits = $this->item->get_single("unit", array("name" => $unit_name));
                    if (isset($exits)) {
                        $data['unit_id'] = $exits->id;
                    } else {
                        $insert_unit_id = $this->item->insert("unit", array("name" => $unit_name));
                        $data['unit_id'] = $insert_unit_id;
                    }
                }
                $this->item->update("item", $data, array("id" => $id));
                setMessage("msg", "success", "Item Updated Successfully");
            } else {
                setMessage("msg", "danger", validation_errors());
            }
            redirect("item");
        }
        $this->session->set_userdata('sub_menu', 'item-name');
        $this->layout->title("Item Information");
        if (is_super_admin() || is_admin()) {
            $this->data['all_company'] = $this->item->get("company", "", "name", "ASC");
        } else {
            $this->data['all_company'] = $this->item->get_list("company", array("id" => logged_in_company_id(), "status" => 1), "", "", "", "name", "ASC");
        }
        $this->data['all_unit'] = $this->item->get("unit", "", "name", "ASC");
        $this->data['all_item'] = $this->item->get_item();
        $this->data['single'] = $this->item->get_item($id);
        $this->data['edit'] = true;
        $this->layout->view('item', $this->data);
    }

    public function name()
    {
        if ($this->input->post('id') == '') {
            $exits_check = $this->item->exits_check("item", array("name" => $this->input->post('name'), "company_id" => $this->input->post("company_id")));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Item Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->item->exits_check("item", array("name" => $this->input->post('name'), "company_id" => $this->input->post("company_id")), $this->input->post('id'));
            if ($exits_check) {
                $this->form_validation->set_message('name', "Item Name Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    /** ***************Function delete**********************************
     * @type            : Function
     * @function name   : index
     * @description     : Process "item" data delete                 
     *                       
     * @param           : id
     * @return          : null 
     * ********************************************************** */
    public function delete($id = nul)
    {
        if (!hasPermission("item_name", DELETE)) {
            setMessage("msg", "warning", "Permission Denied!");
            // redirect('dashboard');
            $msg = 3;
        }
        $result = $this->item->get_single("item", array("id" => $id));
        if (isset($result)) {
            setMessage("msg", "success", "Item Delete Successfuly");
            $this->item->delete("item", array("id" => $id));
            $msg = 1;
        }
        // redirect('item');
        echo $msg;
    }
}

/* End of file Users.php */
