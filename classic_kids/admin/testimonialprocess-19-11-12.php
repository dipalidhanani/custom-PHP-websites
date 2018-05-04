<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");

if($_REQUEST["submit"]=="Approve Selected")
{
		foreach($_REQUEST["testimonialid"] as $testimonialid) 
		{ 
				$selectedtestimonial[$c]=$testimonialid;
			
			$query="update testimonials set testimonials_active_status=1 where testimonials_ID='".$selectedtestimonial[$c]."'";
			mysql_query($query);
		}

}
elseif($_REQUEST["submit"]=="Reject Selected")
{
	    foreach($_REQUEST["testimonialid"] as $testimonialid) 
		{ 
				$selectedtestimonial[$c]=$testimonialid;
			
				$query="update testimonials set testimonials_active_status=0 where testimonials_ID='".$selectedtestimonial[$c]."'";
			mysql_query($query);
		}
}	
elseif($_REQUEST["submit"]=="Remove Selected")
{
		foreach($_REQUEST["testimonialid"] as $testimonialid) 
		{ 
				$selectedtestimonial[$c]=$testimonialid;
			
				$query="delete from testimonials where testimonials_ID='".$selectedtestimonial[$c]."'";
				mysql_query($query);			
		}
}
header("Location:testimonials.php");
exit();
?>

