<?php session_start();
include("config.php");
 include("functions_mysql.php");
 include("functions.php");

 ?>
 <?php 
$selectstaticfields = mysql_query("select * from static_fields_active_master where user_master_id = '".$_SESSION["user_id"]."'");
$row_selectstaticfields = mysql_fetch_array($selectstaticfields);

if($row_selectstaticfields['journal_entry_title_status'] == '1'){$dis_journal_entry_title_status = '';}else{$dis_journal_entry_title_status = 'none';}
if($row_selectstaticfields['journal_entry_status_status'] == '1'){$dis_journal_entry_status_status = '';}else{$dis_journal_entry_status_status = 'none';}
if($row_selectstaticfields['journal_entry_priority_status'] == '1'){$dis_journal_entry_priority_status = '';}else{$dis_journal_entry_priority_status = 'none';}
if($row_selectstaticfields['journal_entry_date_status'] == '1'){$dis_journal_entry_date_status = '';}else{$dis_journal_entry_date_status = 'none';}
if($row_selectstaticfields['potential_take_profit_status'] == '1'){$dis_potential_take_profit_status = '';}else{$dis_potential_take_profit_status = 'none';}
if($row_selectstaticfields['new_potential_take_profit_status'] == '1'){$dis_new_potential_take_profit_status = '';}else{$dis_new_potential_take_profit_status = 'none';}
if($row_selectstaticfields['pips_earned_lost_status'] == '1'){$dis_pips_earned_lost_status = '';}else{$dis_pips_earned_lost_status = 'none';}
if($row_selectstaticfields['potential_entry_price_status'] == '1'){$dis_potential_entry_price_status = '';}else{$dis_potential_entry_price_status = 'none';}
if($row_selectstaticfields['new_potential_entry_price_status'] == '1'){$dis_new_potential_entry_price_status = '';}else{$dis_new_potential_entry_price_status = 'none';}
if($row_selectstaticfields['actual_entry_price_status'] == '1'){$dis_actual_entry_price_status = '';}else{$dis_actual_entry_price_status = 'none';}
if($row_selectstaticfields['potential_account_risk_status'] == '1'){$dis_potential_account_risk_status = '';}else{$dis_potential_account_risk_status = 'none';}
if($row_selectstaticfields['new_potential_account_risk_status'] == '1'){$dis_new_potential_account_risk_status = '';}else{$dis_new_potential_account_risk_status = 'none';}
if($row_selectstaticfields['actual_potential_account_risk_status'] == '1'){$dis_actual_potential_account_risk_status = '';}else{$dis_actual_potential_account_risk_status = 'none';}
if($row_selectstaticfields['what_potential_account_risk_status'] == '1'){$dis_what_potential_account_risk_status = '';}else{$dis_what_potential_account_risk_status = 'none';}
if($row_selectstaticfields['potential_risk_to_reward_status'] == '1'){$dis_potential_risk_to_reward_status = '';}else{$dis_potential_risk_to_reward_status = 'none';}
if($row_selectstaticfields['new_potential_risk_to_reward_status'] == '1'){$dis_new_potential_risk_to_reward_status = '';}else{$dis_new_potential_risk_to_reward_status = 'none';}
if($row_selectstaticfields['actual_potential_risk_to_reward_status'] == '1'){$dis_actual_potential_risk_to_reward_status = '';}else{$dis_actual_potential_risk_to_reward_status = 'none';}

 ?>
<tr>
<td colspan="2">
<div id="div_ajax_selected_fields">
<div class="heading"><strong>Open Trades</strong></div>
<?php 

if($_REQUEST['select_searchfields'] == 'journal_entry_date'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and journal_entry_date = '".$_REQUEST['searchfield']."'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_title'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and journal_entry_title like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_status'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_priority'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and journal_entry_priority like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'potential_take_profit'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and potential_take_profit like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_take_profit'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and new_potential_take_profit like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'pips_earned_lost'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and pips_earned_lost like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'potential_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and potential_entry_price like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and new_potential_entry_price like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'actual_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and actual_entry_price like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and potential_account_risk like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and new_potential_account_risk like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'actual_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and actual_potential_account_risk like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'what_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and what_potential_account_risk like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'new_potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and new_potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'actual_potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' and actual_potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else{
$q_query_journal = "SELECT * FROM journal_form 
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
WHERE journal_user_master_id='".$_SESSION['user_id']."' and journal_field_master_id='".$_REQUEST['select_searchfields']."' and journal_entry_status = 'Open' and journal_form_field_value like '%".$_REQUEST['searchfield']."%'";
}

$sel_query_journal = mysql_query($q_query_journal);
$numrows_cat = mysql_num_rows($sel_query_journal);

if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    <th width="4%">No.</th>
    	<th style="display:<?php echo $dis_journal_entry_title_status; ?>">Journal Entry</th>
       <th style="display:<?php echo $dis_journal_entry_status_status; ?>"> Journal Entry Status</th>
<th style="display:<?php echo $dis_journal_entry_priority_status; ?>">Journal Entry Priority </th> 
<th style="display:<?php echo $dis_journal_entry_date_status; ?>">Journal Date</th> 
<th style="display:<?php echo $dis_potential_take_profit_status; ?>">Potential Take Profit (Pips)</th>
<th style="display:<?php echo $dis_new_potential_take_profit_status; ?>">New Potential Take Profit (Pips)</th> 
<th style="display:<?php echo $dis_pips_earned_lost_status; ?>">Pips earned/lost </th> 
<th style="display:<?php echo $dis_potential_entry_price_status; ?>">Potential Entry Price </th>  
<th style="display:<?php echo $dis_new_potential_entry_price_status; ?>">New Potential Entry Price </th> 
<th style="display:<?php echo $dis_actual_entry_price_status; ?>">Actual Entry Price </th>  
<th style="display:<?php echo $dis_potential_account_risk_status; ?>">Potential Account Risk</th> 
<th style="display:<?php echo $dis_new_potential_account_risk_status; ?>">New Potential Account Risk</th>  
<th style="display:<?php echo $dis_actual_potential_account_risk_status; ?>">Actual Potential Account Risk</th> 
<th style="display:<?php echo $dis_what_potential_account_risk_status; ?>">What should have been Potential Account Risk</th>  
<th style="display:<?php echo $dis_potential_risk_to_reward_status; ?>">Potential Risk to Reward </th> 
<th style="display:<?php echo $dis_new_potential_risk_to_reward_status; ?>">New Potential Risk to Reward </th> 
<th style="display:<?php echo $dis_actual_potential_risk_to_reward_status; ?>">Actual Potential Risk to Reward </th>     		
       <?php
	 
	 //  $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' order by journal_form_field_id asc");
	 $q_open = "select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 order by journal_form_field_id asc";
	  while($row_journal_detail = mysql_fetch_array($q_open)){
	    ?>
        <th><?php echo $row_journal_detail['journal_form_field_label']; ?></th>
        <?php } ?>
         <th>View</th>
    </tr>
    <?php 
	$j=1;
	
	while($row_journal = mysql_fetch_array($sel_query_journal)){
		if($row_journal["journal_entry_priority"] == 'Red'){ $entry_color = "#F00";}
		else if($row_journal["journal_entry_priority"] == 'Yellow'){ $entry_color = "#c0c000";}
		else if($row_journal["journal_entry_priority"] == 'Green'){ $entry_color = "#093";}
		else{$entry_color = "";}
		 ?>
    	<tr style="color:<?php echo $entry_color; ?>">
        	<td><?php echo $j;?></td>
            <td style="display:<?php echo $dis_journal_entry_title_status; ?>"><a style="color:<?php echo $entry_color; ?>" href="index.php?page=edit_journal&journal_id=<?php echo $row_journal["journal_id"]; ?>"><?php echo $row_journal["journal_entry_title"]; ?></a></td>  
             <td style="display:<?php echo $dis_journal_entry_status_status; ?>"><?php echo $row_journal["journal_entry_status"]; ?></td>
            <td style="display:<?php echo $dis_journal_entry_priority_status; ?>"><?php echo $row_journal["journal_entry_priority"]; ?></td>
            <td style="display:<?php echo $dis_journal_entry_date_status; ?>"><?php echo $row_journal["journal_entry_date"]; ?></td>
            <td style="display:<?php echo $dis_potential_take_profit_status; ?>"><?php echo $row_journal["potential_take_profit"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_take_profit_status; ?>"><?php echo $row_journal["new_potential_take_profit"]; ?></td>
            <td style="display:<?php echo $dis_pips_earned_lost_status; ?>"><?php echo $row_journal["pips_earned_lost"]; ?></td>
            <td style="display:<?php echo $dis_potential_entry_price_status; ?>"><?php echo $row_journal["potential_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_entry_price_status; ?>"><?php echo $row_journal["new_potential_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_actual_entry_price_status; ?>"><?php echo $row_journal["actual_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_potential_account_risk_status; ?>"><?php echo $row_journal["potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_account_risk_status; ?>"><?php echo $row_journal["new_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_actual_potential_account_risk_status; ?>"><?php echo $row_journal["actual_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_what_potential_account_risk_status; ?>"><?php echo $row_journal["what_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_potential_risk_to_reward_status; ?>"><?php echo $row_journal["potential_risk_to_reward"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_risk_to_reward_status; ?>"><?php echo $row_journal["new_potential_risk_to_reward"]; ?></td>
            <td style="display:<?php echo $dis_actual_potential_risk_to_reward_status; ?>"><?php echo $row_journal["actual_potential_risk_to_reward"]; ?></td>
      <?php
			//echo   "select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$data['journal_id']."'";
	  $sel_journal_detail1 = mysql_query("select * from journal_form
	   INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
	    where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' and field_checked = 1 order by 	journal_field_master_id asc");
	  // $sel_journal_detail1 = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' order by journal_field_master_id asc");
	  while($row_journal_detail1 = mysql_fetch_array($sel_journal_detail1)){
	    ?>
        <td><?php echo $row_journal_detail1['journal_form_field_value']; ?></td>        
        <?php } ?>  			        
          <td><a href="index.php?page=view_journal&journal_id=<?php echo $row_journal['journal_id']; ?>">View</a></td>  
        </tr>
    <?php $j++;} ?>
</table>
<?php }else{ ?>
		<span class='error'><h4 style="color:#F00;" align="center">No Open Trades Available</h4></span>
	<?php } ?>

<div class="heading"><strong>Stalking Trades</strong></div>

<?php 

if($_REQUEST['select_searchfields'] == 'journal_entry_date'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and journal_entry_date = '".$_REQUEST['searchfield']."'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_title'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and journal_entry_title like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_status'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_priority'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and journal_entry_priority like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'potential_take_profit'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and potential_take_profit like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_take_profit'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and new_potential_take_profit like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'pips_earned_lost'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and pips_earned_lost like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'potential_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and potential_entry_price like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and new_potential_entry_price like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'actual_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and actual_entry_price like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and potential_account_risk like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and new_potential_account_risk like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'actual_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and actual_potential_account_risk like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'what_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and what_potential_account_risk like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'new_potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and new_potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'actual_potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and actual_potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else{
$q_query_journal = "SELECT * FROM journal_form 
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
WHERE journal_user_master_id='".$_SESSION['user_id']."' and journal_field_master_id='".$_REQUEST['select_searchfields']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') and journal_form_field_value like '%".$_REQUEST['searchfield']."%'";
}


//echo $q_query_journal;
$sel_query_journal = mysql_query($q_query_journal);

//$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Stalking' order by journal_id desc");
$numrows_cat = mysql_num_rows($sel_query_journal);

if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    	<th width="4%">No.</th>
    	    	<th style="display:<?php echo $dis_journal_entry_title_status; ?>">Journal Entry</th>
       <th style="display:<?php echo $dis_journal_entry_status_status; ?>"> Journal Entry Status</th>
<th style="display:<?php echo $dis_journal_entry_priority_status; ?>">Journal Entry Priority </th> 
<th style="display:<?php echo $dis_journal_entry_date_status; ?>">Journal Date</th> 
<th style="display:<?php echo $dis_potential_take_profit_status; ?>">Potential Take Profit (Pips)</th>
<th style="display:<?php echo $dis_new_potential_take_profit_status; ?>">New Potential Take Profit (Pips)</th> 
<th style="display:<?php echo $dis_pips_earned_lost_status; ?>">Pips earned/lost </th> 
<th style="display:<?php echo $dis_potential_entry_price_status; ?>">Potential Entry Price </th>  
<th style="display:<?php echo $dis_new_potential_entry_price_status; ?>">New Potential Entry Price </th> 
<th style="display:<?php echo $dis_actual_entry_price_status; ?>">Actual Entry Price </th>  
<th style="display:<?php echo $dis_potential_account_risk_status; ?>">Potential Account Risk</th> 
<th style="display:<?php echo $dis_new_potential_account_risk_status; ?>">New Potential Account Risk</th>  
<th style="display:<?php echo $dis_actual_potential_account_risk_status; ?>">Actual Potential Account Risk</th> 
<th style="display:<?php echo $dis_what_potential_account_risk_status; ?>">What should have been Potential Account Risk</th>  
<th style="display:<?php echo $dis_potential_risk_to_reward_status; ?>">Potential Risk to Reward </th> 
<th style="display:<?php echo $dis_new_potential_risk_to_reward_status; ?>">New Potential Risk to Reward </th> 
<th style="display:<?php echo $dis_actual_potential_risk_to_reward_status; ?>">Actual Potential Risk to Reward </th>    		
       <?php
	 //  $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' order by journal_form_field_id asc");
	  $q_stalking = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 order by journal_form_field_id asc");
	  while($row_journal_detail = mysql_fetch_array($q_stalking)){
	    ?>
        <th ><?php echo $row_journal_detail['journal_form_field_label']; ?></th>
        <?php } ?>
        <th>View</th>
    </tr>
    <?php 
	$j=1;
	
	while($row_journal = mysql_fetch_array($sel_query_journal)){
		
		if($row_journal["journal_entry_priority"] == 'Red'){ $entry_color1 = "#F00";}
		else if($row_journal["journal_entry_priority"] == 'Yellow'){ $entry_color1 = "#c0c000";}
		else if($row_journal["journal_entry_priority"] == 'Green'){ $entry_color1 = "#093";}
		else{$entry_color1 = "";}
		 ?>
    	<tr style="color:<?php echo $entry_color1; ?>">
        	<td><?php echo $j;?></td>
            <td style="display:<?php echo $dis_journal_entry_title_status; ?>"><a style="color:<?php echo $entry_color1; ?>" href="index.php?page=edit_journal&journal_id=<?php echo $row_journal["journal_id"]; ?>"><?php echo $row_journal["journal_entry_title"]; ?></a></td>  
             <td style="display:<?php echo $dis_journal_entry_status_status; ?>"><?php echo $row_journal["journal_entry_status"]; ?></td>
            <td style="display:<?php echo $dis_journal_entry_priority_status; ?>"><?php echo $row_journal["journal_entry_priority"]; ?></td>
            <td style="display:<?php echo $dis_journal_entry_date_status; ?>"><?php echo $row_journal["journal_entry_date"]; ?></td>
            <td style="display:<?php echo $dis_potential_take_profit_status; ?>"><?php echo $row_journal["potential_take_profit"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_take_profit_status; ?>"><?php echo $row_journal["new_potential_take_profit"]; ?></td>
            <td style="display:<?php echo $dis_pips_earned_lost_status; ?>"><?php echo $row_journal["pips_earned_lost"]; ?></td>
            <td style="display:<?php echo $dis_potential_entry_price_status; ?>"><?php echo $row_journal["potential_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_entry_price_status; ?>"><?php echo $row_journal["new_potential_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_actual_entry_price_status; ?>"><?php echo $row_journal["actual_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_potential_account_risk_status; ?>"><?php echo $row_journal["potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_account_risk_status; ?>"><?php echo $row_journal["new_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_actual_potential_account_risk_status; ?>"><?php echo $row_journal["actual_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_what_potential_account_risk_status; ?>"><?php echo $row_journal["what_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_potential_risk_to_reward_status; ?>"><?php echo $row_journal["potential_risk_to_reward"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_risk_to_reward_status; ?>"><?php echo $row_journal["new_potential_risk_to_reward"]; ?></td>
            <td style="display:<?php echo $dis_actual_potential_risk_to_reward_status; ?>"><?php echo $row_journal["actual_potential_risk_to_reward"]; ?></td>
              <?php
			//echo   "select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$data['journal_id']."'";
	 $sel_journal_detail1 = mysql_query("select * from journal_form
	   INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
	    where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' and field_checked = 1 order by 	journal_field_master_id asc");
	 //  $sel_journal_detail1 = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' order by journal_field_master_id asc");
	  while($row_journal_detail1 = mysql_fetch_array($sel_journal_detail1)){
	    ?>
        <td><?php echo $row_journal_detail1['journal_form_field_value']; ?></td>
        <?php } ?>  			        
         <td><a href="index.php?page=view_journal&journal_id=<?php echo $row_journal['journal_id']; ?>">View</a></td>  
        </tr>
    <?php $j++;} ?>
</table>
<?php }else{ ?>
		<span class='error'><h4 style="color:#F00;" align="center">No Stalking Trades Available</h4></span>
	<?php } ?>

<div class="heading"><strong>Closed Trades</strong></div>

<?php 
if($_REQUEST['select_searchfields'] == 'journal_entry_date'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and journal_entry_date = '".$_REQUEST['searchfield']."'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_title'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and journal_entry_title like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_status'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'journal_entry_priority'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and journal_entry_priority like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'potential_take_profit'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and potential_take_profit like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_take_profit'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and new_potential_take_profit like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'pips_earned_lost'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and pips_earned_lost like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'potential_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and potential_entry_price like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and new_potential_entry_price like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'actual_entry_price'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and actual_entry_price like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and potential_account_risk like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'new_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and new_potential_account_risk like '%".$_REQUEST['searchfield']."%'";	
}
else if($_REQUEST['select_searchfields'] == 'actual_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and actual_potential_account_risk like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'what_potential_account_risk'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and what_potential_account_risk like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'new_potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and new_potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else if($_REQUEST['select_searchfields'] == 'actual_potential_risk_to_reward'){
$q_query_journal = "SELECT * FROM journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' and actual_potential_risk_to_reward like '%".$_REQUEST['searchfield']."%'";
}
else{
$q_query_journal = "SELECT * FROM journal_form 
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
WHERE journal_user_master_id='".$_SESSION['user_id']."' and journal_field_master_id='".$_REQUEST['select_searchfields']."' and journal_entry_status = 'Closed' and journal_form_field_value like '%".$_REQUEST['searchfield']."%'";
}

$sel_query_journal = mysql_query($q_query_journal);
$numrows_cat = mysql_num_rows($sel_query_journal);

if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    	<th width="4%">No.</th>
    	    	<th style="display:<?php echo $dis_journal_entry_title_status; ?>">Journal Entry</th>
       <th style="display:<?php echo $dis_journal_entry_status_status; ?>"> Journal Entry Status</th>
<th style="display:<?php echo $dis_journal_entry_priority_status; ?>">Journal Entry Priority </th> 
<th style="display:<?php echo $dis_journal_entry_date_status; ?>">Journal Date</th> 
<th style="display:<?php echo $dis_potential_take_profit_status; ?>">Potential Take Profit (Pips)</th>
<th style="display:<?php echo $dis_new_potential_take_profit_status; ?>">New Potential Take Profit (Pips)</th> 
<th style="display:<?php echo $dis_pips_earned_lost_status; ?>">Pips earned/lost </th> 
<th style="display:<?php echo $dis_potential_entry_price_status; ?>">Potential Entry Price </th>  
<th style="display:<?php echo $dis_new_potential_entry_price_status; ?>">New Potential Entry Price </th> 
<th style="display:<?php echo $dis_actual_entry_price_status; ?>">Actual Entry Price </th>  
<th style="display:<?php echo $dis_potential_account_risk_status; ?>">Potential Account Risk</th> 
<th style="display:<?php echo $dis_new_potential_account_risk_status; ?>">New Potential Account Risk</th>  
<th style="display:<?php echo $dis_actual_potential_account_risk_status; ?>">Actual Potential Account Risk</th> 
<th style="display:<?php echo $dis_what_potential_account_risk_status; ?>">What should have been Potential Account Risk</th>  
<th style="display:<?php echo $dis_potential_risk_to_reward_status; ?>">Potential Risk to Reward </th> 
<th style="display:<?php echo $dis_new_potential_risk_to_reward_status; ?>">New Potential Risk to Reward </th> 
<th style="display:<?php echo $dis_actual_potential_risk_to_reward_status; ?>">Actual Potential Risk to Reward </th>   		
       <?php
	  // $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' order by journal_form_field_id asc");
	     $q_closed = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 order by journal_form_field_id asc");
	  while($row_journal_detail = mysql_fetch_array($q_closed)){
	    ?>
        <th ><?php echo $row_journal_detail['journal_form_field_label']; ?></th>
        <?php } ?>
         <th>View</th>
    </tr>
    <?php 
	$j=1;
	
	while($row_journal = mysql_fetch_array($sel_query_journal)){
		
		 if($row_journal["journal_entry_priority"] == 'Red'){ $entry_color2 = "#F00";}
		else if($row_journal["journal_entry_priority"] == 'Yellow'){ $entry_color2 = "#c0c000";}
		else if($row_journal["journal_entry_priority"] == 'Green'){ $entry_color2 = "#093";}
		else{$entry_color2 = "";}
		 ?>
    	<tr style="color:<?php echo $entry_color2; ?>">
        	<td><?php echo $j;?></td>
           <td style="display:<?php echo $dis_journal_entry_title_status; ?>"><a style="color:<?php echo $entry_color2; ?>" href="index.php?page=edit_journal&journal_id=<?php echo $row_journal["journal_id"]; ?>"><?php echo $row_journal["journal_entry_title"]; ?></a></td>  
             <td style="display:<?php echo $dis_journal_entry_status_status; ?>"><?php echo $row_journal["journal_entry_status"]; ?></td>
            <td style="display:<?php echo $dis_journal_entry_priority_status; ?>"><?php echo $row_journal["journal_entry_priority"]; ?></td>
            <td style="display:<?php echo $dis_journal_entry_date_status; ?>"><?php echo $row_journal["journal_entry_date"]; ?></td>
            <td style="display:<?php echo $dis_potential_take_profit_status; ?>"><?php echo $row_journal["potential_take_profit"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_take_profit_status; ?>"><?php echo $row_journal["new_potential_take_profit"]; ?></td>
            <td style="display:<?php echo $dis_pips_earned_lost_status; ?>"><?php echo $row_journal["pips_earned_lost"]; ?></td>
            <td style="display:<?php echo $dis_potential_entry_price_status; ?>"><?php echo $row_journal["potential_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_entry_price_status; ?>"><?php echo $row_journal["new_potential_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_actual_entry_price_status; ?>"><?php echo $row_journal["actual_entry_price"]; ?></td>
            <td style="display:<?php echo $dis_potential_account_risk_status; ?>"><?php echo $row_journal["potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_account_risk_status; ?>"><?php echo $row_journal["new_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_actual_potential_account_risk_status; ?>"><?php echo $row_journal["actual_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_what_potential_account_risk_status; ?>"><?php echo $row_journal["what_potential_account_risk"]; ?></td>
            <td style="display:<?php echo $dis_potential_risk_to_reward_status; ?>"><?php echo $row_journal["potential_risk_to_reward"]; ?></td>
            <td style="display:<?php echo $dis_new_potential_risk_to_reward_status; ?>"><?php echo $row_journal["new_potential_risk_to_reward"]; ?></td>
            <td style="display:<?php echo $dis_actual_potential_risk_to_reward_status; ?>"><?php echo $row_journal["actual_potential_risk_to_reward"]; ?></td>
              <?php
			//echo   "select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$data['journal_id']."'";
	  $sel_journal_detail1 = mysql_query("select * from journal_form
	   INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
	    where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' and field_checked = 1 order by 	journal_field_master_id asc");
	  // $sel_journal_detail1 = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' order by journal_field_master_id asc");
	  while($row_journal_detail1 = mysql_fetch_array($sel_journal_detail1)){
	    ?>
        <td><?php echo $row_journal_detail1['journal_form_field_value']; ?></td>        
        <?php } ?>  			        
           <td><a href="index.php?page=view_journal&journal_id=<?php echo $row_journal['journal_id']; ?>">View</a></td> 
        </tr>
    <?php $j++;} ?>
</table>
<?php }else{ ?>
		<span class='error'><h4 style="color:#F00;" align="center">No Closed Trades Available</h4></span>
	<?php } ?>

</td></tr>
