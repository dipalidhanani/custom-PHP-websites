<?php session_start();
include("config.php");
 include("functions_mysql.php");
 include("functions.php");
 
if($_REQUEST['process'] == 'edit'){
/*	 echo "<pre>";
	 print_r($_REQUEST);
	 echo "</pre>";
	*/
	 
if(isset($_SESSION["user_id"])){
$select_db_string = mysql_query("select * from form_fields_json where user_master_id = '".$_SESSION["user_id"]."'");
if(mysql_num_rows($select_db_string) > 0){
$row_db_string = mysql_fetch_array($select_db_string);
$json_string = $row_db_string['form_fields_json_string'];

$json_string_arr = json_decode($json_string, false);
//$ins_journal = mysql_query("insert into journal_form_master(user_master_id,journal_entry_title,journal_entry_status,journal_entry_priority,journal_entry_date) values('".$_SESSION["user_id"]."','".$_REQUEST['journal_entry_title']."','".$_REQUEST['journal_entry_status']."','".$_REQUEST['journal_entry_priority']."','".$_REQUEST['journal_entry_date']."')"); 
//$ins_journal_insert_id = mysql_insert_id();
$update_journal_det = mysql_query("update journal_form_master set 
journal_entry_title = '".$_REQUEST['journal_entry_title']."',
journal_entry_status = '".$_REQUEST['journal_entry_status']."' ,
journal_entry_priority = '".$_REQUEST['journal_entry_priority']."',
journal_entry_date = '".$_REQUEST['journal_entry_date']."',
potential_take_profit='".$_REQUEST['potential_take_profit']."',
new_potential_take_profit='".$_REQUEST['new_potential_take_profit']."',
pips_earned_lost='".$_REQUEST['pips_earned_lost']."',
potential_entry_price='".$_REQUEST['potential_entry_price']."',
new_potential_entry_price='".$_REQUEST['new_potential_entry_price']."',
actual_entry_price='".$_REQUEST['actual_entry_price']."',
potential_account_risk='".$_REQUEST['potential_account_risk']."',
new_potential_account_risk='".$_REQUEST['new_potential_account_risk']."',
actual_potential_account_risk='".$_REQUEST['actual_potential_account_risk']."',
what_potential_account_risk='".$_REQUEST['what_potential_account_risk']."',
potential_risk_to_reward='".$_REQUEST['potential_risk_to_reward']."',
new_potential_risk_to_reward='".$_REQUEST['new_potential_risk_to_reward']."',
actual_potential_risk_to_reward='".$_REQUEST['actual_potential_risk_to_reward']."'
 where user_master_id = '".$_SESSION["user_id"]."' and journal_id = '".$_REQUEST["journal_id"]."'");


 for($i=0;$i<count($json_string_arr);$i++){
		 $json_string_arr_single = (array)@$json_string_arr[$i];
		 if(($json_string_arr_single['cid'] != 'journal_entry_title') && 
		($json_string_arr_single['cid'] != 'journal_entry_status')&& 
		($json_string_arr_single['cid'] != 'journal_entry_priority')&& 
		($json_string_arr_single['cid'] != 'journal_entry_date')&& 
		($json_string_arr_single['cid'] != 'potential_take_profit')&& 
		($json_string_arr_single['cid'] != 'new_potential_take_profit')&& 
		($json_string_arr_single['cid'] != 'pips_earned_lost')&& 
		($json_string_arr_single['cid'] != 'potential_entry_price')&& 
		($json_string_arr_single['cid'] != 'new_potential_entry_price')&& 
		($json_string_arr_single['cid'] != 'actual_entry_price')&& 
		($json_string_arr_single['cid'] != 'potential_account_risk')&& 
		($json_string_arr_single['cid'] != 'new_potential_account_risk')&& 
		($json_string_arr_single['cid'] != 'actual_potential_account_risk')&& 
		($json_string_arr_single['cid'] != 'what_potential_account_risk')&& 
		($json_string_arr_single['cid'] != 'potential_risk_to_reward')&& 
		($json_string_arr_single['cid'] != 'new_potential_risk_to_reward')&& 
		($json_string_arr_single['cid'] != 'actual_potential_risk_to_reward')		
		){
		 if($json_string_arr_single['field_type'] != 'section_break'){
		// echo $json_string_arr_single['label'];
		
		$sel_fields = mysql_query("select * from journal_field_master where user_master_id = '".$_SESSION["user_id"]."' and journal_form_field_label = '".$json_string_arr_single['label']."'
		 and journal_field_name = '".$json_string_arr_single['cid']."'");
		$row_fields = mysql_fetch_array($sel_fields);
		if(mysql_num_rows($sel_fields) == 0){
		$ins_fields = mysql_query("insert into journal_field_master(user_master_id,journal_form_field_label,journal_field_name) values('".$_SESSION["user_id"]."','".$json_string_arr_single['label']."','".$json_string_arr_single['cid']."')");
		$id_field = mysql_insert_id();
		}
		else
		{
		$id_field = $row_fields['journal_form_field_id'];
		}
		
		
		if($json_string_arr_single['field_type'] == 'file'){
			$form_image = '';
				 if (  basename(sanitizeName($_FILES[$json_string_arr_single['cid']]['name'])) != "" ) {
						$form_image = UploadImage($_FILES[$json_string_arr_single['cid']]['tmp_name'],"form_images",basename(sanitizeName($_FILES[$json_string_arr_single['cid']]['name'])));
					}
					if($form_image != ''){
					
					$select_total_forms_file = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_master_id = '".$_REQUEST['journal_id']."' and journal_field_master_id = '".$id_field."'");
					 if(mysql_num_rows($select_total_forms_file) == 0){
					 $ins_journal_det = mysql_query("insert into journal_form(journal_user_master_id,journal_master_id,journal_field_master_id,journal_form_field_value) 
		values('".$_SESSION["user_id"]."','".$_REQUEST['journal_id']."','".$id_field."','".$form_image."')");
					 } else {
						 $update_journal_det = mysql_query("update journal_form set journal_form_field_value = '".$form_image."' where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_master_id = '".$_REQUEST['journal_id']."' and journal_field_master_id = '".$id_field."'");
					 }
					}
					 	
					}else{
						if($json_string_arr_single['field_type'] == 'checkboxes'){
						 $checkBox = implode(',', $_REQUEST[$json_string_arr_single['cid']]);
					 $select_total_forms_checkboxes = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_master_id = '".$_REQUEST['journal_id']."' and journal_field_master_id = '".$id_field."'");
					 if(mysql_num_rows($select_total_forms_checkboxes) == 0){
					 $ins_journal_det = mysql_query("insert into journal_form(journal_user_master_id,journal_master_id,journal_field_master_id,journal_form_field_value) 
		values('".$_SESSION["user_id"]."','".$_REQUEST['journal_id']."','".$id_field."','".$checkBox."')");
					 } else {
						 $update_journal_det = mysql_query("update journal_form set journal_form_field_value = '".$checkBox."' where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_master_id = '".$_REQUEST['journal_id']."' and journal_field_master_id = '".$id_field."'");
					 }
					
						}
					else{
						
						$select_total_forms_all = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_master_id = '".$_REQUEST['journal_id']."' and journal_field_master_id = '".$id_field."'");
					 if(mysql_num_rows($select_total_forms_all) == 0){
					 $ins_journal_det = mysql_query("insert into journal_form(journal_user_master_id,journal_master_id,journal_field_master_id,journal_form_field_value) 
		values('".$_SESSION["user_id"]."','".$_REQUEST['journal_id']."','".$id_field."','".$_REQUEST[$json_string_arr_single['cid']]."')");
					 } else {
						 $update_journal_det = mysql_query("update journal_form set journal_form_field_value = '".$_REQUEST[$json_string_arr_single['cid']]."' where journal_user_master_id = '".$_SESSION["user_id"]."' and journal_master_id = '".$_REQUEST['journal_id']."' and journal_field_master_id = '".$id_field."'");
					 }
					 		
				  
						}
		}
 }
}	}
 
}}}
	
	 	header('location: index.php?page=view_journal_entries');
		exit;
 ?>