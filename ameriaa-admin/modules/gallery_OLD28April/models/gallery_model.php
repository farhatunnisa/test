<?php
/**
* Gallery Model
* 
* 
* PHP version 5
* 
* @package    News
* @author sudhakar <sudhakar.c@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Gallery_Model extends Model {
    /**
    * Constructor    
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct(); 
        
    }
    
    /**
    * getFaculty()
    * get the faculty list
    * @access public
    * @return type array()
    */
    public function getGallery() {  
        $tableName = DB_PREFIX.'galleryconfig';
        $columns   = array("$tableName.gallery_id",
                         "$tableName.gallery_title",
                         "$tableName.created",
                         "$tableName.gallery_id",                         
                         "$tableName.gallery_status",
                         "$tableName.gallery_id",
                         "$tableName.gallery_id"
                        );
        $indexId = '$tableName.gallery_id';
        $columnOrder = "$tableName.gallery_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.gallery_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }
    
   /**
    * 
    * @return type
    */
    public function getGalleryData() {
        return $this->db->findAll("SELECT * FROM ".DB_PREFIX."galleryconfig  ORDER BY gallery_id DESC");
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */   
    public function processGetEventsById($id) {
        return $this->db->find("SELECT * FROM ".DB_PREFIX."galleryconfig WHERE gallery_id = :gallery_id", array(':gallery_id' => $id));      
    }
    
    /**
     * changeStatus()
     * change faculty status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data){
        extract($data);
        $values = array();        
        if($data['statusId'] == 1) {
            $values['gallery_status'] = 0;
        } else {
            $values['gallery_status'] = 1;
        }
        $id = $data['galleryId'];        
        $result = $this->db->update(DB_PREFIX.'galleryconfig', $values, "`gallery_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @param type $data
     * @return type
     */
    public function addGallery($data){
        
        $dataIn = array();
        $dataIn['gallery_title'] = $data['gallery_title'];
        $dataIn['gallery_imagewidth'] = $data['gallery_imagewidth'];
        $dataIn['gallery_imageheight'] = $data['gallery_imageheight'];
        $dataIn['watermark'] = $data['watermark'];
        $dataIn['method'] = $data['method'];
        $dataIn['gallery_status'] = $data['gallery_status'];
        $this->db->insert(DB_PREFIX.'galleryconfig', $dataIn);
        return $this->db->lastInsertId();
    }
     
    /**
     * getGalleryDetails()
     * get the gallery details
     * @param integer $id
     * @return array
     */
    public function getGalleryDetails($id) {        
        $sql = "SELECT * FROM ".DB_PREFIX."galleryconfig WHERE gallery_id = :gallery_id";
        $result = $this->db->find($sql, array(':gallery_id' => $id));
        return $result; 
    }
    
    /**
     * 
     * @param array $data
     * @return boolean
     */
    public function updateGalleryDetails($data) {
        
        extract($data);
        $id = $_POST['gallery_id'];
        $values                         = array(); 
        $values['gallery_title']        = $gallery_name;                
//        $values['gallery_imagewidth']   = $gallery_imagewidth; 
//        $values['gallery_imageheight']  = $gallery_imageheight;        
//        $values['watermark']            = $watermark;
//        $values['method']               = $method;
        $values['gallery_status']       = $status;
        $values['thum_image']           = $image;
        //$values['gallery_slug']         = $this->slug($Gallery_slug);
        $result = $this->db->update(DB_PREFIX.'galleryconfig', $values, "`gallery_id` = $id");       
        if($result) {
            return true;
        } else {
            return false;    
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * 
     * @param type $data
     * @return boolean
     */
    public function processGalleryImageTitles($data){
        $dataIn = array();
        $dataIn['image_title'] = $data['image_title'];
        $dataIn['image_desc'] = $data['image_desc'];        
        $id = $data['image_id'];
        $this->db->update(DB_PREFIX.'galleryimages', $dataIn, "`image_id` = '$id'");
        return true; 
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function processEventsDataUnlink($id) {
        return $this->db->findAll("SELECT event_poster FROM ".DB_PREFIX."events WHERE event_id IN ($id) AND status = '1'");
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public function deleteGallery($id) {
        $this->db->deleteAll(DB_PREFIX.'galleryconfig', "gallery_id", $id);
        return true;
    }
    
    /**
     * 
     * @param type $data
     * @return type
     */
    public function processGalleryImagesUpload($data) {
        
        $dataIn = array();
        $dataIn['gallery_id'] = $data['gallery_id'];
        $dataIn['image_file'] = $data['image_file'];
        $dataIn['image_created'] = date('Y-m-d H:i:s');
        $dataIn['image_added_by'] = $data['image_added_by'];
        $dataIn['image_status'] = 0;  
        //print_r($data); exit;
        $this->db->insert(DB_PREFIX.'galleryimages', $dataIn);
        //print_r($this->db->lastInsertId()); exit;
        return $this->db->lastInsertId();
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getGalleryImages($id) {        
        return $this->db->findAll("SELECT * FROM ".DB_PREFIX."galleryimages WHERE gallery_id = $id"); 
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function processGalleryImagesDataUnlink($id) {
        return $this->db->findAll("SELECT image_file FROM ".DB_PREFIX."galleryimages WHERE image_id IN ($id)");
    }
    
    /**
     * 
     * @param type $id
     * @return boolean
     */
    public function processGalleryImagesDelete($id) {
        $this->db->deleteAll(DB_PREFIX.'galleryimages', "image_id", $id);
        return true;
    }
    
   
    
    
    
     /**
     * 
     * @param array $data
     * @return boolean
     */
    public function addGalleryDetails($data) {        
        extract($data);
        $values['gallery_title'] = $gallery_name;        
        $values['thum_image']    = $image;        
        //$values['gallery_slug'] = $this->slug($Gallery_slug);
        $values['gallery_status'] = $status;         
        $res = $this->db->insert(DB_PREFIX.'galleryconfig', $values); 
        return $this->db->lastInsertId();
    }
    
     /**
     * 
     * @param array $data
     * @return boolean
     */
    public function changeGalleryStatus($data) {
        
        extract($data);
        $galleryId = $galleryId;
        $status = $status;
        $values = array();
        if($status == 'y') {
            $values['gallery_status'] = 'n';
        } else {
            $values['gallery_status'] = 'y';
        }
        
        $result = $this->db->update(DB_PREFIX.'galleryconfig', $values, "`gallery_id` = $galleryId");
        if($result) {
            return true;
        } else {
            return false;
        }        
    }
    
}

?>