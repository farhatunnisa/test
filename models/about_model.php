<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class about_model extends Model {
    /*
     * Constructor
     */
    public function __construct() {
        parent::__construct();       
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
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1' LIMIT 0,3" ;
        return  $this->db->findAll($sql);
    }
    
}
?>