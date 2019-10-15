<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('top_menu', 'dashboard');
        $this->session->set_userdata('sub_menu',"dashboard");
        $this->session->set_userdata('set_active',"dashboard");
        $this->session->set_userdata("menu_code","dashboard");
        $this->load->model('Dashboard_model',"dashboard",true);
    }
    
    public function index($id=null)
    {
        $this->layout->title("Dashboard"); 
        if(is_super_admin()||is_admin())
        {
            $this->data['total_supplier']=$this->dashboard->count_all("supplier");
            $this->data['total_customer']=$this->dashboard->count_all("customer");
            $this->data['total_roles']=$this->dashboard->count_all("roles");
        }else{
            $checking_array["company_id"]=logged_in_company_id();
            $this->data['total_supplier']=$this->dashboard->count_all("supplier",$checking_array);
            $this->data['total_customer']=$this->dashboard->count_all("customer",$checking_array);
            // $this->data['total_roles']=$this->dashboard->count_all("roles");
        }
        $this->data['running_year']=$this->dashboard->get_single("session",array("id"=>$this->running_year));
        // $result=$this->dashboard->get_submenu($id);
        // debug_r($result);
        $this->layout->view('index',$this->data);
       
    }

}

/* End of file Dashboard.php */
