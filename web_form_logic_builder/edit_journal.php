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
<form action="process_edit_journal.php" name="catfrm" id="catfrm" method="post" enctype="multipart/form-data">
<input type="hidden" name="journal_id" id="journal_id" value="<?php echo $_GET['journal_id']; ?>" />
<?php
$selectjournal = mysql_query("select * from journal_form_master where journal_id='".$_GET['journal_id']."'");
$rowjournal = mysql_fetch_array($selectjournal);
 ?>
<div class="form-inner">
<div class="heading"><strong>Edit Journal Form</strong>
</div>

   
     <?php 
	 for($i=0;$i<count($json_string_arr);$i++){
		 $json_string_arr_single = (array)@$json_string_arr[$i];
		 

		 ?>
         
        <?php if(($json_string_arr_single['field_type'] == 'website') || ($json_string_arr_single['field_type'] == 'text')){ 
		
		
		
		$select_field_detail_text = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_text = mysql_fetch_array($select_field_detail_text);
	  
	 
		
		 $select_journal_detail_text = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_text['journal_form_field_id']."'");
	  $row_journal_detail_text = mysql_fetch_array($select_journal_detail_text);
	   if($row_journal_detail_text['journal_form_field_value'] != ''){$val_text = $row_journal_detail_text['journal_form_field_value'];}else
		{$val_text = $rowjournal[$json_string_arr_single['cid']]; }
		?>
  <div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> :</label>
        <input type="text" class="text" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" 
        value="<?php echo $val_text; ?>" >
</div>

        <?php } 
		else if($json_string_arr_single['field_type'] == 'dropdown'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];
			
			$select_field_detail_dropdown = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_dropdown = mysql_fetch_array($select_field_detail_dropdown);
	  
	 
		
		 $select_journal_detail_dropdown = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_dropdown['journal_form_field_id']."'");
	  $row_journal_detail_dropdown = mysql_fetch_array($select_journal_detail_dropdown);
	  			
		?>
  <div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
        <select name="<?php echo @$json_string_arr_single['cid']; ?>" >
        <?php if($dropdown_options['include_blank_option'] == 1){ ?>
            <option value=""></option>
            <?php } ?> 
        <?php  for($j=0;$j<count($dropdown_options1);$j++){			
			$dropdown_options2 = (array)$dropdown_options1[$j]; 
			if($row_journal_detail_dropdown['journal_form_field_value'] != ''){$val_drp = $row_journal_detail_dropdown['journal_form_field_value'];}else
		{$val_drp = $rowjournal[$json_string_arr_single['cid']]; } 
			 ?>           
            
       		<option value="<?php echo $dropdown_options2['label']; ?>" <?php if($val_drp == $dropdown_options2['label']){echo "selected";} ?>><?php echo $dropdown_options2['label']; ?></option>
        <?php } ?>
        </select>
</div>
        <?php } 
        else if($json_string_arr_single['field_type'] == 'radio'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];	
			
			$select_field_detail_radio = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_radio = mysql_fetch_array($select_field_detail_radio);
	  
	 
		
		 $select_journal_detail_radio = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_radio['journal_form_field_id']."'");
	  $row_journal_detail_radio = mysql_fetch_array($select_journal_detail_radio);		
		?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
   
        <?php  for($j=0;$j<count($dropdown_options1);$j++){			
			$dropdown_options2 = (array)$dropdown_options1[$j]; 
			if($row_journal_detail_radio['journal_form_field_value'] != ''){$val_radio = $row_journal_detail_radio['journal_form_field_value'];}else
		{$val_radio = $rowjournal[$json_string_arr_single['cid']]; }
			 ?>
             <input type="radio" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" value="<?php echo $dropdown_options2['label']; ?>"
             <?php if($val_radio == $dropdown_options2['label']){echo "checked";} ?> /><?php echo $dropdown_options2['label']; ?>      
        <?php } ?>       
</div>
        <?php } else if($json_string_arr_single['field_type'] == 'section_break'){ ?>

<div class="form-row"> <label><strong><?php echo @$json_string_arr_single['label']; ?></strong>
</div>
        <?php  }  else if($json_string_arr_single['field_type'] == 'checkboxes'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];			
		?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
  
        <?php  for($j=0;$j<count($dropdown_options1);$j++){			
			$dropdown_options2 = (array)$dropdown_options1[$j]; 
			
			$select_field_detail_checkboxes = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_checkboxes = mysql_fetch_array($select_field_detail_checkboxes);
	  
	 
		
		 $select_journal_detail_checkboxes = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_checkboxes['journal_form_field_id']."'");
	  $row_journal_detail_checkboxes = mysql_fetch_array($select_journal_detail_checkboxes);
	  
	  $checkBox_options = explode(',', $row_journal_detail_checkboxes['journal_form_field_value']);
	
			 ?>
             <input type="checkbox" name="<?php echo @$json_string_arr_single['cid']; ?>[]" id="<?php echo @$json_string_arr_single['cid']; ?>" 
             value="<?php echo $dropdown_options2['label']; ?>" <?php if((isset($checkBox_options[$j])) && ($checkBox_options[$j] == @$dropdown_options2['label'])){echo "checked";}else {echo "";} ?> />
			 <?php echo $dropdown_options2['label']; ?><br />       
        <?php } ?> 
</div>
        <?php } 
		else if($json_string_arr_single['field_type'] == 'file'){
			$select_field_detail_file = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_file = mysql_fetch_array($select_field_detail_file);
	  
	 
		
		 $select_journal_detail_file = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_file['journal_form_field_id']."'");
	  $row_journal_detail_file = mysql_fetch_array($select_journal_detail_file);
			
			 ?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
        <input type="file" class="text" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>"  /> &nbsp;&nbsp;
</div>
          <?php if($row_journal_detail_file['journal_form_field_value'] != ''){ ?>
          
<div class="form-row"> <label>&nbsp;</label>
         <img src="form_images/<?php echo $row_journal_detail_file['journal_form_field_value']; ?>" width="150" height="150" />
</div>
 <?php } ?>
        <?php }
		else if($json_string_arr_single['field_type'] == 'date'){ 
		$select_field_detail_date = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_date = mysql_fetch_array($select_field_detail_date);	 
		
		 $select_journal_detail_date = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_date['journal_form_field_id']."'");
	  $row_journal_detail_date = mysql_fetch_array($select_journal_detail_date);
	  if($row_journal_detail_date['journal_form_field_value'] != ''){$val_dt = $row_journal_detail_date['journal_form_field_value'];}else
		{$val_dt = $rowjournal[$json_string_arr_single['cid']]; } 
		?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
      
         <script>
			$(function() {
			$( "#<?php echo @$json_string_arr_single['cid']; ?>" ).datepicker();
			});
		 </script>
         <input type="text" class="text" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" value="<?php echo $val_dt; ?>" />
</div>
        <?php } 
		else if($json_string_arr_single['field_type'] == 'paragraph'){ 
		
		$select_field_detail_paragraph = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = '".$json_string_arr_single['label']."' and journal_field_name = '".$json_string_arr_single['cid']."'");
	  $row_field_detail_paragraph = mysql_fetch_array($select_field_detail_paragraph);	 
		
		 $select_journal_detail_paragraph = mysql_query("select * from journal_form where journal_user_master_id = '".$_SESSION['user_id']."' and journal_master_id = '".$_GET['journal_id']."' and journal_field_master_id = '".$row_field_detail_paragraph['journal_form_field_id']."'");
	  $row_journal_detail_paragraph = mysql_fetch_array($select_journal_detail_paragraph);
	  
		?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> :</label>
        <textarea name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" cols="30" rows="7"><?php echo $row_journal_detail_paragraph['journal_form_field_value']; ?></textarea>     
</div>
        <?php }         
	 }
	  ?> 
<div class="form-row"> <label>&nbsp;</label>
		<input type="hidden" name="process" value="edit"  />
		<input type="submit" class="button1" name="submit" id="submit" value="Submit">
</div> 
</div>
    </form>
