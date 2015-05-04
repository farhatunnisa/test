<?php
/**
* gallery_Model
* 
* This is gallery model in gallery Module 
* 
* PHP version 5
* 
* @category   gallery_Model
* @package    gallery
* author farhat unnisa <farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class gallery_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getGalleryList()
     * get the gallery list
     * @access public
     * @return type
     */
    public function getGalleryList() {
       $sql = "SELECT * FROM ".DB_PREFIX."galleryconfig WHERE gallery_status = 1" ;
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
    public function testmonialslist() {
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1' " ;
        return  $this->db->findAll($sql);
    }
    
    /**
     * getGalleryDetails()
     * get the gallery individual details
     * @param type $id
     * @access public
     * @return type Description
     */
    public function getGalleryDetails($id) {
        $sql = "SELECT * FROM ".DB_PREFIX."galleryimages WHERE gallery_id = $id" ;
        return $this->db->findAll($sql);
    }
    
    /**
     * getAllgallery()
     * @param type $id
     */
    public function getAllfaculty($id) {
        //$sql = "SELECT *  FROM ".DB_PREFIX."faculty WHERE faculty_id != $id AND status = 1 LIMIT 0,7";
        $sql = "SELECT *  FROM ".DB_PREFIX."faculty WHERE faculty_id != $id LIMIT 0,7";
        return $this->db->findAll($sql);
    }
}



/* End of file gallery_model.php */
/* Location: ./modules/gallery/models/gallery_model.php */
?>
