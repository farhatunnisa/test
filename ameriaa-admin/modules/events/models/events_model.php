<?php
/**
* News_Model
* 
* This is news model in News Module 
* 
* PHP version 5
* 
* @category   News_Model
* @package    News
* @author     yuvakumar anusuri <yuva.kumar@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Events_Model extends Model {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();      
    }
    
    /**
    * processGetNews
    * 
    * get all news details
    * 
    * @access public
    */
    public function processGetEvents() {
        return $this->db->findAll('SELECT * FROM sg_events ORDER BY event_id DESC');
    }
    
    /**
    * processGetLanguage
    * 
    * get all languages
    * 
    * @access public
    */
    public function processGetLanguage() {
        return $this->db->findAll("SELECT * FROM sg_language");
    }
    
    /**
    * processGetCurrency
    * 
    * get Currency
    * 
    * @access public
    */
    public function processGetCurrency() {
        return $this->db->findAll("SELECT currency,currency_code FROM sg_country");
    }
    
    /**
    * processGetCountry
    * 
    * get Country
    * 
    * @access public
    */
    public function processGetCountry() {
        return $this->db->findAll("SELECT * FROM sg_country");
    }
    /**
    * processGetStateNames
    * 
    * get all state name details
    * 
    * @access public
    */
    public function processGetStateNames($data) {
        
        return $this->db->findAll("select * from sg_states where country_id =$data[country]");
        
    }
    
    /**
    * processGetCityNames
    * 
    * get all city name details
    * 
    * @access public
    */
    public function processGetCityNames($data) {
        
        return $this->db->findAll("select * from sg_cities where state_id = $data[state] ");
        
    }
    
    /**
    * processGetNewsById
    * 
    * retrive news info by news id
    * 
    * @access   public
    * @param    int     $id news id
    * @return   array   news array
    */
    public function processGetEventsById($id) {
        return $this->db->find('SELECT * FROM sg_events WHERE event_id = :event_id', array(':event_id' => $id));      
    }
    
    /**
    * processNewsAdd
    * 
    * save news details in database
    * 
    * @access public
    * @param    array   $data news post data
    * @return   int     last insert id
    */
    public function processEventsAdd($data){
        $event_dates = explode(" - ", $data['event_dates']);
        $dataIn = array();
        $dataIn['event_title'] = $data['event_title'];
        $dataIn['slug'] = $data['slug'];
        $dataIn['sponsor'] = $data['sponsor'];
        $dataIn['long_desc'] = $data['long_desc'];
        $dataIn['event_overview'] = $data['event_overview'];
        $dataIn['language'] = implode(',', $data['language_id']);
	$dataIn['event_poster'] = $data['image_file'];       
        $dataIn['start_date'] = date("Y-m-d H:i:s", strtotime($event_dates[0]));        
        $dataIn['end_date'] = date("Y-m-d H:i:s", strtotime($event_dates[1]));
        $dataIn['email'] = $data['email'];
        $dataIn['mobile'] = $data['mobile'];
        $dataIn['website'] = $data['website'];
        $dataIn['added_by'] = $this->session->gets('adminuser_id');
        $dataIn['termscondition'] = $data['termscondition'];
        $dataIn['meta_tags'] = $data['meta_tags'];
        $dataIn['meta_desc'] = $data['meta_desc'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['status'] = $data['status'];
        
        $this->db->insert('sg_events', $dataIn);
        return $this->db->lastInsertId();
    } 
    
    /**
    * processNewsUpdate
    * 
    * save news details in database
    * 
    * @access   public
    * @param    array   $data news post data
    * @return   boolean true/false
    */
    public function processEventsUpdate($data){
        $event_dates = explode(" - ", $data['event_dates']);
        $dataIn = array();
        $dataIn['event_title'] = $data['event_title'];
        $dataIn['slug'] = $data['slug'];
        $dataIn['sponsor'] = $data['sponsor'];
        $dataIn['long_desc'] = $data['long_desc'];
        $dataIn['event_overview'] = $data['event_overview'];
        $dataIn['language'] = implode(',', $data['language_id']);
        $dataIn['event_poster'] = $data['image_file'];       
        $dataIn['start_date'] = date("Y-m-d H:i:s", strtotime($event_dates[0]));        
        $dataIn['end_date'] = date("Y-m-d H:i:s", strtotime($event_dates[1]));
        $dataIn['email'] = $data['email'];
        $dataIn['mobile'] = $data['mobile'];
        $dataIn['website'] = $data['website'];
        $dataIn['added_by'] = $this->session->gets('adminuser_id');
        $dataIn['termscondition'] = $data['termscondition'];
        $dataIn['meta_tags'] = $data['meta_tags'];
        $dataIn['meta_desc'] = $data['meta_desc'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['status'] = $data['status'];
        
        $id = $data['event_id'];
        $this->db->update('sg_events', $dataIn, "`event_id` = $id");
        return true; 
    } 
    
    /**
    * processEventPhotosTitle
    * 
    * save event photo titles details in database
    * 
    * @access   public
    * @param    array   $data photo post data
    * @return   boolean true/false
    */
    public function processEventPhotosTitle($data){
        $dataIn = array();
        $dataIn['photo_title'] = $data['photo_title'];
        $dataIn['photo_desc'] = $data['photo_desc'];
        
        $id = $data['photo_id'];
        $this->db->update('sg_eventphotos', $dataIn, "`photo_id` = $id");
        return true; 
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventsDataUnlink($id) {
        return $this->db->findAll("SELECT event_poster FROM sg_events WHERE event_id IN ($id) AND status = '1'");
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventsDelete($id) {
        $this->db->deleteAll('sg_events', "event_id", $id);
        return true;
    }
    
    /**
    * processEventPhotosUpload
    * 
    * event photos upload
    * 
    * @access   public
    * @return   boolean true/false
    */
    public function processEventPhotosUpload($data) {
        $dataIn = array();
        $dataIn['event_id'] = $data['event_id'];
        $dataIn['photo_file'] = $data['photo_file'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['added_by'] = $data['added_by'];
        $dataIn['status'] = 0;        
        $this->db->insert('sg_eventphotos', $dataIn);
        return $this->db->lastInsertId();
    }
    
    /**
    * processGetNews
    * 
    * get all news details
    * 
    * @access public
    */
    public function processGetEventPhotos($id) {
        return $this->db->findAll("SELECT * FROM sg_eventphotos WHERE event_id = '".$id."'"); 
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventPhotosDataUnlink($id) {
        return $this->db->findAll("SELECT photo_file,event_id FROM sg_eventphotos WHERE photo_id IN ($id)");
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventPhotosDelete($id) {
        $this->db->deleteAll('sg_eventphotos', "photo_id", $id);
        return true;
    }
    
    /**
    * processEventPhotosUpload
    * 
    * event photos upload
    * 
    * @access   public
    * @return   boolean true/false
    */
    public function processEventFlyersUpload($data) {
        $dataIn = array();
        $dataIn['event_id'] = $data['event_id'];
        $dataIn['flyer_file'] = $data['flyer_file'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['added_by'] = $data['added_by'];
        $dataIn['status'] = 0;        
        $this->db->insert('sg_eventflyers', $dataIn);
        return $this->db->lastInsertId();
    }
    
    /**
    * processGetNews
    * 
    * get all news details
    * 
    * @access public
    */
    public function processGetEventFlyers($id) {
        return $this->db->findAll("SELECT * FROM sg_eventflyers WHERE event_id = '".$id."'"); 
    }
    
    /**
    * processEventPhotosTitle
    * 
    * save event photo titles details in database
    * 
    * @access   public
    * @param    array   $data photo post data
    * @return   boolean true/false
    */
    public function processEventFlyersTitle($data){
        $dataIn = array();
        $dataIn['flyer_title'] = $data['flyer_title'];
        $dataIn['flyer_desc'] = $data['flyer_desc'];
        
        $id = $data['flyer_id'];
        $this->db->update('sg_eventflyers', $dataIn, "`flyer_id` = $id");
        return true; 
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventFlyersDataUnlink($id) {
        return $this->db->findAll("SELECT flyer_file,event_id FROM sg_eventflyers WHERE flyer_id IN ($id)");
    }
    
    /**
    * processNewsUpdate
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventFlyersDelete($id) {
        $this->db->deleteAll('sg_eventflyers', "flyer_id", $id);
        return true;
    }
    
    /**
     * processEventVideos
    * save event viedo titles details in database
    * 
    * @access   public
    * @param    array   $data photo post data
    * @return   boolean true/false
    * 
    * @param array $data
    * @return boolean
    */
     
    public function processEventVideos($data)
    {
        $dataIn = array();
        $dataIn['video_title'] = $data['video_title'];
        $dataIn['video_url'] = $data['video_url'];
        
        $id = $data['video_id'];
        $this->db->update('sg_eventvideos', $dataIn, "`video_id` = $id");
        return true; 
    }
    
    /**
    * processVideosDelete
    * 
    * delete Viedo details from database
    * 
    * @access   public
    * @param    int   $id    news video id
    * @return   boolean true/false
    */
    public function processVideosDelete($id) {
        $this->db->deleteAll('sg_eventvideos', "video_id", $id);
        return true;
    }
    
    /**
    * processEventVideoAdd
    * 
    * Videos  upload
    * 
    * @access   public
    * @return   boolean true/false
    */
    public function processEventVideoAdd($data) {
   
        $dataIn = array();
        $dataIn['video_title'] = $data['video_title'];
        $dataIn['video_url'] = $data['youtube_url'];
        $dataIn['created'] = date('Y-m-d H:i:s');
        $dataIn['added_by'] = $this->session->gets('adminuser_id');
        $dataIn['event_id'] = $data['event_id'];
        $dataIn['status'] = $data['status'];
        $result =  $this->db->insert('sg_eventvideos', $dataIn);
        return $this->db->lastInsertId(); 
      
    }
    
    /**
    * processGetVideos
    * 
    * get all Videos details
    * 
    * @access   public
    * 
    */
    public function processGetVideos($id) {
     return  $result = $this->db->findAll("SELECT video_id,video_url,event_id,video_title FROM sg_eventvideos WHERE event_id = '".$id."'");
     
    }
    
    
    /**
    * processGetEventTickets
    * 
    * get all event ticket details
    * 
    * @access public
    */
    public function processGetEventTickets($id) {
        return $this->db->findAll("SELECT * FROM sg_eventtickets WHERE event_id = '".$id."' ORDER BY ticket_id DESC"); 
    }
    
    /**
    * processGetEventTicketById
    * 
    * retrive news info by news id
    * 
    * @access   public
    * @param    int     $id news id
    * @return   array   news array
    */
    public function processGetEventTicketById($id) {
        return $this->db->find('SELECT * FROM sg_eventtickets WHERE sg_eventtickets.ticket_id = :ticket_id', array(':ticket_id' => $id));      
    }
    
    /**
    * processEventTicketAdd
    * 
    * 
    * 
    * @access   public
    * @return   boolean true/false
    */
    public function processEventTicketAdd($data) {
        
        $time = date("H:i", strtotime($data['start_sale_time']));
        $dateTimeString =  $data['start_sale_date'] . " " . $time;
        $date = strtotime($dateTimeString);
        $startSaleTime = date( 'Y-m-d H:i:s', $date );
        
        $time2 = date("H:i", strtotime($data['end_sale_time']));
        $dateTimeString2 =  $data['end_sale_date'] . " " . $time2;
        $date2 = strtotime($dateTimeString2);
        $endSaleTime = date( 'Y-m-d H:i:s', $date2 );
        
        $dataIn = array();
        $dataIn['event_id'] = $data['event_id'];
        $dataIn['ticket_name'] = $data['ticket_name'];
        $dataIn['ticket_desc'] = $data['ticket_desc'];
        $dataIn['ticket_price'] = $data['ticket_price'];
        $dataIn['selling_price'] = $data['selling_price'];
        $dataIn['ticket_quantity'] = $data['ticket_quantity'];
        $dataIn['ticket_currency'] = $data['ticket_currency'];        
        $dataIn['min_perbooking'] = $data['min_perbooking'];
        $dataIn['max_perbooking'] = $data['max_perbooking'];
        $dataIn['start_sale'] = $startSaleTime;
        $dataIn['end_sale'] = $endSaleTime;
        $dataIn['status'] = $data['status'];
        
        $this->db->insert('sg_eventtickets', $dataIn);
        return $this->db->lastInsertId(); 
      
    }
    
    /**
    * processEventTicketUpdate
    * 
    * save news details in database
    * 
    * @access   public
    * @param    array   $data news post data
    * @return   boolean true/false
    */
    public function processEventTicketUpdate($data){
        $time = date("H:i", strtotime($data['start_sale_time']));
        $dateTimeString =  $data['start_sale_date'] . " " . $time;
        $date = strtotime($dateTimeString);
        $startSaleTime = date( 'Y-m-d H:i:s', $date );
        
        $time2 = date("H:i", strtotime($data['end_sale_time']));
        $dateTimeString2 =  $data['end_sale_date'] . " " . $time2;
        $date2 = strtotime($dateTimeString2);
        $endSaleTime = date( 'Y-m-d H:i:s', $date2 );
        
        $dataIn = array();
        $dataIn['ticket_name'] = $data['ticket_name'];
        $dataIn['ticket_desc'] = $data['ticket_desc'];
        $dataIn['ticket_price'] = $data['ticket_price'];
        $dataIn['selling_price'] = $data['selling_price'];
        $dataIn['ticket_quantity'] = $data['ticket_quantity'];
        $dataIn['ticket_currency'] = $data['ticket_currency'];        
        $dataIn['min_perbooking'] = $data['min_perbooking'];
        $dataIn['max_perbooking'] = $data['max_perbooking'];
        $dataIn['start_sale'] = $startSaleTime;
        $dataIn['end_sale'] = $endSaleTime;
        $dataIn['status'] = $data['status'];
        
        $id = $data['ticket_id'];
        $this->db->update('sg_eventtickets', $dataIn, "`ticket_id` = $id");
        return true; 
    }  
    
    /**
    * processEventTicketDelete
    * 
    * delete news details from database
    * 
    * @access   public
    * @param    int   $id    news post id
    * @return   boolean true/false
    */
    public function processEventTicketDelete($id) {
        $this->db->deleteAll('sg_eventtickets', "ticket_id", $id);
        return true;
    }
    
    /**
    * processEventVenueAdd
    * 
    * save venue details in database
    * 
    * @access   public
    * @param    array   $data venues post data
    * @return   boolean true/false
    */
    public function processEventVenueAdd($data){
        
        $city  = $data['city'];
        if (!is_numeric($city)){
            $dataCity = array();
            $dataCity['country_id'] = $data['country'];
            $dataCity['state_id'] = $data['state'];
            $dataCity['city_name'] = $city;
            $dataCity['created'] = date('Y-m-d H:i:s');
            $dataCity['status'] = 1;
            $this->db->insert('sg_cities', $dataCity);
            $city = $this->db->lastInsertId();     
        }
        
        $dataIn = array();
        $dataIn['event_id'] = $data['event_id'];
        $dataIn['venues'] = $data['venues'];
        $dataIn['streets'] = $data['streets'];
        $dataIn['areas'] = $data['areas'];
        $dataIn['country'] = $data['country'];
        $dataIn['state'] = $data['state'];
        $dataIn['city'] = $city;
        $dataIn['zip_code'] = $data['zip_code'];        
        $dataIn['ven_phno'] = $data['ven_phno'];
        $dataIn['ven_url'] = $data['ven_url'];
        $dataIn['status'] = $data['status'];        
        $dataIn['created'] =date('Y-m-d H:i:s');
        $this->db->insert('sg_eventvenues', $dataIn);
        return $this->db->lastInsertId(); 
        
    }
    /**
    * processGetEventVenues
    * 
    * get all event venues by particular event id details
    *
    * @param    int   $id    event venue post id
    * @return   boolean true/false
    * @access public
    */
    public function processGetEventVenues($id) {
        
         $sql = "SELECT v.venue_id,v.venues,v.streets,
                    v.areas,v.country,v.state,v.created,
                    v.status,v.city,
                    c.country_id,c.country,s.state_id,
                    s.state_name,ci.city_id,ci.city_name "
                . "\n FROM sg_eventvenues v,sg_country c,sg_states s,sg_cities ci "
                . "\n WHERE v.country = c.country_id "
                . "\n AND v.state = s.state_id "
                . "\n AND v.city = ci.city_id "
                . "\n AND v.event_id= $id ORDER BY v.venue_id  DESC ";
         return $this->db->findAll($sql);
         
    }
    /**
    * processGetEventVenuesById
    * 
    * get all event venues by particular event id details
    *
    * @param    int   $id    event venue post id
    * @return   boolean true/false
    * @access public
    */
    public function processGetEventVenuesById($id) {
        
        $sql = "SELECT v.event_id,v.venue_id,v.zip_code,v.ven_url,v.ven_phno,v.venues,v.streets,v.areas,v.country,v.state,v.created,v.status,v.city,c.country_id,c.country,s.state_id,s.state_name,ci.city_id,ci.city_name FROM  "
                . "\n sg_eventvenues v,sg_country c,sg_states s,sg_cities ci "
                . "\n WHERE v.country = c.country_id AND"
                . "\n  v.state = s.state_id AND"
                . "\n v.city = ci.city_id AND"
                . "\n v.venue_id= $id ORDER BY v.venue_id  DESC ";
         return $this->db->find($sql);
    }
    /**
    * processGetEventVenuesByEditId
    * 
    * get all event venues by particular venue id details
    *
    * @param    int   $id    event venue post id
    * @return   boolean true/false
    * @access public
    */
    public function processGetEventVenuesByEditId($id) {
        
        return $this->db->find("SELECT * FROM sg_eventvenues WHERE venue_id = '$id'  ");
    }
    /**
    * processGetStates
    * 
    * @access   public
    * 
    * @return   array   state array
    */
    public function processGetStates($id) {
        
        return $this->db->findAll("SELECT * FROM sg_states WHERE state_id = '$id' ");
    }
    /**
    * processEventVenuesDelete
    * 
    * delete venues details from database
    * 
    * @access   public
    * @param    int   $id    venues post id
    * @return   boolean true/false
    */
    public function processEventVenuesDelete($id) {
        
        $this->db->deleteAll('sg_eventvenues', "venue_id", $id);
        return true;
    }
   /**
    * processGetCity
    * 
    * @access   public
    * 
    * @return   array   city array
    */
    public function processGetCity($id) {
        
        return $this->db->findAll("SELECT * FROM sg_cities WHERE city_id = '$id'");
    }
    /**
    * processEventVenueUpdate
    * 
    * save venues in database
    * 
    * @return   boolean true/false
    */
    public function processEventVenueUpdate($data) { 
            
        $dataIn = array();
        $dataIn['venues'] = $data['venues'];
        $dataIn['streets'] = $data['streets'];
        $dataIn['areas'] = $data['areas'];
        $dataIn['country'] = $data['country'];
        $dataIn['state'] = $data['state'];
        $city  = $data['city'];
        //new city details stored in cities table
        if (!is_numeric($city)){
                $dataCity = array();
                $dataCity['country_id'] = $data['country'];
                $dataCity['state_id'] = $data['state'];
                $dataCity['city_name'] = $city;
                $dataCity['created'] = date('Y-m-d H:i:s');
                $dataCity['status'] = 1;
                $this->db->insert('sg_cities', $dataCity);
                $city = $this->db->lastInsertId();     
        }
        $dataIn['city'] = $city;
        $dataIn['zip_code'] = $data['zip_code'];        
        $dataIn['ven_phno'] = $data['ven_phno'];
        $dataIn['ven_url'] = $data['ven_url'];
        $dataIn['status'] = $data['status'];
        
        $id = $data['venue_id'];
        $this->db->update('sg_eventvenues', $dataIn, "`venue_id` = $id");
        return true; 
        
    }
    
}

/* End of file news_model.php */
/* Location: ./modules/news/models/news_model.php */
?>