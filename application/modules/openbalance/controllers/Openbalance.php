<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Openbalance extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'accounts');
        $this->load->model('Openbalance_model',"balance",true);
    }
    
    public function index()
    {
        if (!hasPermission("opening_balance", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'opening-balance');
        $this->layout->title("Opening Balance");
        if(is_super_admin())
        {
            $this->data['all_company']=$this->balance->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->balance->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['add']=true;
        $this->layout->view('openbalance/index', $this->data);
    }

    public function add()
    {
        if($_POST)
        {
            $account_id=explode("#",$this->input->post("ledger_id"))[0];
            $amount=$this->input->post("amount");
            $company_id=$this->input->post("company_id");
            $branch_id=$this->input->post("branch_id");
            $ledger_type=explode("#",$this->input->post("ledger_id"))[1];
            $exits=$this->balance->exits_check("acc_opening_balance",array("account_id"=>$account_id));
            if(!$exits)
            {
                $previous_ledger_balance=$this->balance->get_single("acc_ledger",array("id"=>$account_id),"debit,credit");
                $new_balance=0.00;
                $data['account_id']=$account_id;
                $data['company_id']=$company_id;
                $data['branch_id']=$branch_id;
                if($ledger_type==="Dr")
                {
                    $new_debit=$previous_ledger_balance->debit+$amount;
                    $data['debit']=$amount;
                    $this->balance->trans_start();
                    $insert_id=$this->balance->insert("acc_opening_balance",$data);
                    $this->balance->update("acc_ledger",array("debit"=>$new_debit),array("id"=>$account_id));
                    $customer=$this->balance->exits_check("acc_ledger",array("id"=>$account_id,"customer_id!="=>null));
                    if($customer)
                    {
                        $this->balance->insert("acc_customer_reports",array("open_balance_id"=>$insert_id));
                    }
                    $this->balance->trans_complete();
                }
                if($ledger_type==="Cr")
                {
                    $new_credit=$previous_ledger_balance->credit+$amount;
                    $data['credit']=$amount;
                    $this->balance->trans_start();
                    $this->balance->insert("acc_opening_balance",$data);
                    $this->balance->update("acc_ledger",array("credit"=>$new_credit),array("id"=>$account_id));
                    $this->balance->trans_complete();
                }
                
                if($this->balance->trans_status()==true){
                    echo json_encode(array("msg"=>"success"));
                }else{
                    echo json_encode(array("msg"=>"error"));
                }
               
            }else{
                echo json_encode(array("msg"=>"error"));
            }

        }
    }
    public function edit($id=null)
    {
        if (!hasPermission("opening_balance", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->balance->get_opening_balance("",$id);
        if(!empty($single))
        {
            if($_POST)
            {
                $account_id=explode("#",$this->input->post("ledger_id"))[0];
                $amount=$this->input->post("amount");
                $company_id=$this->input->post("company_id");
                $branch_id=$this->input->post("branch_id");
                $ledger_type=explode("#",$this->input->post("ledger_id"))[1];
                $exits=$this->balance->exits_check("acc_opening_balance",array("account_id"=>$account_id),$id);
                $data['company_id']=$company_id;
                $data['branch_id']=$branch_id;
                $data['account_id']=$account_id;
                if(!$exits)
                {
                    $this->balance->trans_start();
                    $previous_open_balance=$this->balance->get_single("acc_opening_balance",array("id"=>$id),"debit,credit");
                    if($single['account_id']==$account_id)
                    {
                        $previous_ledger_balance=$this->balance->get_single("acc_ledger",array("id"=>$single['account_id']),"debit,credit");
                        if($ledger_type==="Dr")
                        {
                            $minus_debit=$previous_ledger_balance->debit-$previous_open_balance->debit;
                            $new_debit=$minus_debit+$amount;
                            
                            $data['debit']=$amount;
                            $this->balance->update("acc_ledger",array("debit"=>$new_debit),array("id"=>$single['account_id']));
                        }
                        if($ledger_type==="Cr")
                        {
                            $minus_credit=$previous_ledger_balance->credit-$previous_open_balance->credit;
                            $new_credit=$minus_credit+$amount;
                            
                            $data['credit']=$amount;
                            $this->balance->update("acc_ledger",array("credit"=>$new_credit),array("id"=>$single['account_id']));
                        }
                    }else{
                        $pre_ledger_balance_pre_account_id=$this->balance->get_single("acc_ledger",array("id"=>$single['account_id']),"debit,credit");
                        $pre_ledger_balance_new_account_id=$this->balance->get_single("acc_ledger",array("id"=>$account_id),"debit,credit");
                        if($ledger_type==="Dr")
                        {
                            $minus_debit_pre_account_id=$pre_ledger_balance_pre_account_id->debit-$previous_open_balance->debit;

                            $new_debit=$pre_ledger_balance_new_account_id->debit+$amount;
                            
                            $data['debit']=$amount;
                            $this->balance->update("acc_ledger",array("debit"=>$new_debit),array("id"=>$account_id));
                            $this->balance->update("acc_ledger",array("debit"=>$minus_debit_pre_account_id),array("id"=>$single['account_id']));
                        }
                        if($ledger_type==="Cr")
                        {
                            $minus_credit_pre_account_id=$pre_ledger_balance_pre_account_id->credit-$previous_open_balance->credit;

                            $new_credit=$pre_ledger_balance_new_account_id->credit+$amount;
                            
                            $data['credit']=$amount;
                            $this->balance->update("acc_ledger",array("credit"=>$new_credit),array("id"=>$account_id));
                            $this->balance->update("acc_ledger",array("credit"=>$minus_credit_pre_account_id),array("id"=>$single['account_id']));
                        }
                    }
                    $this->balance->update("acc_opening_balance",$data,array("id"=>$id));
                    $this->balance->trans_complete();
                    if($this->balance->trans_status()==true){
                        setMessage("msg", "success", "Updated Successfully");
                    }else{
                        setMessage("msg", "success", "Something Wrong!");
                    }
                    redirect("opening-balance");
                }else{
                    setMessage("msg", "danger", "Already Exits!");
                    redirect("openbalance/edit/$id");
                }
            }
            $this->data['single']=$single;
            $this->session->set_userdata('sub_menu', 'opening-balance');
            $this->layout->title("Opening Balance");
            if(is_super_admin())
            {
                $this->data['all_company']=$this->balance->get("company","","name","ASC");
            }else{
                $this->data['all_company']=$this->balance->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
            }
            $this->data['edit']=true;
            $this->layout->view('openbalance/index', $this->data);
        }else{
            show_404();
        }
    }
    public function get_opening_balance()
    {
        if($_GET)
        {
            $company_id=$this->input->get("company_id");
            $branch_id=$this->input->get("branch_id");
            $ledger=$this->input->get("ledger_id");
            $checking_array=array();
            if($ledger!='')
            {
                $ledger_id=explode("#",$ledger)[0];
                $checking_array['AB.account_id']=$ledger_id;
            }
            $checking_array['AB.company_id']=$company_id;
            if($branch_id!='')
            {
                $checking_array['AB.branch_id']=$branch_id;
            }
            $data=$this->balance->get_opening_balance($checking_array);
            $result=$this->load->view("openbalance/view",$data,true);
            $send_data['result_data']=$result;
            $send_data['debit_balance']=$data['debit_balance'];
            $send_data['credit_balance']=$data['credit_balance'];
            echo json_encode($send_data);
        }
    }

}

/* End of file Openbalance.php */
