<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Marketing_model','marketing',true);
        $this->session->set_userdata('set_active', "administrator");
        $this->session->set_userdata('top_menu', 'administrator');
    }
   
   /** ***************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : marketing" view               
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
    public function index()
    {
        if(!hasPermission("marketing",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'marketing');
        $this->layout->title("Marketing Information");
        if(is_super_admin()||is_admin())
        {
            $this->data['all_company']=$this->marketing->get_list("company",array("status"=>1),"id,name","","","name","ASC");
        }else{
            $this->data['all_company']=$this->marketing->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
        }
        
        // debug_r($this->data['all_marketing']);
        $this->data['add']=true;
        $this->layout->view('marketing',$this->data);
    }
    /** ***************Function marketingAdd**********************************
    * @type            : Function
    * @function name   : marketingAdd
    * @description     : Process "marketing" data add                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function marketingAdd()
    {
        if(!hasPermission("marketing",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $this->_get_marketing_validation();
            if ($this->form_validation->run() == TRUE) {
                $data=$this->_get_marketing_posted_data();
                // debug_r($data);
                $this->marketing->insert("marketing",$data);
                if($this->input->post("stock_modal")!='')
                {
                    $checking_array=array(
                        "company_id"=>$data['company_id'],  
                        "branch_id"=>$data['branch_id'],  
                        "status"=>1,  
                        );
                    $send_data['msg']="success";
                    $send_data['result_data']=$this->marketing->get_list("marketing",$checking_array,"id,name","","","","name","ASC");
                    echo json_encode($send_data);
                    exit;
                }else{
                    $send_data['msg']="success";
                    $send_data['result_data']="Marketing Add Successfully";
                    echo json_encode($send_data);
                    exit;
                }
            } else {
                $send_data['msg']="error";
                $send_data['result_data']=validation_errors();
                echo json_encode($send_data);
                exit;
            }
        }
        redirect("marketing");
    }
    //marketing ajax view
    public function view()
    {
        if($_GET)
        {
            if(!is_super_admin()&&!is_admin())
            {
                $checking_array["M.company_id"]=logged_in_company_id();
                $checking_array["M.branch_id"]=logged_in_branch_id();
            }else{
                $company_id=$this->input->get("company_id");
                $branch_id=$this->input->get("branch_id");
                $checking_array["M.company_id"]=$company_id;
                $checking_array["M.branch_id"]=$branch_id;
            }
            $this->data['all_marketing']=$this->marketing->get_marketing("",$checking_array);
            $result=$this->load->view("marketing-view",$this->data,true);
            echo json_encode($result);
            exit;
        }
    }
    /** ***************Function marketingEdit**********************************
    * @type            : Function
    * @function name   : marketingEdit
    * @description     : Process "marketing" data update                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function marketingEdit($id=null)
    {
        if(!hasPermission("marketing",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->marketing->get_marketing($id);
        if($single['company_id']==logged_in_company_id()|| is_super_admin()||is_admin() ){
            if($_POST)
            {
                $this->_get_marketing_validation();
                if ($this->form_validation->run() == TRUE) {
                    $data=$this->_get_marketing_posted_data();
                    // debug_r($data);
                    $this->marketing->update("marketing",$data,array("id"=>$id));
                    setMessage("msg", "success", "Marketing Updated Successfully");
                } else {
                    setMessage("msg", "danger", validation_errors());
                }
                redirect("marketing");
            }
            $this->session->set_userdata('sub_menu', 'marketing');
            $this->layout->title("Marketing Information");
            if(is_super_admin()||is_admin())
            {
                $this->data['all_company']=$this->marketing->get_list("company",array("status"=>1),"id,name","","","name","ASC");
                $this->data['all_branch']=$this->marketing->get_list("branch",array("status"=>1,"company_id"=>$single['company_id']),"id,name","","","name","ASC");
                $this->data['all_designation']=$this->marketing->get_list("designation",array("status"=>1,"company_id"=>$single['company_id'],"branch_id"=>$single['branch_id']),"id,designation","","","designation","ASC");
            }else{
                $this->data['all_company']=$this->marketing->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"id,name","","","name","ASC");
                $this->data['all_branch']=$this->marketing->get_list("branch",array("status"=>1,"company_id"=>logged_in_company_id()),"id,name","","","name","ASC");
                $this->data['all_designation']=$this->marketing->get_list("designation",array("status"=>1,"company_id"=>logged_in_company_id(),"branch_id"=>logged_in_branch_id()),"id,designation","","","designation","ASC");
            }
            $this->data['single']=$single;
            // debug_r($this->data['all_marketing']);
            $this->data['edit']=true;
            $this->layout->view('marketing',$this->data);
        }else{
            show_404();
        }
    }
    /** ***************Function delete**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Process "delete" data control                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null)
    {
        if(!hasPermission("marketing",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->marketing->get_single("customer", array("marketing_id" => $id));
        if(isset($result)) {
            setMessage("msg", "danger", "Can't Delete this");
        }else{
            $this->marketing->delete("marketing", array("id" => $id));
            setMessage("msg", "success", "Marketing Delete Successfuly");

        }
        redirect('marketing');
    }
    public function _get_marketing_validation()
    {
        $this->form_validation->set_rules('marketing_name', 'Name', 'trim|required|callback_marketing_name');
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
        $this->form_validation->set_rules('present_address', 'Present Address', 'trim|required');
        $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
        $this->form_validation->set_rules('tel', 'Telephone No.', 'trim');
            // $this->form_validation->set_rules('section_id', 'Section Name', 'trim|required');
    }
    /** ***************Function marketing name check**********************************
  * @type            : Function
  * @function name   : marketing_name
  * @description     : Unique check for Marketing Name field" data/value                  
  *                       
  * @param           : null
  * @return          : boolean true/false 
  * ********************************************************** */ 
  public function marketing_name() {
      if ($this->input->post('id') == '') {
          $exits_check = $this->marketing->exits_check("marketing",array("name"=>$this->input->post('marketing_name'),"branch_id"=>$this->input->post('branch_id'),"company_id"=>$this->input->post('company_id')));
          if ($exits_check) {
              $this->form_validation->set_message('marketing_name', "Name Aready Exits");
              return FALSE;
          } else {
              return TRUE;
          }
      } else if ($this->input->post('id') != '') {
          $exits_check = $this->marketing->exits_check("marketing",array("name"=>$this->input->post('marketing_name'),"branch_id"=>$this->input->post('branch_id'),"company_id"=>$this->input->post('company_id')), $this->input->post('id'));
          if ($exits_check) {
              $this->form_validation->set_message('marketing_name', "Name Already Exits");
              return FALSE;
          } else {
              return TRUE;
          }
      } else {
          return TRUE;
      }
  }
  /** ***************Function _get_marketing_posted_data**********************************
* @type            : Function
* @function name   : _get_marketing_posted_data
* @description     : get Marketing data/value                  
*                       
* @param           : null
* @return          : data array 
* ********************************************************** */ 
  public function _get_marketing_posted_data()
  {
    $items=array();
    $items[]="company_id";
    $items[]="branch_id";
    $items[]="designation_id";
    $items[]="present_address";
    $items[]="permanent_address";
    $items[]='mobile';
    $items[]="tel";
    $data = elements($items, $_POST);
    $data['name']=$this->input->post("marketing_name");
    return $data;
  }
}

/* End of file Users.php */
