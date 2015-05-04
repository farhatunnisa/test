<?php
/**
 * register_model()
 */
class register_model extends Model {
    /*
     * construct
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * getUserDetails()
     * get user details
     * @param post $data
     * @access public
     * @return array 
     */
    public function addregisterdetails($data,$info) {        
        $values = array();        
        $values['title'] = $data['title'];
        $values['first_name'] = $data['firstname'];
        $values['last_name'] = $data['last_name'];
        $values['gender'] = $data['gender'];
        $values['title_on_certificate'] = $data['print_certificate'];
        
        $values[''] = $data['printCertConfirm'];
        $values[''] = $data['medicalLicense_image'];
        $values[''] = $data['username'];
        $values[''] = $data['Cpassword'];
        $values[''] = $data['dietaryRequirements'];
        
        $values['company_org'] = $data['organization'];
        $values['professional_design'] = $data['profDesignation'];
        $values['licence_number'] = $data['license'];
        $values['expiry_date'] = $data['expDate'];
        $values['country_issued'] = $data['countryIssued'];
        $values['attach_licence'] = $data[''];
        $values['field_of_practice'] = $data['pracitce'];
        $values['practice_experience'] = $data['practiceYear'];
        $values['address'] = $data['street_address'];
        $values['city'] = $data['city'];
        $values['state'] = $data['state'];
        $values['country'] = $data['country'];
        $values['zip_code'] = $data['zipcode'];
        $values['mobile'] = $data['mobile'];
        $values['fax'] = $data['fax'];
        $values['email'] = $data['email'];
        $values['password'] = $data['password'];
        $values['website'] = $data['website'];
        $values['attach_licence'] = $info['filename'];
        $values['status'] = $data[''];
        $values['image'] = $data[''];
        $values['created_on'] = $data[''];
        
        $result = $this->db->insert(DB_PREFIX.'members',$values);
        return $this->db->lastInsertId();      
    }
    
    
    
    
    
}
?>