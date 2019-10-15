<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stockreports extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
        $this->load->model('Stockreports_model',"stock_reports",true);
    }
    
    public function index()
    {
        if(!hasPermission("stock_details",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->stock_reports->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->stock_reports->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->session->set_userdata('sub_menu', 'stock-details');
        $this->layout->title("Stock Reports");
        $this->layout->view('reports/stock/stock',$this->data);
    }
    public function stock_reorts()
    {
        if($_POST)
        {
            $item_id='';
            $item_name='';
            $item_desc_id='';
            $item_desc_name='';
            $item_desc=$this->input->post("item_desc_id");
            $item=$this->input->post("item_id");
            if($item!='')
            {
                $item_id=explode("#",$item)[0];
                $item_name=explode("#",$item)[1];
            }
            if($item_desc!='')
            {
                $item_desc_id=explode("#",$item_desc)[0];
                $item_desc_name=explode("#",$item_desc)[1];
            }
            $company_id=$this->input->post("company_id");
            $branch_id=$this->input->post("branch_id");
            $company_info=$this->stock_reports->get_single("company",array("id"=>$company_id),"logo,address");
            $start_date=date("Y-m-d",strtotime($this->input->post("start_date")));
            $close_date=date("Y-m-d",strtotime($this->input->post("close_date")));
            $this->data['result']=$this->stock_reports->get_stock_reports($company_id,$branch_id,$item_id,$item_desc_id,$start_date,$close_date);
            $this->layout->title("Stock Reports");
            $this->data['logo']=$company_info->logo;
            $this->data['address']=$company_info->address;
            $this->data['item_name']=$item_name;
            $this->data['item_desc_name']=$item_desc_name;
            $this->data['starting_date']=$start_date;
            $this->data['closing_date']=$close_date;
            $result=$this->load->view('reports/stock/view',$this->data,true);
            echo json_encode($result);
        }
    }

}

/* End of file stockreports.php */
