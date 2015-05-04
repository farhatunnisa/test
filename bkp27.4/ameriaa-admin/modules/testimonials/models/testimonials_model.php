<?php
/**
* testimonials_Model
* 
* This is testimonials model in testimonials Module 
* 
* PHP version 5
* 
* @category   testimonials_model
* @package    testimonials
* @author     SANAKR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Testimonials_Model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
    * getTestimonials()
    * get the courses list
    * @access public
    * @return type array()
    */
    public function getTestimonials() {
        $tableName = DB_PREFIX.'testimonials';
        $columns   = array("$tableName.testimonial_id",
                           "$tableName.client_name",
                           "$tableName.location",
                           "$tableName.description",
                           "$tableName.status",
                           "$tableName.testimonial_id"
                          );
        $indexId     = '$tableName.testimonial_id';
        $columnOrder = "$tableName.testimonial_id";
        $orderby     = "ORDER BY $columnOrder DESC";
        $joinMe      = "";
        $condition   = " WHERE $tableName.testimonial_id != '' ";
        return $this->db->drawdatatable($tableName, $columns, $indexId, $joinMe,$condition, $orderby);
    } 
    
    /**
     * changeStatus()
     * change testimonials status
     * @param array $data
     * @access public
     * @return boolean
     */
    public function changeStatus($data){

        extract($data);
        $values = array();        
        if($data['statusId'] == 1) {
            $values['status'] = 0;
        } else {
            $values['status'] = 1;
        }
        $id = $data['testimonialId'];        
        $result = $this->db->update(DB_PREFIX.'testimonials', $values, "`testimonial_id` = $id");
        if($result) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * deleteTestimonials()
     * delte the faculty records
     * @param type $data
     * @access public
     * @return type
     */
    public function deleteTestimonials($data){
        return $this->db->deleteAll(DB_PREFIX.'testimonials', "`testimonial_id`", $data);
    }
    
    /**
     * addTestimonialDetails()
     * add testimonials form details
     * @param array $data
     * @access public
     */
    public function addTestimonialDetails($data) {
        $values = array();
        $values['client_name'] = $data['client_name'];
        $values['location']    = $data['location'];
        $values['image']       = $data['image'];
        $values['description'] = $data['description'];
        $values['status']      = $data['status'];
        $sql = $this->db->insert(DB_PREFIX."testimonials", $values);
        return $this->db->lastInsertId();
    }
    
    /**
     * getTestimonialDetails
     * get the testimonial details
     * @param int $id.
     * @access public
     */
    public function getTestimonialDetails($id) {
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE testimonial_id = $id ";
        return $this->db->find($sql);
    }
    
    /**
     * updateTestimonialsDetails()
     * update testimonial form details
     * @param type $data
     * @access public
     */
    public function updateTestimonialsDetails($data) {
        $values = array();
        $values['client_name'] = $data['client_name'];
        $values['location']    = $data['location'];
        $values['description'] = $data['description'];
        $values['status']      = $data['status'];
        $values['image'] = $data['image'];
       
        $id = $data['testimonial_id'];
        $result = $this->db->update(DB_PREFIX.'testimonials', $values, "`testimonial_id` = $id");
        return $result;
    }
            
}

/* End of file testimonials_model.php */
/* Location: ./modules/testimonials/models/testimonials_model.php */
?>