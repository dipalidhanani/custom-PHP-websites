<?php
include("../config.php");
 include("functions_mysql.php");
 include("functions.php");
if($_REQUEST["process"]=="add")
{

$qregister=mysql_query("insert into user_master(
user_fullname,
user_email,
user_username,
user_password
) values(
'".addslashes($_REQUEST["user_fullname"])."',
'".addslashes($_REQUEST["user_email"])."',
'".addslashes($_REQUEST["user_username"])."',
'".addslashes($_REQUEST["user_password"])."'
)");

$usermzasterid = mysql_insert_id();

$jsonstring = '[{"label":"Journal Entry Title","field_type":"text","required": true,"field_options":{},"cid":"journal_entry_title"},{"label":"Journal Entry Status","field_type":"radio","required": true,"field_options":{"options":[{"label":"Open","checked":false},{"label":"Stalking","checked":false},{"label":"Closed","checked":false}]},"cid":"journal_entry_status"},{"label":"Journal Entry Priority","field_type":"dropdown","required": false,"field_options":{"options":[{"label":"Red","checked":false},{"label":"Yellow","checked":false},{"label":"Green","checked":false},{"label":"no Colour/priority","checked":false}]},"cid":"journal_entry_priority"},{"label":"Journal Date","field_type":"date","required": true,"field_options":{},"cid":"journal_entry_date"},{"label":"Potential Take Profit (Pips)","field_type":"text","required": true,"field_options":{},"cid":"potential_take_profit"},{"label":"New Potential Take Profit (Pips)","field_type":"text","required": true,"field_options":{},"cid":"new_potential_take_profit"},{"label":"Pips earned/lost","field_type":"text","required": true,"field_options":{},"cid":"pips_earned_lost"},{"label":"Potential Entry Price","field_type":"text","required": true,"field_options":{},"cid":"potential_entry_price"},{"label":"New Potential Entry Price","field_type":"text","required": true,"field_options":{},"cid":"new_potential_entry_price"},{"label":"Actual Entry Price","field_type":"text","required": true,"field_options":{},"cid":"actual_entry_price"},{"label":"Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"potential_account_risk"},{"label":"New Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"new_potential_account_risk"},{"label":"Actual Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"actual_potential_account_risk"},{"label":"What should have been Potential Account Risk","field_type":"text","required": true,"field_options":{},"cid":"what_potential_account_risk"},{"label":"Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"potential_risk_to_reward"},{"label":"New Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"new_potential_risk_to_reward"},{"label":"Actual Potential Risk to Reward","field_type":"text","required": true,"field_options":{},"cid":"actual_potential_risk_to_reward"},{"label":"Currency Group","field_type":"dropdown","required": true,"field_options":{"options":[{"label":"AUD","checked":false},{"label":"CAD","checked":false},{"label":"EUR","checked":false},{"label":"GBP","checked":false},{"label":"JPY","checked":false},{"label":"NZD","checked":false},{"label":"SGD","checked":false},{"label":"USD","checked":false}]},"cid":"currency_group"},{"label":"Date 4","field_type":"date","required": true,"field_options":{},"cid":"date4"}]';

$qfields_json=mysql_query("insert into form_fields_json(
user_master_id,
form_fields_json_string
) values(
'".$usermzasterid."',
'".$jsonstring."'
)");


$_SESSION["successmessage"] = 'User successfully created.';
header("location:index.php?page=users");
exit;
}
if($_REQUEST["process"]=="edit")
{
	
		
$qregister=mysql_query("update user_master set 
user_fullname = '".addslashes($_REQUEST["user_fullname"])."',
user_email='".addslashes($_REQUEST["user_email"])."',
user_username='".addslashes($_REQUEST["user_username"])."',
user_password='".addslashes($_REQUEST["user_password"])."'
where user_id = '".$_REQUEST["user_id"]."'");
$_SESSION["successmessage"] = 'User successfully updated.';
header("location:index.php?page=users");
exit;
}
if($_REQUEST["process"]=="delete")
{
$qregister=mysql_query("delete from user_master where user_id = '".$_REQUEST["user_id"]."'");
$_SESSION["successmessage"] = 'User successfully deleted.';
header("location:index.php?page=users");
exit;
}
?>