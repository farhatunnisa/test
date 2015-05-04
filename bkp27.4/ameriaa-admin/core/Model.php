<?php
/**
 * Model
 * 
 * This is main model file
 * 
 * PHP version 5
 *  
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name
 * @package Model
 * @access public
 * 
 * 
 */
class Model {
    /**
     * Constructor 
     * 
     * In this constructor create object into session 
     * pass the database values and connect to database
     * 
     */
    public function __construct() {
        $this->session = new Session();
        $this->db  = new Database(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
        
    }
    
    /**
     * PassHash
     * 
     * This method using for encryption the passowrd
     * 
     * @param interger|string 
     * 
     * return hash
     * 
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
 * End Model file
 * @location core/Moel.php
 */
?>