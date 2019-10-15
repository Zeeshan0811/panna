<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
    public $data=array();
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model',"admin",true);
        $this->session->set_userdata('set_active', "web");
        $this->session->set_userdata('top_menu', 'web');
    }
    /**
     * slider part
     */
    public function slider()
    {
        if(!hasPermission("slider",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'slider');
        $this->layout->title("Slider");
        $this->data['all_slider']=$this->admin->get("web_slider","","position","ASC");
        $this->data['add']=true;
        $this->layout->view("web_admin/slider",$this->data);
    }
    public function slider_add()
    {
        if(!hasPermission("slider",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data['title']=$this->input->post("title");
            $data['position']=$this->input->post("order");
            $data['details']=$this->input->post("details");
            if ($_FILES['image']['name']) {
                $path="slider";
                $url="admin/slider";
                $table="web_slider";
                $width=1920;
                $height=1200;
                $max_size=1024;
                $data['image'] ="uploads/slider/" . $this->_upload_picture($path,$url,$table,$width,$height,$max_size);
            }
            $insert_id=$this->admin->insert("web_slider",$data);
            if($insert_id)
            {
                setMessage("msg","success","Slider Add Successfully!");
            }
            redirect("slider");
        }
    }
    public function sliderEdit($id=null)
    {
        if(!hasPermission("slider",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->admin->get_single("web_slider",array("id"=>$id));
        if(isset($single))
        {
            if($_POST)
            {
                $data['title']=$this->input->post("title");
                $data['position']=$this->input->post("order");
                $data['details']=$this->input->post("details");
                if ($_FILES['image']['name']) {
                    $path="slider";
                    $url="admin/slider";
                    $table="web_slider";
                    $width=1000;
                    $height=318;
                    $max_size=500;
                    $data['image'] ="uploads/slider/" . $this->_upload_picture($path,$url,$table,$width,$height,$max_size);
                }
                $this->admin->update("web_slider",$data,array("id"=>$id));
                setMessage("msg","success","Slider Updated Successfully!");
                redirect("slider");
            }
            $this->session->set_userdata('sub_menu', 'slider');
            $this->layout->title("Slider");
            $this->data['all_slider']=$this->admin->get("web_slider","","position","ASC");
            $this->data['edit']=true;
            $this->data['single']=$single;
            $this->layout->view("web_admin/slider",$this->data);
        }else{
            show_404();
        }
    }
    public function sliderDelete($id=null)
    {
        if(!hasPermission("slider",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->admin->get_single("web_slider",array("id"=>$id));
        if(isset($single))
        {
            @unlink($single->image);
            $this->admin->delete("web_slider",array("id"=>$id));
            setMessage("msg","success","Slider Delete Successfully!");
            redirect("slider");
        }else{
            show_404();
        }
    }

    /**
     * about us
     */
    public function about_us()
    {
        if(!hasPermission("about_us",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data["description"]=$this->input->post("about_us");
            $this->admin->update("web_about_us",$data,array("id"=>1));
            setMessage("msg","success","About Us Updated Successfully!");
            redirect("about-us");
        }
        $this->session->set_userdata('sub_menu', 'about-us');
        $this->layout->title("About Us");
        $this->data['single']=$this->admin->get_single("web_about_us",array("id"=>1));
        $this->layout->view("web_admin/about-us",$this->data);
    }
      /**
     * gallery part
     */
    public function gallery()
    {
        if(!hasPermission("gallery",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'gallery');
        $this->layout->title("gallery");
        $this->data['all_gallery']=$this->admin->get("web_gallery","","id","DESC");
        $this->data['add']=true;
        $this->layout->view("web_admin/gallery",$this->data);
    }
    public function gallery_add()
    {
        if(!hasPermission("gallery",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data['title']=$this->input->post("title");
            if ($_FILES['image']['name']) {
                $path="gallery";
                $thumb=TRUE;
                $url="gallery";
                $table="web_gallery";
                $width=570;
                $height=400;
                $max_size=500;
                $data['image'] ="uploads/gallery/" . $this->_upload_picture($path,$url,$table,$width,$height,$max_size,$thumb);
                $image_thumb = explode(".",$data['image']);
                $data['image_thumb'] =$image_thumb[0]."_thumb".".".end($image_thumb);
            }
            $insert_id=$this->admin->insert("web_gallery",$data);
            if($insert_id)
            {
                setMessage("msg","success","Gallery Add Successfully!");
            }
            redirect("gallery");
        }
    }
    public function galleryEdit($id=null)
    {
        if(!hasPermission("gallery",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->admin->get_single("web_gallery",array("id"=>$id));
        if(isset($single))
        {
            if($_POST)
            {
                $data['title']=$this->input->post("title");
                if ($_FILES['image']['name']) {
                    $path="gallery";
                    $thumb=TRUE;
                    $url="gallery";
                    $table="web_gallery";
                    $width=570;
                    $height=400;
                    $max_size=500;
                    $data['image'] ="uploads/gallery/" . $this->_upload_picture($path,$url,$table,$width,$height,$max_size,$thumb);
                    $image_thumb = explode(".",$data['image']);
                    $data['image_thumb'] =$image_thumb[0]."_thumb".".".end($image_thumb);
                }
                $this->admin->update("web_gallery",$data,array("id"=>$id));
                setMessage("msg","success","Gallery Updated Successfully!");
                redirect("gallery");
            }
            $this->session->set_userdata('sub_menu', 'gallery');
            $this->layout->title("gallery");
            $this->data['all_gallery']=$this->admin->get("web_gallery","","id","DESC");
            $this->data['edit']=true;
            $this->data['single']=$single;
            $this->layout->view("web_admin/gallery",$this->data);
        }else{
            show_404();
        }
    }
    public function galleryDelete($id=null)
    {
        if(!hasPermission("gallery",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->admin->get_single("web_gallery",array("id"=>$id));
        if(isset($single))
        {
            @unlink($single->image);
            @unlink($single->image_thumb);
            $this->admin->delete("web_gallery",array("id"=>$id));
            setMessage("msg","success","Gallery Delete Successfully!");
            redirect("gallery");
        }else{
            show_404();
        }
    }
        /**
     * client part
     */
    public function client()
    {
        if(!hasPermission("our_client",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $this->session->set_userdata('sub_menu', 'our-client');
        $this->layout->title("Client");
        $this->data['all_client']=$this->admin->get("web_our_client","","position","ASC");
        $this->data['add']=true;
        $this->layout->view("web_admin/our-client",$this->data);
    }
    public function client_add()
    {
        if(!hasPermission("client",ADD)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data['title']=$this->input->post("title");
            $data['position']=$this->input->post("order");
            if ($_FILES['image']['name']) {
                $path="client";
                $url="our-client";
                $table="web_our_client";
                $width=310;
                $height=120;
                $max_size=200;
                $data['image'] ="uploads/client/" . $this->_upload_picture($path,$url,$table,$width,$height,$max_size);
            }
            $insert_id=$this->admin->insert("web_our_client",$data);
            if($insert_id)
            {
                setMessage("msg","success","Our Client Add Successfully!");
            }
            redirect("our-client");
        }
    }
    public function clientEdit($id=null)
    {
        if(!hasPermission("client",EDIT)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->admin->get_single("web_our_client",array("id"=>$id));
        if(isset($single))
        {
            if($_POST)
            {
                $data['title']=$this->input->post("title");
                $data['position']=$this->input->post("order");
                if ($_FILES['image']['name']) {
                    $path="client";
                    $url="our-client";
                    $table="web_our_client";
                    $width=310;
                    $height=120;
                    $max_size=200;
                    $data['image'] ="uploads/client/" . $this->_upload_picture($path,$url,$table,$width,$height,$max_size);
                }
                $this->admin->update("web_our_client",$data,array("id"=>$id));
                setMessage("msg","success","Our Client Updated Successfully!");
                redirect("our-client");
            }
            $this->session->set_userdata('sub_menu', 'our-client');
            $this->layout->title("Client");
            $this->data['all_client']=$this->admin->get("web_our_client","","position","ASC");
            $this->data['edit']=true;
            $this->data['single']=$single;
            $this->layout->view("web_admin/our-client",$this->data);
        }else{
            show_404();
        }
    }
    public function clientDelete($id=null)
    {
        if(!hasPermission("client",DELETE)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        $single=$this->admin->get_single("web_our_client",array("id"=>$id));
        if(isset($single))
        {
            @unlink($single->image);
            $this->admin->delete("web_our_client",array("id"=>$id));
            setMessage("msg","success","Our Client Delete Successfully!");
            redirect("our-client");
        }else{
            show_404();
        }
    }
     /**
     * contact us
     */
    public function contact()
    {
        if(!hasPermission("contact_us",VIEW)){
            setMessage("msg","warning","Permission Denied!");
            redirect('dashboard');
        }
        if($_POST)
        {
            $data["name"]=$this->input->post("name");
            $data["address"]=$this->input->post("address");
            $data["email"]=$this->input->post("email");
            $data["mobile"]=$this->input->post("mobile");
            $data["web"]=$this->input->post("web");
            $data["facebook"]=$this->input->post("facebook");
            $data["twitter"]=$this->input->post("twitter");
            $data["linkedin"]=$this->input->post("linkedin");
            $this->admin->update("web_contact_us",$data,array("id"=>1));
            setMessage("msg","success","Contact Us Updated Successfully!");
            redirect("contact-us");
        }
        $this->session->set_userdata('sub_menu', 'contact-us');
        $this->layout->title("Contact Us");
        $this->data['single']=$this->admin->get_single("web_contact_us",array("id"=>1));
        $this->layout->view("web_admin/contact-us",$this->data);
    }
    public function _upload_picture($path,$url,$table,$width,$height,$max_size,$thumb=FALSE)
    {
        $name = $_FILES['image']['name'];
        $arr = explode('.', $name);
        $ext = end($arr);
        $imageName = time() .".$ext";
        $config['upload_path']          = './uploads/'.$path;
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['file_name']            = $imageName;
        $config['max_size']             = $max_size;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            setMessage("msg", "danger", "Image" . $this->upload->display_errors());
            redirect($url);
        } else {
            $this->load->library('image_lib');
            $config['image_library']  = 'gd2';
            $config['source_image'] = './uploads/'.$path."/" . $imageName;
            $config['create_thumb']   = $thumb;
            $config['maintain_ratio'] = TRUE;
            $config['width']          = $width;
            $config['height']         = $height;
            if(!$thumb)
            $config['new_image']      = './uploads/'.$path."/" . $imageName;
            $this->image_lib->initialize($config);
            if ($this->image_lib->resize()) {
                $this->image_lib->clear();
            }
            if ($this->input->post('id')) {
                if($thumb){
                    $prev_photo = $this->admin->get_single($table, array("id" => $this->input->post('id')));
                    @unlink($prev_photo->image);
                    @unlink($prev_photo->image_thumb);
                }else{
                    $prev_photo = $this->admin->get_single($table, array("id" => $this->input->post('id')))->image;
                    @unlink($prev_photo);
                }
            }
            return $imageName;
        }
    }

}

/* End of file Admin.php */
