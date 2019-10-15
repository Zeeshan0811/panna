<?php
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public $running_year="";
    public $company_name="";
    public $address="";
    public $logo="";
    public $authorize_signature="";
    public $receiver_signature="";
    function __construct() {
        parent::__construct();
       $setting=setting_info();
       $this->running_year=$setting->running_session;
       $this->company_name=$setting->company_name;
       $this->logo=$setting->logo;
       $this->authorize_signature=$setting->signature;
       $this->receiver_signature=$setting->receiver_signature;
       $this->address=$setting->address;
       $module=$this->session->userdata("top_menu");
       date_default_timezone_set($setting->time_zone);
       if (!logged_in_user_id()) {
           redirect();
           exit;
        }
        if(!hasActive($module))
        {
            show_404();
            exit;
        }
    }
}
