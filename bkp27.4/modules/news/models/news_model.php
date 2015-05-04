<?php
/**
* News_Model
* 
* This is News model in News Module 
* 
* PHP version 5
* 
* @category   News_Model
* @package    News
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class News_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getNewsList()
     * @access public
     * @return type
     */
    public function getNewsList() {
        $sql = "SELECT * FROM ".DB_PREFIX."blog WHERE news = '1' AND status = '1' ";
        return $this->db->findAll($sql);
    }
    
    /**
     * 
     * @param type $id
     * @return type
     */
    public function getNewsDetails($id) {
        $sql = "SELECT * FROM ".DB_PREFIX."blog WHERE blog_id = '".$id."' ";
        return $this->db->find($sql);
    }    
}

/* End of file News_model.php */
/* Location: ./modules/news/models/news_model.php */
?>
