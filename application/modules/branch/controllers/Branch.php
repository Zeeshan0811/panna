<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Branch_model','branch',true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
    /**
     * ============================branch part==================
     */

    /** ***************Function branch**********************************
    * @type            : Function
    * @function name   : branch
    * @description     : view branch " page                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function index()
    {
        if(!hasPermission("branch",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'branch');
        $this->layout->title("Manage Branch");
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->branch->get_list("company",array("status"=>1),"id,name","","","name","ASC");
        }else{
            $this->data['all_company']=$this->branch->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
        }
        $this->data['add']=true;
        $this->layout->view('branch/branch',$this->data);
    }
    /** ***************Function branch_add**********************************
    * @type            : Function
    * @function name   : branch_add
    * @description     : Process "branch" data add                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function branchadd()
    {
        if(!hasPermission("branch",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required|callback_branch_name');
            $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('tel', 'Telephone No.', 'trim');
            
            if ($this->form_validation->run() == TRUE) {
                $data['company_id']=$this->input->post("company_id");
                $data['name']=$this->input->post("branch_name");
                $data['contact']=$this->input->post("contact");
                $data['address']=$this->input->post("address");
                $data['tel']=$this->input->post("tel");
                $data['running_year']=$this->running_year;
                $this->branch->insert("branch",$data);
                $send_data['msg']="success";
                $send_data['success']="Branch Add Successfully";
                echo json_encode($send_data);
                exit;
                // setMessage("msg", "success", "Branch Add Successfully");
            } else {
                $send_data['msg']=validation_errors();
                echo json_encode($send_data);
                exit;
            }
        }
        redirect("branch/branch");
    }
    //branch ajax view
    public function view()
    {
        if($_GET)
        {
            if(!is_super_admin()&&!is_admin())
            {
                $checking_array["B.company_id"]=logged_in_company_id();
                $checking_array["B.id"]=logged_in_branch_id();
            }else{
                $company_id=$this->input->get("company_id");
                $checking_array["B.company_id"]=$company_id;
            }
            $data['all_branch']=$this->branch->get_all_branch($checking_array);
            $result=$this->load->view("branch-view",$data,true);
            echo json_encode($result);
            exit;
        }
    }
    /** ***************Function branch_edit**********************************
    * @type            : Function
    * @function name   : branch_edit
    * @description     : Process "branch" data edit                
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function branchedit($id=null)
    {
        if(!hasPermission("branch",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if(logged_in_branch_id()==$id || is_super_admin()||is_admin())
        {
            if($_POST)
            {
                $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
                $this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required|callback_branch_name');
                $this->form_validation->set_rules('contact', 'Contact Number', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('tel', 'Telephone No.', 'trim');
                
                if ($this->form_validation->run() == TRUE) {
                    $data['company_id']=$this->input->post("company_id");
                    $data['name']=$this->input->post("branch_name");
                    $data['contact']=$this->input->post("contact");
                    $data['address']=$this->input->post("address");
                    $data['tel']=$this->input->post("tel");
                    $this->branch->update("branch",$data,array("id"=>$id));
                    setMessage("msg", "success", "Branch Updated Successfully");
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("branch");
            }
            $this->data['single']=$this->branch->get_single("branch",array("id"=>$id));
            $this->session->set_userdata('sub_menu', 'branch');
            $this->layout->title("Manage Branch");
            if(is_super_admin()||is_admin())
            {
                $this->data['all_company']=$this->branch->get_list("company",array("status"=>1),"id,name","","","name","ASC");
            }else{
                $this->data['all_company']=$this->branch->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
            }
            $this->data['edit']=true;
            $this->layout->view('branch/branch',$this->data);
        }
        else{
            show_404();
        }
    }
      /** ***************Function branch_name**********************************
    * @type            : Function
    * @function name   : branch_name
    * @description     : Unique check for branch name" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function branch_name() {
        if ($this->input->post('id') == '') {
            $branch_name = $this->branch->exits_check("branch",array("name"=>$this->input->post('branch_name'),"company_id"=>$this->input->post('company_id')));
            if ($branch_name) {
                $this->form_validation->set_message('branch_name', "Branch Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $branch_name = $this->branch->exits_check("branch",array("name"=>$this->input->post('branch_name'),"company_id"=>$this->input->post('company_id')), $this->input->post('id'));
            if ($branch_name) {
                $this->form_validation->set_message('branch_name', "Branch Name Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
      /** ***************Function branchDelete**********************************
    * @type            : Function
    * @function name   : branchDelete
    * @description     : Process "branch" data delete                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function branchDelete($id = nul)
    {
        if(!is_super_admin()){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if(logged_in_branch_id()==$id || is_super_admin()||is_admin())
        {
            $result = $this->branch->get_single("section", array("branch_id" => $id));
            if(isset($result))
            {
                setMessage("msg", "danger", "You Can't delete this.");
            }else{
                $this->branch->delete("branch",array("id"=>$id));
                setMessage("msg", "success", "Branch Delete Successfully.");
            }
            redirect('branch');
        }else{
            show_404();
        }
    }
}

/* End of file Users.php */
