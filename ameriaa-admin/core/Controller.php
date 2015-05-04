<?php
/**
 * Controller 
 * 
 * This is main controller file
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name
 * @package Controller
 * @access public
 * 
 */
class Controller {
    
    /**
     * This variable using for creating object 
     * 
     * @access public
     */
    public $wrap;
    
    /**
     *
     * @var integer/string
     * 
     * @access public
     */
    public $session;
    
    /**
     * This is using for creating object into view
     * @access public
     */
    public $view;

    /**
     * constructor
     * 
     * Creating objects in this constructor 
     * 
     * @access public
     */
    public function __construct() {
       $this->session = new Session();
       $this->view = new View();
       $this->session->start();
      }
    /**
     * LoadModel
     * 
     * Load the required model 
     * 
     * @param string $name 
     * @param string $moduleName 
     */
    public function LoadModel($name, $moduleName = NULL) {
        if($moduleName != NULL) {
           $modulePath = MODULESDIR . $moduleName . '/models/' . $name . '_model.php';
        } else {
            $modulePath = 'models/' . $name . '_model.php';
        }
        if(file_exists($modulePath)) {
            require_once $modulePath;
            $modelName = $name . '_model';
            $this->model = new $modelName;
        }
        
    }
    /**
     * redirect
     * 
     * @param string $url redirect the page
     */
    public function redirect($url) {
        
        header('location: ' . PATH . $url);
        
    }
    
    /**
     * LoadHelper
     * 
     * This method using for loading required helper 
     * 
     * @param string $class
     * 
     */
    public function LoadHelper($class) {
       global $calss;
       require_once 'libs/helpers/' . $class . '.php';
       $this->$class = new $class;
    }
    
    /**
     * PassHash()
     * @param type $password
     * @return type
     */
    public function PassHash($password = NULL) {
        if(isset($password)) {
            if($password != NULL) {
                return hash('sha256', $password);
            }else {
                echo "Wrong way to call method";
            }
        }
    }

}

/**
 * End Controller.php
 * @location core/Controller.php
 */
?>