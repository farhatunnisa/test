<?php
/**
 * ThumbNail
 * 
 * This is ThumbNail helper
 * 
 * PHP version 5
 * 
 * @author yuvakumar anusuri <yuva.kumar@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class ThumbNail {
/**
 * thumbImage
 * @param String name of the file
 * @param String directory of file
 * @param String final name of the image
 */
 public function thumbImage($name,$fileDir,$finalName, $myWidth = 85) {
      
    $extensions  = substr($_FILES[$name]['name'], strrpos($_FILES[$name]['name'], '.') + 1);
    $finalImageName  = $fileDir . $finalName.".".strtolower($extensions);
    $imageFilePath = $_FILES[$name]['tmp_name'];
    $thumbImage = $finalImageName;
    if(in_array(strtolower($extensions) , array('jpg','jpeg', 'gif', 'png', 'bmp'))){
    list($gotwidth, $gotheight, $gottype, $gotattr) = getimagesize($imageFilePath);
    if(strtolower($extensions) == "jpg" || strtolower($extensions) == "jpeg" ) {
        $result = imagecreatefromjpeg($_FILES[$name]['tmp_name']);
    }else if(strtolower($extensions)=="png") {
        $result = imagecreatefrompng($_FILES[$name]['tmp_name']);
    }else{
        $result = imagecreatefromgif($_FILES[$name]['tmp_name']);
    }
    list($width,$height) = getimagesize($_FILES[$name]['tmp_name']);
    if($gotwidth >= $myWidth) {
        $newwidth = $myWidth;
    } else {
        $newwidth = $gotwidth;
    }
    $newheight = round(($gotheight*$newwidth)/$gotwidth);
    $tmpName = imagecreatetruecolor($newwidth,$newheight);
    imagecopyresampled($tmpName,$result,0,0,0,0,$newwidth,$newheight, $width,$height);
    $createImageSave = imagejpeg($tmpName,$thumbImage,100); 
    }
    
     return 1 ;  
     
  }
/**
 * End ThumbNail file
 * @location libs/helpers/ThumbNail.php
 */
}
?>