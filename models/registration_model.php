<?php
/**
 * register_model()
 */
class registration_model extends Model {
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
    public function addregisterdetails($data, $licence_file_name) { 
        //echo "<pre>";        print_r($licence_file_name); exit;
        $values                = array();        
        $values['title']       = $data['title'];
        $values['first_name']  = $data['firstname'];
        $values['middle_name'] = $data['middle_name'];
        $values['family_name'] = $data['family_name'];
        $values['gender']      = $data['gender'];
        $values['title_on_certificate'] = $data['print_certificate'];        
        $values['attach_licence'] = $licence_file_name;
        $values['username'] = $data['username'];
        $values['dietary_requirement'] = $data['dietary_requirements'];        
        $values['company_org']         = $data['organization'];
        $values['professional_design'] = $data['profDesignation'];
        $values['licence_number']      = $data['license_number'];
        $values['expiry_date']         = $data['expDate'];
        $values['country_issued']      = $data['countryIssued'];
        //$values['attach_licence']      = $data[''];
        $values['field_of_practice']   = $data['pracitce'];
        $values['practice_experience'] = $data['practiceYear'];
        $values['address']    = $data['street_address'];
        $values['city']       = $data['city'];
        $values['state']      = $data['state'];
        $values['country']    = $data['country'];
        $values['zip_code']   = $data['zipcode'];
        $values['mobile']     = $data['mobile'];
        $values['fax']        = $data['fax'];
        $values['email']      = $data['user_email'];
        $values['password']   = $this->PassHash($data['password']);
        $values['website']    = $data['website'];
        $values['status']     = '1';
        $values['image']      = '';
        $values['membership'] = $data['membership_type'];
        //$values['created_on'] = ;
        
        $result = $this->db->insert(DB_PREFIX.'members',$values);
        return $this->db->lastInsertId();      
    }
    
    /**
     * emailcheck()
     * echeck email existing or not
     * @param string $emailId
     * @access public
     * @return type
     */
    public function emailcheck($emailId) {
        $result = $this->db->find('SELECT email FROM '.DB_PREFIX.'members WHERE email = :email', array(':email' => $emailId));
        return $result;
    }
    
    /**
     * getMembershipData()
     * get the membership list
     * @access public
     * @return type
     */
    public function getMembershipData() {
        $sql = "SELECT * FROM ".DB_PREFIX."membership WHERE status = '1' ";
        return $this->db->findAll($sql);
    }
    
    
}
?>