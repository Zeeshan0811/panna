<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {
    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Web_model',"web",true);
    }
    
    public function index()
    {
        $this->session->set_userdata('top_menu', 'home');
        $this->layout->title("Home");
        $this->data['about_us']=$this->web->get_single("web_about_us",array("id"=>1));
        $this->data['slider']=$this->web->get("web_slider","","position","ASC");
        $this->data['client']=$this->web->get("web_our_client","","position","ASC");
        $this->data['gallery']=$this->web->get_list("web_gallery",array("status"=>1),"","8","","id","DESC");
        $this->data['contact']=$this->web->get_single("web_contact_us",array("id"=>1));
        $this->layout->view("web/main",$this->data);
    }
    public function about_us()
    {
        $this->session->set_userdata('top_menu', 'about_us');
        $this->layout->title("About Us");
        $this->data['about_us']=$this->web->get_single("web_about_us",array("id"=>1));
        $this->layout->view("web/about-us",$this->data);
    }
    public function gallery()
    {
        $this->session->set_userdata('top_menu', 'gallery');
        $this->layout->title("Gallery");
        $this->data['gallery']=$this->web->get_list("web_gallery",array("status"=>1),"","","","id","DESC");
        $this->layout->view("web/gallery",$this->data);
    }
    public function client()
    {
        $this->session->set_userdata('top_menu', 'client');
        $this->layout->title("Client");
        $this->data['client']=$this->web->get("web_our_client","","position","ASC");
        $this->layout->view("web/client",$this->data);
    }
    public function contact()
    {
        $this->session->set_userdata('top_menu', 'contact');
        $this->layout->title("Contact");
        $this->data['contact']=$this->web->get_single("web_contact_us",array("id"=>1));
        $this->layout->view("web/contact-us",$this->data);
    }
    public function send_mail()
    {
        if($_POST)
        {
            $name=$this->input->post("name");
            $email=$this->input->post("email");
            $subject=$this->input->post("subject");
            $msg=$this->input->post("message");
            $this->load->library('email');
            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

            $this->email->from($email);
            $this->email->to($this->config->item("webmail"));
            $this->email->subject($subject);
            $message="From $name, <br>";
            $message.=$msg;
            $this->email->message($message);
            $this->email->send();
            echo json_encode(array("msg"=>"success"));
        }
    }
}

/* End of file Web.php */
