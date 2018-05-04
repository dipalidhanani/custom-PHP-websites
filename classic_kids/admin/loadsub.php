<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<select name="subcategory" class="normal_fonts9">
<option value="">Select</option>
            <?php
			  $recordsetcategory = mysql_query("SELECT * FROM  category_master where parent_category_ID='".$_REQUEST["parentcategory"]."' order by category_ID");
			  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
			  {
			  ?>
            <option value="<?php echo $rowcategory["category_ID"];?>"><?php echo $rowcategory["category_name"];?></option>
            <?php
			}
			?>
</select>