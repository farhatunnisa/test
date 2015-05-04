<?php
/**
 * File
 * 
 * This is File
 * 
 * PHP version 5
 * 
 * @author yuvakumar anusuri <yuva.kumar@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class File {

    /**
    * removeDirectoryOrFile
    * 
    * This is removeDirectoryOrFile
    * 
    * @param string $dir
    * 
    * @access public
    * 
    */
    public function removeDirectoryOrFile($dir) {
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file)
                if ($file != "." && $file != "..") $this->removeDirectoryOrFile("$dir/$file");
            rmdir($dir);
        }
        else if (file_exists($dir)) unlink($dir);
    }

    /**
    * removeDirectoryOrFile
    * 
    * This is removeDirectoryOrFile
    * 
    * @param string $dir
    * 
    * @access public
    * 
    */ 
    public function rcopy($src, $dst) {
        if (file_exists ( $dst ))
            $this->removeDirectoryOrFile ( $dst );
        if (is_dir ( $src )) {
            mkdir ( $dst );
            $files = scandir ( $src );
            foreach ( $files as $file )
                if ($file != "." && $file != "..")
                    $this->rcopy ( "$src/$file", "$dst/$file" );
        } else if (file_exists ( $src ))
            copy ( $src, $dst );
    }
  
}
?>