<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Controller : Signin
* Site name :schooladmit
* Developing for Signin page
* Company : siri innovations
* @category Signin
* @package Signin
* @author Original Author <yuva.kumar@siriinnovations.com>
* @author Another Author <phpguidance@gmail.com>
* @copyright 2012-2013 The PHP Group
* @license http://www.php.net/license/3_01.txt PHP License 3.01
* @link http://www.schooladmit.com/
* PHP version 5
*/
class Signin extends MY_Controller 
{
    /**
    * __construct
    * Load SigninModel 
    *
    * @access 	public
    */
    public function __construct() {
        parent::__construct();
		if($this->session->userdata('adminuser_id'))
                redirect();
		//$this->config->load('google');
                $this->LoadHelper('google');
                
		parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
                //$this->load->library('Facebook', array("appId"=>"165816590192864", "secret"=>"fb44f75dc923f0f7717bfaefe44093d9"));
		//$this->user = $this->facebook->getUser();
		$this->load->model('SigninModel'); 
		//$this->load->helper('cookie');
		//$this->load->helper('url');
		
		require SITEURL .'third_party/src/apiClient.php';
		require SITEURL .'third_party/src/contrib/apiOauth2Service.php';
		$cache_path = $this->config->item('cache_path');
		$GLOBALS['apiConfig']['ioFileCache_directory'] = ($cache_path == '') ? APPPATH .'cache/' : $cache_path;
		
		$this->client = new apiClient();
		$this->client->setApplicationName($this->config->item('application_name', 'googleplus'));
		$this->client->setClientId($this->config->item('client_id', 'googleplus'));
		$this->client->setClientSecret($this->config->item('client_secret', 'googleplus'));
		$this->client->setRedirectUri($this->config->item('redirect_uri', 'googleplus'));
		$this->client->setDeveloperKey($this->config->item('api_key', 'googleplus'));
		
		$this->oauth2 = new apiOauth2Service($this->client);
		
		        
    }
    
    /**
    * Signin index
    *
    * @access 	public
    */
    public function index() {
		
        if($this->session->userdata('userId')){

             $user_profile = $this->facebook->api('/me');
        }else {
             $url = current_url()."/"."fbLoginSubmit";
             if(strpos($url,'/20')){
             $myurl = current_url()."/"."fbLoginSubmit/";
             $this->session->set_userdata('fbv', '1');
             $myurl = str_replace("/20","", $myurl);

             }else {
                     $myurl = current_url()."/"."fbLoginSubmit";
             }
             $data['fbUrl'] = $this->facebook->getLoginUrl(array('scope' => 'email', 'redirect_uri' => $myurl));
             $data['auth'] = $this->client->createAuthUrl();

       }
		
        $data['title'] = "Schooladmit Login";
        $data['myurl'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '' ;
        $data['ls'] = $this->uri->segment(2);
        $this->load->view('headerscript', $data);
        $this->load->view('topheader');
        $this->load->view('signin',$data);
        $this->load->view('ajax_views/popups');
        $this->load->view('footer');		  	
    }
    
    /**
    * loginSubmit
    *
    * @access 	public
    */
    public function loginSubmit() {
        
		$username = $this->input->post('username');
        $password = $this->input->post('password');				
        $myUrl = $this->input->post('myurl');  
        $ls = $this->input->post('ls'); 
		
		if($this->input->post('rememberme') =='1') { 
		$this->input->set_cookie('username', $username, time() + (60*60*24*10));
		$this->input->set_cookie('password', $password, time() + (60*60*24*10));
		}
		else { 
		$this->input->set_cookie('username', 0,  time()-1000);
		$this->input->set_cookie('password', 0,  time()-1000);
		} 
		
		$result = $this->SigninModel->processLogin($username, $password);		
        if($result) {
            $sessionArray = array();
            foreach($result as $row)
            {
                $sessionArray = array(
                      'userId' => $row->userId,
                      'username' => $row->primaryEmail
                );
            }			 
            $this->session->set_userdata($sessionArray);
           if(!empty($ls)){
                redirect('listschool');
            } else {
                redirect($myUrl); 	
            }
        }
        else {
            $data['loginerror'] = "Not a valid email/password.";
            $this->load->view('headerscript', $data);
            $this->load->view('topheader');
            $this->load->view('signin',$data);
            $this->load->view('ajax_views/popups');
            $this->load->view('footer');
        }
    }
	
	 public function fbLoginSubmit() {
		 
		 
		 
		 if($this->user) {
			
				$user_profile = $this->facebook->api('/me');
				//echo "<pre>"; print_r($this->facebook->getLoginUrl()); exit;
				
				$fbuserIdCheck = $this->SigninModel->checkFbUserId($user_profile['id']);
				if($fbuserIdCheck){
				
				
				$logoutFbUrl = $this->facebook->getLogoutUrl(array("next"=>base_url()."logout"));
				
				$sessionArray = array(
				  'userId' => $user_profile['id'],
				  'username' => $user_profile['email'],
				  'fblogin'=>'1',
				  'logoutUrl'=>$logoutFbUrl
				);
				$this->session->set_userdata($sessionArray);
				 $fb = $this->session->userdata('fbv');
				if($fb == 1){
				redirect(base_url()."listschool");
				}else {
					redirect(base_url()."school");
				}
				
				}else {
				   
				    $pass = $this->randomPassword();
                    $passSave = $pass."@Si9#ri";
					$formValues['userId'] = rand(123456789,987654321);
					$formValues['primaryEmail'] =$user_profile['email'];
					$formValues['fbId'] =$user_profile['id'];
					$formValues['userName'] =$user_profile['username'];
					$formValues['password'] =$passSave;
					$formValues['firstName'] =$user_profile['first_name'];
					$formValues['lastName'] =$user_profile['last_name'];
				   	$result= $this->SigninModel->processFbRegister($formValues);
					$logoutFbUrl = $this->facebook->getLogoutUrl(array("next"=>base_url()."logout"));
					
				 $sessionArray = array(
				  'userId' => $user_profile['id'],
				  'username' => $user_profile['email'],
				  'fblogin'=>'1',
				  'logoutUrl'=>$logoutFbUrl
				 );
				 $this->session->set_userdata($sessionArray);
				 $fb = $this->session->userdata('fbv');
				if($fb == '1'){
				redirect(base_url()."listschool");
				}else {
					redirect(base_url()."school");
				}
				
				
				
				 }
			
		 
	 }
	 }
	 
	 public function googleLoginSubmit() {
		
		$code = $this->input->get('code');
		 $this->client->authenticate();
		 $data1=$this->client->getAccessToken();
		 $user = $this->oauth2->userinfo->get();
		 $googleUserIdCheck = $this->SigninModel->checkGoogleUserId($user['id']);
		 
		 if($googleUserIdCheck) { 
		  
		  $sessionArray = array(
				  'userId' => $user['id'],
				  'username' => $user['email'],
				  'glogin'=>'1',
				 );
			$this->session->set_userdata($sessionArray);
			redirect(base_url()."school");
		 
		 }else {
			 
			       $pass = $this->randomPassword();
                    $passSave = $pass."@Si9#ri";
					$formValues['userId'] = rand(123456789,987654321);
					$formValues['primaryEmail'] =$user['email'];
					$formValues['gId'] =$user['id'];
					$formValues['userName'] =$user['name'];
					$formValues['password'] =$passSave;
					$formValues['firstName'] =$user['given_name'];
					$formValues['lastName'] =$user['given_name'];
				   	$result= $this->SigninModel->processGoogleRegister($formValues);
					
				 $sessionArray = array(
				  'userId' => $user_profile['id'],
				  'username' => $user_profile['email'],
				   'glogin'=>'1'
				 );
				 $this->session->set_userdata($sessionArray);
				
				
				
				 redirect(base_url()."school");
			 
		 }
		 
				
		 
	 }
	
	
	public function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); 
		$alphaLength = strlen($alphabet) - 1; 
		for ($i = 0; $i < 6; $i++) {
		$n = rand(0, $alphaLength);
		$pass[] = $alphabet[$n];
		}
		return implode($pass); 

}
		
}

/* End of file signin.php */
/* Location: ./application/controllers/signin.php */