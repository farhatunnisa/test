<?php

/*
* Form
* 
* This is the Form helper
* 
* PHP version 5
*
* @author naga lalitha <nagalalitha.k@siriinnovations.com>
* @version 1.0
* @license http://URL name
* @access public
*/
class Form {
    /**
     *
     * @var String 
     */
    public $Result;
    /**
     *
     * @var Array 
     */
    public $Attributes;
    
    public $error = array();
    public $set = array();
    /**
     * 
     */
    public function __construct() {
        $this->Result = NULL;
        $this->Attributes = array('autocomplete' => 'on',
            'enctype' => 'multipart/form-data',
            'name' => 'SgenioForm',
            'id' => 'SgenioForm',
            'target' => '_self');
    }
    /**
     * 
     * @param String $method
     * @param String $action
     * @param Array $options
     * @return String
     */
    public function FormOpen($method, $action, $options = array()) {
        
        $this->Result = '<form ';
        if(isset($method)) {
            $this->Result .= 'method="' . $method . '" ';
        }
        if(isset($action)) {
            $this->Result .= 'action="' . $action . '" ';
        }
        if(!empty($options)) {
            foreach($options as $key => $value) {
                $this->Result .= $key . '= "' . $value . '" ';
            }
        }
        else {
            foreach($this->Attributes as $key => $value) {
                $this->Result .= $key . '= "' . $value . '" ';
            }
        }
        $this->Result .= '>';
        return $this->Result;
    }
    
    /**
     * 
     * @return String
     */
    public function FormClose() {
        $this->Result = '</form>';
        return $this->Result;
    }
    
    /**
     * 
     * @param String $type
     * @param String $value
     * @param Array $options
     * @return String
     */
    public function InputField($type = 'text', $value = NULL, $options = array()) {
        $this->Result = '<input type="'. $type . '" ';
        if(isset($value)) {
            $this->Result .= 'value = "' . $value . '" ';
        }
        if(!empty($options)) {
            foreach ($options as $key => $value) {
                $this->Result .= $key . ' = "' . $value . '" ';
            }
        }        
        $this->Result .= '/>';
        return $this->Result;
    }
    
    /**
     * InputRadio()
     * 
     * @param String $name
     * @param String $value
     * @param String $checked
     * @param Array $options
     * @return String
     */
    public function InputRadio($name = NULL, $value = NULL, $checked = NULL, $options = array()) {
        if($checked == ''){
            return $this->error[$value] = $value . " field is required";            
        }        
    }
    /**
     * 
     * @param String $name
     * @param String $value
     * @param String $checked
     * @param Array $options
     * @return String
     */
    public function InputCheckbox($name = NULL, $value = NULL, $checked = NULL, $options = array()) {
        
        $this->Result = '<input type="checkbox" ';
        
        if(isset($name)) {
            $this->Result .= ' name = "' . $name . '" ';
        }
        
        if(isset($value)) {
            $this->Result .= ' value = "' . $value . '" ';
        }
        if(isset($checked)) {           
            if($checked == 'checked') {
                $this->Result .= 'checked = "checked"';
            }
        }
        if(!empty($options)) {
            foreach($options as $key => $value) {
                $this->Result .= $key . ' = "' .$value . '" ';
            }
        }
        $this->Result .= '/>';
        return $this->Result;
        
    }
    
    /**
     * 
     * @param String $name
     * @param Array $data
     * @param Array $selected
     * @param Array $options
     * @return String
     */    
    public function Dropdown($name, $data = array(), $selected = array(), $options = array()) {
                
        $this->Result = '<select ';
        
        if(isset($name)) {
            $this->Result .= 'name = "' . $name . '" ';
        }
        if(!empty($options)) {
            foreach($options as $key => $value) {
                $this->Result .= $key . ' = "' . $value . '" ';
            }
        }
        $this->Result .= '>';
        if(!empty($data)) { 
            
            foreach($data as $value => $text) {
                $select = NULL;
                if(is_array($text) && !empty($text)) {                    
                    $this->Result .= '<optgroup label="' . $value . '">' . "\n";
                    
                    foreach($text as $k => $v) {
                        if(in_array($k, $selected)) $select = 'selected = "selected"';
                        $this->Result .= '<option value = "' . $k . '" '. $select .' >' . $v . '</option>';
                    }
                    $this->Result .= '</optgroup>';
                }
                else {
                    if(in_array($value, $selected)) $select = 'selected = "selected"';
                    $this->Result .= '<option value = "' . $value . '" '. $select .'>' . $text . '</option>';
                }
                
            }
        }        
        $this->Result .= '</select>';
        return $this->Result;        
    }
    
    /**
     * 
     * @param String $name
     * @param String $value
     * @param Array $options
     * @return String
     */
    public function TextArea($name, $value = NULL, $options = array()) {
        $this->Result = '<textarea ';
        
        if(isset($name)) {
            $this->Result .= 'name = "' . $name . '" ';
        }
        if(!empty($options)) {
            foreach($options as $key => $data) {
                $this->Result .= $key . ' = "' . $data . '" ';
            }
        }
        $this->Result .= '>';
        if(isset($value) && $value != NULL) {
            $this->Result .= $value;
        }
        
        $this->Result .= '</textarea>';
        
        return $this->Result;
        
    }
    
    /**
     * validate() 
     * 
     * @param type $field
     * @param type $value
     * @param type $rules
     */
    public function validate($field, $value, $rules) {
        foreach($rules as $rule) {
            if(!array_key_exists($field, $this->error)){                
                if (preg_match('/-/',$rule)) {
                    list($rule, $rule_value) = explode('-', $rule);
                    $this->$rule($field, $value, $rule_value);
                } else {
                    $this->$rule($field, $value);
                }
            }            
        }        
    }
    
    /**
     * required()
     * to check the field is empty or not
     * @param type $field
     * @param type $value
     */
    public function required($field, $value) {
        if($value == ""){
            $this->error[$field] = $field . " field is required";
        }        
    }
    
    /**
     * minlength()
     * to check the minimum length validation
     * @param type $field
     * @param type $value
     * @param type $rule_value
     */
    public function minlength($field, $value, $rule_value) {
        if(strlen($value) < $rule_value) {
            $this->error[$field] = $rule_value . " min length";
        }
    }
    
    /**
     * matches()
     * @param type $field
     * @param type $value
     * @param type $conformPassword
     */
    public function matches($field, $value, $conformPassword) {
       if($value != $conformPassword ) {
             $this->error[$field] = $field . " doesnot mathces password";
        }        
    }
    
    /**
     * callback()
     * @param type $field
     * @param type $value
     * @param type $callbackvalue
     */
    public function callback($field, $value, $callbackvalue) {
       
         if($callbackvalue == "false") {
             $this->error[$field] = $field . " doesnot mathces ";
        }
    }
    /**
     * email()
     * @param type $field
     * @param type $value
     */
    public function email($field, $value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        $this->set[$field] = $value;
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->error[$field] = "please enter valid email";
        } 

    }
    
    /**
     * 
     * @param type $email
     */
    /*public function password($attr,$password) {
        $password = trim($password);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        $this->set[$attr] = $password;
        if (strlen($password) < 5) {
            $this->error[$attr] = "please enter atleast 5 chars";
        }
    } */
    
    /**
     * url() 
     * @param type $field
     * @param type $value
     */
    public function url($field, $value) {

    }
  
    /**
     * xss_clean
     * @param type $data
     * @return type
     */
    public function xss_clean($data) {
        // Fix &entity\n;
        $data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
        do {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        } while ($old_data !== $data);
        // we are done...
        return $data;
    }
    
    /**
     * prevent_xss
     * @param type $form_data
     * @return type
     */
    public function prevent_xss($form_data)  {
        $data = array();
        foreach($form_data as $key => $value){
            $data[$key] = $this->xss_clean($value);  
        }
        return $data;
    }

}

?>