<?php
/**
 * privileges
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class privileges extends Controller {
    
    public function __construct() {
        parent::__construct();
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Privileges";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = true;
        $this->view->dropzoneAssets = true;
        $this->view->prettyPhotoAssets = true;
        $this->view->datatableAssets = true;
        $this->view->formAssets = true;
        $this->view->videoAssets = true;   
    }
    
    
    public function index() {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Privileges - View Privileges";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = true;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;       
        
        $data = $this->model->getAdminRoles();
        $this->view->rolesList = $data;
        $this->view->LoadView('privileges_view', 'privileges');
    }
    
    /**
    * add()
    * 
    * Add admin roles  
    * 
    */
    public function add() {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Privileges - Add Privileges";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;       
        
        $this->view->LoadView('privileges_add', 'privileges');
    }
    
    /**
    * add()
    * 
    * Add admin roles  
    * 
    */
    public function edit($id) {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Privileges - Edit Privileges";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = false;
        $this->view->formAssets = true;
        $this->view->videoAssets = false;       
        
        $this->view->adminRoles = $this->model->processGetAdminRolesById($id);
        $this->view->LoadView('privileges_edit', 'privileges');
    }
    
    /**
    * addPrivileges()
    * 
    * Add admin roles to database 
    * 
    */
    public function addPrivileges() {
        $result = $this->model->processPrivilegesAdd($_POST);
        if($result){
            $this->session->sets('sucess', 'You are sucessfully posted privileges ');
            $this->redirect('privileges');
        } else {
            $this->session->sets('failure', 'Please check the details');
            $this->redirect('privileges/add');
        }
    }
    
    /**
    * updatePrivileges
    * 
    * save Privileges details in database
    * 
    * @access public
    */
    public function updatePrivileges() { 
        $result = $this->model->processPrivilegesUpdate($_POST);
        if($result){
            $this->session->sets('updateSucess','You are sucessfully updated privileges');
            $this->redirect('privileges');
        } else {
            $this->session->sets('updateFailure','Please check the details');
            $this->redirect('privileges/edit/'.$_POST['adminrole_id']);
        }
    }
    
    /**
    * deletePrivileges
    * 
    * deletePrivileges details from database
    * 
    * @access public
    */
    public function deletePrivileges() {        
        $this->model->processPrivilegesDelete($_POST['deleteme']);
        echo 1;
    }  
    
    /**
    * details()
    * 
    * Privileges details from database
    * 
    * @access public
    * @param int $id admin role id
    */
    public function details($id) {
        // Set meta data
        $metaData = array();
        $metaData['title'] = "Manage Privileges - View Privileges";        
        $this->view->meta =  $metaData;
        $this->view->dashboardAssets = false;
        $this->view->dropzoneAssets = false;
        $this->view->prettyPhotoAssets = false;
        $this->view->datatableAssets = true;
        $this->view->formAssets = false;
        $this->view->videoAssets = false; 
        
        $data = $this->model->getModules();
        $accessRoles = $this->model->getRolePermissions($id);
        if($accessRoles !='') {
           $this->view->accessRolesList = $accessRoles;
        } else {
           $this->view->accessRolesList = '';
        }
        $this->view->accessRolesList = $accessRoles;
        $this->view->modulesList = $data;
        $this->view->LoadView('privileges_roles', 'privileges');
    }    
    
    public function accessPages() {
        $status = $_POST['status'];
        $access = $_POST['accessName'];
        $id = $_POST['roleId'];
        $accessRoles = $this->model->getRolePermissions($id);
        
        if($status == 'y') {
            if($accessRoles != '') {
                $data = array();
                if($accessRoles[$access] != '') {
                    $data[$access] = $accessRoles[$access] . ',' .$_POST['slugName'];  
                } else {
                    $data[$access] = $_POST['slugName'];
                }
            
                $result = $this->model->updatePermissionsData($data, $id);
                if($result) {
                    echo '1';
                } else {
                    echo '0';
                }            
            } else {
                $data = array();
                $data[$access] = $_POST['slugName'];
                $data['adminrole_id'] = $id;
                $result = $this->model->insertPermissionsData($data);
                if($result) {
                    echo '1';
                } else {
                    echo '0';
                }
            }
        } else {            
            $values = explode(',', $accessRoles[$access]);
            $newValues = array_diff( $values, array($_POST['slugName']));
            //$newValues = array_diff( $values, [$_POST['slugName']]);
            $savedValues = implode($newValues, ',');
            $data = array();
            $data[$access] = $savedValues;
            $result = $this->model->updatePermissionsData($data, $id);
            if($result) {
                echo '0';
            } else {
                echo '1';
            }
        }
    }
    
}
?>
