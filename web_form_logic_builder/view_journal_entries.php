<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){	
  $("#mmm").click(function(){
    $("#ddd").toggle();
	$("#ddd1").hide();
  });
  $("#mmm1").click(function(){
    $("#ddd1").toggle();
	$("#ddd").hide();
  });
});
</script>
<script>
function ajax_selectedfields(){
var frmfields = $("#frmfields").serialize();
	 $.ajax({
         data: frmfields,
         type: "post",
         url: "ajax_journal_fields_db.php",
         success: function(data){
			// console.log(data);
             document.getElementById("div_ajax_selected_fields").innerHTML=data;			
         }
		 });
}
</script>
<script>
function ajax_searchfields(){
	var form2=$("#form2").serialize();
	 $.ajax({ 
	 	 data: form2,       
         type: "post",
         url: "ajax_search_fields_db.php",
         success: function(data){
			// console.log(data);	
			 document.getElementById("div_ajax_selected_fields").innerHTML=data;				
         }
		 });
}
</script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<?php
$selectstaticfields1 = mysql_query("select * from static_fields_active_master where user_master_id = '".$_SESSION["user_id"]."'");
if(mysql_num_rows($selectstaticfields1) == 0){
$ins_journal_static_fields = mysql_query("insert into static_fields_active_master(
user_master_id,
journal_entry_title_status,
journal_entry_status_status,
journal_entry_priority_status,
journal_entry_date_status,
potential_take_profit_status,
new_potential_take_profit_status,
pips_earned_lost_status,
potential_entry_price_status,
new_potential_entry_price_status,
actual_entry_price_status,
potential_account_risk_status,
new_potential_account_risk_status,
actual_potential_account_risk_status,
what_potential_account_risk_status,
potential_risk_to_reward_status,
new_potential_risk_to_reward_status,
actual_potential_risk_to_reward_status) values(
'".$_SESSION["user_id"]."',
'1',
'0',
'0',
'1',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0',
'0')");
}
 ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td colspan="2" >
<form name="frmfields" id="frmfields" method="post">
<div class="btn-row">
<a id="mmm1" href="#" class="btn">Filter Entries</a>  <a id="mmm" href="#" class="btn r-line">Select Fields</a>
</div>
<p id="ddd" style="display:none;">
<span class="arrow"></span>
<?php $selectstaticfields = mysql_query("select * from static_fields_active_master where user_master_id = '".$_SESSION["user_id"]."'");
$row_selectstaticfields = mysql_fetch_array($selectstaticfields);
 ?>
<input type="checkbox" name="journal_entry_title_status" id="journal_entry_title_status" value="1" <?php if($row_selectstaticfields['journal_entry_title_status'] == '1'){echo "checked";} ?>>Journal Entry Title<br />
<input type="checkbox" name="journal_entry_status_status" id="journal_entry_status_status" value="1" <?php if($row_selectstaticfields['journal_entry_status_status'] == '1'){echo "checked";} ?>>Journal Entry Status<br />
<input type="checkbox" name="journal_entry_priority_status" id="journal_entry_priority_status" value="1" <?php if($row_selectstaticfields['journal_entry_priority_status'] == '1'){echo "checked";} ?>>Journal Entry Priority<br />
<input type="checkbox" name="journal_entry_date_status" id="journal_entry_date_status" value="1" <?php if($row_selectstaticfields['journal_entry_date_status'] == '1'){echo "checked";} ?>>Journal Date<br />
<input type="checkbox" name="potential_take_profit_status" id="potential_take_profit_status" value="1" <?php if($row_selectstaticfields['potential_take_profit_status'] == '1'){echo "checked";} ?>>Potential Take Profit (Pips)<br />
<input type="checkbox" name="new_potential_take_profit_status" id="new_potential_take_profit_status" value="1" <?php if($row_selectstaticfields['new_potential_take_profit_status'] == '1'){echo "checked";} ?>>New Potential Take Profit (Pips)<br />
<input type="checkbox" name="pips_earned_lost_status" id="pips_earned_lost_status" value="1" <?php if($row_selectstaticfields['pips_earned_lost_status'] == '1'){echo "checked";} ?>>Pips earned/lost<br />
<input type="checkbox" name="potential_entry_price_status" id="potential_entry_price_status" value="1" <?php if($row_selectstaticfields['potential_entry_price_status'] == '1'){echo "checked";} ?>>Potential Entry Price<br />
<input type="checkbox" name="new_potential_entry_price_status" id="new_potential_entry_price_status" value="1" <?php if($row_selectstaticfields['new_potential_entry_price_status'] == '1'){echo "checked";} ?>>New Potential Entry Price<br />
<input type="checkbox" name="actual_entry_price_status" id="actual_entry_price_status" value="1" <?php if($row_selectstaticfields['actual_entry_price_status'] == '1'){echo "checked";} ?>>Actual Entry Price<br />
<input type="checkbox" name="potential_account_risk_status" id="potential_account_risk_status" value="1" <?php if($row_selectstaticfields['potential_account_risk_status'] == '1'){echo "checked";} ?>>Potential Account Risk<br />
<input type="checkbox" name="new_potential_account_risk_status" id="new_potential_account_risk_status" value="1" <?php if($row_selectstaticfields['new_potential_account_risk_status'] == '1'){echo "checked";} ?>>New Potential Account Risk<br />
<input type="checkbox" name="actual_potential_account_risk_status" id="actual_potential_account_risk_status" value="1" <?php if($row_selectstaticfields['actual_potential_account_risk_status'] == '1'){echo "checked";} ?>>Actual Potential Account Risk<br />
<input type="checkbox" name="what_potential_account_risk_status" id="what_potential_account_risk_status" value="1" <?php if($row_selectstaticfields['what_potential_account_risk_status'] == '1'){echo "checked";} ?>>What should have been Potential Account Risk<br />
<input type="checkbox" name="potential_risk_to_reward_status" id="potential_risk_to_reward_status" value="1" <?php if($row_selectstaticfields['potential_risk_to_reward_status'] == '1'){echo "checked";} ?>>Potential Risk to Reward<br />
<input type="checkbox" name="new_potential_risk_to_reward_status" id="new_potential_risk_to_reward_status" value="1" <?php if($row_selectstaticfields['new_potential_risk_to_reward_status'] == '1'){echo "checked";} ?>>New Potential Risk to Reward<br />
<input type="checkbox" name="actual_potential_risk_to_reward_status" id="actual_potential_risk_to_reward_status" value="1" <?php if($row_selectstaticfields['actual_potential_risk_to_reward_status'] == '1'){echo "checked";} ?>>Actual Potential Risk to Reward<br />
 <?php 
	   $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."'");
	  while($row_journal_detail = mysql_fetch_array($sel_journal_detail)){
		   $q_checked = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 and journal_form_field_id = '".$row_journal_detail['journal_form_field_id']."'");
		   $num_checked = mysql_num_rows($q_checked);
	    ?>
<input type="checkbox" class="text" name="selectedfields[]" id="selectedfields[]" <?php if($num_checked>0){echo "checked";} ?> value="<?php echo $row_journal_detail['journal_form_field_id']; ?>"><?php echo $row_journal_detail['journal_form_field_label']; ?><br>
 <?php } ?><br />
 <input class="button1"  type="button" value="Apply" onClick="ajax_selectedfields();" />
 </p>
 
 </form>
 <form name="form2" id="form2" method="post">
 <p id="ddd1" style="display:none;">
 <span class="arrow"></span>
  Display Entries that match all of the following conditions:<br /><br />
  <select name="select_searchfields" onChange="show_datepicker(this.value);" class="select">
 <option value="journal_entry_title">Journal Entry Title</option>
  <option value="journal_entry_status">Journal Entry Status</option> 
  <option value="journal_entry_priority">Journal Entry Priority</option> 
  <option value="journal_entry_date">Journal Entry Date</option> 
  <option value="potential_take_profit">Potential Take Profit</option> 
  <option value="new_potential_take_profit">New Potential Take Profit</option> 
  <option value="pips_earned_lost">Pips earned/lost</option> 
  <option value="potential_entry_price">Potential Entry Price</option> 
  <option value="new_potential_entry_price">New Potential Entry Price</option> 
  <option value="actual_entry_price">Actual Entry Price</option> 
  <option value="potential_account_risk">Potential Account Risk</option> 
  <option value="new_potential_account_risk">New Potential Account Risk</option> 
  <option value="actual_potential_account_risk">Actual Potential Account Risk</option> 
  <option value="what_potential_account_risk">What should have been Potential Account Risk</option> 
  <option value="potential_risk_to_reward">Potential Risk to Reward</option> 
  <option value="new_potential_risk_to_reward">New Potential Risk to Reward</option> 
  <option value="actual_potential_risk_to_reward">Actual Potential Risk to Reward</option> 
  <?php 
	   $sel_journal_detail1 = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."'");
	  while($row_journal_detail1 = mysql_fetch_array($sel_journal_detail1)){
		 
	    ?>
        <option value="<?php echo $row_journal_detail1['journal_form_field_id']; ?>"><?php echo $row_journal_detail1['journal_form_field_label']; ?></option>
        <?php } ?>
  </select>
  <script>
  /*$(function() {
	$( "#searchfield" ).datepicker();
	});*/		
  function show_datepicker(dt){	
  if(dt == 'journal_entry_date'){  
   $( "#searchfield" ).datepicker();
	  }
	  else{
		   $( "#searchfield" ).datepicker("destroy");
		  }
  }
  </script>
  <!--<select name="select_searchfields_operator">
  <option value="=">Is</option>
  <option value="<">Is Before</option>
  <option value=">">Is After</option>
  </select>-->
  <input type="text" name="searchfield" id="searchfield" class="text" /><br /><br />
  <input class="button1" type="button" value="Search" onClick="ajax_searchfields();" />
 </p>
 </form>
</td>
</tr>
<?php 
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

$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' order by journal_id desc");
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
	  // echo "select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."'";
	   $q_open = "select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 order by journal_form_field_id asc";
	   
	   $sel_journal_detail = mysql_query($q_open);
	   
	   //$sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' order by journal_form_field_id asc");
	  while($row_journal_detail = mysql_fetch_array($sel_journal_detail)){
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
	//	echo "select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."'";	
	   $sel_journal_detail1 = mysql_query("select * from journal_form
	   INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
	    where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' and field_checked = 1 order by 	journal_field_master_id asc");
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
$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and (journal_entry_status = 'Stalking' or journal_entry_status = '') order by journal_id desc");
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
//	echo "select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."'";
$q_open = "select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 order by journal_form_field_id asc";
	   
	   $sel_journal_detail = mysql_query($q_open);
	  // $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' order by journal_form_field_id asc");
	  while($row_journal_detail = mysql_fetch_array($sel_journal_detail)){
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
		//	echo "select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' order by 	journal_field_master_id asc";
	   $sel_journal_detail1 = mysql_query("select * from journal_form
	   INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
	    where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$row_journal['journal_id']."' and field_checked = 1 order by 	journal_field_master_id asc");
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
$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' order by journal_id desc");
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
	   $q_open = "select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 order by journal_form_field_id asc";
	   
	   $sel_journal_detail = mysql_query($q_open);
	  // $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' order by journal_form_field_id asc");
	  while($row_journal_detail = mysql_fetch_array($sel_journal_detail)){
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
</div>
</td></tr>

</table>