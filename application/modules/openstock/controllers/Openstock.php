<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Openstock extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
        $this->load->model('Openstock_model',"open",true);
    }
    
    public function index()
    {
        if(!hasPermission("opening_stock",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'opening-stock');
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->open->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->open->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_item']=$this->open->get_list("item",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_item_desc']=$this->open->get_list("item_description",array("status"=>1),"id,item_desc","","","item_desc","ASC");
        // $this->data['all_stock']=$this->open->get_stock(7);
        // debug_r($result);
        //unit
        $this->data['all_unit']=$this->open->get("unit","","name","ASC");

        $this->layout->title("Opening Stock");
        $this->data['add']=true;
        $this->layout->view('openstock/opening-stock',$this->data);
    }
      /** ***************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : view item description data add                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function add()
  {
    if(!hasPermission("opening_stock",ADD)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    if($_POST)
    {
        $send_data=array();
        $this->open->trans_start();

        $data=$this->_get_posted_data();
        $this->open->insert_batch("inv_stock_details",$data);

        $this->open->trans_complete();
        if($this->open->trans_status()==true){
            $send_data['msg']="success";
        }else{
            $send_data['msg']="error";
        }
        $result=$send_data;
        echo json_encode($result);
        exit;
    }
    // redirect("item/itemdescription");
  }
  public function check_exits_item()
  {
      if($_POST)
      {
          $checking_array=array(
              "SD.item_desc_id"=>$this->input->post("item_desc_id"),
              "SD.supplier_id"=>$this->input->post("supplier_id"),
              "SD.section"=>"opening_stock"
          );
          $exits=$this->open->check_item_exits($checking_array);
          if(!empty($exits))
          {
              echo json_encode(array("msg"=>"error"));
          }else{
              echo json_encode(array("msg"=>"success"));
          }
      }
  }
  public function edit($var = null)
  {
    if(!hasPermission("opening_stock",VIEW)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    $single=$this->open->get_single_stock_item($var);
    if($_POST)
    {
        $data['company_id']=explode("#",$this->input->post("company_id"))[0];
        $data['branch_id']=explode("#",$this->input->post("branch_id"))[0];
        $data['supplier_id']=explode("#",$this->input->post("supplier_id"))[0];
        $data['date']=date("Y-m-d",strtotime($this->input->post("date")));
        $data['item_id']=explode("#",$this->input->post("item_id"))[0];
        $data['item_desc_id']=explode("#",$this->input->post("item_desc_id"))[0];
        $data['stock_amount_id']=$this->input->post("stock_amount_id");
        $data['purchase_price']=$this->input->post("price");
        $data['qty']=$this->input->post("qty");

        //new price calculation
        $pre_subtotal=$single['sub_total'];
        $new_subtotal=$data['purchase_price']*$data['qty'];
        // new credit calculation
        $prev_credit=$this->open->get_single("acc_ledger",array("id"=>$single['account_id']),"credit")->credit;
        $new_credit=$prev_credit-$pre_subtotal;
        $new_credit+=$new_subtotal;
        
        
        $stock_amount=$this->open->get_single("inv_stock_amount",array("id"=>$single['stock_amount_id']),"grand_total")->grand_total;
        $minus_subtotal=$stock_amount-$pre_subtotal;
        $new_stock_amount=$minus_subtotal+$new_subtotal;
        $data['sub_total']=$new_subtotal;

        $this->open->trans_start();
        //update new credit
        $this->open->update('acc_ledger',array("credit"=>$new_credit),array("id"=>$single['account_id']));
        //stock details update
        $this->open->update("inv_stock_details",$data,array("id"=>$var));
        //new total/grand_total update 
        $this->open->update("inv_stock_amount",array("total"=>$new_stock_amount,"grand_total"=>$new_stock_amount),array("id"=>$single['stock_amount_id']));
        $this->open->trans_complete();
        if($this->open->trans_status()==true){
            setMessage("msg", "success", "Updated Successfully");
        }else{
            setMessage("msg", "danger", "Something Wrong!");
        }
        redirect("openstock");
    }
    $this->session->set_userdata('sub_menu', 'opening-stock');
    if(is_super_admin()||is_admin())
    {
        $this->data['all_company']=$this->open->get("company","","name","ASC");
    }else{
        $this->data['all_company']=$this->open->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
    }
    $this->data['all_item']=$this->open->get_list("item",array("status"=>1,"company_id"=>$single['company_id']),"id,name","","","name","ASC");
    $this->data['all_item_desc']=$this->open->get_list("item_description",array("status"=>1,"company_id"=>$single['company_id'],"branch_id"=>$single['branch_id']),"id,item_desc","","","item_desc","ASC");
    $this->data['all_unit']=$this->open->get("unit","","name","ASC");
    $this->data['single_item_stock']=$single;
    // debug_r($this->data['single_item_stock']);
    $this->layout->title("Opening Stock");

    $this->data['edit']=true;
    $this->layout->view('openstock/opening-stock',$this->data);
  }
  public function view()
  {
      if($_GET)
      {
        $company_id=$this->input->get("company_id");
        $checking_array['SD.company_id']=$company_id;
        $branch_id=$this->input->get("branch_id");
        if($branch_id!='')
        {
            $checking_array['SD.branch_id']=$branch_id;
        }
        $supplier_id=$this->input->get("supplier_id");
        if($supplier_id!='')
        {
            $checking_array['SD.supplier_id']=$supplier_id;
        }
        $data['all_stock']=$this->open->get_stock($checking_array);
        $this->load->view("openstock/view",$data);
      }
  }
  public function _get_posted_data()
  {
        
        $item['account_id']=$this->input->post("account_id");
        $item['total']=$this->input->post("total");
        $item['grand_total']=$this->input->post("total");
        $item['section']="opening_stock";
        $item['running_year']=$this->running_year;
        
        //insert inv_stock_amount
         $insert_id=$this->open->insert("inv_stock_amount",$item);
         //insert stock report
         $this->open->insert("inv_stock_reports",array("stock_amount_id"=>$insert_id));
         // retrive previous credit
         $prev_credit=$this->open->get_single("acc_ledger",array("id"=>$item['account_id']),"credit")->credit;
         $new_credit=$prev_credit+$item['total'];
         //update new credit
        $this->open->update('acc_ledger',array("credit"=>$new_credit),array("id"=>$item['account_id']));
        $data=array();
        $company_id=$this->input->post("company_id");
        for($i=0;$i<count($company_id);$i++)
        {
            $data[$i]["company_id"]=$this->input->post("company_id")[$i];
            $data[$i]["branch_id"]=$this->input->post("branch_id")[$i];
            $data[$i]["supplier_id"]=$this->input->post("supplier_id")[$i];
            $data[$i]["date"]=date("Y-m-d",strtotime($this->input->post("date")[$i]));
            $data[$i]["item_id"]=$this->input->post("item_id")[$i];
            $data[$i]["item_desc_id"]=$this->input->post("item_desc_id")[$i];
            $data[$i]["purchase_price"]=$this->input->post("price")[$i];
            $data[$i]["qty"]=$this->input->post("qty")[$i];
            $data[$i]["sub_total"]=$this->input->post("sub_total")[$i];
            $data[$i]["stock_amount_id"]=$insert_id;
            $data[$i]["section"]="opening_stock";
        }
        return $data;
  }

}

/* End of file Openstock.php */
