<?php session_start();
include("../config.php");
if(isset($_SESSION["user_id"])){
$select_db_string = mysql_query("select * from form_fields_json where user_master_id = '".$_SESSION["user_id"]."'");
if(mysql_num_rows($select_db_string) == 0){
 $ins_db_string = mysql_query("insert into  form_fields_json(user_master_id,form_fields_json_string) values('".$_SESSION["user_id"]."','".$_REQUEST['hdnjsonstring']."')"); 
}
else{
	$update_db_string = mysql_query("update form_fields_json set form_fields_json_string = '".$_REQUEST['hdnjsonstring']."' where user_master_id = '".$_SESSION["user_id"]."'"); 
	}
}
if(isset($_SESSION["user_id"])){
$select_db_string = mysql_query("select * from form_fields_json where user_master_id = '".$_SESSION["user_id"]."'");
if(mysql_num_rows($select_db_string) > 0){
$row_db_string = mysql_fetch_array($select_db_string);
$json_string = $row_db_string['form_fields_json_string'];
}
$json_string_arr = json_decode($json_string, false);
$notinfields = '';
 for($i=0;$i<count($json_string_arr);$i++){
		 $json_string_arr_single = (array)@$json_string_arr[$i];
		 
		 if($i!=0){$notinfields .= ",";}
$notinfields .= "'".$json_string_arr_single['cid']."'";
$updatefields = mysql_query("update journal_field_master set journal_form_field_label = '".$json_string_arr_single["label"]."' where user_master_id = '".$_SESSION["user_id"]."' and journal_field_name = '".$json_string_arr_single['cid']."'");
 }


$select_journal_field = mysql_query("select * from journal_field_master where user_master_id = '".$_SESSION["user_id"]."' and journal_field_name not in(".$notinfields.")");
if(mysql_num_rows($select_journal_field) > 0)
while($row_notinfield = mysql_fetch_array($select_journal_field)){
	$del_noin_fields = mysql_query("delete from journal_field_master where user_master_id = '".$_SESSION["user_id"]."' and journal_form_field_label = '".$row_notinfield["journal_form_field_label"]."' and journal_field_name = '".$row_notinfield['journal_field_name']."'");

	$del_noin_field_values = mysql_query("delete from  journal_form where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_field_master_id = '".$row_notinfield["journal_form_field_id"]."'");
	}
	
}
?>