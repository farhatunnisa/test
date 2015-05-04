<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* News
* 
* This is news controller in News Module 
* 
* PHP version 5
* 
* @category   View
* @package    News
* @author     yuvakumar anusuri <yuva.kumar@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Events extends Controller {
    /**
    * Constructor
    * 
    * Here we can load default settings
    */
    public function __construct() {
        parent::__construct();
        
        // Verify user login
        if(!$this->session->gets('adminuser_id')) 
            $this->redirect('index');        
        
        // Load email helper
        $this->LoadHelper('Email'); 
        
        // Load email helper
        $this->LoadHelper('Seo');
        //Load Thumb Nail helper
        $this->LoadHelper('ImageUpload');
        //Laod Rich Text Editor
        $this->LoadHelper('Editor');
        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events";        
        $this->view->meta =  $metaData;
        $this->view->moduleId = 3;        
        $this->view->venueModuleId = 4;
        $this->view->ticketModuleId = 5;        
        $this->view->flyersModuleId = 6;
        $this->view->photosModuleId = 7;
        $this->view->videosModuleId = 8;
    }
    
    /**
    * index
    * 
    * View news list
    * 
    * @access public
    */
    public function index() {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - View Events";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = true;
        $this->view->formAssets = false;
        $this->view->videoAssets = false;
        $this->view->events = $this->model->processGetEvents();        
        $this->view->LoadView('events_view', 'events');
    } 
    
    /**
    * add
    * 
    * add news
    * 
    * @access public
    */
    public function add() { 
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Add Events";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;
        $this->view->editor = $this->Editor;
        $this->view->language = $this->model->processGetLanguage();        
        $this->view->LoadView('events_add', 'events');
    }
    
    /**
    * edit
    * 
    * edit news
    * 
    * @access public
    */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Edit Events";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;
        $this->view->editor = $this->Editor;
        $this->view->events = $this->model->processGetEventsById($id);
        $this->view->language = $this->model->processGetLanguage();
        $this->view->LoadView('events_edit', 'events');        
    }
    
    /**
    * details
    * 
    * details news
    * 
    * @access public
    */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Event Details";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = false;
        $this->view->videoAssets = false;
        $this->view->events = $this->model->processGetEventsById($id);
        $this->view->language = $this->model->processGetLanguage();
        $this->view->LoadView('events_details', 'events');          
    }
    
    /**
    * addNews
    * 
    * save news details in database
    * 
    * @access public
    */
    public function addEvents() { 
        $filedir = BASE . "/uploads/events/";
        $randName = rand(101010, 909090);
        if(!empty($_FILES['image_file']['name'])){
            $newName1 = "events_" . $randName;
            $newName2 = "thumb184x100_events_" . $randName;
            $newName3 = "thumb85x57_events_" . $randName;
            $ext1 = substr($_FILES['image_file']['name'], strrpos($_FILES['image_file']['name'], '.') + 1);
            
            $this->ImageUpload->File = $_FILES['image_file'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $filedir;
            $this->ImageUpload->NewWidth = '700';
            $this->ImageUpload->NewHeight = '300';
            $this->ImageUpload->NewName = $newName1;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $this->ImageUpload->File = $_FILES['image_file'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $filedir;
            $this->ImageUpload->NewWidth = '184';
            $this->ImageUpload->NewHeight = '100';
            $this->ImageUpload->NewName = $newName2;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $this->ImageUpload->File = $_FILES['image_file'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $filedir;
            $this->ImageUpload->NewWidth = '138';
            $this->ImageUpload->NewHeight = '91';
            $this->ImageUpload->NewName = $newName3;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $_POST['image_file'] = $newName1.".".strtolower($ext1);
        } else {
            $_POST['image_file'] = "";
        }
        
        $_POST['slug'] = $this->Seo->pageslug($_POST['event_title']);
        
        $result = $this->model->processEventsAdd($_POST);
        if($result){
            $this->session->sets("sucess","Your events successfully posted");
            $this->redirect('events');
        } else {
            $this->session->sets("failure","Please enter correct details");
            $this->redirect('events/add');
        }
    }
    
    /**
    * updateNews
    * 
    * save news details in database
    * 
    * @access public
    */
    public function updateEvents() { 
        $filedir = BASE . "/uploads/events/";
        $randName = rand(101010, 909090);
        if(!empty($_FILES['image_file']['name'])){
            
            $newName1 = "events_" . $randName;
            $newName2 = "thumb184x100_events_" . $randName;
            $newName3 = "thumb85x57_events_" . $randName;
            $ext1 = substr($_FILES['image_file']['name'], strrpos($_FILES['image_file']['name'], '.') + 1);
            
            $this->ImageUpload->File = $_FILES['image_file'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $filedir;
            $this->ImageUpload->NewWidth = '344';
            $this->ImageUpload->NewHeight = '206';
            $this->ImageUpload->NewName = $newName1;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $this->ImageUpload->File = $_FILES['image_file'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $filedir;
            $this->ImageUpload->NewWidth = '184';
            $this->ImageUpload->NewHeight = '100';
            $this->ImageUpload->NewName = $newName2;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $this->ImageUpload->File = $_FILES['image_file'];
            $this->ImageUpload->method = 1;
            $this->ImageUpload->SavePath = $filedir;
            $this->ImageUpload->NewWidth = '138';
            $this->ImageUpload->NewHeight = '91';
            $this->ImageUpload->NewName = $newName3;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            
            $_POST['image_file'] = $newName1.".".strtolower($ext1);
         } else {
            $_POST['image_file'] = $_POST['old_image_file'];
        }
        $_POST['slug'] = $this->Seo->pageslug($_POST['event_title']);
        
        $result = $this->model->processEventsUpdate($_POST);
        if($result){
            $this->session->sets("sucessE","Your events are successfully updated");
            $this->redirect('events');
        } else {
            $this->session->sets("failure","Please enter correct details");
            $this->redirect('events/edit/'.$_POST['event_id']);
        }
    }
    
    /**
    * deleteNews
    * 
    * delete news details from database
    * 
    * @access public
    */
    public function deleteEvents() {        
        $eventsunlink_data = $this->model->processEventsDataUnlink($_POST['deleteme']);
        $filedir = BASE . "/uploads/events/";
        foreach ($eventsunlink_data as $data) {
            if(!empty($data['event_poster'])) {
                if (file_exists($filedir . $data['event_poster'])) {
                    unlink($filedir . $data['event_poster']);
                    unlink($filedir . 'thumb_'.$data['event_poster']);
                }
            }
        }
        $this->model->processEventsDelete($_POST['deleteme']);
        echo 1;
    }
    
    
    /**
     * Event Photos methods starts here 
     */
    
    
    /**
    * add
    * 
    * add news
    * 
    * @access public
    */
    public function photos($id) { 
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Add Event Photos";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = true;
        $this->view->prettyPhotoAssets = true;
        $this->view->datatableAssets = false;
        $this->view->formAssets = false;
        $this->view->videoAssets = true;
        $this->view->event_id = $id;
        $this->view->eventPhotos = $this->model->processGetEventPhotos($id);
        $this->view->language = $this->model->processGetLanguage();
        $this->view->LoadView('events_photos', 'events');
    }
    
    /**
    * add
    * 
    * add news
    * 
    * @access public
    */
    public function photosRefresh($id) { 
        $this->view->event_id = $id;
        $this->view->eventPhotos = $this->model->processGetEventPhotos($id);
        $this->view->layout = "photoslayout";
        $this->view->LoadView('ajax/photos', 'events');
    }
    
    public function eventPhotosUpload($id){
        $filedir = BASE . "/uploads/eventsphotos/";
        $randName = rand(101010, 909090);
        if (!file_exists($filedir . $id)) {
            mkdir($filedir . $id, 0777, true);
        }
        
        /* new image upload code */        
        $newName1 = "event_" . $id . "_" . $randName;
        $newName2 = "thumb_event_" . $id . "_" . $randName;
        $ext = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);
        $filedir1 = $filedir . $id . "/" ;
        
        $this->ImageUpload->File = $_FILES['file'];
        $this->ImageUpload->method = 1;
        $this->ImageUpload->SavePath = $filedir1;
        //$this->ImageUpload->NewWidth = '770';
        //$this->ImageUpload->NewHeight = '254';
        $this->ImageUpload->NewName = $newName1;
        $this->ImageUpload->OverWrite = true;
        $err = $this->ImageUpload->UploadFile();

        $this->ImageUpload->File = $_FILES['file'];
        $this->ImageUpload->method = 1;
        $this->ImageUpload->SavePath = $filedir1;
        $this->ImageUpload->NewWidth = '245';
        $this->ImageUpload->NewHeight = '140';
        $this->ImageUpload->NewName = $newName2;
        $this->ImageUpload->OverWrite = true;
        $err = $this->ImageUpload->UploadFile();
        /* new image upload code ends */
        
        $data = array(
            'event_id' => $id,
            'photo_file' => $newName1.".".strtolower($ext),
            'added_by' => $this->session->gets('adminuser_id')
        );
        $result = $this->model->processEventPhotosUpload($data);
        if($result){
            echo "success";
        } else {
            echo "error";
        }            
        
    }
    
    public function eventPhotosTitles(){
        $data = array(
            'photo_id' => $_POST['photo_id'],
            'photo_title' => $_POST['title'],
            'photo_desc' => $_POST['long_desc'],
        );
        $result = $this->model->processEventPhotosTitle($data);
        echo 1;
    }
    
    /**
    * deleteNews
    * 
    * delete news details from database
    * 
    * @access public
    */
    public function eventPhotosDelete() { 
        $id = $_POST['photo_id'];
        $eventsunlink_data = $this->model->processEventPhotosDataUnlink($id);        
        foreach ($eventsunlink_data as $data) {            
            if(!empty($data['photo_file'])) {     
                $filedir = BASE . "/uploads/eventsphotos/" . $data['event_id'] . "/";
                if (file_exists($filedir . $data['photo_file'])) {
                    unlink($filedir . $data['photo_file']);
                    unlink($filedir . 'thumb_'.$data['photo_file']);
                    $this->model->processEventPhotosDelete($id);
                    echo $id;
                } else {
                    echo "0";
                }
            }
        } 
    }
    
    /**
    * add
    * 
    * add news
    * 
    * @access public
    */
    public function flyers($id) { 
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Event Flyers";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = true;
        $this->view->prettyPhotoAssets = true;
        $this->view->datatableAssets = false;
        $this->view->formAssets = false;
        $this->view->videoAssets = true;
        $this->view->event_id = $id;
        $this->view->eventFlyers = $this->model->processGetEventFlyers($id);
        $this->view->language = $this->model->processGetLanguage();
        $this->view->LoadView('events_flyers', 'events');
    }
    
    /**
    * add
    * 
    * add news
    * 
    * @access public
    */
    public function flyersRefresh($id) { 
        $this->view->event_id = $id;
        $this->view->eventFlyers = $this->model->processGetEventFlyers($id);
        $this->view->layout = "photoslayout";
        $this->view->LoadView('ajax/flyers', 'events');
    }
    
   public function eventFlyersUpload($id){
        $filedir = BASE . "/uploads/eventsflyers/";
        $randName = rand(101010, 909090);
        if (!file_exists($filedir . $id)) {
            mkdir($filedir . $id, 0777, true);
        }
        
        /* new image upload code */        
        $newName1 = "event_" . $id . "_" . $randName;
        $newName2 = "thumb_event_" . $id . "_" . $randName;
        $ext = substr($_FILES['file']['name'], strrpos($_FILES['file']['name'], '.') + 1);
        $filedir1 = $filedir . $id . "/" ;
        
        $this->ImageUpload->File = $_FILES['file'];
        $this->ImageUpload->method = 1;
        $this->ImageUpload->SavePath = $filedir1;
        //$this->ImageUpload->NewWidth = '770';
        //$this->ImageUpload->NewHeight = '254';
        $this->ImageUpload->NewName = $newName1;
        $this->ImageUpload->OverWrite = true;
        $err = $this->ImageUpload->UploadFile();

        $this->ImageUpload->File = $_FILES['file'];
        $this->ImageUpload->method = 1;
        $this->ImageUpload->SavePath = $filedir1;
        $this->ImageUpload->NewWidth = '245';
        $this->ImageUpload->NewHeight = '140';
        $this->ImageUpload->NewName = $newName2;
        $this->ImageUpload->OverWrite = true;
        $err = $this->ImageUpload->UploadFile();
        /* new image upload code ends */
        
        $data = array(
            'event_id' => $id,
            'flyer_file' => $newName1.".".strtolower($ext),
            'added_by' => $this->session->gets('adminuser_id')
        );
        $result = $this->model->processEventFlyersUpload($data);
        if($result){
            echo "success";
        } else {
            echo "error";
        }        
        
    }
    
    public function eventFlyersTitles(){
        $data = array(
            'flyer_id' => $_POST['photo_id'],
            'flyer_title' => $_POST['title'],
            'flyer_desc' => $_POST['long_desc'],
        );
        $result = $this->model->processEventFlyersTitle($data);
        echo 1;
    }
    
    /**
    * deleteNews
    * 
    * delete news details from database
    * 
    * @access public
    */
    public function eventFlyersDelete() { 
        $id = $_POST['photo_id'];
        $eventsunlink_data = $this->model->processEventFlyersDataUnlink($id);        
        foreach ($eventsunlink_data as $data) {            
            if(!empty($data['flyer_file'])) {     
                $filedir = BASE . "/uploads/eventsflyers/" . $data['event_id'] . "/";
                if (file_exists($filedir . $data['flyer_file'])) {
                    unlink($filedir . $data['flyer_file']);
                    unlink($filedir . 'thumb_'.$data['flyer_file']);
                    $this->model->processEventFlyersDelete($id);
                    echo $id;
                } else {
                    echo "0";
                }
            }
        } 
    }
    
    /**
    * add
    * 
    * add news
    * 
    * @access public
    */
    public function videos($id) { 
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Add Event Videos";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = false;
        $this->view->videoAssets = true;
        $this->view->event_id = $id;
        $this->view->eventVideos = $this->model->processGetVideos($id);
        $this->view->LoadView('events_videos', 'events');
    }
    
    /**
    * addVideos
    * 
    * save Videos details in database
    * 
    * @access public
    */
    public function addEventVideo() {
        
        $result = $this->model->processEventVideoAdd($_POST);
        if($result) {
             $this->redirect('events/videos/'.$_POST['event_id']);
        }     
    }
    /**
    * eventViedos
    * 
    * 
    * @acess public
    */     
    public function  eventVideos()
    {
          $data = array(
              'video_id' => $_POST['photo_id'],
              'video_title' => $_POST['title'],
              'video_url' => $_POST['long_desc'],
          );

          $result = $this->model->processEventVideos($data);
          echo 1;
    }

    /**
    * eventVideosDelete
    * 
    * delete viedos details from database
    * 
    * @access public
    */
    public function eventVideosDelete() {
          $id = $_POST['photo_id'];
          $this->model->processVideosDelete($id);
          echo $id;
    }
    
    /**
     * Event Tickets Methods Starts Here
     */
    
    /**
    * tickets
    * 
    * View tickets
    * 
    * @access public
    */
    public function tickets($id) {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - View Events Tickets";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = true;
        $this->view->formAssets = false;
        $this->view->videoAssets = false;
        $this->view->event_id = $id;        
        $this->view->eventTickets = $this->model->processGetEventTickets($id);        
        $this->view->LoadView('events_tickets', 'events');
    }
    
    /**
    * tickets
    * 
    * View tickets
    * 
    * @access public
    */
    public function ticketEdit($id) {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Edit Events Ticket";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;
        $this->view->eventTicket = $this->model->processGetEventTicketById($id); 
        $this->view->currency = $this->model->processGetCurrency();
        $this->view->event_id = $this->view->eventTicket['event_id'];  
        $this->view->LoadView('events_tickets_edit', 'events');
    }
    
    /**
    * tickets
    * 
    * View tickets
    * 
    * @access public
    */
    public function ticketAdd($id) {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Add Events Ticket";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;
        $this->view->event_id = $id;   
        $this->view->currency = $this->model->processGetCurrency();
        $this->view->LoadView('events_tickets_add', 'events');
    }
    
    /**
    * ticketDetails
    * 
    * ticketDetails
    * 
    * @access public
    */
    public function ticketDetails($id) {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - Event Ticket Details";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = false;
        $this->view->videoAssets = false;
        $this->view->eventTicket = $this->model->processGetEventTicketById($id);
        $this->view->eventDetails = $this->model->processGetEventsById($this->view->eventTicket['event_id']);
        $this->view->LoadView('events_tickets_details', 'events');          
    }
    
    /**
    * addEventTicket
    * 
    * save add event ticket in database
    * 
    * @access public
    */
    public function addEventTicket() { 
        
        $result = $this->model->processEventTicketAdd($_POST);
        if($result){
           if($result) {
                $this->session->sets('eventtickets', 'Your ticket details are successfully posted');
                $this->redirect('events/tickets/'.$_POST['event_id']);
           }
        } else {
            if($result) {
                $this->session->sets('eventticketf', 'Please check the ticket details');
                $this->redirect('events/tickets/'.$_POST['event_id']);
            }
        }
        
    }
    
    /**
    * addEventTicket
    * 
    * save add event ticket in database
    * 
    * @access public
    */
    public function updateEventTicket() { 
        
        $result = $this->model->processEventTicketUpdate($_POST);
        if($result){
           if($result) {
                $this->session->sets('eventticketups','Your tickect details are successfully updated');
                $this->redirect('events/ticketEdit/'.$_POST['ticket_id']);
           }
        } else {
            if($result) {
                 $this->session->sets('eventticketupf','Please check the ticket details');
                $this->redirect('events/ticketEdit/'.$_POST['ticket_id']);
            }
        }        
    }
    
    /**
    * deleteEventTickets
    * 
    * delete news details from database
    * 
    * @access public
    */
    public function deleteEventTickets() {        
        $this->model->processEventTicketDelete($_POST['deleteme']);
        echo 1;
    }
    
    /**
    * venues
    * 
    * View venues
    * 
    * @access public
    */
    public function venues($id) {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Events - View Events Venues";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = true;
        $this->view->formAssets = false;
        $this->view->videoAssets = false;
        $this->view->event_id = $id;        
        $this->view->eventVenues = $this->model->processGetEventVenues($id);         
        $this->view->LoadView('events_venues', 'events');
    }
    /**
    * venueAdd
    * 
    * add event venue
    * 
    * @access public
    */
    public function venueAdd($id) {
        
        $metaData = array();
        $metaData['title'] = "Manage Events - Add Events Venues";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;
        $this->view->event_id = $id;   
        
        $this->view->country = $this->model->processGetCountry();
        $this->view->LoadView('events_venues_add', 'events'); 
    }
    /**
    * addEventVenue
    * 
    * save add event venue in database
    * 
    * @access public
    */
     public function addEventVenue() { 
         $result = $this->model->processEventVenueAdd($_POST);
        if($result){
           if($result){
                $this->session->sets('successv','Your venue details are successfully posted');
                $this->redirect('events/venues/'.$_POST['event_id']);
           }
        } else {
            if($result){
                $this->session->sets('failurev','Please check venue details');
                $this->redirect('events/venues/'.$_POST['event_id']);
            }
        }  
    }
    /**
    * venueEdit
    * 
    * save eidt event venue in database
    * 
    * @access public
    */
     public function venueEdit($id) {
         
        $metaData = array();
        $metaData['title'] = "Manage Events - Edit Events Ticket";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;
        $this->view->eventVenue = $this->model->processGetEventVenuesByEditId($id); 
        $this->view->country = $this->model->processGetCountry();
        $this->view->states = $this->model->processGetStates($this->view->eventVenue['state']);
        $this->view->city = $this->model->processGetCity($this->view->eventVenue['city']); 
        $this->view->event_id = $this->view->eventVenue['event_id']; 
        $this->view->LoadView('events_venues_edit', 'events');
    }
    /**
    * deleteEventVenues
    * 
    * delete venues details from database
    * 
    * @access public
    */
    public function deleteEventVenues() {
        
        $this->model->processEventVenuesDelete($_POST['deleteme']);
        echo 1;
    }
    /*
     * get state names
     * dispalying all state names in json format;
     */
    public function getStateNames() {
        
        $result = $this->model->processGetStateNames($_POST);
        echo json_encode($result);
        
    }
    /*
     * getCityNames
     * dispalying all city names in json format;
     */
    public function getCityNames() {
        
        $result = $this->model->processGetCityNames($_POST);
        if(count($result)!=0)
        {
           echo json_encode($result);
        }
        else
        {
            echo 0;
        } 
   }
   /**
    * venueDetails
    * 
    * venueDetails
    * 
    * @access public
    */
    public function venueDetails($id) {
        
        $metaData = array();
        $metaData['title'] = "Manage Events - Event Venue Details";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = false;
        $this->view->videoAssets = false;
        $this->view->eventVenue = $this->model->processGetEventVenuesById($id);
        $this->view->eventDetails = $this->model->processGetEventsById($this->view->eventVenue['event_id']);
        $this->view->LoadView('event_venues_details', 'events'); 
        
    }
    /**
    * updateEventVenue
    * 
    * save add event venues in database
    * 
    * @access public
    */
    public function updateEventVenue() { 
        
        $result = $this->model->processEventVenueUpdate($_POST);
        if($result){
           if($result){
                $this->session->sets('venues','Your venue details are sucessfully updated');
                $this->redirect('events/venueEdit/'.$_POST['venue_id']);
           }
        } else {
            if($result) {
                 $this->session->sets('venuee','Please check the details');
                $this->redirect('events/venueEdit/'.$_POST['venue_id']);
            }
        }        
    }
   
}

/* End of file events.php */
/* Location: ./modules/events/controllers/events.php */
?>
