<?php
/*
* PHP version 5
* 
* @author YUVAKUMAR ANUSURI <yuva.kumar@siriinnovations.com>
* @version 1.0
* @license http://URL name 
* @access public
*/
class Editor {
    
    public function __construct() {
        
    }
    
    /**
    * loadAdvancedEditor()
    * 
    * @param mixed $field
    * @param mixed $value
    * @param mixed $width
    * @param mixed $height
    * @param mixed $toolbar
    * @param mixed $var
    * @return
    */
    function loadAdvancedEditor($field, $width = "100%", $height = "450", $var = "oEdit1")
    {
            print '
                    <script type="text/javascript">
                      // <![CDATA[
                          var '.$var.' = new InnovaEditor("'.$var.'");
                          '.$var.'.width="'.$width.'";
                          '.$var.'.height='.$height.';
                          '.$var.'.enableFlickr = false;
                          '.$var.'.enableCssButtons = false;
                          '.$var.'.flickrUser = "";
                          '.$var.'.returnKeyMode = 2;
                          '.$var.'.arrCustomButtons = [
                          ["CustomName1","modalDialog(\'editor/scripts/common/paypal.htm\',350,270)","PayPal Button","btnPayPal.gif"],
                          ["HTML5Video", "modalDialog(\'editor/scripts/common/webvideo.htm\',750,550,\'HTML5 Video\');", "HTML5 Video", "btnVideo.png"]
                          ];
                          '.$var.'.toolbarMode = 2;
                          '.$var.'.groups=[
                          ["grpEdit", "", ["SourceDialog", "FullScreen", "SearchDialog", "RemoveFormat", "BRK", "Undo", "Redo", "Cut", "Copy", "Paste"]],
                          ["grpFont", "", ["FontName", "FontSize", "Strikethrough", "Superscript", "BRK", "Bold", "Italic", "Underline", "ForeColor", "BackColor"]],
                          ["grpPara", "", ["CompleteTextDialog", "Quote", "Indent", "Outdent", "Styles", "StyleAndFormatting", "Absolute", "BRK", "JustifyLeft", "JustifyCenter", "JustifyRight", "JustifyFull", "Numbering", "Bullets"]],
                          ["grpInsert", "", ["LinkDialog", "BRK", "ImageDialog", "Form"]],
                          ["grpTables", "", ["TableDialog", "BRK", "Guidelines", "Guidelines", "CustomName1"]],
                          ["grpMedia", "", ["Media", "FlashDialog", "YoutubeDialog", "HTML5Video", "BRK", "CustomTag", "CharsDialog", "Line"]]
                          ];

                          '.$var.'.css="'.THEMEURL.'assets/editor/siri-theme/ergo/css/custom.css";
                          '.$var.'.fileBrowser = "'.THEMEURL.'assets/editor/filemanager.php";
                          '.$var.'.arrCustomTag=[
                          ["First Last Name","[NAME]"],
                          ["Username","[USERNAME]"],
                          ["Site Name","[SITE_NAME]"],
                          ["Site Url","[URL]"]
                          ];
                          '.$var.'.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];
                          '.$var.'.mode="XHTMLBody";
                          '.$var.'.REPLACE("'.$field.'");
                          // ]]>
                    </script>
                    ';
    } 
    
    /**
    * loadBasicEditor()
    * 
    * @param mixed $field
    * @param mixed $value
    * @param mixed $width
    * @param mixed $height
    * @param mixed $toolbar
    * @param mixed $var
    * @return
    */
    function loadBasicEditor($field, $width = "100%", $height = "450", $var = "oEdit1")
    {
            print '
                    <script type="text/javascript">
                      // <![CDATA[
                          var '.$var.' = new InnovaEditor("'.$var.'");
                          '.$var.'.width="'.$width.'";
                          '.$var.'.height='.$height.';
                          '.$var.'.enableFlickr = false;
                          '.$var.'.enableCssButtons = false;
                          '.$var.'.flickrUser = "";
                          '.$var.'.returnKeyMode = 2;
                          '.$var.'.toolbarMode = 2;
                          '.$var.'.groups = [
                            ["group1", "", ["Undo", "Redo", "SourceDialog"]],  
                            ["group2", "", ["Bold", "Italic", "Underline", "FontDialog", "ForeColor", "TextDialog", "RemoveFormat"]],
                            ["group3", "", ["Bullets", "Numbering", "JustifyLeft", "JustifyCenter", "JustifyRight"]],
                            ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons"]]                            
                            ];
                          '.$var.'.css="'.THEMEURL.'assets/editor/siri-theme/ergo/css/custom.css";
                          '.$var.'.fileBrowser = "'.THEMEURL.'assets/editor/filemanager.php";
                          '.$var.'.arrCustomTag=[
                          ["First Last Name","[NAME]"],
                          ["Username","[USERNAME]"],
                          ["Site Name","[SITE_NAME]"],
                          ["Site Url","[URL]"]
                          ];
                          '.$var.'.customColors=["#ff4500","#ffa500","#808000","#4682b4","#1e90ff","#9400d3","#ff1493","#a9a9a9"];
                          '.$var.'.mode="XHTMLBody";
                          '.$var.'.REPLACE("'.$field.'");
                          // ]]>
                    </script>
                    ';
    } 
}

?>
