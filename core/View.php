<?php
/**
 * View
 * 
 * This is main view file 
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @author sankar <sankar.g@siriinnovations.com>
 * @version 1.0
 * @license http://URL name
 * @package view
 * @access public
 * 
 * 
 */
class View {
    
    /**
     *
     * @var string
     * $use for set layout in template
     */
    public $layout = NULL;

    /**
     * Constructor
     * 
     */
    
    public function __construct() {
        $this->session = new Session();
        $this->form = new Form();
    }
    
    /**
     * LoadView
     * 
     * This is loadview method using for load the views
     * 
     * @param string $name
     * @param string $module
     * 
     * @access public
     */
    public function LoadView($name, $module = NULL) {
       
        if($module == NULL) {            
            if($this->layout != NULL){
                require_once THEMEDIR . $this->layout . '.php';
            } else {
                require_once THEMEDIR . 'header.php';
            }
            $viewBody = THEMEDIR . $name . '.php';
            if(file_exists($viewBody)) {
                require_once $viewBody;
            } else {
                echo "View Page not Exit";    
            }
            if($this->layout != NULL){

            } else {
                require_once THEMEDIR . 'footer.php';    
            }
        } else {
           
            $viewBody = MODULESDIR . $module .'/views/' . $name . '.php';
            if($this->layout != NULL){
                require_once THEMEDIR . $this->layout . '.php';
            } else {
                require_once THEMEDIR . 'header.php';
            }
            require_once $viewBody;
            if($this->layout != NULL) {

            } else {
                require_once THEMEDIR . 'footer.php';
            }
        }        
    }
    
    /**
     * getUrl
     * 
     * This is main uri segment 
     * 
     * @param string|integer $urlPart
     * 
     * @access public
     * 
     */
    public function getUrl($urlPart) {
        $url = $_SERVER['REQUEST_URI'];
        $keys = parse_url($url);
        $path = explode("/", $url);
        return  $path[$urlPart];
    }
    
    /**
     * fieldFill
     * 
     * @author YUVAKUMAR ANUSURI <yuva.kumar@siriinnovations.com>
     * @param type $attr
     * @return string 
     */
    public function fieldFill($attr){
        if(!empty($this->set)){
            if(array_key_exists($attr, $this->set)){
                return $this->set[$attr];
            }            
        }        
    }
    
    /**
     * fieldError
     * 
     * @author YUVAKUMAR ANUSURI <yuva.kumar@siriinnovations.com>
     * @param type $attr
     * @return string
     */
    public function fieldError($attr){
        if(!empty($this->error)){
            if(array_key_exists($attr, $this->error)){
                return $this->error[$attr];
            } 
        } 
    }
}
/**
 * End view file
 * @location core/View.php
 */
?>