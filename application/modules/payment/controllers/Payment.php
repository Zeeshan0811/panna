<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'accounts');
        $this->load->model('Payment_model',"payment",true);
    }
    
    public function index()
    {
        if (!hasPermission("payment", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'payment');
        $this->layout->title("Opening Balance");
        if(is_super_admin())
        {
            $this->data['all_company']=$this->payment->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->payment->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_bank']=$this->payment->get("customer_bank","","name","ASC");
        $this->data['add']=true;
        $this->layout->view('payment/index', $this->data);
    }
    public function received_no()
    {
        $result=$this->payment->get_custom_received_no("acc_payment","received_no",00001,"PRV");
        echo json_encode($result);
        exit;
    }
    public function add()
    {
        if (!hasPermission("payment", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data['received_no']=$this->input->post("received_no");
            $data['company_id']=$this->input->post("company_id");
            $data['branch_id']=$this->input->post("branch_id");   
            $data['date']=date("Y-m-d",strtotime($this->input->post("date")));      
            $data['account_id']=explode("#",$this->input->post("ledger_id"))[0];   
            $data['pay_type']=$this->input->post("payment_option");   
            $data['bank_id']=$this->input->post("bank_name");   
            $data['cheque_no']=$this->input->post("cheque_no");   
            $cheque_date=$this->input->post("cheque_date");
            if($cheque_date!='')
            {
                $data['cheque_date']=date("Y-m-d",strtotime($cheque_date));   
            }   
            $mature_date=$this->input->post("mature_date");
            if($mature_date!='')
            {
                $data['mature_date']=date("Y-m-d",strtotime($mature_date));   
            }
            $data['description']=$this->input->post("description");   
            $data['debit']=$this->input->post("amount");   
            $data['pay_by']=$this->input->post("pay_by");   
            $data['running_year']=$this->running_year;   
            
            $previous_ledger_debit=$this->payment->get_single("acc_ledger",array("id"=>$data['account_id']),"debit")->debit;
            $new_ledger_debit=$previous_ledger_debit+$data["debit"];

            $this->payment->trans_start();
            $this->payment->insert("acc_payment",$data);
            $this->payment->update("acc_ledger",array("debit"=>$new_ledger_debit),array("id"=>$data['account_id']));
            $this->payment->trans_complete();
            if($this->payment->trans_status()==true){
                $send_data['msg']="success";
            }else{
                $send_data['msg']="error";
            }
            echo json_encode($send_data);
            exit;
        }
    }
    public function get_payment()
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
                $checking_array['AP.account_id']=$ledger_id;
            }
            $checking_array['AP.company_id']=$company_id;
            if($branch_id!='')
            {
                $checking_array['AP.branch_id']=$branch_id;
            }
            $data['payment_details']=$this->payment->get_payment($checking_array);
            $result=$this->load->view("payment/view",$data,true);
            $send_data['result_data']=$result;
            echo json_encode($send_data);
        }
    }
    public function edit($id=null)
    {
        if (!hasPermission("payment", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->payment->get_payment("",$id);
        if(!empty($single))
        {
            if($_POST)
            {
                $data['received_no']=$this->input->post("received_no");
                $data['company_id']=$this->input->post("company_id");
                $data['branch_id']=$this->input->post("branch_id");   
                $data['date']=date("Y-m-d",strtotime($this->input->post("date")));      
                $data['account_id']=explode("#",$this->input->post("ledger_id"))[0];   
                $data['pay_type']=$this->input->post("payment_option");   
                $data['bank_id']=$this->input->post("bank_name");   
                $data['cheque_no']=$this->input->post("cheque_no");   
                $cheque_date=$this->input->post("cheque_date");
                if($cheque_date!='')
                {
                    $data['cheque_date']=date("Y-m-d",strtotime($cheque_date));   
                }   
                $mature_date=$this->input->post("mature_date");
                if($mature_date!='')
                {
                    $data['mature_date']=date("Y-m-d",strtotime($mature_date));   
                }
                $data['description']=$this->input->post("description");   
                $data['debit']=$this->input->post("amount");   
                $data['pay_by']=$this->input->post("pay_by");
                $exits=$this->payment->exits_check("acc_payment",array("received_no"=>$data['received_no']),$id);
                if(!$exits)
                {
                    if($single['account_id']==$data["account_id"])
                    {
                        $previous_ledger_debit=$this->payment->get_single("acc_ledger",array("id"=>$data['account_id']),"debit")->debit;
                        $minus_debit=$previous_ledger_debit-$single['debit'];
                        $new_ledger_debit=$minus_debit+$data["debit"];
        
                        $this->payment->trans_start();
                        $this->payment->update("acc_payment",$data,array("id"=>$id));
                        $this->payment->update("acc_ledger",array("debit"=>$new_ledger_debit),array("id"=>$data['account_id']));
                        $this->payment->trans_complete();
                    }else{
                        $pre_ledger_debit_pre_account_id=$this->payment->get_single("acc_ledger",array("id"=>$single['account_id']),"debit")->debit;
                        $new_ledger_debit_pre_account_id=$pre_ledger_debit_pre_account_id-$single['debit'];

                        $pre_ledger_debit_new_account_id=$this->payment->get_single("acc_ledger",array("id"=>$data['account_id']),"debit")->debit;
                        $new_ledger_debit=$pre_ledger_debit_new_account_id+$data['debit'];
                        $this->payment->trans_start();
                        $this->payment->update("acc_payment",$data,array("id"=>$id));
                        $this->payment->update("acc_ledger",array("debit"=>$new_ledger_debit_pre_account_id),array("id"=>$single['account_id']));
                        $this->payment->update("acc_ledger",array("debit"=>$new_ledger_debit),array("id"=>$data['account_id']));
                        $this->payment->trans_complete();
                    }
                    if($this->payment->trans_status()==true){
                        setMessage("msg", "success", "Updated Successfully");
                    }else{
                        setMessage("msg", "danger", "Something Wrong!");
                    }
                    redirect("payment");
                }else{
                    setMessage("msg", "danger", "Already Exits!");
                    redirect("payment");
                }
            }
            $this->data['single']=$single;
            $this->session->set_userdata('sub_menu', 'payment');
            $this->layout->title("Payment");
            if(is_super_admin())
            {
                $this->data['all_company']=$this->payment->get("company","","name","ASC");
            }else{
                $this->data['all_company']=$this->payment->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
            }
            $this->data['edit']=true;
            $this->layout->view('payment/index', $this->data);
        }else{
            show_404();
        }
    }
}

/* End of file payment.php */
