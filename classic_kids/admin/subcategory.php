<?php
session_start();
require_once("include/config.php");
	require_once("include/function.php");
	u_Connect("cn");
	
	function category_chain1($CatId)
	{
		global $cn;		
		//echo "SELECT * from category_master where category_ID=".$CatId." order by category_name";		
		$rs1=mysql_query("SELECT * from category_master where category_ID=".$CatId." order by category_name") or die(mysql_error());		
		if($row1=mysql_fetch_object($rs1))
		{		
			if($row1->parent_category_ID==0)
			{
				$parcatname=$row1->category_name;					
				selectsub_category($CatId,$parcatname);
			}			
		}
	}
	function selectsub_category($SUBCatId,$parcatname)
	{
		global $cn;
		
		
		 $recordsetcat = mysql_query("SELECT * from category_master where parent_category_ID=".$SUBCatId." order by category_name ");
		 while($rowcat = mysql_fetch_array($recordsetcat,MYSQL_ASSOC))
		  {	  			
				$passname=$parcatname." >> ".$rowcat["category_name"];
				?>
				                                                   
               <input type="radio" id="childcategory" name="childcategory" value="<?php echo $rowcat['category_ID']; ?>" <?php if($_REQUEST["hdnCatid"]==$rowcat['category_ID']) { ?> checked="checked" <?php } ?> />
              
				<?php echo $parcatname." >> ".$rowcat["category_name"];			
				echo "<br/>";
				
				 $recordsetcatcheck = mysql_query("SELECT * from category_master where parent_category_ID=".$rowcat["category_ID"]." order by category_name ");
				
				 if(mysql_num_rows($recordsetcatcheck)!=0)
				 {
					selectsub_category($rowcat["category_ID"],$passname);
				 }			 
		  }	
	}
	category_chain1($_REQUEST['parent_category']);
?>