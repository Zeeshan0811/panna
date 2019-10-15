<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customerreports extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'accounts');
        $this->load->model('Customerreports_model',"customer_reports",true);
    }
    
    public function index()
    {
        if(!hasPermission("customer_ledger",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->customer_reports->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->customer_reports->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_item']=$this->customer_reports->get_list("item",array("status"=>1),"id,name","","","name","ASC");
        $this->session->set_userdata('sub_menu', 'customer-ledger');
        $this->layout->title("Customer Reports");
        $this->layout->view('reports/customer/customer',$this->data);
    }
    public function customer_reorts()
    {
        if($_POST)
        {
            $ledger_id='';
            $ledger_name='';
            $ledger=$this->input->post("ledger_id");
            if($ledger!='')
            {
                $ledger_id=explode("#",$ledger)[0];
                $ledger_name=explode("#",$ledger)[1];
            }
            $company_id=$this->input->post("company_id");
            $company_info=$this->customer_reports->get_single("company",array("id"=>$company_id),"logo,address");
            $branch_id=$this->input->post("branch_id");
            $start_date=date("Y-m-d",strtotime($this->input->post("start_date")));
            $close_date=date("Y-m-d",strtotime($this->input->post("close_date")));
            $this->data['result']=$this->customer_reports->get_customer_reports($ledger_name,$ledger_id,$start_date,$close_date);
            $this->layout->title("Stock Reports");
            $this->data['logo']=$company_info->logo;
            $this->data['address']=$company_info->address;
            $this->data['ledger_name']=$ledger_name;
            $this->data['starting_date']=$start_date;
            $this->data['closing_date']=$close_date;
            $result=$this->load->view('reports/customer/view',$this->data,true);
            echo json_encode($result);
        }
    }

}

/* End of file Customerreportseports.php */
