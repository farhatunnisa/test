<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* Faculty
* 
* This is Faculty controller in Faculty Module 
* 
* PHP version 5
* 
* @category   faculty
* @package    faculty
* @author     SANKAR YETURI<snakar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class faculty extends Controller {
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
        $this->LoadHelper('Seo');           //Load form helper
        $this->LoadHelper('Form');          //Load form helper
        $this->LoadHelper('ImageUpload');   // Load thumbnail helper
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage faculty";        
        $this->view->meta =  $metaData;        
    }
    
   /**
    * index
    * load view page
    * @access public
    * @return type Description
    */
    public function index() {  
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage faculty";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = true;
        $this->view->dropzoneAssets  = false;
        // load faculty view page
        $this->view->LoadView('faculty', 'faculty');
    } 
    
    /**
     * getFaculty()
     * get the faculty list
     * @access public
     */
    public function getFaculty() {        
        $result = $this->model->getFaculty();
        print_r(json_encode($result)); exit;
    }
    
    /**
     * changeStatus
     * change faculty status
     * @access public
     */
    public function changeStatus(){
        $status = $_POST['statusId'];        
        $this->model->changeStatus($_POST); 
        if($status == 1) {            
            echo 0;
        } else {
            echo 1;
        }
    }
    
    /**
     * deleteFaculty()
     * delete the Faculty records
     * @access public
     */
    public function deleteFaculty() { 
        //echo $_POST['deleteme'];exit;
        if(isset($_POST['deleteme'])) {
            $result = $this->model->deleteFaculty($_POST['deleteme']);
            echo 1;
        }
    }

    /**
     * add()
     * load faculty add page
     * @access public
     */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage faculty - Add faculty";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;   
        $this->view->dropzoneAssets  = false;        
        $this->view->countriesList   = file_get_contents(SITEURL."index/getCountries");        
        // load add faculty view page
        $this->view->LoadView('add_faculty', 'faculty');
    }
    
    /**
     * addFacultyDetails()
     * add faculty form details
     * @access public
     */
    public function addFacultyDetails() {   

        $filedir  = BASE . "uploads/faculty/";
        $thumbdir = BASE . "uploads/faculty/thumbs/";
        $slugName = $this->Seo->pageslug($_POST['faculty_name']);
        
        // image upload 
        if(!empty($_FILES['image']['name'])){
            $randName = rand(101010, 909090);
            $newName = $slugName . $randName;
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            //thumb image
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $thumbdir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            $_POST['image'] = $newName.".".strtolower($ext);
        }        
        $result = $this->model->addFacultyDetails($_POST);
        if($result != 0){
            $this->session->sets("success", 'Faculty details successfully added');
            $this->redirect('faculty');
        } else {
            $this->session->sets("fail", 'soryy due to some error process not completed');
            $this->redirect('faculty/add/');
        }
    }
    
    /**
     * details()
     * load faculty details page
     * @access public
     */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage faculty - Faculty details";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = true;
        $this->view->formAssets      = false;  
        $this->view->dropzoneAssets  = false;
        $this->view->facultyDetails  = $this->model->facultyDetails($id);    // get the faculty details
        // load add faculty view page
        $this->view->LoadView('details_faculty', 'faculty');
    }
    
    /**
     * edit()
     * load edit faculty page
     * @access public
     */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title']           = "Manage faculty - Edit Faculty";        
        $this->view->meta            = $metaData;
        $this->view->dashboardAssets = false;        
        $this->view->datatableAssets = false;
        $this->view->formAssets      = true;  
        $this->view->dropzoneAssets  = false;
        $this->view->facultyDetails  = $this->model->facultyDetails($id);    // get the faculty details
        $this->view->countriesList   = file_get_contents(SITEURL."index/getCountries");
        // load add faculty view page
        $this->view->LoadView('edit_faculty', 'faculty');
    }
    
    /**
     * updateFacultyDetails()
     * update faculty form details
     * @access public
     */
    public function updateFacultyDetails() {
        // image upload 
        if(!empty($_FILES['image']['name'])){
            $filedir  = BASE . "uploads/faculty/";
            $thumbdir = BASE . "uploads/faculty/thumbs/";
            $slugName = $this->Seo->pageslug($_POST['faculty_name']);
            unlink($filedir.$_POST['old_image']);
            unlink($thumbdir.$_POST['old_image']);
            $randName = rand(101010, 909090);
            $newName = $slugName . $randName;
            $ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $filedir;
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            //thumb image
            $this->ImageUpload->File      = $_FILES['image'];
            $this->ImageUpload->method    = 1;
            $this->ImageUpload->SavePath  = $thumbdir;
            $this->ImageUpload->NewWidth  = '200';
            $this->ImageUpload->NewHeight = '200';
            $this->ImageUpload->NewName   = $newName;
            $this->ImageUpload->OverWrite = true;
            $err = $this->ImageUpload->UploadFile();
            $_POST['image'] = $newName.".".strtolower($ext);
        } else {
            $_POST['image'] = "";
        }
        
        $result = $this->model->updateFacultyDetails($_POST);
        if($result){
            $this->session->sets('success','Your details are sucessfully updated');
            $this->redirect('faculty');
        } else {
            $this->session->sets('fail','Please check the details');
            $this->redirect('faculty/edit/'.$_POST['faculty_id']);
        }
    }
    
    /**
     * expordData()
     * export the newsletters data to excell sheet
     * @access public
     */
    public function getexcel() {
        $filename  = "faculty_list_" . date('Ymd') . ".xls";
        $excelData = $this->model->getFacultyData();
        //echo "<pre>"; print_r($excelData); exit;
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        $flag = false;
        foreach($excelData as $row) {
            if(!$flag) {
                echo implode("\t", array_keys($row)) . "\r\n";
                $flag = true;
            }
            foreach ($row as $k => $v) {
                $row[$k] = $this->cleanData($v);
            }
          echo implode("\t", array_values($row)) . "\r\n";
        }
        exit;
    }
    
    /**
     * cleanData()
     * 
     * @param type $str
     * @return string
     */
    public function cleanData($str) {
        // escape tab characters
        $str = preg_replace("/\t/", "", $str);

        // escape new lines
        $str = preg_replace("/\r?\n/", "", $str);
        $str = preg_replace("/\r\n/", "", $str);
        $str = preg_replace('/[\r\n\t]+/', "", $str);

        // convert 't' and 'f' to boolean values
        if($str == 't') $str = 'TRUE';
        if($str == 'f') $str = 'FALSE';

        // force certain number/date formats to be imported as strings
        if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
          $str = "'$str";
        }

        // escape fields that include double quotes
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
        return $str;
    }
}

/* End of file faculty.php */
/* Location: ./modules/faculty/controllers/faculty.php */
?>
