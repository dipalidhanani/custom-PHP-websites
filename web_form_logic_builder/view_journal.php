<?php 
if(isset($_SESSION["user_id"])){
$select_db_string = mysql_query("select * from form_fields_json where user_master_id = '".$_SESSION["user_id"]."'");
if(mysql_num_rows($select_db_string) > 0){
$row_db_string = mysql_fetch_array($select_db_string);
$json_string = $row_db_string['form_fields_json_string'];
}}
$json_string_arr = json_decode($json_string, false);
/*echo "<pre>";
print_r($json_string_arr); 
echo "</pre>";
*///echo count($json_string_arr);
?>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<?php
$selectjournal = mysql_query("select * from journal_form_master where journal_id='".$_GET['journal_id']."'");
$rowjournal = mysql_fetch_array($selectjournal);
 ?>
<table width="700" border="0" cellpadding="2" cellspacing="2">
	 <tr>
		<td colspan="2" class="heading"><strong>View Journal Form</strong>
        <a onclick="window.print();" style="float:right; cursor:pointer;">Print</a>
        </td>
	 </tr>
	 <tr>
	 	<td width="30%">&nbsp;</td>
	 </tr>
     <tr>
	 	<td align="right">Journal Entry Title : </td>
		<td width="70%" align="left">
       <?php echo $rowjournal['journal_entry_title']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Journal Entry Status : </td>
		<td width="70%" align="left">       
        <?php echo $rowjournal['journal_entry_status']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Journal Entry Priority : </td>
		<td width="70%" align="left">    
        <?php echo $rowjournal['journal_entry_priority']; ?>       
        </td>
	</tr>    
    <tr>
	 	<td align="right">Journal Date : </td>
		<td width="70%" align="left">
       <?php echo $rowjournal['journal_entry_date']; ?>
        </td>
	</tr>
     <tr>
	 	<td align="right">Potential Take Profit (Pips) : </td>
		<td width="70%" align="left">
       <?php echo $rowjournal['potential_take_profit']; ?>
        </td>
	</tr>
     <tr>
	 	<td align="right">New Potential Take Profit (Pips) : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['new_potential_take_profit']; ?>
        </td>
	</tr>
     <tr>
	 	<td align="right">Pips earned/lost : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['pips_earned_lost']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Potential Entry Price : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['potential_entry_price']; ?>
        </td>
	</tr>
     <tr>
	 	<td align="right">New Potential Entry Price : </td>
		<td width="70%" align="left">
       <?php echo $rowjournal['new_potential_entry_price']; ?>
        </td>
	</tr>
     <tr>
	 	<td align="right">Actual Entry Price : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['actual_entry_price']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Potential Account Risk : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['potential_account_risk']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">New Potential Account Risk : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['new_potential_account_risk']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Actual Potential Account Risk : </td>
		<td width="70%" align="left">
       <?php echo $rowjournal['actual_potential_account_risk']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">What should have been Potential Account Risk : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['what_potential_account_risk']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Potential Risk to Reward : </td>
		<td width="70%" align="left">
       <?php echo $rowjournal['potential_risk_to_reward']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">New Potential Risk to Reward : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['new_potential_risk_to_reward']; ?>
        </td>
	</tr>
    <tr>
	 	<td align="right">Actual Potential Risk to Reward : </td>
		<td width="70%" align="left">
        <?php echo $rowjournal['actual_potential_risk_to_reward']; ?>
        </td>
	</tr>  
     <?php 
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

		 ?>
         
        <?php if(($json_string_arr_single['field_type'] == 'website') || ($json_string_arr_single['field_type'] == 'text')){ 
		
		
		
		$select_field_detail_text = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_text = mysql_fetch_array($select_field_detail_text);
	  
	 
		
		 $select_journal_detail_text = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_text['journal_form_field_id']."'");
	  $row_journal_detail_text = mysql_fetch_array($select_journal_detail_text);
		?>
        <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">
        <?php echo $row_journal_detail_text['journal_form_field_value']; ?>
        </td>
		</tr>
        <?php } 
		else if($json_string_arr_single['field_type'] == 'dropdown'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];
			
			$select_field_detail_dropdown = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_dropdown = mysql_fetch_array($select_field_detail_dropdown);
	  
	 
		
		 $select_journal_detail_dropdown = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_dropdown['journal_form_field_id']."'");
	  $row_journal_detail_dropdown = mysql_fetch_array($select_journal_detail_dropdown);
	  			
		?>
        <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">        
        <?php echo $row_journal_detail_dropdown['journal_form_field_value']; ?>
        </td>
		</tr> 
        <?php } 
        else if($json_string_arr_single['field_type'] == 'radio'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];	
			
			$select_field_detail_radio = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_radio = mysql_fetch_array($select_field_detail_radio);
	  
	 
		
		 $select_journal_detail_radio = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_radio['journal_form_field_id']."'");
	  $row_journal_detail_radio = mysql_fetch_array($select_journal_detail_radio);		
		?>
        <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">       
        <?php  echo $row_journal_detail_radio['journal_form_field_value']; ?>
        </td>
		</tr> 
        <?php } else if($json_string_arr_single['field_type'] == 'section_break'){ ?>
        <tr>
	 	<td align="left" colspan="2"><strong><?php echo @$json_string_arr_single['label']; ?></strong> </td>		
		</tr>
        <?php  }  else if($json_string_arr_single['field_type'] == 'checkboxes'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];			
		
			
			$select_field_detail_checkboxes = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_checkboxes = mysql_fetch_array($select_field_detail_checkboxes);
	  
	 
		
		 $select_journal_detail_checkboxes = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_checkboxes['journal_form_field_id']."'");
	  $row_journal_detail_checkboxes = mysql_fetch_array($select_journal_detail_checkboxes);
	  
	 
	
			 ?>
            
       
        <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">       
   <?php echo @$row_journal_detail_checkboxes['journal_form_field_value']; ?>
        </td>
		</tr> 
        <?php } 
		else if($json_string_arr_single['field_type'] == 'file'){
			$select_field_detail_file = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_file = mysql_fetch_array($select_field_detail_file);
	  
	 
		
		 $select_journal_detail_file = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_file['journal_form_field_id']."'");
	  $row_journal_detail_file = mysql_fetch_array($select_journal_detail_file);
			
			 ?>
             <link rel="stylesheet" href="css/dg-picture-zoom.css" />
             <script type="text/javascript" src="js/external/mootools-1.2.4-core-yc.js"></script>
	<script type="text/javascript" src="js/external/mootools-more.js"></script>
	<script type="text/javascript" src="js/dg-picture-zoom.js"></script>
	<script type="text/javascript" src="js/dg-picture-zoom-autoload.js"></script>
        <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">
       
        <?php if($row_journal_detail_file['journal_form_field_value'] != ''){ ?>
       
         <img src="form_images/<?php echo $row_journal_detail_file['journal_form_field_value']; ?>?url=form_images/<?php echo $row_journal_detail_file['journal_form_field_value']; ?>" 
         class="dg-picture-zoom" width="200" height="200" /> 
         <a href="" onclick="javascript:window.open('form_images/<?php echo $row_journal_detail_file['journal_form_field_value']; ?>?url=form_images/<?php echo $row_journal_detail_file['journal_form_field_value']; ?>','_blank','toolbar=no,menubar=no,resizable=yes,scrollbars=yes')" style="text-decoration:underline;">New window</a>
		<?php } ?>
        </td>
		</tr>
        
        <?php }
		else if($json_string_arr_single['field_type'] == 'date'){ 
		$select_field_detail_date = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_date = mysql_fetch_array($select_field_detail_date);	 
		
		 $select_journal_detail_date = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_date['journal_form_field_id']."'");
	  $row_journal_detail_date = mysql_fetch_array($select_journal_detail_date);
		?>
       <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">
        <?php echo $row_journal_detail_date['journal_form_field_value']; ?>
        </td>
		</tr>
        <?php } 
		else if($json_string_arr_single['field_type'] == 'paragraph'){ 
		
		$select_field_detail_paragraph = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_paragraph = mysql_fetch_array($select_field_detail_paragraph);	 
		
		 $select_journal_detail_paragraph = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_paragraph['journal_form_field_id']."'");
	  $row_journal_detail_paragraph = mysql_fetch_array($select_journal_detail_paragraph);
	  
		?>
        <tr>
	 	<td align="right"><?php echo @$json_string_arr_single['label']; ?> : </td>
		<td width="70%" align="left">
        <?php echo $row_journal_detail_paragraph['journal_form_field_value']; ?> 
        </td>
		</tr>
        <?php }         
	 } }
	  ?>
      
      <tr><td colspan="2">
       <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Date',     'Potential Take Profit (Pips)', 'New Potential Take Profit (Pips)', 'Pips earned/lost'],
    ['<?php echo $rowjournal['journal_entry_date']; ?>',<?php echo $rowjournal['potential_take_profit']; ?>,<?php echo $rowjournal['new_potential_take_profit']; ?>,<?php echo $rowjournal['pips_earned_lost']; ?>],   
  ]);

  var options = {
    title: 'Graph 1',
    hAxis: {title: 'Journal Date', titleTextStyle: {color: 'red'}}
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

  chart.draw(data, options);

}
    </script>
       <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Date',     'Potential Entry Price', 'New Potential Entry Price', 'Actual Entry Price'],
    ['<?php echo $rowjournal['journal_entry_date']; ?>',<?php echo $rowjournal['potential_entry_price']; ?>,<?php echo $rowjournal['new_potential_entry_price']; ?>,<?php echo $rowjournal['actual_entry_price']; ?>],   
  ]);

  var options = {
    title: 'Graph 2',
    hAxis: {title: 'Journal Date', titleTextStyle: {color: 'red'}}
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart2_div'));

  chart.draw(data, options);

}
    </script>
     <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Date',     'Potential Account Risk', 'New Potential Account Risk', 'Actual Potential Account Risk', 'What should have been Potential Account Risk'],
    ['<?php echo $rowjournal['journal_entry_date']; ?>',<?php echo $rowjournal['potential_account_risk']; ?>,<?php echo $rowjournal['new_potential_account_risk']; ?>,<?php echo $rowjournal['actual_potential_account_risk']; ?>,<?php echo $rowjournal['what_potential_account_risk']; ?>],   
  ]);

  var options = {
    title: 'Graph 3',
    hAxis: {title: 'Journal Date', titleTextStyle: {color: 'red'}}
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart3_div'));

  chart.draw(data, options);

}
    </script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart() {

  var data = google.visualization.arrayToDataTable([
    ['Date',     'Potential Risk to Reward', 'New Potential Risk to Reward', 'Actual Potential Risk to Reward'],
    ['<?php echo $rowjournal['journal_entry_date']; ?>',<?php echo $rowjournal['potential_risk_to_reward']; ?>,<?php echo $rowjournal['new_potential_risk_to_reward']; ?>,<?php echo $rowjournal['actual_potential_risk_to_reward']; ?>],   
  ]);

  var options = {
    title: 'Graph 4',
    hAxis: {title: 'Journal Date', titleTextStyle: {color: 'red'}}
  };

  var chart = new google.visualization.ColumnChart(document.getElementById('chart4_div'));

  chart.draw(data, options);

}
    </script>
    <?php if(($rowjournal['potential_take_profit'] != 0) || ($rowjournal['new_potential_take_profit'] != 0) || ($rowjournal['pips_earned_lost'] != 0)){ ?>
     <div id="chart_div" style="width: 1000px; height: 500px;"></div>
     <?php } ?>
     <?php if(($rowjournal['potential_entry_price'] != 0) || ($rowjournal['new_potential_entry_price'] != 0) || ($rowjournal['actual_entry_price'] != 0)){ ?>
      <div id="chart2_div" style="width: 1000px; height: 500px;"></div>
      <?php } ?>
     <?php if(($rowjournal['potential_account_risk'] != 0) || ($rowjournal['new_potential_account_risk'] != 0) || ($rowjournal['actual_potential_account_risk'] != 0) || ($rowjournal['what_potential_account_risk'] != 0)){ ?>
      <div id="chart3_div" style="width: 1000px; height: 500px;"></div>
      <?php } ?>
     <?php if(($rowjournal['potential_risk_to_reward'] != 0) || ($rowjournal['new_potential_risk_to_reward'] != 0) || ($rowjournal['actual_potential_risk_to_reward'] != 0)){ ?>
      <div id="chart4_div" style="width: 1000px; height: 500px;"></div>
       <?php } ?>
      </td></tr> 
     
    </table>    

