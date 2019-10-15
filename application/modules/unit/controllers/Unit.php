<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MY_Model','unit',true);
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
    }
  /** ***************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : view unit view page                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function index()
  {
    if(!hasPermission("unit",VIEW)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    $this->session->set_userdata('sub_menu', 'unit');
    $this->layout->title("Unit Information");
    $this->data['all_unit']=$this->unit->get("unit","","name","ASC");
    $this->data['add']=true;
    $this->layout->view('unit',$this->data);
  }
  /** ***************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : view unit data add                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function add()
  {
    if(!hasPermission("unit",ADD)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    if($_POST)
    {
        $this->form_validation->set_rules('name', 'Unit Name', 'trim|required|callback_name');
        
        if ($this->form_validation->run() == TRUE) {
            $data['name']=$this->input->post("name");
            $this->unit->insert("unit",$data);
            setMessage("msg", "success", "Unit Add Successfully");
        } else {
            setMessage("msg", "danger", validation_errors());
        }
    }
    redirect("unit");
  }
  /** ***************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : unit update                
    *                       
    * @param           : id
    * @return          : null
    * ********************************************************** */ 
  public function edit($id=null)
  {
    if(!hasPermission("unit",EDIT)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    if($_POST)
    {
        $this->form_validation->set_rules('name', 'Unit Name', 'trim|required|callback_name');
        
        if ($this->form_validation->run() == TRUE) {
            $data['name']=$this->input->post("name");
            $this->unit->update("unit",$data,array("id"=>$id));
            setMessage("msg", "success", "Unit Updated Successfully");
        } else {
            setMessage("msg", "danger", validation_errors());
        }
        redirect("unit");
    }
    $this->session->set_userdata('sub_menu', 'unit');
    $this->layout->title("Unit");
    $this->data['all_unit']=$this->unit->get("unit","","name","ASC");
    $this->data['single']=$this->unit->get_single("unit",array("id"=>$id));
    $this->data['edit']=true;
    $this->layout->view('unit',$this->data);
  }
  public function name()
  {
    if ($this->input->post('id') == '') {
        $exits_check = $this->unit->exits_check("unit",array("name"=>$this->input->post('name')));
        if ($exits_check) {
            $this->form_validation->set_message('name', "Unit Name Aready Exits");
            return FALSE;
        } else {
            return TRUE;
        }
    } else if ($this->input->post('id') != '') {
        $exits_check = $this->unit->exits_check("unit",array("name"=>$this->input->post('name')), $this->input->post('id'));
        if ($exits_check) {
            $this->form_validation->set_message('name', "Unit Name Already Exits");
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
    * @description     : Process "unit" data delete                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function delete($id = nul)
    {
        if(!hasPermission("unit",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->unit->get_single("unit", array("id" => $id));
        if(isset($result)) {
            setMessage("msg", "success", "Unit Delete Successfuly");
            $this->unit->delete("unit", array("id" => $id));
        }
        redirect('unit');
    }
}

/* End of file Users.php */
