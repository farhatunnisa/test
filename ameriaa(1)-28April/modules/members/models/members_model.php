<?php
/**
* members_Model
* 
* This is members model in members Module 
* 
* PHP version 5
* 
* @category   members_Model
* @package    members
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class members_Model extends Model {
    
    /**
     * Model
     * 
     * Here we can load default settings
     */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
     * getMemberDetails()
     * get the member details
     * @access public
     * @return type
     */
    public function getMemberDetails() {
        $id = $this->session->gets('ameriaa_user_id');
        $sql = "SELECT * FROM ".DB_PREFIX."members WHERE member_id = '$id'  " ;
        return $this->db->find($sql);
       
    }
    
    public function updateDetails($data) {
        $values = array();
        
        $values['title']                = $data['title'];
        $values['first_name']           = $data['firstname'];
        $values['middle_name']          = $data['mname'];
        $values['family_name']          = $data['fname'];
        $values['gender']               = $data['gender'];
        $values['title_on_certificate'] = $data['printcert'];
        $values['company_org']          = $data['organization'];
        $values['professional_design']  = $data['profDesignation'];
        $values['licence_number']       = $data['license'];
        $values['expiry_date']          = $data['expDate'];
        $values['country_issued']       = $data['countryIssued'];
        $values['field_of_practice']    = $data['pracitce'];
        $values['practice_experience']  = $data['practiceYear'];
        $values['address']              = $data['saddress'];
        $values['city']                 = $data['city'];
        $values['state']                = $data['state'];
        $values['country']              = $data['country'];
        $values['zip_code']             = $data['zipcode'];
        $values['mobile']               = $data['mobile'];
        $values['fax']                  = $data['fax'];
        
        $values['dietary_requirement']  = $data['dietary_requirements'];
        $values['website']              = $data['website'];        
        if(!empty($data['image'])){
            $values['image'] = $data['image'];
        }
        //print_r($data['licence_attach']); exit;
        if(!empty($data['attach_licence'])){
            $values['attach_licence'] = $data['licence_attach'];
        }
        
        $id = $this->session->gets('ameriaa_user_id');
        $result = $this->db->update(DB_PREFIX.'members',$values, "member_id = $id");
        return $result;
    }
    
    /**
     * Updatepassword()
     * @param type $data
     * @return type
     */
    public function Updatepassword($data) {        
        $values = array();
        $values['password'] = $this->PassHash($data['newpwd']);
        $id = $this->session->gets('ameriaa_user_id');
        return $this->db->update(DB_PREFIX.'members',$values, "member_id = $id");
    }
    
}

/* End of file members_model.php */
/* Location: ./modules/members/models/members_model.php */
?>