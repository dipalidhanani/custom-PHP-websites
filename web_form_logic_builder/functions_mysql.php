<?php
function Connect($db_hostname,$db_username,$db_password,$db_dbname) {
	if ( !$link = mysql_connect($db_hostname,$db_username,$db_password) ) {
		die(mysql_error());
	}
	if ( !mysql_select_db($db_dbname,$link) ) {
		die(mysql_error());
	}
}
function AddData($tablename,$dataArray) {
		$sql = "insert into ".$tablename." set ";
		foreach($dataArray as $key=>$value) {
			$sql .= $key."=".$value.",";
		}
		$sql = trim($sql,",");
		
		$rs = mysql_query($sql) or die($sql."<hr>".mysql_error());
		return mysql_insert_id();
}

function UpdateData($tablename,$dataArray,$condition) {
	$sql = "update ".$tablename." set ";
	foreach($dataArray as $key=>$value) {
		$sql .= $key."=".$value.",";
	}
	$sql = trim($sql,",");
	$sql .= " where ".$condition;
	$rs = mysql_query($sql) or die($sql."<hr>".mysql_error());
}
function rowCount($sql='') {
	$rs = mysql_query($sql) or die($sql."<hr>".mysql_error());
	return mysql_num_rows($rs);
}
function FetchData($sql='') {
	$rs = mysql_query($sql) or die($sql."<hr>".mysql_error());
	$row = mysql_fetch_array($rs);
	return $row;
}
function FetchMultipleData($sql='') {
	$rs = mysql_query($sql) or die($sql."<hr>".mysql_error());
	while ( $row = mysql_fetch_array($rs) ) {
		$data[] = $row;
	}
	return $data;
}
function getTableData($tablename,$condition) {
	$sql = "select * from ".$tablename." where ".$condition;
	$rs = mysql_query($sql) or die($sql."<hr>".mysql_error());
	$row = mysql_fetch_array($rs);
	return $row;
}

function IsLoggedIn() {
	if ( $_SESSION['UserID'] != "" ) {
		return true;	
	} else {
		return false;	
	}
}
function NumberOfRows($sql) {
	$rs = mysql_query($sql);
	if( !$rs ){
		$sql."<hr>".mysql_error();
		exit();
	} else {
		$numrows = mysql_num_rows($rs);		
	}
	return $numrows;
}

function generatePassword($length) {
					
			$password='';
			
			for ($i=0;$i<=$length;$i++) {
			
			$chr='';
			
			switch (mt_rand(1,3)) {
			
			case 1:
			
			$chr=chr(mt_rand(48,57));
			
			break;
			
			case 2:
			
			$chr=chr(mt_rand(65,90));
			
			break;
			
			case 3:
			
			$chr=chr(mt_rand(97,122));
			
			
			
			}
			
			$password.=$chr;
			
			}  
			
			return $password;
			
			}


?>