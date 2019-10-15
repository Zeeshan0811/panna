<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Received extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->session->set_userdata('set_active', "accounts");
        $this->session->set_userdata('top_menu', 'accounts');
        $this->load->model('Received_model',"received",true);
    }
    
    public function index()
    {
        if (!hasPermission("received", VIEW)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'received');
        $this->layout->title("Opening Balance");
        if(is_super_admin())
        {
            $this->data['all_company']=$this->received->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->received->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_bank']=$this->received->get("customer_bank","","name","ASC");
        $this->data['add']=true;
        $this->layout->view('received/index', $this->data);
    }
    public function received_no()
    {
        $result=$this->received->get_custom_received_no("acc_received","received_no",00001,"MRV");
        echo json_encode($result);
        exit;
    }
    public function add()
    {
        if (!hasPermission("received", ADD)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data['received_no']=$this->input->post("received_no");
            $data['company_id']=$this->input->post("company_id");
            $branch=$this->input->post("branch_id");   
            $data['branch_id']=explode("#",$branch)[0];
            $branch_name=explode("#",$branch)[1];
            $data['date']=date("Y-m-d",strtotime($this->input->post("date")));      
            $data['account_id']=explode("#",$this->input->post("ledger_id"))[0];   
            $data['received_type']=$this->input->post("received_option");   
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
            $data['credit']=$this->input->post("amount");   
            $data['received_by']=$this->input->post("received_by");   
            $data['running_year']=$this->running_year;   
            $marketing=$this->input->post("marketing");
            if($marketing==$branch_name)
            {
                $data['reference_id']=$data['branch_id'];
                $data['reference']="branch";
            }else{
                $data['reference_id']=0;
                $data['reference']="marketing";
            }   
            $previous_ledger_credit=$this->received->get_single("acc_ledger",array("id"=>$data['account_id']),"credit")->credit;
            $new_ledger_credit=$previous_ledger_credit+$data["credit"];

            $this->received->trans_start();
            $insert_id=$this->received->insert("acc_received",$data);
            //insert acc_customer_reports
            $this->received->insert("acc_customer_reports",array("acc_received_id"=>$insert_id));
            $this->received->update("acc_ledger",array("credit"=>$new_ledger_credit),array("id"=>$data['account_id']));
            $this->received->trans_complete();
            if($this->received->trans_status()==true){
                $send_data['msg']="success";
            }else{
                $send_data['msg']="error";
            }
            echo json_encode($send_data);
            exit;
        }
    }
    public function get_received()
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
                $checking_array['AR.account_id']=$ledger_id;
            }
            $checking_array['AR.company_id']=$company_id;
            if($branch_id!='')
            {
                $checking_array['AR.branch_id']=$branch_id;
            }
            $data['received_details']=$this->received->get_received($checking_array);
            $result=$this->load->view("received/view",$data,true);
            $send_data['result_data']=$result;
            echo json_encode($send_data);
        }
    }
    public function edit($id=null)
    {
        if (!hasPermission("received", EDIT)) {
            setMessage("msg", "warning", "Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->received->get_received("",$id);
        if(!empty($single))
        {
            if($_POST)
            {
                $data['received_no']=$this->input->post("received_no");
                $data['company_id']=$this->input->post("company_id");
                $branch=$this->input->post("branch_id");   
                $data['branch_id']=explode("#",$branch)[0];
                $branch_name=explode("#",$branch)[1];
                $data['date']=date("Y-m-d",strtotime($this->input->post("date")));      
                $data['account_id']=explode("#",$this->input->post("ledger_id"))[0];   
                $data['received_type']=$this->input->post("received_option");   
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
                $data['credit']=$this->input->post("amount");   
                $data['received_by']=$this->input->post("received_by");   
                $data['running_year']=$this->running_year;   
                $marketing=$this->input->post("marketing");
                if($marketing==$branch_name)
                {
                    $data['reference_id']=$data['branch_id'];
                    $data['reference']="branch";
                }else{
                    $data['reference_id']=0;
                    $data['reference']="marketing";
                }   
                $exits=$this->received->exits_check("acc_received",array("received_no"=>$data['received_no']),$id);
                if(!$exits)
                {
                    if($single['account_id']==$data["account_id"])
                    {
                        $previous_ledger_credit=$this->received->get_single("acc_ledger",array("id"=>$data['account_id']),"credit")->credit;
                        $minus_credit=$previous_ledger_credit-$single['credit'];
                        $new_ledger_credit=$minus_credit+$data["credit"];
        
                        $this->received->trans_start();
                        $this->received->update("acc_received",$data,array("id"=>$id));
                        $this->received->update("acc_ledger",array("credit"=>$new_ledger_credit),array("id"=>$data['account_id']));
                        $this->received->trans_complete();
                    }else{
                        $pre_ledger_credit_pre_account_id=$this->received->get_single("acc_ledger",array("id"=>$single['account_id']),"credit")->credit;
                        $new_ledger_credit_pre_account_id=$pre_ledger_credit_pre_account_id-$single['credit'];

                        $pre_ledger_credit_new_account_id=$this->received->get_single("acc_ledger",array("id"=>$data['account_id']),"credit")->credit;
                        $new_ledger_credit=$pre_ledger_credit_new_account_id+$data['credit'];
                        $this->received->trans_start();
                        $this->received->update("acc_received",$data,array("id"=>$id));
                        $this->received->update("acc_ledger",array("credit"=>$new_ledger_credit_pre_account_id),array("id"=>$single['account_id']));
                        $this->received->update("acc_ledger",array("credit"=>$new_ledger_credit),array("id"=>$data['account_id']));
                        $this->received->trans_complete();
                    }
                    if($this->received->trans_status()==true){
                        setMessage("msg", "success", "Updated Successfully");
                    }else{
                        setMessage("msg", "danger", "Something Wrong!");
                    }
                    redirect("received");
                }else{
                    setMessage("msg", "danger", "Already Exits!");
                    redirect("received");
                }
            }
            $this->data['single']=$single;
            $this->session->set_userdata('sub_menu', 'received');
            $this->layout->title("received");
            if(is_super_admin())
            {
                $this->data['all_company']=$this->received->get("company","","name","ASC");
            }else{
                $this->data['all_company']=$this->received->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
            }
            $this->data['edit']=true;
            $this->layout->view('received/index', $this->data);
        }else{
            show_404();
        }
    }
}

/* End of file received.php */
