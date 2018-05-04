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
<form action="process_add_journal.php" name="catfrm" id="catfrm" method="post" enctype="multipart/form-data">



<div class="form-inner">
		<div class="heading"><strong>New Journal Form</strong></div>
    
     <?php 
	 for($i=0;$i<count($json_string_arr);$i++){
		 $json_string_arr_single = (array)@$json_string_arr[$i];
		 ?>
         
        <?php if(($json_string_arr_single['field_type'] == 'website') || ($json_string_arr_single['field_type'] == 'text')){ ?>

	 	<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> :</label>

        <input type="text" class="text" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" >
 		</div>

        <?php } 
		else if($json_string_arr_single['field_type'] == 'dropdown'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];			
		?>
        <div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
		
        <select name="<?php echo @$json_string_arr_single['cid']; ?>" >       
        <?php  for($j=0;$j<count($dropdown_options1);$j++){			
			$dropdown_options2 = (array)$dropdown_options1[$j]; 
			 ?>           
            
       		<option value="<?php echo $dropdown_options2['label']; ?>"><?php echo $dropdown_options2['label']; ?></option>
        <?php } ?>
        </select>
 
	</div>
        <?php } 
        else if($json_string_arr_single['field_type'] == 'radio'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];			
		?>
       <div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> :</label>
		        <?php  for($j=0;$j<count($dropdown_options1);$j++){			
			$dropdown_options2 = (array)$dropdown_options1[$j]; 
			 ?>
             <input type="radio" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" value="<?php echo $dropdown_options2['label']; ?>" /><?php echo $dropdown_options2['label']; ?>       
        <?php } ?>       
</div>
        <?php } else if($json_string_arr_single['field_type'] == 'section_break'){ ?>
<div class="form-row"> <label><strong><?php echo @$json_string_arr_single['label']; ?></strong> </label>	
</div>
        <?php  }  else if($json_string_arr_single['field_type'] == 'checkboxes'){
			$dropdown_options = (array)$json_string_arr_single['field_options'];
			$dropdown_options1 = (array)$dropdown_options['options'];			
		?>
       <div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>

        <?php  for($j=0;$j<count($dropdown_options1);$j++){			
			$dropdown_options2 = (array)$dropdown_options1[$j]; 
			 ?>
             <input type="checkbox" name="<?php echo @$json_string_arr_single['cid']; ?>[]" id="<?php echo @$json_string_arr_single['cid']; ?>" value="<?php echo $dropdown_options2['label']; ?>" /><?php echo $dropdown_options2['label']; ?><br />       
        <?php } ?> 
</div>
        <?php } 
		else if($json_string_arr_single['field_type'] == 'file'){ ?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
        <input type="file" class="text" name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>"  />
</div>
        <?php }
		else if($json_string_arr_single['field_type'] == 'date'){ ?>
<div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>

         <script>
			$(function() {
			$( "#<?php echo $json_string_arr_single['cid']; ?>" ).datepicker();
			});
		 </script>
         <input type="text" class="text" name="<?php echo $json_string_arr_single['cid']; ?>" id="<?php echo $json_string_arr_single['cid']; ?>"/>
</div>
        <?php } 
		else if($json_string_arr_single['field_type'] == 'paragraph'){ ?>
     <div class="form-row"> <label><?php echo @$json_string_arr_single['label']; ?> : </label>
	  <textarea name="<?php echo @$json_string_arr_single['cid']; ?>" id="<?php echo @$json_string_arr_single['cid']; ?>" cols="30" rows="7"></textarea>     
     </div>
        <?php }         
	 }
	  ?> 
       
      <div class="form-row"> <label>&nbsp;</label>
			<input type="hidden" name="process" value="add"  />
		<input type="submit" name="submit" id="submit" value="Submit" class="button1">
		</div>
</div>    
    </form>
