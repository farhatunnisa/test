<?php
if(!defined('DIRECT'))exit('No Direct File allowed');
/**
* newsletter
* 
* This is newsletter controller in newsletter Module 
* 
* PHP version 5
* 
* @category   newsletter
* @package    newsletter
* @author     SANKAR YETURI<sankar.g@siriinnovations.com>
* @version    1.0
* @license    http://URL name
* @access     public
*/
class Newsletter extends Controller {
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
        
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage newsletter";        
        $this->view->meta =  $metaData;
    }
   /**
    * index
    * 
    * View newsletter list
    * 
    * @access public
    */
    public function index() {  
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage newsletter - Add newsletter";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets  = false;        
        $this->view->datatableAssets  = true;
        $this->view->dropzoneAssets   = false;
        $this->view->formAssets       = true;

        $this->view->LoadView('newsletters', 'newsletter');
    } 
    /**
     * newsletterdatatable()
     */
    public function getNewsletter() {
        $NewsLetterList = $this->model->getNewsletter();
        echo json_encode($NewsLetterList);
    }
   
    /**
     * deletenewsletter()
     */
    public function deleteNewsletter() {
        $this->model->deleteNewsletter($_POST['deleteme']);
        echo 1;
    }
    
    /**
     * expordData()
     * export the newsletters data to excell sheet
     * @access public
     */
    public function getexcel(){
        $filename  = "newsletters_list_" . date('Ymd') . ".xls";
        $excelData = $this->model->getNewsletterExportExcel();
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

/* End of file newsletter.php */
/* Location: ./modules/newsletter/controllers/newsletter.php */
?>

