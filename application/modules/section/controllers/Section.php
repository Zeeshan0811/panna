<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Section_model','section',true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
    /** ***************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : sesction" view               
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
    public function index()
    {
        if(!hasPermission("section",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'section');
        $this->layout->title("Manage Section");
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->section->get_list("company",array("status"=>1),"id,name","","","name","ASC");
        }else{
            $this->data['all_company']=$this->section->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
        }
        $this->data['add']=true;
        $this->layout->view('section',$this->data);
    }
    /** ***************Function section_add**********************************
    * @type            : Function
    * @function name   : section_add
    * @description     : Process "section" data add                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function sectionadd()
    {
        if(!hasPermission("section",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
            $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required|callback_section_name');
            
            if ($this->form_validation->run() == TRUE) {
                $data['company_id']=$this->input->post("company_id");
                $data['branch_id']=$this->input->post("branch_id");
                $data['name']=$this->input->post("section_name");
                $data['running_year']=$this->running_year;
                $this->section->insert("section",$data);
                $send_data['msg']="success";
                $send_data['success']="Section Add Successfully";
                echo json_encode($send_data);
                exit;
            } else {
                $send_data['msg']=validation_errors();
                echo json_encode($send_data);
                exit;
            }
        }
        redirect("section");
    }
     //secion ajax view
     public function view()
     {
         if($_GET)
         {
             if(!is_super_admin()&&!is_admin())
             {
                 $checking_array["S.company_id"]=logged_in_company_id();
                 $checking_array["S.branch_id"]=logged_in_branch_id();
             }else{
                 $company_id=$this->input->get("company_id");
                 $branch_id=$this->input->get("branch_id");
                 $checking_array["S.company_id"]=$company_id;
                 $checking_array["S.branch_id"]=$branch_id;
             }
             $data['all_section']=$this->section->get_section("",$checking_array);
             $result=$this->load->view("section-view",$data,true);
             echo json_encode($result);
             exit;
         }
     }
    /** ***************Function section_edit**********************************
    * @type            : Function
    * @function name   : section_edit
    * @description     : Process "section" data edit                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function sectionedit($id=null)
    {
        if(!hasPermission("section",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->section->get_section($id);
        if($single['company_id']==logged_in_company_id()|| is_super_admin()||is_admin() ){

            if($_POST)
            {
                $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
                $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
                $this->form_validation->set_rules('section_name', 'Section Name', 'trim|required|callback_section_name');
                
                if ($this->form_validation->run() == TRUE) {
                    $data['company_id']=$this->input->post("company_id");
                    $data['branch_id']=$this->input->post("branch_id");
                    $data['name']=$this->input->post("section_name");
                    $this->section->update("section",$data,array("id"=>$id));
                    setMessage("msg", "success", "Section Updated Successfully");
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("section");
            }
            $this->session->set_userdata('sub_menu', 'section');
            $this->layout->title("Manage Section");
            if(is_super_admin()||is_admin())
            {
                $this->data['all_company']=$this->section->get_list("company",array("status"=>1),"id,name","","","name","ASC");
                $this->data['all_branch']=$this->section->get_list("branch",array("status"=>1,"company_id"=>$single['company_id']),"id,name","","","name","ASC");
                
            }else{
                $this->data['all_company']=$this->section->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
                $this->data['all_branch']=$this->section->get_list("branch",array("status"=>1,"company_id"=>logged_in_company_id()),"id,name","","","name","ASC");
            }
            $this->data['single']=$single;
            $this->data['edit']=true;
            $this->layout->view('section',$this->data);
        }
        else{
            show_404();
        }
    }
    /** ***************Function section_name**********************************
    * @type            : Function
    * @function name   : section_name
    * @description     : Unique check for branch name" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function section_name() {
        if ($this->input->post('id') == '') {
        $section_name=$this->section->exits_check("section",array("name"=>$this->input->post('section_name'),"company_id"=>$this->input->post("company_id"),"branch_id"=>$this->input->post("branch_id")));
            if ($section_name) {
                $this->form_validation->set_message('section_name', "Section Name Aready Exits");
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $section_name=$this->section->exits_check("section",array("name"=>$this->input->post('section_name'),"company_id"=>$this->input->post("company_id"),"branch_id"=>$this->input->post("branch_id")),$this->input->post('id'));
            if ($section_name) {
                $this->form_validation->set_message('section_name', "Section Name Already Exits");
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
    * @description     : Process "section" data delete                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null)
    {
        if(!hasPermission("section",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->section->get_single("designation", array("section_id" => $id));
        if(isset($result)) {
            setMessage("msg", "danger", "Can't Delete this");
        }else{
            $this->section->delete("section", array("id" => $id));
            setMessage("msg", "success", "Section Delete Successfuly");

        }
        redirect('section');
    }
}

/* End of file Users.php */
