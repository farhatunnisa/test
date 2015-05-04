<?php
/**
* blog_model
* 
* This is blog model in blog Module 
* 
* PHP version 5
* 
* @category   blog_model
* @package    blog
* @author     SANAKR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class blog_Model extends Model {
    /**
    * Constructor
    * 
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
    public function getBlog() {
        $tableName = DB_PREFIX.'blog';
        $tableName1 = DB_PREFIX.'adminusers';
        $columns = array("$tableName.blog_id",
                         "$tableName.blog_title",
                         "$tableName.short_desc",
                         "$tableName.posted_by",
                         "$tableName.status",
                         "$tableName1.adminuser_id",
                         "$tableName1.username",
                         "$tableName.news",
                         "$tableName.blog_id"
                        );
        $indexId = '$tableName.blog_id';
        $columnOrder = "$tableName.blog_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "INNER JOIN $tableName1 ON $tableName1.adminuser_id = $tableName.posted_by ";
        $condition = " WHERE $tableName.blog_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }
    
    /**
     * changeStatus()
     * change faculty status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data) {
        extract($data);
        $values = array();        
        if($data['statusId'] == 1) {
            $values['status'] = 0;
        } else {
            $values['status'] = 1;
        }
        $id = $data['blogId'];
        $result = $this->db->update(DB_PREFIX.'blog', $values, "`blog_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * deleteBlog()
     * delte the blog records
     * @param type $data
     * @access public
     * @return type
     */
    public function deleteBlog($data) {
        return $this->db->deleteAll(DB_PREFIX.'blog', "`blog_id`", $data);
    }
    
    /**
     * addBlogDetails()
     * add blog form detials
     * @access public
     * @return type Description
     */
    public function addBlogDetails($data) {
        $values = array();
        $values['blog_title'] = $data['blog_name'];
        $values['short_desc'] = trim($data['short_desc']);
        $values['full_desc']  = $data['full_desc'];
        $values['image']      = $data['image'];        
        $values['posted_by']  = $this->session->gets("adminuser_id");
        $values['news']       = $data['category'];
        $values['status']     = $data['status'];
        $result = $this->db->insert(DB_PREFIX.'blog', $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * blogDetails()
     * get the blog individual details
     * @param array $id
     * @access public
     * @return type
     */
    public function blogDetails($id) {
        $sql = "SELECT bg.*, adm.adminuser_id, adm.username "
                . "\n FROM ".DB_PREFIX."blog AS bg "
                . "\n INNER JOIN ".DB_PREFIX."adminusers AS adm "
                . "\n ON adm.adminuser_id = bg.posted_by "
                . "\n WHERE bg.blog_id = '$id'";
        $result = $this->db->find($sql);
        return $result;
    }
    
    /**
     * updateblogDetails
     * @param array $data
     * @access public
     * @return int
     */
    public function updateblogDetails($data) {
        $values = array();
        $values['blog_title'] = $data['blog_name'];
        $values['short_desc'] = trim($data['short_desc']);
        $values['full_desc']  = $data['full_desc'];
        $values['image']      = $data['image'];        
        $values['posted_by']  = $this->session->gets("adminuser_id");
        $values['news']       = $data['category'];
        $values['status']     = $data['status'];
        $id = $data['blog_id'];
        $result = $this->db->update(DB_PREFIX.'blog', $values, "`blog_id` = $id");
        return $result;
    }
  
    /**
     * getComments
     * get all comments list
     * @access public
     * @return type Description
     */
    public function getComments() {
        $tableName = DB_PREFIX.'blog_comments';
        $columns = array("$tableName.comment_id",
                         "$tableName.commented_by",
                         "$tableName.description",
                         "$tableName.status",
                         "$tableName.comment_id"
                        );
        $indexId = '$tableName.comment_id';
        $columnOrder = "$tableName.comment_id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.comment_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }
    
}

/* End of file blog_model.php */
/* Location: ./modules/faculty/models/blog_model.php */
?>