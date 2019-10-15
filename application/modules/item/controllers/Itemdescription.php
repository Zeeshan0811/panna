<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Itemdescription extends MY_Controller {
    public $data=array();
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model','item',true);
        $this->session->set_userdata('set_active', "inventory");
        $this->session->set_userdata('top_menu', 'inventory');
    }
  /** ***************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : view item view page                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function index()
  {
    if(!hasPermission("item_description",VIEW)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    $this->session->set_userdata('sub_menu', 'item-description');
    $this->layout->title("Item Description");
    $this->data['all_item']=$this->item->get("item","","name","ASC");
    
    
    if(is_super_admin()||is_admin())
    {
        $this->data['all_company']=$this->item->get("company","","name","ASC");
    }else{
        $this->data['all_company']=$this->item->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
    }
    $this->data['all_desc']=$this->item->all_item_description();
    // debug_r($result);
    $this->data['add']=true;
    $this->layout->view('item/item-description',$this->data);
  }
  public function view()
  {
      if($_GET)
      {
          $company_id=$this->input->get("company_id");
          $branch_id=$this->input->get("branch_id");
          $checking_array["ID.company_id"]=$company_id;
          if($branch_id!='')
          {
              $checking_array["ID.branch_id"]=$branch_id;
          }
        $data["all_desc"]=$this->item->all_item_description("",$checking_array);
        $result=$this->load->view("desc-view",$data,true);
        echo json_encode($result);
        exit;
      }
  }
  public function get_custom_code()
    {
        if($_GET)
        {
            $checking_array['company_id']=$this->input->get("company_id",true);
            $result=$this->item->get_custom_id("item_description","code",101,$checking_array);
            echo json_encode($result);
            exit;
        }
    }
  /** ***************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : view item description data add                  
    *                       
    * @param           : null
    * @return          : null
    * ********************************************************** */ 
  public function add()
  {
    if(!hasPermission("item_description",ADD)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    if($_POST)
    {
        $this->_get_validation();
        if ($this->form_validation->run() == TRUE) {
            $data=$this->_get_posted_data();
            $checking_array['company_id']=$data['company_id'];
            $data["code"]=$this->item->get_custom_id("item_description","code",101,$checking_array);
            $this->item->insert("item_description",$data);
            if($this->input->post("stock_item_desc_model")!='')
            {
                $checking_array=array(
                    "company_id"=>$data['company_id'],
                    "branch_id"=>$data['branch_id'],
                    "item_id"=>$data['item_id'],
                );
                $send_data['msg']="success";
                $send_data['result_data']=$this->item->get_list("item_description",$checking_array,"id,item_desc,code","","","item_desc","ASC");
                echo json_encode($send_data);
                exit;

            }
            setMessage("msg", "success", "Item Description Add Successfully");
        } else {
            if($this->input->post("stock_item_desc_model")!='')
            {
                $send_data['msg']="error";
                $send_data['result_data']=validation_errors();
                echo json_encode($send_data);
                exit;
            }else{

                setMessage("msg", "danger", validation_errors());
            }
        }
    }
    redirect("item/itemdescription");
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
    if(!hasPermission("item_description",EDIT)){
        setMessage("msg","warning","Permission Denied!");
        redirect('dashboard');
    }
    $single=$this->item->all_item_description($id);
    if(($single['company_id']==logged_in_company_id() && $single['branch_id']==logged_in_branch_id())|| is_super_admin() || is_admin() ){
        if($_POST)
        {
            $this->_get_validation();
            if ($this->form_validation->run() == TRUE) {
            $data=$this->_get_posted_data();
            if($data['company_id']!=$single['company_id'])
            {
                $checking_array['company_id']=$data['company_id'];
                $data["code"]=$this->item->get_custom_id("item_description","code",101,$checking_array);
            }else{
                $data['code']=$single['code'];
            }
                $this->item->update("item_description",$data,array("id"=>$id));
                setMessage("msg", "success", "Item Description Updated Successfully");
            } else {
                setMessage("msg", "danger", validation_errors());
            }
            redirect("item/itemdescription");
        }
        $this->session->set_userdata('sub_menu', 'item-description');
        $this->layout->title("Item Description");
        $this->data['all_item']=$this->item->get("item","","name","ASC");
        
        if(is_super_admin())
        {
            $this->data['all_company']=$this->item->get("company","","name","ASC");
        }else{
            $this->data['all_company']=$this->item->get_list("company",array("id"=>logged_in_company_id(),"status"=>1),"","","","name","ASC");
        }
        $this->data['all_desc']=$this->item->all_item_description();
        $this->data['single']=$single;
        // debug_r($result);
        $this->data['edit']=true;
        $this->layout->view('item/item-description',$this->data);
    }else{
        show_404();
    }
  }
  
  public function item_desc()
  {
    if ($this->input->post('id') == '') {
        $exits_check = $this->item->exits_check("item_description",array("item_desc"=>$this->input->post('item_desc'),"company_id"=>$this->input->post('company_id'),"branch_id"=>$this->input->post('branch_id'),"item_id"=>$this->input->post('item_id')));
        if ($exits_check) {
            $this->form_validation->set_message('item_desc', "Description Name Aready Exits");
            return FALSE;
        } else {
            return TRUE;
        }
    } else if ($this->input->post('id') != '') {
        $exits_check = $this->item->exits_check("item_description",array("item_desc"=>$this->input->post('item_desc'),"company_id"=>$this->input->post('company_id'),"branch_id"=>$this->input->post('branch_id'),"item_id"=>$this->input->post('item_id')), $this->input->post('id'));
        if ($exits_check) {
            $this->form_validation->set_message('item_desc', "Description Name Already Exits");
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
    * @function name   : delete
    * @description     : Process "item description" data delete                 
    *                       
    * @param           : id
    * @return          : null 
    * ********************************************************** */
    public function delete($id = nul)
    {
        if(!hasPermission("item_description",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $result = $this->item->get_single("item_description", array("id" => $id));
        if(isset($result)) {
            setMessage("msg", "success", "Delete Successfuly");
            $this->item->delete("item_description", array("id" => $id));
        }
        redirect('item/itemdescription');
    }
    
    public function _get_validation()
    {
        $this->form_validation->set_rules('company_id', 'Company Name', 'trim|required');
        $this->form_validation->set_rules('branch_id', 'Branch Name', 'trim|required');
        $this->form_validation->set_rules('item_id', 'Item Name', 'trim|required');
        $this->form_validation->set_rules('item_desc', 'Item Description', 'trim|required|callback_item_desc');
        $this->form_validation->set_rules('re_qty', 'Reorder Qty', 'trim|required');
        $this->form_validation->set_rules('purchase_price', 'Purchase Price', 'trim|required');
        $this->form_validation->set_rules('sale_price', 'Sales Price', 'trim|required');
    }
    /** ***************Function _get_posted_data**********************************
    * @type            : Function
    * @function name   : _get_posted_data
    * @description     : get Marketing data/value                  
    *                       
    * @param           : null
    * @return          : data array 
    * ********************************************************** */ 
  public function _get_posted_data()
  {
    $items=array();
    $items[]="company_id";
    $items[]="branch_id";
    $items[]="item_id";
    $items[]="item_desc";
    $items[]="re_qty";
    $items[]="purchase_price";
    $items[]="sale_price";
    $data = elements($items, $_POST);
    $data['running_year']=$this->running_year;
    return $data;
  }
}

/* End of file Users.php */
