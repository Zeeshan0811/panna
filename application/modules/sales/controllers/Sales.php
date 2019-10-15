<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
        $this->load->model('Sales_model',"sales",true);
    }
    
    public function index()
    {
        if(!hasPermission("sales",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'sales');
        if(is_super_admin())
        {
            $this->data['all_company']=$this->sales->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->sales->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_item']=$this->sales->get_list("item",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_bank']=$this->sales->get_list("company_bank",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_item_desc']=$this->sales->get_list("item_description",array("status"=>1),"id,item_desc","","","item_desc","ASC");
        $this->data['all_unit']=$this->sales->get("unit","","name","ASC");
        $this->data['all_sales_type']=$this->sales->get_all_sales_type();
        $this->data['invoice_no']=$this->sales->get_custom_received_no("inv_sales_amount","invoice_no",00001,"INV");
        $this->layout->title("Sales Information");
        $this->data['add']=true;
        $this->layout->view('sales/index',$this->data);
    }
      /** ***************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : purchase data add                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function add()
  {
    if(!hasPermission("sales",ADD)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    if($_POST)
    {
        // debug_r($_POST);
        $send_data=array();
        $invoice_no=$this->input->post("invoice_no");
        $exits=$this->sales->exits_check("inv_sales_amount",array("invoice_no"=>$invoice_no));
        if(!$exits)
        {
            $this->sales->trans_start();
            $data=$this->_get_posted_data();
            $this->sales->insert_batch("inv_sales_details",$data);
            $this->sales->trans_complete();
            if($this->sales->trans_status()==true){
                setMessage("msg","success","Sales Successfullt!");
                redirect("sales/invoice/".$data[0]['sales_amount_id']);
            }else{
                setMessage("msg","danger","Something Wrong!");
                redirect("sales");
            }
        }else{
            redirect("sales");
        }
    }
    // redirect("item/itemdescription");
  }
    /** ***************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : sales data edit                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function edit($id=null)
  {
        if(!hasPermission("sales",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'sales');
        $single=$this->sales->get_single_sales_item($id);
        if(!empty($single))
        {
            if($_POST)
            {
                $data['company_id']=explode("#",$this->input->post("company_id"))[0];
                $data['branch_id']=explode("#",$this->input->post("branch_id"))[0];
                $data['customer_id']=explode("#",$this->input->post("customer_id"))[0];
                $data['date']=date("Y-m-d",strtotime($this->input->post("date")));
                $data['due_date']=date("Y-m-d",strtotime($this->input->post("due_date")));
                $data['item_id']=explode("#",$this->input->post("item_id"))[0];
                $data['item_desc_id']=explode("#",$this->input->post("item_desc_id"))[0];
                $data['sales_amount_id']=$this->input->post("sales_amount_id");
                $data['sales_price']=$this->input->post("price");
                $sales_type=$this->input->post("sales_type");
                $data['qty']=$this->input->post("qty");
                $data['sub_total']=$data['sales_price']*$data['qty'];

                $account_id=$this->input->post("account_id");

                if($account_id==$single['account_id'])
                {
                    //get previous sales details 
                    $previous_sales_details_sub_total=$this->sales->get_single("inv_sales_details",array("id"=>$id),"sub_total")->sub_total;
                    //get previous sales amount 
                    $previous_sales_amount=$this->sales->get_single("inv_sales_amount",array("id"=>$single['sales_amount_id']));
                    //get previous debit credit
                    $previous_debit_credit=$this->sales->get_single("acc_ledger",array("id"=>$single['account_id']),"debit,credit");
        
                    $minus_total=$previous_sales_amount->total-$previous_sales_details_sub_total;
                    $new_total=$minus_total+$data['sub_total'];
                    
                    $net_payable=($new_total-$previous_sales_amount->discount_tk+$previous_sales_amount->transport_charge)+($previous_sales_amount->previous_balance);
                    $new_due=$net_payable-$previous_sales_amount->pay;
        
                    $minus_debit=$previous_debit_credit->debit-$previous_sales_amount->net_payable;
                    $new_debit=$minus_debit+$net_payable;
                    $this->sales->trans_start();
                    //update sales_details
                    $this->sales->update("inv_sales_details",$data,array("id"=>$id));
                    //update salses_amount
                    $this->sales->update("inv_sales_amount",array("total"=>$new_total,"net_payable"=>$net_payable,"due"=>$new_due),array("id"=>$single['sales_amount_id']));
                    //update debit
                    if($sales_type!="Damage")
                    {
                        $this->sales->update("acc_ledger",array("debit"=>$new_debit),array("id"=>$single['account_id']));
                    }
                    $this->sales->trans_complete();
                    if($this->sales->trans_status()==true){
                        setMessage("msg", "success", "Updated Successfully");
                    }else{
                        setMessage("msg", "danger", "Something Wrong!");
                    }

                }
                redirect("sales");
            }
            if(is_super_admin())
            {
                $this->data['all_company']=$this->sales->get("company","","name","ASC");
            }else{
                $this->data['all_company']=$this->sales->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
            }
            $this->data['all_item']=$this->sales->get_list("item",array("status"=>1),"id,name","","","name","ASC");
            $this->data['all_bank']=$this->sales->get_list("company_bank",array("status"=>1),"id,name","","","name","ASC");
            $this->data['all_item_desc']=$this->sales->get_list("item_description",array("status"=>1),"id,item_desc","","","item_desc","ASC");
            $this->data['all_unit']=$this->sales->get("unit","","name","ASC");
            $this->data['all_sales_type']=$this->sales->get_all_sales_type();
            $this->data['single']=$single;
            $checking_array['company_id']=$single['company_id'];
            $checking_array['branch_id']=$single['branch_id'];
            $checking_array['item_desc_id']=$single["item_desc_id"];
            $this->data['stock']=$this->sales->get_available_stock($checking_array);
            $this->layout->title("Sales Information");
            $this->data['edit']=true;
            $this->layout->view('sales/index',$this->data);
        }else{
            show_404();
        }
  }
    /** ***************Function edit main**********************************
    * @type            : Function
    * @function name   : edit_main
    * @description     : edit total,vat,discount load chagre etc                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function editMain($id=null)
  {
    if(!hasPermission("purchase",VIEW)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    $this->session->set_userdata('sub_menu', 'purchase');
    $single=$this->sales->get_single("inv_sales_amount",array("id"=>$id));
    if(!empty($single))
    {
        if($_POST)
        {
            $sales_type=$this->input->post("sales_type");
            $item['payment_option']=$this->input->post("payment_option");
            $item['bank_id']=$this->input->post("bank_name");
            $item['cheque_no']=$this->input->post("cheque_no");
            $item['cheque_date']=$this->input->post("cheque_date");
            $item['mature_date']=$this->input->post("mature_date");
            $item['total']=$this->input->post("total");
            $item['discount_percent']=$this->input->post("discount_percent");
            $item['discount_tk']=$this->input->post("discount_tk");
            $item['transport_charge']=$this->input->post("transport_charge");
            $item['previous_balance']=$this->input->post("previous_balance");
            $item['net_payable']=$this->input->post("net_payable");
            $item['pay']=$this->input->post("pay");
            $item['due']=$this->input->post("due");
            $new_credit=0;
            if($sales_type!="Damage")
            {
                //get previous debit credit
                $previous_debit_credit=$this->sales->get_single("acc_ledger",array("id"=>$single->account_id),"debit,credit");
                //debit
                $minus_debit=$previous_debit_credit->debit-$single->net_payable;
                $new_debit=$minus_debit+$item['net_payable'];
                //credit
                $minus_credit=$previous_debit_credit->credit-$single->pay;
                $new_credit=$minus_credit+$item['pay'];
            }
            $receive=array();
            $this->sales->trans_start();
            if($item['pay']!='')
            {
                $receive['received_type']=$this->input->post("payment_option");
                $receive['bank_id']=$this->input->post("bank_name");
                $receive['cheque_no']=$this->input->post("cheque_no");
                $receive['cheque_date']=$this->input->post("cheque_date");
                $receive['mature_date']=$this->input->post("mature_date");
                $exits=$this->sales->exits_check("acc_received",array("sales_amount_id"=>$id));
                if($exits)
                {
                    $receive['credit']=$item['pay'];
                    //update acc-received
                    $this->sales->update("acc_received",$receive,array("sales_amount_id"=>$id));
                }else{
                    //insert acc-received
                    $sales_info=$this->sales->get_single("inv_sales_details",array("sales_amount_id"=>$id),"company_id,branch_id,date");
                    $receive['account_id']=$sales_info->account_id;
                    $receive['credit']=$item['pay'];
                    $receive['company_id']=$sales_info->company_id;
                    $receive['branch_id']=$sales_info->branch_id;
                    $receive['date']=$sales_info->date;
                    $receive['sales_amount_id']=$id;
                    $receive['received_no']=$this->sales->get_custom_received_no("acc_received","received_no",00001,"MRV");
                    $receive['received_by']=logged_in_name();
                    $receive['running_year']=$this->running_year;
                    $receive['created_at']=date("Y-m-d H:i:s");
                    $insert_id=$this->sales->insert("acc_received",$receive);
                    //insert acc_customer_reports
                    $this->sales->insert("acc_customer_reports",array("acc_received_id"=>$insert_id));
                }
            }
            //update sales amount
            $this->sales->update("inv_sales_amount",$item,array("id"=>$id));
            if($sales_type==="Sales Of Product")
            {
                //update debut credit
                $this->sales->update("acc_ledger",array("debit"=>$new_debit,"credit"=>$new_credit),array("id"=>$single->account_id));
            }
            
            $this->sales->trans_complete();
            if($this->sales->trans_status()==true){
                setMessage("msg", "success", "Updated Successfully");
            }else{
                setMessage("msg", "danger", "Something Wrong!");
            }
            redirect("sales");
        }
        if(is_super_admin())
        {
            $this->data['all_company']=$this->sales->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->sales->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_item']=$this->sales->get_list("item",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_bank']=$this->sales->get_list("company_bank",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_unit']=$this->sales->get("unit","","name","ASC");
    
        $this->layout->title("Sales Information");
        $this->data['editMain']=true;
        $this->data['single_sales_amount']=$single;
        $this->layout->view('sales/index',$this->data);
    }else{
        show_404();
    }
  }
  /** ***************Function _get_posted_data **********************************
    * @type            : Function
    * @function name   : _get_posted_data
    * @description     : get input data                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function _get_posted_data()
  {
    //   debug_r($_POST);
        
        $item['invoice_no']=$this->input->post("invoice_no");
        $item['account_id']=$this->input->post("account_id");
        $item['payment_option']=$this->input->post("payment_option");
        $item['bank_id']=$this->input->post("bank_name");
        $item['cheque_no']=$this->input->post("cheque_no");
        $item['cheque_date']=$this->input->post("cheque_date");
        $item['mature_date']=$this->input->post("mature_date");
        $item['total']=$this->input->post("total");
        $item['discount_percent']=$this->input->post("discount_percent");
        $item['discount_tk']=$this->input->post("discount_tk");
        $item['transport_charge']=$this->input->post("transport_charge");
        $item['previous_balance']=$this->input->post("previous_balance");
        $item['sales_type_id']=explode("#",$this->input->post("sales_type_id"))[0];
        $item['net_payable']=$this->input->post("net_payable");
        $item['pay']=$this->input->post("pay");
        $item['due']=$this->input->post("due");
        $item['remarks']=$this->input->post("remarks");
        $item['created_at']=date("Y-m-d H:i:s");
        $item['sales_by']=logged_in_name();
        $item['running_year']=$this->running_year;
        $branch_name=$this->input->post("branch_name");
        $marketing=$this->input->post("marketing");
        $sales_type=explode("#",$this->input->post("sales_type_id"))[1];
        if($sales_type==="Damage")
        {
            $item['net_payable']=$item['total'];
            $item['account_id']=null;
            $item['due']=$item['total'];
            $item['section']="damage";
            $item['reference_id']=0;
            $item['reference']="damage";
        }else{
            $item['section']="sales";
            if($marketing==$branch_name)
            {
                $item['reference_id']=$this->input->post("branch_id")[0];
                $item['reference']="branch";
            }else{
                $item['reference_id']=0;
                $item['reference']="marketing";
            }
        }
        //insert inv_sales_amount
        $insert_id=$this->sales->insert("inv_sales_amount",$item);
        if($item['pay']!='')
        {
            $receive['account_id']=$this->input->post("account_id");
            $receive['company_id']=$this->input->post("company_id");
            $receive['branch_id']=$this->input->post("branch_id");
            $receive['date']=date("Y-m-d",strtotime($this->input->post("date")));
            $receive['received_type']=$this->input->post("payment_option");
            $receive['bank_id']=$this->input->post("bank_name");
            $receive['cheque_no']=$this->input->post("cheque_no");
            $receive['cheque_date']=$this->input->post("cheque_date");
            $receive['mature_date']=$this->input->post("mature_date");
            $receive['received_no']=$this->sales->get_custom_received_no("acc_received","received_no",00001,"MRV");
            $receive['credit']=$item['pay'];
            $receive['sales_amount_id']=$insert_id;
            $receive['received_by']=logged_in_name();
            $receive['running_year']=$this->running_year;
            $receive['created_at']=date("Y-m-d H:i:s");
            
            //insert acc-received
            $insert_id=$this->sales->insert("acc_received",$receive);
            //insert acc_customer_reports
            $this->sales->insert("acc_customer_reports",array("acc_received_id"=>$insert_id));
        }
        //insert stock reports
        $this->sales->insert("inv_stock_reports",array("sales_amount_id"=>$insert_id));
        //insert acc_customer_reports
        $this->sales->insert("acc_customer_reports",array("sales_amount_id"=>$insert_id));
        // retrive previous debit credit
        if($sales_type!="Damage")
        {
            $prev_debit_credit=$this->sales->get_single("acc_ledger",array("id"=>$item['account_id']),"debit,credit");
            if($item['pay']=="")
            {
                $item['pay']=0;
            }
            $new_credit=abs($prev_debit_credit->credit+$item['pay']);
            $new_debit=abs($prev_debit_credit->debit+$item['net_payable']-$item['previous_balance']);
            //update new debit credit
            $this->sales->update('acc_ledger',array("credit"=>$new_credit,"debit"=>$new_debit),array("id"=>$item['account_id']));
        } 

        $data=array();
        $id=$this->input->post("id");
        for($i=0;$i<count($id);$i++)
        {
            $data[$i]["company_id"]=$this->input->post("company_id");
            $data[$i]["branch_id"]=$this->input->post("branch_id");
            $data[$i]["customer_id"]=$this->input->post("customer_id");
            $data[$i]["date"]=date("Y-m-d",strtotime($this->input->post("date")));
            $data[$i]["due_date"]=date("Y-m-d",strtotime($this->input->post("due_date")));
            $data[$i]["item_id"]=$this->input->post("item_id")[$i];
            $data[$i]["item_desc_id"]=$this->input->post("item_desc_id")[$i];
            $data[$i]["sales_price"]=$this->input->post("price")[$i];
            $data[$i]["qty"]=$this->input->post("qty")[$i];
            $data[$i]["sub_total"]=$this->input->post("sub_total")[$i];
            $data[$i]["sales_amount_id"]=$insert_id;
            if($sales_type=="Damage")
            {
                $data[$i]["section"]="damage";
            }else{
                $data[$i]["section"]="sales";

            }
        }
        return $data;
  }
  /** ***************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : view before sales or view sales                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function view()
  {
      if($_GET)
      {
          $customer_id=$this->input->get("customer_id");
          $company_id=$this->input->get("company_id");
          $branch_id=$this->input->get("branch_id");
          $checking_array=array();

          if($company_id!='')
          {
              $checking_array['SD.company_id']=$company_id;
          }
          if($branch_id!='')
          {
              $checking_array['SD.branch_id']=$branch_id;
          }
          if($customer_id!='')
          {
              $checking_array['SD.customer_id']=$customer_id;
          }
          $data['all_sales']=$this->sales->get_sales_item($checking_array);
          $this->load->view("sales/view",$data);
      }
  }
 /** ***************Function invoice**********************************
    * @type            : Function
    * @function name   : invoice
    * @description     : invoice before sales or invoice                   
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function invoice($id=null)
  {
    if(!hasPermission("invoice",VIEW)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    $this->layout->title("Sales Information");
    $exits=$this->sales->exits_check("inv_sales_amount",array("id"=>$id));
    if($exits)
    {
        $this->session->set_userdata('sub_menu', 'sales');
        $this->data['sales_invoice']=$this->sales->get_sales_invoice($id);
        $this->layout->view('sales/invoice',$this->data);
    }else{
        show_404();
    }
  }
   /** ***************Function sales return**********************************
    * @type            : Function
    * @function name   : sales_return
    * @description     : return sales                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
    public function sales_return()
    {
        if(!hasPermission("sales_return",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'sales-return');
        if($_POST)
        {
            $customer_id=$this->input->post("customer_id");
            $invoice_no=$this->input->post("invoice_no");
            $previous_sales_amount=$this->sales->get_single("inv_sales_amount",array("invoice_no"=>$invoice_no));
            $return_total_price=0.00;
            $update_details_data=array();
            $update_condition=array();
            $insert_sales_return=array();
            $checking_arrray=array();

            $this->sales->trans_start();
            
            foreach ($customer_id as $key => $value) {
                $checking_arrray=array(
                    "SA.invoice_no"=>$invoice_no,
                    "SD.item_id"=>$this->input->post("item_id")[$key],
                    "SD.item_desc_id"=>$this->input->post("item_desc_id")[$key],
                    "SD.customer_id"=>$value,
                );

                
                $get_previous_sales_item_qty=$this->sales->get_single_sales_details($checking_arrray);
                $new_qty=abs($get_previous_sales_item_qty['qty']-$this->input->post("qty")[$key]);
                $new_sub_total_price=$new_qty*$this->input->post("price")[$key];
                //sales details
                $update_condition["sales_amount_id"]=$previous_sales_amount->id;
                $update_condition["item_id"]=$this->input->post("item_id")[$key];
                $update_condition["item_desc_id"]=$this->input->post("item_desc_id")[$key];
                $update_condition["customer_id"]=$value;
                $update_details_data['sales_price']=$new_sub_total_price;
                $update_details_data['qty']=$new_qty;

                $this->sales->update("inv_sales_details",$update_details_data,$update_condition);

                $insert_sales_return[$key]['sales_amount_id']=$previous_sales_amount->id;
                $insert_sales_return[$key]['item_id']=$this->input->post("item_id")[$key];
                $insert_sales_return[$key]['item_desc_id']=$this->input->post("item_desc_id")[$key];
                $insert_sales_return[$key]['sales_price']=$this->input->post("price")[$key];
                $insert_sales_return[$key]['qty']=$this->input->post("qty")[$key];
                $insert_sales_return[$key]['sub_total']=$this->input->post("sub_total")[$key];
                $insert_sales_return[$key]['date']=date("Y-m-d",strtotime($this->input->post("date")[$key]));
                $insert_sales_return[$key]['return_by']=logged_in_name();
                
                $return_total_price+=$this->input->post("price")[$key]*$this->input->post("qty")[$key];
            }
            
            //get previous debit
            $previous_debit=$this->sales->get_single("acc_ledger",array("id"=>$previous_sales_amount->account_id),"debit")->debit;
            
            $new_total=$previous_sales_amount->total-$return_total_price;
            $discount_tk=$new_total*$previous_sales_amount->discount_percent/100;
            $net_payable=$new_total-$discount_tk+$previous_sales_amount->transport_charge;
            $new_due=$net_payable-$previous_sales_amount->pay;
            
            $minus_debit=$previous_debit-$previous_sales_amount->net_payable;
            $new_debit=$minus_debit+$net_payable;
            //insert sales return
            $this->sales->insert_batch("inv_sales_return",$insert_sales_return);
            //update sales_amount
            $this->sales->update("inv_sales_amount",array("total"=>$new_total,"discount_tk"=>$discount_tk,"net_payable"=>$net_payable,"due"=>$new_due),array("id"=>$previous_sales_amount->id));
            //update debit
            $this->sales->update("acc_ledger",array("debit"=>$new_debit),array("id"=>$previous_sales_amount->account_id));
            $this->sales->trans_complete();
            if($this->sales->trans_status()==true){
                $send_data['msg']="success";
            }else{
                $send_data['msg']="error";
            }
             $result=$send_data;
            echo json_encode($result);
            exit;
        }
        $this->layout->title("Sales Return");
        $this->layout->view('sales/sales-return',$this->data);
    }
}

/* End of file sales.php */
