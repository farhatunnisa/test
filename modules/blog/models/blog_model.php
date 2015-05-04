<?php
/**
* Blog_Model
* 
* This is Blog model in Blog Module 
* 
* PHP version 5
* 
* @category   Blog_Model
* @package    Blog
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class blog_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * 
     * @return type
     */
    public function getBlogList() {
        //$sql = "SELECT * FROM ".DB_PREFIX."blog WHERE blo.news = 0 AND blo.status = 1";
        $sql = "SELECT blo.*, adm.username, adm.adminuser_id 
                FROM ".DB_PREFIX."blog AS blo
                INNER JOIN ".DB_PREFIX."adminusers AS adm
                ON blo.posted_by = adm.adminuser_id
                WHERE blo.news = '0' AND blo.status = '1' ";
        //echo $sql; exit;
        return $this->db->findAll($sql);
        //print_r($result);exit;
    }
    

    /**
     * 
     * @param type $id
     * @return type
     */
    public function getBlogDetails($id) {
        //$sql = "SELECT * FROM ".DB_PREFIX."blog WHERE blog_id = '".$id."' ";
        $sql = "SELECT blo.*, adm.username, adm.adminuser_id 
                FROM ".DB_PREFIX."blog AS blo
                INNER JOIN ".DB_PREFIX."adminusers AS adm
                ON blo.posted_by = adm.adminuser_id
                WHERE blo.blog_id = '".$id."' ";
        return $this->db->find($sql);
    }
    
    /**
     * postcomment()
     * insert comment details
     * @param array $data
     * @access public
     * @return type Description
     */
    public function postcomment($data) {
        $values                 = array();
        $values['blog_id']      = $data['blog_id'];
        $values['commented_by'] = $data['user_id'];
        $values['description']  = $data['comment'];
        $values['status']       = '1';
        $sql = $this->db->insert(DB_PREFIX."blog_comments", $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * getComments()
     * @param type $id
     * @return type
     */
    public function getComments($id) {   
        
        /*$sql = "SELECT comments.*, members.member_id, members.first_name, members.middle_name, members.family_name, members.image  "
                . "\n FROM ".DB_PREFIX."blog_comments AS comments "
                . "\n INNER JOIN ".DB_PREFIX."members AS members "
                . "\n ON comments.commented_by = members.member_id "
                . "\n WHERE comments.blog_id = '$id' "
                . "\n AND comments.status = '1' ";*/
        //$sql = "SELECT * FROM ".DB_PREFIX."blog_comments WHERE blog_id = '$id' ORDER BY DESC";
        $sql = "SELECT blo.*, adm.username, adm.adminuser_id,comments.description,comments.commented_by,
                comments.blog_id,comments.created_on 
                FROM ".DB_PREFIX."blog AS blo
                INNER JOIN ".DB_PREFIX."adminusers AS adm
                ON blo.posted_by = adm.adminuser_id
                INNER JOIN ".DB_PREFIX."blog_comments AS comments 
                ON comments.blog_id = blo.blog_id
                WHERE blo.blog_id = '".$id."' ";
        //echo $sql;exit;
        return $this->db->findAll($sql);
    }
    
    /**
     * getposts()
     * @param type $id
     */
    public function getposts($id) {
        $sql = "SELECT * FROM sg_blog WHERE blog_id != '1' ORDER BY blog_id DESC LIMIT 0,5 ";
        //echo $sql;exit;
        return $this->db->findAll($sql);
    }
    
    
}

/* End of file Blog_model.php */
/* Location: ./modules/Blog/models/Blog_model.php */
?>
