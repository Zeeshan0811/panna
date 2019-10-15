<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends MY_Model {

    public function get_supplier($id=null,$checking_array=null)
    {
        
        $this->db->select('S.id as supplier_id,S.*,S.name as supplier_name,
        CP.name as company_name,B.name as branch_name');
        $this->db->from('supplier as S');
        $this->db->join('company as CP', 'S.company_id = CP.id');
        $this->db->join('branch as B', 'S.branch_id = B.id');
        if($id!='')
        {
            $this->db->where("S.id",$id);
           return $this->db->get()->row_array();
        }else{
            $this->db->where($checking_array);
             return $this->db->get()->result_array();
        }
    }
    public function get_company_info($company_id,$branch_id)
    {
        $company=$this->get_single("company",array("id"=>$company_id));
        $branch=$this->get_single("branch",array("id"=>$branch_id));
        if(isset($company))
        {
            $send_data['company_name']=$company->name;
            $send_data['company_address']=$company->address;
            $send_data['logo']=$company->logo;
        }else{
            $send_data['company_name']="";
            $send_data['company_address']="";
            $send_data['logo']="";
        }
        if(isset($branch))
        {
            $send_data['branch_name']=$branch->name;
            $send_data['branch_address']=$branch->address;
        }else{
            $send_data['branch_name']="";
            $send_data['branch_address']="";
        }
        return $send_data;
    }

}

/* End of file Supplier_model.php */
