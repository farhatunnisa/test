<?php
/*
 * This is index controler 
 * Default controller 
 */
class Signin extends Controller {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();  
        // verify login user
        if($this->session->gets('adminuser_id')) 
            $this->redirect('dashboard');
        
        $this->config->load('google');
        parse_str($_SERVER['QUERY_STRING'],$_REQUEST);
        $this->load->library('Facebook', array("appId"=>"165816590192864", "secret"=>"fb44f75dc923f0f7717bfaefe44093d9"));
        $this->user = $this->facebook->getUser();
        $this->load->model('SigninModel'); 
        $this->load->helper('cookie');
        $this->load->helper('url');

        require APPPATH .'third_party/src/apiClient.php';
        require APPPATH .'third_party/src/contrib/apiOauth2Service.php';
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
       
}
