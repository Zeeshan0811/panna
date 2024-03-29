<?php

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('logged_in_user_id')) {

    function logged_in_user_id() {
        $logged_in_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('id') && $CI->session->userdata('role_id')):
            $logged_in_id = $CI->session->userdata('id');
        endif;
        return $logged_in_id;
    }

}
if (!function_exists('logged_in_name')) {

    function logged_in_name() {
        $logged_in_name = '';
        $CI = & get_instance();
        if ($CI->session->userdata('id') && $CI->session->userdata('role_id')):
            if (logged_in_role_name() == 'Super Admin'):
                $logged_in_name="Super Admin";
            else:
                $name=$CI->db->get_where("admin",array("id"=>$CI->session->userdata('id')))->row_array()['name'];
                $logged_in_name = $name;
            endif;
        endif;
        return $logged_in_name;
    }

}
if (!function_exists('logged_in_company_id')) {
    function logged_in_company_id() {
        $logged_in_company_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('company_id') && $CI->session->userdata('role_id')):
           $logged_in_company_id=$CI->session->userdata('company_id');
        endif;
        return $logged_in_company_id;
    }
}
if (!function_exists('logged_in_branch_id')) {
    function logged_in_branch_id() {
        $logged_in_branch_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('branch_id') && $CI->session->userdata('role_id')):
           $logged_in_branch_id=$CI->session->userdata('branch_id');
        endif;
        return $logged_in_branch_id;
    }
}

if (!function_exists('logged_in_role_id')) {

    function logged_in_role_id() {
        $logged_in_role_id = 0;
        $CI = & get_instance();
        if ($CI->session->userdata('role_id')):
            $logged_in_role_id = $CI->session->userdata('role_id');
        endif;
        return $logged_in_role_id;
    }

}
if (!function_exists('logged_in_role_name')) {

    function logged_in_role_name() {
        $logged_in_role_name = '';
        $CI = & get_instance();
        if ($CI->session->userdata('role_id') && $CI->session->userdata('role_name')):
            $logged_in_role_name=$CI->session->userdata('role_name');
        endif;
        return $logged_in_role_name;
    }
}
if (!function_exists('is_super_admin')) {

    function is_super_admin() {
        if(logged_in_role_name() === 'Super Admin'):
            return true;
        else:
            return false;
        endif;
    }
}
if (!function_exists('is_admin')) {

    function is_admin() {
        if(logged_in_role_name() === 'Admin'):
            return true;
        else:
            return false;
        endif;
    }
}
if (!function_exists('hasPermission')) {

    function hasPermission($module,$permission) {
        $CI = & get_instance();
        $module=trim($module);
        $role_id=$CI->session->userdata("role_id");
        $CI->load->model("Auth_model",'auth',true);
        $getrole=$CI->auth->get_single("roles",array("id"=>$role_id));
        if($getrole->name=="Super Admin")
        {
            return true;
        }
        $CI->db->select('PC.short_code,RP.*');
        $CI->db->from('permission_category as PC');
        $CI->db->join('roles_permissions as RP', 'PC.id = RP.perm_cat_id', 'left');
        $CI->db->where('PC.short_code', $module);
        $CI->db->where('RP.role_id', $role_id);
        $CI->db->where('RP.'.$permission, "1");
        $count=$CI->db->get()->num_rows();
        if($count>0){
            return true;
        }
        else{
            return false;
        }  
    }

}
if (!function_exists('hasActive')) {

    function hasActive($module) {
        $CI = & get_instance();
        $module=trim($module);
        $role_id=$CI->session->userdata("role_id");
        $CI->load->model("Auth_model",'auth',true);
        $getrole=$CI->auth->get_single("roles",array("id"=>$role_id));
        if($getrole->name=="Super Admin")
        {
            return true;
        }
        $count=$CI->auth->get_single("permission_group",array("short_code"=>$module,"is_active"=>1));
        if(isset($count)){
            return true;
        }
        else{
            return false;
        }  
    }

}

if (!function_exists('setMessage')) {

    function setMessage($key,$class,$message) {
        $CI = & get_instance();
        $CI->session->set_flashdata($key,'<div class="alert alert-'.$class.'">'.$message.'</div>');
        return true;
    }

}
if (!function_exists('active_link')) {

    function set_Topmenu($top_menu_name) {
        $CI = get_instance();
        $session_top_menu = $CI->session->userdata('top_menu');
        if ($session_top_menu == $top_menu_name) {
            return 'active';
        }
        return "";
    }

    function set_Submenu($sub_menu_name) {
        $CI = get_instance();
        $session_sub_menu = $CI->session->userdata('sub_menu');
        if ($session_sub_menu == $sub_menu_name) {
            return 'active';
        }
        return "";
    }
    function set_Multilevel($name) {
        $CI = get_instance();
        $session_sub_menu = $CI->session->userdata('multi_level');
        if ($session_sub_menu == $name) {
            return 'active';
        }
        return "";
    }
    function setActive($name) {
        $CI = get_instance();
        $set_active = $CI->session->userdata('set_active');
        if ($set_active == $name) {
            return true;
        }
    }

}
if(!function_exists("set_loging_agent")){
    function set_loging_agent()
    {
        $CI =& get_instance();
        
        $CI->load->library('user_agent');

		if ($CI->agent->is_browser())
		{
				$agent = $CI->agent->browser().' '.$CI->agent->version();
		}
		elseif ($CI->agent->is_robot())
		{
				$agent = $CI->agent->robot();
		}
		elseif ($CI->agent->is_mobile())
		{
				$agent = $CI->agent->mobile();
		}
		else
		{
				$agent = 'Unidentified User Agent';
		}

		return $agent.$CI->agent->platform();
    }
    
}
if(!function_exists("setting_info")){
    function setting_info()
    {
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('setting');
        $CI->db->order_by('id', 'desc');
        $CI->db->limit(1);
        return $CI->db->get()->row();
    }
}
if(!function_exists("all_menu")){
    function all_menu()
    {
        $CI =& get_instance();
        
        $CI->db->select('*');
        $CI->db->from('permission_group');
        $CI->db->order_by('position', 'ASC');
        return $CI->db->get()->result_array();
    }
}
if(!function_exists("submenu")){
    function submenu()
    {
        $CI =& get_instance();
        $CI->load->model('MY_Model',"admin",true);
        return $CI->admin->get_menu();
    }
}
if(!function_exists("get_submenu")){
    function get_submenu($menu_code)
    {
        $CI =& get_instance();
        $CI->load->model('MY_Model',"admin",true);
        return $CI->admin->get_submenu($menu_code);
    }
}
if(!function_exists("breadcrumbs"))
{
    function breadcrumbs($home = 'Home')
    {
        global $page_title; //global varable that takes it's value from the page that breadcrubs will appear on. Can be deleted if you wish, but if you delete it, delete also the title tage inside the <li> tag inside the foreach loop.
        $breadcrumb  = '<ol class="breadcrumb pull-right">';
        $root_domain = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
        $breadcrumbs = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        // $breadcrumb .= '<li><i class="fa fa-home"></i><a href="' . $root_domain . '" title="Home Page"><span>' . $home . '</span></a></li>';
        foreach ($breadcrumbs as $crumb) {
            $link = ucwords(str_replace(array(".php", "-", "_"), array("", " ", " "), $crumb));
            $root_domain .=  $crumb . '/';
            $breadcrumb .= '<li><a href="' . $root_domain . '" title="' . $page_title . '"><span>' . $link . '</span></a></li>';
        }
        $breadcrumb .= '</ol>';
        return $breadcrumb;
    }
}
if(!function_exists("numbertowords"))
{
    function numbertowords($num)
    {
        $CI =& get_instance();
        $CI->load->library("Numbertowords");
        return $CI->numbertowords->convert_number($num);
    }
}
if(!function_exists("social"))
{
    function social()
    {
        $CI =& get_instance();
        return $CI->db->get_where("web_contact_us",array("id"=>1))->row_array();
    }
}
if(!function_exists("set_check_box"))
{
    function set_check_box($short_code)
    {
        $CI =& get_instance();
        $result=$CI->db->get_where("permission_category",array("short_code"=>$short_code,"status"=>1))->num_rows();
        if($result==1){
            return "checked";
        }else{
            return "";
        }

    }
}

if (!function_exists('textshorten')) {

    function textshorten($text,$limit=400){
        $text=$text." ";
        $text=substr($text,0,$limit);
        $text=substr($text,0,strrpos($text, ' '));
        return $text=$text." .....";
    }
}