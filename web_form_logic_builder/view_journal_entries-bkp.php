<style>
body{color:#000; font-size:13px;}
.tbl_width tr td, .tbl_width tr th
{
	text-align:center;
border:1px solid #666;
border-collapse:collapse;
}
.tbl_width tr th
{
	text-align:center;
	background-color:#CCC;
	color:white; 
}
</style>
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
var data = $('[name="selectedfields[]"]').serialize();
	 $.ajax({
         data: data,
         type: "post",
         url: "ajax_journal_fields_db.php",
         success: function(data){
			 console.log(data);
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
			 console.log(data);	
			 document.getElementById("div_ajax_selected_fields").innerHTML=data;				
         }
		 });
}
</script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td colspan="2" >
<form name="frmfields" method="post">
<a id="mmm1" href="#">Filter Entries</a> | <a id="mmm" href="#">Select Fields</a>
<p id="ddd" style="display:none; background-color: #FFFFFF; height: auto;overflow: hidden;font-size: 14px;padding: 10px; border: 1px solid #ccc; width:500px;">
 <?php 
	   $sel_journal_detail = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."'");
	  while($row_journal_detail = mysql_fetch_array($sel_journal_detail)){
		   $q_checked = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."' and field_checked = 1 and journal_form_field_id = '".$row_journal_detail['journal_form_field_id']."'");
		   $num_checked = mysql_num_rows($q_checked);
	    ?>
<input type="checkbox" name="selectedfields[]" id="selectedfields[]" <?php if($num_checked>0){echo "checked";} ?> value="<?php echo $row_journal_detail['journal_form_field_id']; ?>"><?php echo $row_journal_detail['journal_form_field_label']; ?><br>
 <?php } ?><br />
 <input type="button" value="Apply" onclick="ajax_selectedfields();" />
 </p>
 
 </form>
 <form name="form2" id="form2" method="post">
 <p id="ddd1" style="display:none; background-color: #FFFFFF; height: auto;overflow: hidden;font-size: 14px;padding: 10px; border: 1px solid #ccc;width:500px;">
  Display Entries that match all of the following conditions:<br /><br />
  <select name="select_searchfields" onchange="show_datepicker(this.value);">
  <option value="date">Date</option> 
  <?php 
	   $sel_journal_detail1 = mysql_query("select * from  journal_field_master where user_master_id = '".$_SESSION['user_id']."'");
	  while($row_journal_detail1 = mysql_fetch_array($sel_journal_detail1)){
		 
	    ?>
        <option value="<?php echo $row_journal_detail1['journal_form_field_id']; ?>"><?php echo $row_journal_detail1['journal_form_field_label']; ?></option>
        <?php } ?>
  </select>
  <script>
  $(function() {
	$( "#searchfield" ).datepicker();
	});		
  function show_datepicker(dt){	
  if(dt == 'date'){  
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
  <input type="text" name="searchfield" id="searchfield" /><br /><br />
  <input type="button" value="Search" onclick="ajax_searchfields();" />
 </p>
 </form>
</td>
</tr>
<tr><td colspan="2"><table  id="div_ajax_selected_fields">
<tr><td width="77%" align="left" class="heading_home"><strong>Open Trades</strong></td></tr>
<tr><td colspan="3">
<?php 

$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Open' order by journal_id desc");
$numrows_cat = mysql_num_rows($sel_query_journal);

if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    	<th width="4%">No.</th>
    	<th width="">Journal Entry</th>
        <th width="">Date</th>      		
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
		if($row_journal["journal_entry_priority"] == 1){ $entry_color = "#F00";}
		else if($row_journal["journal_entry_priority"] == 2){ $entry_color = "#c0c000";}
		else if($row_journal["journal_entry_priority"] == 3){ $entry_color = "#093";}
		 ?>
    	<tr style="color:<?php echo $entry_color; ?>">
        	<td><?php echo $j;?></td>
            <td><a style="color:<?php echo $entry_color; ?>" href="index.php?page=edit_journal&journal_id=<?php echo $row_journal["journal_id"]; ?>"><?php echo $row_journal["journal_entry_title"]; ?></a></td>  
            <td><?php echo $row_journal["journal_entry_date"]; ?></td>
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

</td></tr>


<tr>
	 	<td width="30%">&nbsp;</td>
</tr>
<tr><td width="77%" align="left" class="heading_home"><strong>Stalking Trades</strong></td></tr>
<tr><td colspan="3">
<?php 
$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Stalking' order by journal_id desc");
$numrows_cat = mysql_num_rows($sel_query_journal);

if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    	<th width="4%">No.</th>
    	<th width="">Journal Entry</th>
        <th width="">Date</th>      		
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
		
		if($row_journal["journal_entry_priority"] == 1){ $entry_color1 = "#F00";}
		else if($row_journal["journal_entry_priority"] == 2){ $entry_color1 = "#c0c000";}
		else if($row_journal["journal_entry_priority"] == 3){ $entry_color1 = "#093";}
		 ?>
    	<tr style="color:<?php echo $entry_color1; ?>">
        	<td><?php echo $j;?></td>
            <td><a style="color:<?php echo $entry_color1; ?>" href="index.php?page=edit_journal&journal_id=<?php echo $row_journal["journal_id"]; ?>"><?php echo $row_journal["journal_entry_title"]; ?></a></td>
            <td><?php echo $row_journal["journal_entry_date"]; ?></td>
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

</td></tr>

<tr>
	 	<td width="30%">&nbsp;</td>
</tr>
<tr><td width="77%" align="left" class="heading_home"><strong>Closed Trades</strong></td></tr>
<tr><td colspan="3">
<?php 
$sel_query_journal = mysql_query("select * from journal_form_master where user_master_id='".$_SESSION['user_id']."' and journal_entry_status = 'Closed' order by journal_id desc");
$numrows_cat = mysql_num_rows($sel_query_journal);

if($numrows_cat > 0 ){
?>
<table border="0" width="100%" cellpadding="2" cellspacing="0" class="tbl_width" align="center">
	<tr>
    	<th width="4%">No.</th>
    	<th width="">Journal Entry</th>
        <th width="">Date</th>      		
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
		
		 if($row_journal["journal_entry_priority"] == 1){ $entry_color2 = "#F00";}
		else if($row_journal["journal_entry_priority"] == 2){ $entry_color2 = "#c0c000";}
		else if($row_journal["journal_entry_priority"] == 3){ $entry_color2 = "#093";}
		 ?>
    	<tr style="color:<?php echo $entry_color2; ?>">
        	<td><?php echo $j;?></td>
           <td><a style="color:<?php echo $entry_color2; ?>" href="index.php?page=edit_journal&journal_id=<?php echo $row_journal["journal_id"]; ?>"><?php echo $row_journal["journal_entry_title"]; ?></a></td> 
            <td><?php echo $row_journal["journal_entry_date"]; ?></td>
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

</td></tr>

</table></td></tr>

</table>