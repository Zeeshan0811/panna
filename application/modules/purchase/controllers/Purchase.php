<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends MY_Controller {

    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
        $this->load->model('Purchase_model',"purchase",true);
    }
    
    public function index()
    {
        if(!hasPermission("purchase",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'purchase');
        if(is_super_admin())
        {
            $this->data['all_company']=$this->purchase->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->purchase->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_bank']=$this->purchase->get_list("company_bank",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_item_desc']=$this->purchase->get_list("item_description",array("status"=>1),"id,item_desc","","","item_desc","ASC");
        $this->data['all_unit']=$this->purchase->get("unit","","name","ASC");

        $this->layout->title("Purchase Information");
        $this->data['add']=true;
        $this->layout->view('purchase/index',$this->data);
    }
    public function check_exits_invoice()
    {
        if($_POST)
        {
            $checking_array=array(
                "invoice_no"=>$this->input->post("invoice_no"),
            );
            $exits=$this->purchase->exits_check("inv_stock_amount",$checking_array);
            if(!empty($exits))
            {
                echo json_encode(array("msg"=>"error"));
            }else{
                echo json_encode(array("msg"=>"success"));
            }
        }
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
    if(!hasPermission("purchase",ADD)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    if($_POST)
    {
        $invoice_no=$this->input->post("invoice_no");
        $exits=$this->purchase->exits_check("inv_stock_amount",array("invoice_no"=>$invoice_no));
        $send_data=array();
        if(!$exits)
        {
            $this->purchase->trans_start();
            $data=$this->_get_posted_data();
            $this->purchase->insert_batch("inv_stock_details",$data);
            $this->purchase->trans_complete();
            if($this->purchase->trans_status()==true){
                $send_data['msg']="success";
            }else{
                $send_data['msg']="error";
            }
        }else{
            $send_data['msg']=$invoice_no;
        }
        $result=$send_data;
        echo json_encode($result);
        exit;
    }
    // redirect("item/itemdescription");
  }
    /** ***************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : purchase data edit                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function edit($id=null)
  {
        if(!hasPermission("purchase",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'purchase');
        $single=$this->purchase->get_single_stock_item($id);
        if(!empty($single))
        {
            if($_POST)
            {
                $data['company_id']=explode("#",$this->input->post("company_id"))[0];
                $data['branch_id']=explode("#",$this->input->post("branch_id"))[0];
                $data['supplier_id']=explode("#",$this->input->post("supplier_id"))[0];
                $data['date']=date("Y-m-d",strtotime($this->input->post("date")));
                $data['due_date']=date("Y-m-d",strtotime($this->input->post("due_date")));
                $data['item_id']=explode("#",$this->input->post("item_id"))[0];
                $data['item_desc_id']=explode("#",$this->input->post("item_desc_id"))[0];
                $data['stock_amount_id']=$this->input->post("stock_amount_id");
                $data['purchase_price']=$this->input->post("price");
                $data['qty']=$this->input->post("qty");
                $data['sub_total']=$data['purchase_price']*$data['qty'];
    
                //get previous stock details 
                $previous_stock_details_sub_total=$this->purchase->get_single("inv_stock_details",array("id"=>$id),"sub_total")->sub_total;
                //get previous stock amount 
                $previous_stock_amount=$this->purchase->get_single("inv_stock_amount",array("id"=>$single['stock_amount_id']));
                //get previous credit
                $previous_credit=$this->purchase->get_single("acc_ledger",array("id"=>$single['account_id']),"credit")->credit;
    
                $minus_total=$previous_stock_amount->total-$previous_stock_details_sub_total;
                $new_total=$minus_total+$data['sub_total'];
                $after_vat_new_total=$new_total;
                $after_vat_new_total+=(($new_total*$previous_stock_amount->vat)/100);
                $grand_new_total=$after_vat_new_total-$previous_stock_amount->discount+$previous_stock_amount->load_charge;
                $new_due=$grand_new_total-$previous_stock_amount->pay;
    
                $minus_credit=$previous_credit-$previous_stock_amount->grand_total;
                $new_credit=$minus_credit+$grand_new_total;
    
                $this->purchase->trans_start();
                //update stock_details
                $this->purchase->update("inv_stock_details",$data,array("id"=>$id));
                //update stock_amount
                $this->purchase->update("inv_stock_amount",array("total"=>$new_total,"after_vat_total"=>$after_vat_new_total,"grand_total"=>$grand_new_total,"due"=>$new_due),array("id"=>$single['stock_amount_id']));
                //update credit
                $this->purchase->update("acc_ledger",array("credit"=>$new_credit),array("id"=>$single['account_id']));
                $this->purchase->trans_complete();
                if($this->purchase->trans_status()==true){
                    setMessage("msg", "success", "Updated Successfully");
                }else{
                    setMessage("msg", "danger", "Something Wrong!");
                }
                redirect("purchase");
            }
            if(is_super_admin())
            {
                $this->data['all_company']=$this->purchase->get("company","","name","ASC");
            }else{
                $this->data['all_company']=$this->purchase->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
            }
            $this->data['all_item']=$this->purchase->get_list("item",array("status"=>1,"company_id"=>$single['company_id']),"id,name","","","name","ASC");
            $this->data['all_bank']=$this->purchase->get_list("company_bank",array("status"=>1),"id,name","","","name","ASC");
            $this->data['all_item_desc']=$this->purchase->get_list("item_description",array("status"=>1,"company_id"=>$single['company_id'],"branch_id"=>$single['branch_id']),"id,item_desc","","","item_desc","ASC");
            $this->data['all_unit']=$this->purchase->get("unit","","name","ASC");
            $this->data['single_item_stock']=$single;
            $this->layout->title("Purchase Information");
            $this->data['edit']=true;
            $this->layout->view('purchase/index',$this->data);
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
    $single=$this->purchase->get_single("inv_stock_amount",array("id"=>$id));
    if(!empty($single))
    {
        if($_POST)
        {
            
            $item['payment_option']=$this->input->post("payment_option");
            $item['bank_id']=$this->input->post("bank_name");
            $item['cheque_no']=$this->input->post("cheque_no");
            $item['cheque_date']=$this->input->post("cheque_date");
            $item['mature_date']=$this->input->post("mature_date");
            $item['total']=$this->input->post("total");
            $item['discount']=$this->input->post("discount");
            $item['vat']=$this->input->post("vat");
            $item['after_vat_total']=$this->input->post("after_vat_total");
            $item['load_charge']=$this->input->post("load_charge");
            $item['grand_total']=$this->input->post("grand_total");
            $item['pay']=$this->input->post("pay");
            $item['due']=$this->input->post("due");
            
            $payment=array();
            $this->purchase->trans_start();
            if($item['pay']!='')
            {
                $payment['pay_type']=$this->input->post("payment_option");
                $payment['bank_id']=$this->input->post("bank_name");
                $payment['cheque_no']=$this->input->post("cheque_no");
                $payment['cheque_date']=$this->input->post("cheque_date");
                $payment['mature_date']=$this->input->post("mature_date");
                $exits=$this->purchase->exits_check("acc_payment",array("stock_amount_id"=>$id));
                if($exits)
                {
                    $payment['debit']=$item['pay'];
                    //update acc-received
                    $this->purchase->update("acc_payment",$payment,array("stock_amount_id"=>$id));
                }else{
                    //insert acc-received
                    $purchase_info=$this->purchase->get_single("inv_stock_details",array("stock_amount_id"=>$id),"company_id,branch_id,date");
                    $payment['account_id']=$purchase_info->account_id;
                    $payment['debit']=$item['pay'];
                    $payment['company_id']=$purchase_info->company_id;
                    $payment['branch_id']=$purchase_info->branch_id;
                    $payment['date']=$purchase_info->date;
                    $payment['stock_amount_id']=$id;
                    $payment['received_no']=$this->purchase->get_custom_received_no("acc_payment","received_no",00001,"MRV");
                    $payment['pay_by']=logged_in_name();
                    $payment['running_year']=$this->running_year;
                    $payment['created_at']=date("Y-m-d H:i:s");
                    $insert_id=$this->purchase->insert("acc_payment",$payment);
                    //insert acc_customer_reports
                    // $this->purchase->insert("acc_customer_reports",array("acc_payment_id"=>$insert_id));
                }
            }
             //get previous credit
            $previous_credit=$this->purchase->get_single("acc_ledger",array("id"=>$single->account_id),"credit")->credit;
            $minus_credit=$previous_credit-$single->grand_total;
            $new_credit=$minus_credit+$item['grand_total'];
            $this->purchase->trans_start();
            //update stock_amount
            $this->purchase->update("inv_stock_amount",$item,array("id"=>$id));
            //update credit
            $this->purchase->update("acc_ledger",array("credit"=>$new_credit),array("id"=>$single->account_id));
            
            $this->purchase->trans_complete();
            if($this->purchase->trans_status()==true){
                setMessage("msg", "success", "Updated Successfully");
            }else{
                setMessage("msg", "danger", "Something Wrong!");
            }
            redirect("purchase");
        }
        if(is_super_admin())
        {
            $this->data['all_company']=$this->purchase->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->purchase->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_item']=$this->purchase->get_list("item",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_bank']=$this->purchase->get_list("company_bank",array("status"=>1),"id,name","","","name","ASC");
        $this->data['all_unit']=$this->purchase->get("unit","","name","ASC");
    
        $this->layout->title("Purchase Information");
        $this->data['editMain']=true;
        $this->data['single_stock_amount']=$single;
        $this->layout->view('purchase/index',$this->data);
    }else{
        show_404();
    }
  }
  public function _get_posted_data()
  {
        
        $item['invoice_no']=$this->input->post("invoice_no");
        $item['account_id']=$this->input->post("account_id");
        $item['payment_option']=$this->input->post("payment_option");
        $item['bank_id']=$this->input->post("bank_name");
        $item['cheque_no']=$this->input->post("cheque_no");
        $item['cheque_date']=$this->input->post("cheque_date");
        $item['mature_date']=$this->input->post("mature_date");
        $item['total']=$this->input->post("total");
        $item['discount']=$this->input->post("discount");
        $item['vat']=$this->input->post("vat");
        $item['after_vat_total']=$this->input->post("after_vat_total");
        $item['load_charge']=$this->input->post("load_charge");
        $item['grand_total']=$this->input->post("grand_total");
        $item['pay']=$this->input->post("pay");
        $item['due']=$this->input->post("due");
        $item['section']="purchase";
        $item['purchase_by']=logged_in_name();
        $item['running_year']=$this->running_year;
        //insert inv_stock_amount
        $insert_id=$this->purchase->insert("inv_stock_amount",$item);
        if($item['pay']!='')
        {
            $payment['account_id']=$this->input->post("account_id");
            $payment['company_id']=$this->input->post("company_id");
            $payment['branch_id']=$this->input->post("branch_id");
            $payment['date']=date("Y-m-d",strtotime($this->input->post("date")));
            $payment['pay_type']=$this->input->post("payment_option");
            $payment['bank_id']=$this->input->post("bank_name");
            $payment['cheque_no']=$this->input->post("cheque_no");
            $payment['cheque_date']=$this->input->post("cheque_date");
            $payment['mature_date']=$this->input->post("mature_date");
            $payment['received_no']=$this->purchase->get_custom_received_no("acc_payment","received_no",00001,"PRV");
            $payment['debit']=$item['pay'];
            $payment['stock_amount_id']=$insert_id;
            $payment['pay_by']=logged_in_name();
            $payment['running_year']=$this->running_year;
            $payment['created_at']=date("Y-m-d H:i:s");
            
            //insert acc-received
            $insert_id=$this->purchase->insert("acc_payment",$payment);
            //insert acc_customer_reports
            // $this->purchase->insert("acc_customer_reports",array("acc_payment_id"=>$insert_id));
        }
        //insert stock reports
        $this->purchase->insert("inv_stock_reports",array("stock_amount_id"=>$insert_id));
        // retrive previous credit
        $prev_credit=$this->purchase->get_single("acc_ledger",array("id"=>$item['account_id']),"credit")->credit;
        $new_credit=$prev_credit+$item['grand_total'];
        //update new credit
        $this->purchase->update('acc_ledger',array("credit"=>$new_credit),array("id"=>$item['account_id']));

        $data=array();
        $id=$this->input->post("id");
        for($i=0;$i<count($id);$i++)
        {
            $data[$i]["company_id"]=$this->input->post("company_id");
            $data[$i]["branch_id"]=$this->input->post("branch_id");
            $data[$i]["supplier_id"]=$this->input->post("supplier_id");
            $data[$i]["date"]=date("Y-m-d",strtotime($this->input->post("date")));
            $data[$i]["due_date"]=date("Y-m-d",strtotime($this->input->post("due_date")));
            $data[$i]["item_id"]=$this->input->post("item_id")[$i];
            $data[$i]["item_desc_id"]=$this->input->post("item_desc_id")[$i];
            $data[$i]["purchase_price"]=$this->input->post("price")[$i];
            $data[$i]["qty"]=$this->input->post("qty")[$i];
            $data[$i]["sub_total"]=$this->input->post("sub_total")[$i];
            $data[$i]["stock_amount_id"]=$insert_id;
            $data[$i]["section"]="purchase";
        }
        return $data;
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
          $data['all_stock']=$this->purchase->get_stock($checking_array);
          $this->load->view("purchase/view",$data);
      }
  }
   /** ***************Function purchase return**********************************
    * @type            : Function
    * @function name   : purchase_return
    * @description     : return purchase                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
    public function purchase_return()
    {
        if(!hasPermission("purchase_return",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'purchase-return');
        if($_POST)
        {
            $supplier_id=$this->input->post("supplier_id");
            $invoice_no=$this->input->post("invoice_no");
            $previous_stock_amount=$this->purchase->get_single("inv_stock_amount",array("invoice_no"=>$invoice_no));
            $return_total_price=0.00;
            $update_details_data=array();
            $update_condition=array();
            $insert_purchase_return=array();
            $checking_arrray=array();

            $this->purchase->trans_start();
            
            foreach ($supplier_id as $key => $value) {
                $checking_arrray=array(
                    "SA.invoice_no"=>$invoice_no,
                    "SD.item_id"=>$this->input->post("item_id")[$key],
                    "SD.item_desc_id"=>$this->input->post("item_desc_id")[$key],
                    "SD.supplier_id"=>$value,
                );

                
                $get_previous_stock_item_qty=$this->purchase->get_single_stock_details($checking_arrray);
                $new_qty=abs($get_previous_stock_item_qty['qty']-$this->input->post("qty")[$key]);
                $new_sub_total_price=$new_qty*$this->input->post("price")[$key];
                //stock_details
                $update_condition["stock_amount_id"]=$previous_stock_amount->id;
                $update_condition["item_id"]=$this->input->post("item_id")[$key];
                $update_condition["item_desc_id"]=$this->input->post("item_desc_id")[$key];
                $update_condition["supplier_id"]=$value;
                $update_details_data['purchase_price']=$new_sub_total_price;
                $update_details_data['qty']=$new_qty;

                $this->purchase->update("inv_stock_details",$update_details_data,$update_condition);

                $insert_purchase_return[$key]['stock_amount_id']=$previous_stock_amount->id;
                $insert_purchase_return[$key]['item_id']=$this->input->post("item_id")[$key];
                $insert_purchase_return[$key]['item_desc_id']=$this->input->post("item_desc_id")[$key];
                $insert_purchase_return[$key]['purchase_price']=$this->input->post("price")[$key];
                $insert_purchase_return[$key]['qty']=$this->input->post("qty")[$key];
                $insert_purchase_return[$key]['sub_total']=$this->input->post("sub_total")[$key];
                $insert_purchase_return[$key]['date']=date("Y-m-d",strtotime($this->input->post("date")[$key]));
                $insert_purchase_return[$key]['return_by']=logged_in_name();
                
                $return_total_price+=$this->input->post("price")[$key]*$this->input->post("qty")[$key];
            }
            
            //get previous credit
            $previous_credit=$this->purchase->get_single("acc_ledger",array("id"=>$previous_stock_amount->account_id),"credit")->credit;
            
            $new_total=$previous_stock_amount->total-$return_total_price;
            $after_vat_new_total=$new_total;
            $after_vat_new_total+=(($new_total*$previous_stock_amount->vat)/100);
            $grand_new_total=$after_vat_new_total-$previous_stock_amount->discount+$previous_stock_amount->load_charge;
            $new_due=$grand_new_total-$previous_stock_amount->pay;
            
            $minus_credit=$previous_credit-$previous_stock_amount->grand_total;
            $new_credit=$minus_credit+$grand_new_total;
            //insert purchase return
            $this->purchase->insert_batch("inv_purchase_return",$insert_purchase_return);
            //update stock_amount
            $this->purchase->update("inv_stock_amount",array("total"=>$new_total,"after_vat_total"=>$after_vat_new_total,"grand_total"=>$grand_new_total,"due"=>$new_due),array("id"=>$previous_stock_amount->id));
            //update credit
            $this->purchase->update("acc_ledger",array("credit"=>$new_credit),array("id"=>$previous_stock_amount->account_id));
            $this->purchase->trans_complete();
            if($this->purchase->trans_status()==true){
                $send_data['msg']="success";
            }else{
                $send_data['msg']="error";
            }
             $result=$send_data;
            echo json_encode($result);
            exit;
        }
        $this->layout->title("Purchase Return");
        $this->layout->view('purchase/purchase-return',$this->data);
    }
}

/* End of file purchase.php */
