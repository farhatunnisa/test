<?php
/**
* faculty_Model
* 
* This is faculty model in faculty Module 
* 
* PHP version 5
* 
* @category   faculty_Model
* @package    faculty
* author farhat unnisa <farhat.unnisa@siriinnovations.com>
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @other author     SUDHARSHAN <sudharshan.m@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class faculty_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getFacultyList()
     * get the faculty list
     * @access public
     * @return type
     */
    public function getFacultyList() {
       $sql = "SELECT * FROM ".DB_PREFIX."faculty WHERE status = 1" ;
       return $this->db->findAll($sql);
    }
    
    /**
     * courselist()
     * @return type
     */
    public function courselist() {
        $sql = "SELECT * FROM ".DB_PREFIX."courses WHERE status = 1 LIMIT 0,9 " ;
       return $this->db->findAll($sql);
    }
    
    /**
     * testmonialslist()
     * @return type
     */
    public function testmonialslist(){
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1' " ;
        return  $this->db->findAll($sql);
    }
    
    /**
     * getFacultyDetails()
     * get the faculty individual details
     * @param type $id
     * @access public
     * @return type Description
     */
    public function getFacultyDetails($id) {
        $sql = "SELECT * FROM ".DB_PREFIX."faculty WHERE faculty_id = $id" ;
        return $this->db->find($sql);
    }
    
    /**
     * getAllfaculty()
     * @param type $id
     */
    public function getAllfaculty($id) {
        //$sql = "SELECT *  FROM ".DB_PREFIX."faculty WHERE faculty_id != $id AND status = 1 LIMIT 0,7";
        $sql = "SELECT *  FROM ".DB_PREFIX."faculty WHERE faculty_id != $id LIMIT 0,7";
        return $this->db->findAll($sql);
    }
}



/* End of file faculty_model.php */
/* Location: ./modules/faculty/models/faculty_model.php */
?>
