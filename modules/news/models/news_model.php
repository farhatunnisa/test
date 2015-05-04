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
* @other author Sudharshan<sudharshan.m@siriinnovations.com>
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
     * courselist()
     * @return type
     */
    public function courselist() {
        $sql = "SELECT * FROM ".DB_PREFIX."courses WHERE status = 1 LIMIT 0,8 " ;
       return $this->db->findAll($sql);
    }
    
    /**
     * testmonialslist()
     * @return type
     */
     public function testmonialslist() {
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1' LIMIT 0,3 " ;
        return  $this->db->findAll($sql);
     }
     
    /**
     * getNewsDetails()
     * @param type $id
     * @return type
     */
    public function getNewsDetails($id) {
        //$sql = "SELECT * FROM ".DB_PREFIX."blog WHERE blog_id = '".$id."' ";
         $sql = "SELECT mt.*,s.username
               FROM sg_blog mt
               INNER JOIN sg_adminusers s 
               ON mt.posted_by = s.adminuser_id WHERE mt.blog_id = '".$id."' "; 
         //echo $sql;exit;
	 return $this->db->find($sql);
    } 
    
    /**  
     * getRelatedNews()
     * @param type $id
     * @return type
     */
    public function getRelatedNews($id){
            $sql = "SELECT * FROM ".DB_PREFIX."blog WHERE blog_id != '".$id."' and news = '1' AND status = '1' ORDER by blog_id ASC ";
            return $this->db->findAll($sql);
    }
    
    /**
     * getPopularNews()
     * @param type $id
     * @return type
     */
    public function getPopularNews($id)
    {
            $sql = "SELECT * FROM ".DB_PREFIX."blog WHERE blog_id != '".$id."' and news = '1' AND status = '1' ORDER by blog_id DESC ";
            return $this->db->findAll($sql);
    }
}

/* End of file News_model.php */
/* Location: ./modules/news/models/news_model.php */
?>
