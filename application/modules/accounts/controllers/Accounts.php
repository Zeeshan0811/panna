<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'accounts');
        $this->session->set_userdata('sub_menu', 'accounts');
    }
    
    public function index($id=null)
    {
        if(!hasPermission("accounts",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->data['msg']="Welcome To account";
        $this->layout->title("Accounts");
        // debug_r($result);
        $this->layout->view('accounts/welcome',$this->data);
    }

}

/* End of file account.php */
