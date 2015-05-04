<?php
/**
 * SMS
 * 
 * This is SMS helper
 * 
 * @uses sending for SMS
 * 
 * PHP version 5
 * 
 * @author Sankar <sankar.g@siriinnovations.com>
 * @author Yvakumar <yuva.kumar@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Sms {
    
    public $apiUrl = "http://bsms.slabs.mobi/spanelv2/api.php";
    
    public $apiUsername = "siriinnovation";
    
    public $apiPassword = "989875";
    
    public $messageFrom = "SCHOOL";
    
    public $to;
    
    public $message;
    
    /**
     * Constructor
     */
    public function __construct() {
        
    }
   
    /**
     * sendmessage
     * 
     * return boolean
     */
    public function sendmessage() {
        $api = $this->apiUrl . 
                "?username=" . $this->apiUsername.
                "&password=" . $this->apiPassword.
                "&to=" . $this->to.
                "&from=" . $this->messageFrom.
                "&message=".urlencode($this->message);
        //echo $api;
        $url = file_get_contents($api);
        return $url;
    }
    
    public function sendsms() {
       extract($_POST);
       $msg = "Dear Parent, ";
       $msg .= $message;
       $msg .= " Director/Principal, Tatva Global School";
       if($mailto == 'to') {
           if(!empty($mobilenumbers)) {
               foreach($mobilenumbers as $mobile) {
                   $url = "http://59.162.167.52/api/MessageCompose?admin=contact@siriinnovations.com&user=admin@tatvaglobalschool.com:D9A3G1M2T2&senderID=".urlencode('TATVAG')."&receipientno=".$mobile."&msgtxt=".urlencode($msg)."&state=4";
                   $res = file_get_contents($url);
                   $sres = explode(',', $res);
                   $sres = explode('=', $sres[0]);
                   $arr['contact_number'] = $mobile;
                   $arr['sms'] = $msg;
                   $arr['created'] = date('Y-m-d H:i:s');
                   $arr['status'] = $sres[1];
                   $ins = $this->model->insertSMS($arr);
               }
           }
       }
       else {
           if($user_list == 'all') {
               $users = $this->getAllMobileUsers();
              
               foreach ($users as $usr) {
                   $url = "http://59.162.167.52/api/MessageCompose?admin=contact@siriinnovations.com&user=admin@tatvaglobalschool.com:D9A3G1M2T2&senderID=".urlencode('TATVAG')."&receipientno=".$usr['mobile_number']."&msgtxt=".urlencode($msg)."&state=4";
                   $res = file_get_contents($url);
                   $sres = explode(',', $res);
                   $sres = explode('=', $sres[0]);
                   $arr['contact_number'] = $mobile;
                   $arr['sms'] = $msg;
                   $arr['created'] = date('Y-m-d H:i:s');
                   $arr['status'] = $sres[1];
                   $ins = $this->model->insertSMS($arr);
               }
           }
           else {
               if($user_list != 1) {
                   $msg = "Dear Staff, ";
                   $msg .= $message;
                   $msg .= " Director/Principal, Tatva Global School";
                   
               }
               $users = $this->getGroupMobileUsers($user_list);
               foreach ($users as $usr) {
                   $url = "http://59.162.167.52/api/MessageCompose?admin=contact@siriinnovations.com&user=admin@tatvaglobalschool.com:D9A3G1M2T2&senderID=".urlencode('TATVAG')."&receipientno=".$usr['mobile_number']."&msgtxt=".urlencode($msg)."&state=4";
                   $res = file_get_contents($url);
                   $sres = explode(',', $res);
                   $sres = explode('=', $sres[0]);
                   $arr['contact_number'] = $mobile;
                   $arr['sms'] = $msg;
                   $arr['created'] = date('Y-m-d H:i:s');
                   $arr['status'] = $sres[1];
                   $ins = $this->model->insertSMS($arr);
               }
           }
           
       }
       $res = explode(',', $res);
       if($res[0] == 'Status=0')
       {
           $success = "SMS sent Successfully";
           $this->session->sets("sms_addsuccess", $success);
       }
       else {
           $success = "SMS Not sent";
           $this->session->sets("sms_addfail", $success);
       }
       $this->redirect('contacts/sendmessage');
   }
    
}
/**
 * End SMS file
 * @location libs/helpers/Sms.php
 */
?>
