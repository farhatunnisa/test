<?php
/**
* Banners_Model
* 
* This is banner model in Banners Module 
* 
* PHP version 5
* 
* @category   Banners_Model
* @package    Banners
* @author     farhat unnisa <farhat.unnisa@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Banners_Model extends Model {
    /**
     * Constructor
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * get the banner details list
     */
    public function processGetBanners() {
        $sql = "SELECT * FROM ".DB_PREFIX."banners ORDER BY banner_id DESC";
        return $this->db->findAll($sql);
    }
    
    /**
     * processGetPositionsById
     * 
     * get position by position id
     * 
     * @access public
     */
    public function processGetPositionsById($id) {
        return $this->db->find("SELECT * FROM ".DB_PREFIX."bannerpositions WHERE position_id = '$id'");
    }
    
    /**
     * add banner
     * 
     * @param type $data
     * @return type
     */   
    public function processAddbanner($data) {
        $values                 = array();
        $values['banner_title'] = $data['banner_name'];
        $values['description']  = $data['description'];
        $values['image_file']   = $data['image_file'];
        $values['status']       = $data['status'];
        $values['created']      = date('m/d/Y h:i:s a', time());
        $this->db->insert(DB_PREFIX.'banners', $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * get the individual banner details
     * 
     * @param type $id
     * @return type
     */
    public function getBannerDetails($id){
        return $this->db->find("SELECT * FROM ".DB_PREFIX."banners WHERE banner_id = '".$id."'  ");
    }
    
    /**
     * update banner details
     * @param type $data
     * @return type
     */
    public function bannerUpdate($data){        
        $values                 = array();
        $values['banner_title'] = $data['banner_name'];
        $values['description']  = $data['description'];
        $values['image_file']   = $data['image_file'];
        $values['status']       = $data['status'];
        $id                     = $data['BannerID'];
        $sql = $this->db->update(DB_PREFIX.'banners', $values, "`banner_id` = $id");
        return $sql;
    }
    
    /**
     * get the banner details for unlink
     * @param type $id
     * @return type
     */
    public function processBannersDataUnlink($id){
        return $this->db->findAll("SELECT image_file FROM ".DB_PREFIX."banners WHERE banner_id IN ($id) AND status = '1'");        
    }
    
    /**
     * processBannerDelete
     * delete banner details from database
     * @access   public
     * @param    int   $id  banner_id 
     * @return   boolean true/false
     */
    public function processBannerDelete($id) {
        $this->db->deleteAll(DB_PREFIX."banners", "banner_id", $id);
        return true;
    }
    
    /**
     * changeStatus()
     * change banner status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data){
        extract($data);        
        $values = array();
        if($data['statusId'] == 'y') {
            $values['status'] = 'n';
        } else {
            $values['status'] = 'y';
        }
        $id = $data['bannerId'];       
        $result = $this->db->update(DB_PREFIX.'banners', $values, "`banner_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
}

/* End of file banners_model.php */
/* Location: ./modules/banners/models/banners_model.php */
?>
