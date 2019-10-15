<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
        $this->session->set_userdata('sub_menu', 'inventory');
        $this->load->model('MY_Model',"inventory",true);
    }
    
    public function index($id=null)
    {
        if(!hasPermission("inventory",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->data['msg']="Welcome To Inventory";
        $this->layout->title("Inventory");
        // $result=$this->inventory->get_menu($id);
        // debug_r($result);
        $this->layout->view('inventory/welcome',$this->data);
    }

}

/* End of file Inventory.php */
