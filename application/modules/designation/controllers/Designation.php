<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Designation extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Designation_model','designation',true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
   
    /** ***************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     :   designation" view               
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
    public function index()
    {
        if(!hasPermission("designation",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'designation');
        $this->layout->title("Manage Designation");
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->designation->get_list("company",array("status"=>1),"id,name","","","name","ASC");
        }else{
            $this->data['all_company']=$this->designation->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
        }
        
        $this->data['add']=true;
        $this->layout->view('designation',$this->data);
    }
    /** ***************Function designationadd**********************************
    * @type            : Function
    * @function name   : designationadd
    * @description     : Process "designation" data add                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function designationadd()
    {
        if(!hasPermission("designation",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
            $this->form_validation->set_rules('section_id', 'Section Name', 'trim|required');
            $this->form_validation->set_rules('designation_name', 'Designation', 'trim|required|callback_designation_name');
            
            if ($this->form_validation->run() == TRUE) {
                $data['company_id']=$this->input->post("company_id");
                $data['branch_id']=$this->input->post("branch_id");
                $data['section_id']=$this->input->post("section_id");
                $data['designation']=$this->input->post("designation_name");
                $data['running_year']=$this->running_year;
                $this->designation->insert("designation",$data);
                $send_data['msg']="success";
                $send_data['success']="Designation Add Successfully";
                echo json_encode($send_data);
                exit;
            } else {
                $send_data['msg']=validation_errors();
                echo json_encode($send_data);
                exit;
            }
        }
        redirect("designation");
    }
    //designation ajax view
    public function view()
    {
        if($_GET)
        {
            $section_id=$this->input->get("section_id");
            if(!is_super_admin()&&!is_admin())
            {
                $checking_array["D.company_id"]=logged_in_company_id();
                $checking_array["D.branch_id"]=logged_in_branch_id();
                $checking_array["D.section_id"]=$section_id;
            }else{
                $company_id=$this->input->get("company_id");
                $branch_id=$this->input->get("branch_id");
                $checking_array["D.company_id"]=$company_id;
                $checking_array["D.branch_id"]=$branch_id;
                $checking_array["D.section_id"]=$section_id;
            }
            $this->data['all_designation']=$this->designation->get_designation("",$checking_array);
            $result=$this->load->view("designation-view",$this->data,true);
            echo json_encode($result);
            exit;
        }
    }
    /** ***************Function designationedit**********************************
    * @type            : Function
    * @function name   : designationedit
    * @description     : Process "designation" data edit                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function designationedit($id=null)
    {
        if(!hasPermission("designation",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->designation->get_designation($id);
        if($single['company_id']==logged_in_company_id()|| is_super_admin()||is_admin() ){
            if($_POST)
            {
                $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
                $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('section_id', 'Section Name', 'trim|required');
                $this->form_validation->set_rules('designation_name', 'Designation', 'trim|required|callback_designation_name');
                
                if ($this->form_validation->run() == TRUE) {
                    $data['company_id']=$this->input->post("company_id");
                    $data['branch_id']=$this->input->post("branch_id");
                    $data['section_id']=$this->input->post("section_id");
                    $data['designation']=$this->input->post("designation_name");
                    $data['running_year']=$this->running_year;
                    $this->designation->update("designation",$data,array("id"=>$id));
                    setMessage("msg", "success", "Designation Updated Successfully");
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("designation");
            }
            $this->session->set_userdata('sub_menu', 'designation');
            $this->layout->title("Manage Designation");
            $this->data['single']=$single;
            if(is_super_admin()||is_admin())
            {
                $this->data['all_company']=$this->designation->get_list("company",array("status"=>1),"id,name","","","name","ASC");
                $this->data['all_branch']=$this->designation->get_list("branch",array("status"=>1,"company_id"=>$single['company_id']),"id,name","","","name","ASC");
                $this->data['all_section']=$this->designation->get_list("section",array("status"=>1,"company_id"=>$single['company_id'],"branch_id"=>$single['branch_id']),"id,name","","","name","ASC");
            }else{
                $this->data['all_company']=$this->designation->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
                $this->data['all_branch']=$this->designation->get_list("branch",array("status"=>1,"company_id"=>logged_in_company_id()),"id,name","","","name","ASC");
                $this->data['all_section']=$this->designation->get_list("section",array("status"=>1,"company_id"=>logged_in_company_id(),"branch_id"=>logged_in_branch_id()),"id,name","","","name","ASC");
            }
            $this->data['edit']=true;
            $this->layout->view('designation',$this->data);
        }
        else{
            show_404();
        }
    }
      /** ***************Function designation_check**********************************
    * @type            : Function
    * @function name   : designation_check
    * @description     : Unique check for Designation" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function designation_name() {
        if ($this->input->post('id') == '') {
            $exits_check = $this->designation->exits_check("designation",array("designation"=>$this->input->post('designation_name'),"branch_id"=>$this->input->post('branch_id'),"company_id"=>$this->input->post('company_id'),"section_id"=>$this->input->post('section_id')));
            if ($exits_check) {
                $this->form_validation->set_message('designation_name', "Designation Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $exits_check = $this->designation->exits_check("designation",array("designation"=>$this->input->post('designation_name'),"branch_id"=>$this->input->post('branch_id'),"company_id"=>$this->input->post('company_id'),"section_id"=>$this->input->post('section_id')), $this->input->post('id'));
            if ($exits_check) {
                $this->form_validation->set_message('designation_name', "Designation Already Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
    /** ***************Function delete**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Process "designation" data control                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null)
    {
        if(!hasPermission("designation",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->designation->get_single("marketing", array("designation_id" => $id));
        $status = 0;
        if(isset($result)) {
            setMessage("msg", "danger", "Can't Delete this");
        }else{
            $this->designation->delete("designation", array("id" => $id));
            setMessage("msg", "success", "Designation Delete Successfuly");
        }
        redirect('designation');
    }
}

/* End of file Users.php */
