<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Dashboard_model extends Model {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();       
    }
    
    /**
     * getOrdersCount
     * get orders count
     * @access public
     * @return array
     */
    public function courseCount(){
        $result = $this->db->find("SELECT COUNT(*) as count FROM ".DB_PREFIX."courses ");
        return $result;
    }
    
    /**
     * facultyCount
     * get faculty count
     * @access public
     * @return array
     */
    public function facultyCount(){
        $result = $this->db->find("SELECT COUNT(*) as count FROM ".DB_PREFIX."faculty ");
        return $result;
    }
    
    /**
     * getCourses()
     * get course list
     * @access public
     * @return type
     */
    public function getCourses() {
        $sql = $this->db->findAll("SELECT * FROM ".DB_PREFIX."courses WHERE status = 1 ORDER BY course_id DESC LIMIT 0,4 ");
        return $sql;
    }
    
    /**
     * getFaculty()
     * get ffaculty list
     * @access public
     * @return type
     */
    public function getFaculty() {
        $sql = $this->db->findAll("SELECT * FROM ".DB_PREFIX."faculty WHERE status = 1 ORDER BY faculty_id DESC LIMIT 0,4 ");
        return $sql;
    }

    /**
     * getNewslettersCount()
     * get the newsletters count
     * @access public
     * @return array 
     */
    public function getNewslettersCount(){
        return $this->db->find("SELECT COUNT(*) as count FROM ".DB_PREFIX."newsletter ");
    }
    
    /**
     * getQuiz()
     * get quiz list
     * 
     * @access public
     * @return type
     */
    public function getQuiz() {
        $sql = "SELECT * FROM ".DB_PREFIX."topic WHERE status = '1' ORDER BY topic_id DESC LIMIT 0,1";
        return $this->db->findAll($sql);
    }
    
    /**
     * getTestimonials() 
     * get the destimonials list
     * @return type
     */
    public function getTestimonials() {
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1' ORDER BY testimonial_id DESC LIMIT 0,4";
        return $this->db->findAll($sql);
    }
    
}
?>