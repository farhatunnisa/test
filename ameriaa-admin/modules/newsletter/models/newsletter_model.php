<?php
/**
 * newsletter_Model
 * 
 * This is newsletter model in newsletter Module 
 * 
 * PHP version 5
 * 
 * @category   newsletter_Model
 * @package    newsletter
 * @author     farhat unnisa<farhat.unnisa@siriinnovations.com>
 * @version    1.0
 * @license    http://URL name
 * @access     public
 */
class newsletter_Model extends Model {
   /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
   /**
    * processGetNewsLetter
    * 
    * get all newsletter
    * 
    * @access public
    */
    public function getNewsletter() {  
        
        $tableName = DB_PREFIX.'newsletter';
        $columns = array("$tableName.id",
                             "$tableName.email",
                             "$tableName.status",
                             "$tableName.id"
                        );
        $indexId = '$tableName.id';
        $columnOrder = "$tableName.id";
        $orderby = "ORDER BY $columnOrder DESC";
        $joinMe = "";
        $condition = " WHERE $tableName.id != '' ";        
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    }
  
   /**
    * processNewsletterDelete
    * 
    * delete NewsLetter details from database
    * 
    * @access   public
    * @param    int   $id    position_id 
    * @return   boolean true/false
    */
    public function deleteNewsletter($id) {
        $this->db->deleteAll(DB_PREFIX."newsletter", "id", $id);
        return true;
    }
    
    /**
     * getEnquiriesExportExcel()
     * @access public
     * @return type
     */
    public function getNewsletterExportExcel() {         
        $sql = "SELECT * FROM ".DB_PREFIX."newsletter ";
        return $this->db->findAll($sql);         
    }
     
   
}

/* End of file newsletter_model.php */
/* Location: ./modules/newsletter/models/newsletter_model.php */
?>

