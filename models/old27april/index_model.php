<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class index_model extends Model {
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
    public function getUserDetails($email) {
        return $this->db->find("SELECT * FROM ".DB_PREFIX."adminusers WHERE email = '".$email."' ");
    }
    
    /**
     * updateForgotPassword
     * update the password field
     * @param array $data
     * @param int $userId
     * @access public
     * @return type Description
     */
    public function updateForgotPassword($value,$userId) {
        return $this->db->update(DB_PREFIX."adminusers",$value,"`adminuser_id` = ".$userId." ");
    }
    
    /**
     * getCountries()
     * get all countries
     */
    public function getCountries() {
        $sql = "CALL ".DB_PREFIX."get_countries_prc()";
        $res = $this->db->findAll($sql);
        return $res;
    }
    
    /**
     * getallcourses()
     * @return type
     */
    public function getallcourses() {
        $sql = "SELECT *  FROM ".DB_PREFIX."courses WHERE status = '1' LIMIT 0,4";
        return $this->db->findAll($sql);
    }
    
    /**
     * gettestimonials()
     * @return type
     */
    public function gettestimonials() {
        $sql = "SELECT * FROM ".DB_PREFIX."testimonials WHERE status = '1'";
        return $this->db->findAll($sql);
    }
    
    /**
     * getblog()
     * @return type
     */
    public function getblog() {        
        $sql = "SELECT blo.*,user.* 
                FROM ".DB_PREFIX."blog AS blo
                INNER JOIN ".DB_PREFIX."adminusers AS user
                ON blo.posted_by = user.adminuser_id
                WHERE status = '1'";
        return $this->db->findAll($sql);
    }
    
    /**
     * getnews()
     * @return type
     */
    public function getnews() {
        $sql = "SELECT * FROM ".DB_PREFIX."blog WHERE news = '1' LIMIT 0,2";
        return $this->db->findAll($sql);
    }
    
    /**
     * getbanners()
     * @return type
     */
    public function getbanners() {
        $sql = "SELECT * FROM ".DB_PREFIX."banners WHERE status = 'y'";
        return $this->db->findAll($sql);
    }

    /**
     * addnewsletter()
     * @param type $data
     * @return type
     */
    public function addnewsletter($data) {
                
        $values = array();
        
        $values['email'] = $data['email'];
        $values['created'] = date('y-m-d h:i:s');
        
        $result = $this->db->insert(DB_PREFIX.'newsletter',$values);
        return $this->db->lastInsertId();
    }
    
    /**
     * getsearch()
     * @param type $data
     */
    public function getsearch($data) {
//        
//        echo "<pre>";
//        print_r($data);exit;
        
        $course = $data['courses'];
        $location = $data['location'];
        $date = $data['date'];
        
        $where = "";
        $join = "";
        
        if($course != '') {
             $where .= " cor.course_title = '".$course."' " ;
        }
        
        if($location != '') {
             $where .= " cor.location = '".$location."' ";
        }
        
        if($date != '') {
             $where .= " cor.start_date = '".$date."' ";
        } 
        
        $query = " SELECT cor.* 
                 FROM sg_courses AS cor 
                 WHERE ".$where."
                 ";
        echo $query;exit;
        return $this->db->findAll($query);
        
        
        
    }
    
    /**
     * processSearch()
     * @param type $data
     * @return type
     */
    public function processSearch($data) {        
        $search = $data['searchbox'];
        $categeory = $data['catageory'];
        $cityid = $this->session->gets('city_id');
        $where = "";
        $join = "";
       // $condition = "";
        if($search !='' && $cityid != '') {
            $where .= " mer.companyName = '".$search."' AND  ";            
        } else if($search != '' && $cityid == '') {
              $where .= " mer.companyName = '".$search."'  ";    
        } 
        
        if($cityid !='') {
             $where .= " mer.city = $cityid ";
        } 
        
         if($categeory =='All' && $cityid == '' && $search == "")  {
            $varibles = ",cat.cat_name,cat.cat_id";
            $join = " INNER JOIN sg_categories AS cat 
                    ON mer.categoryId = cat.cat_id";
            
        } else if($categeory !='All' && $cityid == ''  && $search == "") {
            $varibles = ",cat.cat_name,cat.cat_id";
            $join = " INNER JOIN sg_categories AS cat 
                    ON mer.categoryId = cat.cat_id
                    WHERE cat.cat_id = '$categeory'";
        } else if($categeory == 'All' && $cityid != '' || $search != "") {
            $varibles = ",cat.cat_name,cat.cat_id";
            $join = " INNER JOIN sg_categories AS cat 
                    ON mer.categoryId = cat.cat_id
                    WHERE ";
        } else if($categeory !='All'  ) {
            $varibles = ",cat.cat_name,cat.cat_id";
            $join = " INNER JOIN sg_categories AS cat 
                    ON mer.categoryId = cat.cat_id
                    WHERE cat.cat_id = '$categeory' AND ";
        } 

        $query = "SELECT mer.merchant_id,mer.categoryId,mer.companyName,mer.merchantImage, "
                  . "\n mer.mobile, mer.landmark, mer.dcardOffer, mer.existingOffer ".$varibles."
                  FROM sg_merchants AS mer
                  ".$join."
                  ".$where."
                 ";
        return $this->db->findAll($query);
    }
    
    /**
     * contactDetails()
     * @param type $data
     * @return type
     */
    public function contactDetails($data) {     
        $values            = array();        
        $values['name']    = $data['contactName'];
        $values['email']   = $data['contactEmail'];
        $values['mobile']  = $data['contactMobile'];
        $values['comment'] = $data['contactMessage'];
        if(isset($data['contactSub']) != '') {
            $values['subject'] = $data['contactSub'];
        } else {
            $values['subject'] = "";
        }
              
        $this->db->insert(DB_PREFIX.'contact_us',$values);
        return $this->db->lastInsertId();
    }
}
?>
