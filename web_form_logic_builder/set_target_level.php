<form action="process_set_target_level.php" name="catfrm" id="catfrm" method="post" enctype="multipart/form-data">
<?php 
$select_target_level = mysql_query("select * from set_target_level where set_target_user_master_id = '".$_SESSION["user_id"]."'");
$row_target_level = mysql_fetch_array($select_target_level);
?>
<div class="form-inner">
<div class="heading"><strong>Set Target Level</strong></div>
<div class="form-row"> <label> Weekly : </label>
<input type="text"  class="text" name="set_target_weekly" id="set_target_weekly" value="<?php echo $row_target_level['set_target_weekly']; ?>" />
</div>
<div class="form-row"> <label> Monthly :</label>
        <input type="text"  class="text" name="set_target_monthly" id="set_target_monthly" value="<?php echo $row_target_level['set_target_monthly']; ?>"  />
</div>
<div class="form-row"> <label> Quarterly : </label>
        <input type="text"  class="text" name="set_target_quarterly" id="set_target_quarterly" value="<?php echo $row_target_level['set_target_quarterly']; ?>"  />
</div>
<div class="form-row"> <label> Yearly : </label>
        <input type="text"  class="text" name="set_target_yearly" id="set_target_yearly" value="<?php echo $row_target_level['set_target_yearly']; ?>"  />
</div>
<div class="form-row"> <label> &nbsp; </label>

		<input type="hidden" name="process" value="add"  />
		<input type="submit" name="submit" id="submit" value="Submit" class="button1">
</div>
</div>
    </form>