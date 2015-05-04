<?php
/**
 * database
 * 
 * This is PDO driver database extends from PDO
 * @uses connect the database
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name 
 * @access public
 */
class Database extends PDO {
    /**
     * Constructor
     * 
     * This is main database connect method in database package
     * 
     * @param string  $DB_SERVER server name
     * @param string  $DB_NAME database name
     * @param string  $DB_USERNAME database user name
     * @param string $DB_PASSWORD database password
     */
    public function __construct($DB_SERVER, $DB_NAME, $DB_USERNAME, $DB_PASSWORD) {
        parent::__construct('mysql:host=' . $DB_SERVER . ';dbname=' . $DB_NAME, $DB_USERNAME, $DB_PASSWORD);
    }
    /**
     * findAll
     * This is select query method 
     * @param string $sql
     * @param array $data
     * @param string $fetchmode
     * 
     * return array
     * 
     */
    public function findAll($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $res = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $res->bindValue("$key", $value);
            
        }
        $res->execute();
        return $res->fetchAll($fetchMode);
     
    }
    /**
     * find
     * This single record select method 
     * @param string $sql
     * @param array $data
     * @param string $fetchmode
     * 
     * return array
     * 
     */
    public function find($sql, $data = array(), $fetchMode = PDO::FETCH_ASSOC) {
     
        $res = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $res->bindValue("$key", $value);
           
        }
        $res->execute();
        return $res->fetch($fetchMode);  
    }




    /**
     * insert
     * 
     * This is insert method for inserting data into database
     * 
     * @param string $table
     * @param array $data
     * 
     * return boolean
     */
    public function insert($table, $data) {
        
        $tablefiledNames = implode(', ', array_keys($data));
        $tablefiledValues = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($tablefiledNames) VALUES ($tablefiledValues)";
        $query = $this->prepare($sql);
        if(!$query) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->errorInfo());
        }
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        $query->execute();
	        
    }
    
    /**
     * update
     * This is update method for updateing the values in to database
     * 
     * @param string $table
     * @param array $data 
     * @param string $where
     * 
     * @return boolean
     */
    public function update($table, $data, $where) {
        $filedNames = NULL;
        foreach ($data as $key => $value) {
            $filedNames .= "`$key`=:$key," ;
        }
        $filedNames = rtrim($filedNames, ',');
        $sql = "UPDATE $table SET $filedNames WHERE $where";
        $query = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $query->bindValue(":$key", $value);
        }
        $query->execute();
        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }  
        
    }
    /**
     * delete
     * This is delete method for deleting the records from database
     * @param string $table
     * @param string $where
     * @param integer $limit
     * 
     * return boolean
     */
    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
        
    }
    
    /**
    *
    * @param string $table
    * @param string $where
    * @param integer $ids
    * @return boolean
    */
    public function deleteAll($table, $where, $ids) {
        return $this->exec("DELETE FROM $table WHERE $where IN($ids)");
    }
    
    public function query($sql) {
        return $this->exec($sql);
    }
    
    /**
     * 
     * @param type $sTable
     * @param type $aColumns
     * @param type $sIndexColumn
     * @param type $joins
     * @param type $condition
     * @param type $orderby
     * @param type $groupby
     * @return type
     */
    public function drawDatatable($sTable, $aColumns, $sIndexColumn , $joins, $condition, $groupby=null, $sOrder=null) {
   
	/* 
        * Paging
        */	 
	$sLimit = "";
	if ( isset( $_POST['iDisplayStart'] ) && $_POST['iDisplayLength'] != '-1' ) {
            $sLimit = "LIMIT ".intval( $_POST['iDisplayStart'] ).", ".
			intval( $_POST['iDisplayLength'] );
	}
	
	
	/*
        * Ordering
        */
	if ( isset( $_POST['iSortCol_0'] ) ) {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_POST['iSortingCols'] ) ; $i++ ) {
                if ( $_POST[ 'bSortable_'.intval($_POST['iSortCol_'.$i]) ] == "true" ) {
                    $sOrder .= "".$aColumns[ intval( $_POST['iSortCol_'.$i] ) ]." ".
                                ($_POST['sSortDir_'.$i]==='asc' ? 'asc' : 'desc') .", ";
                }
            }

            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" ) {
                $sOrder = "";
            }		
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( isset($_POST['sSearch']) && $_POST['sSearch'] != "" ) {
            $sWhere = "AND (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
                if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "false" ) {
                    $sWhere .= "".$aColumns[$i]." LIKE '%".$_POST['sSearch']."%' OR ";
                }
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
	} 	
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ ) {
            if ( isset($_POST['bSearchable_'.$i]) && $_POST['bSearchable_'.$i] == "true" && $_POST['sSearch_'.$i] != '' ){
                if ( $sWhere == "" ) {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= "`".$aColumns[$i]."` LIKE '%".mysql_real_escape_string($_POST['sSearch_'.$i])."%' ";
            } 
	}
		
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "SELECT  ".str_replace(" , ", " ", implode(",", $aColumns))." FROM   $sTable $joins $condition $sWhere $groupby $sOrder $sLimit";
        //echo $sQuery; exit; 
	$rResult = $this->findAll( $sQuery );
       
	
	/* Data set length after filtering filter filter */
	
	$sQuery = "SELECT COUNT(*) as filter
                    FROM $sTable $joins $condition $sWhere ";		   
	
	$aResultFilterTotal = $this->findAll($sQuery);
        
	//$iFilteredTotal = $aResultFilterTotal[0]['foundrows'];
	$iFilteredTotal = $aResultFilterTotal[0]['filter'];
	//print_r($iFilteredTotal); exit;
	/* Total data set length */
	//$sQuery = "SELECT SQL_NO_CACHE $sTable.id FROM $sTable"; 
	//$sQuery = "SELECT ".str_replace(" , ", " ", implode(",", $aColumns))."  FROM $sTable $joins $sWhere $sOrder $sLimit"; 
        //$aResultTotal = $this->findAll($sQuery);
        //$iTotal = $aResultTotal[0];
	$sQuery = "
		SELECT COUNT(*) as num
		FROM $sTable $joins $condition $sWhere
	"; 
        $aResultTotal = $this->findAll($sQuery);
        //$iTotal = $aResultTotal[0];
        $iTotal = $aResultTotal[0]['num'];
	//$sQuery = "SELECT  ".str_replace(" , ", " ", implode(",", $aColumns))." FROM   $sTable $joins $sWhere $sOrder $sLimit";
	
	//$rResultTotal = mysql_query( $sQuery ) or die( 'MySQL Error: ' . mysql_errno() );
		
	
	/*
	 * Output  "iTotalDisplayRecords" => $iTotal,//$iFilteredTotal,
	 */
	$output = array(
		"sEcho" => intval($_POST['sEcho']),
		"iTotalRecords" => $iTotal,
		//"iTotalDisplayRecords" => $iTotal,//$iFilteredTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array() 
	);
	
        $columnId = array();
        foreach($aColumns as $col) {
            $data = explode(".",$col); 
            $columnId[] = $data[1];
        }
        
        
	//print_r($output); exit;
	foreach ( $rResult as $aRow ) 
	{    
		$row = array();
		for ( $i=0 ; $i<count($columnId) ; $i++ )
		{
                    
                    if ( $columnId[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $columnId[$i] ]=="0") ? '-' : $aRow[ $columnId[$i] ];
                               
			}
                       
			else if ( $columnId[$i] != '' )
			{
				/* General output */                                
				$row[] = $aRow[$columnId[$i]];
			}
                        
                        //print_r($row); exit;
		}
		$output['aaData'][] = $row;
	}
        //print_r($output); exit;
	return $output;
    }   
    
}
?>
