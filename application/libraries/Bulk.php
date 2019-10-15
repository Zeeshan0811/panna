<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(0);
class Bulk {

    public $username='';
    public $password='';
    public $url='';
    public $status='';
    public $type='';
    public $api_key='';
    public $sender_id='';

    public function __construct() {
        $ci = & get_instance();   
        $ci->db->select('S.*');
        $ci->db->from('sms_settings AS S');     
        $setting = $ci->db->get()->row_array();
        if(count($setting)>0)
        {
            $this->api_key = $setting['api_key'];
            $this->sender_id = $setting['sender_id'];
            $this->type = $setting['type'];
            $this->url = $setting['url'];
            $this->status = $setting['status'];
        }
    }
    
    public function send($to, $message) {
        $returnmsg='';
        if($this->status=="enabled")
        {
            $result = $this->send_message($to,$message);
            switch ($result) {
                case '1101':
                $returnmsg="Success";
                break;
                case '1011':
                    $returnmsg="Invalid User Id";
                    break;
                case '1010':
                    $returnmsg="Invalid User & Password";
                    break;
                case '1009':
                    $returnmsg="Message Type Not Set (text/unicode)";
                    break;
                case '1008':
                    $returnmsg="Message is empty";
                    break;
                case '1007':
                    $returnmsg="Balance Insufficient";
                    break;
                case '1006':
                    $returnmsg="Internal Error";
                    break;
                case '1005':
                    $returnmsg="Internal Error";
                    break;
                case '1004':
                    $returnmsg="SPAM Detected";
                    break;
                case '1003':
                    $returnmsg="API Not Found";
                    break;
                    $returnmsg="Empty Number";
                    break;
                case '1002':
                    $returnmsg="Sender Id/Masking Not Found";
                    break;
                default:
                    $returnmsg="Server Not Responsed";
                    break;
            }
        }
        else
        {
            $returnmsg= $this->status;
        }
        return $returnmsg;
    }

    public function send_message($to,$post_body) {
            $data= array(
            'api_key'=>"$this->api_key",
            'type'=>"$this->type",
            'contacts'=>"$to",
            'senderid'=>"$this->sender_id",
            'msg'=>"$post_body"
            );

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$this->url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            //$p = explode("|",$smsresult);
            //$sendstatus = $p[0];
            return $smsresult;
    }   

}
