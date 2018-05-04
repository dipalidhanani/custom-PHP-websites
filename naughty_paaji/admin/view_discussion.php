<?php
session_start();
include("../include/config.php");
?>

<html>
<head>
<title>Naughty Paaji - Admin Facility</title>
<script>
function confirmdel(frm,pk)
{
	with(frm)
	{
	var flg = false;
		for(i=0;i<pk.length;i++)
		{
			if(pk[i].checked)
			{
				flg=true;
				break;
			}
		}
		if(!flg)
		{
			alert("please select the records....")
			return false;
		}
		
		}
}
</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>     
   <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
   <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("headerAdmin.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
<form method="post" name="discussionform" action="" >

<?php 
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
	
	 $a=$_GET["discussion_board_id"];
   
   $query = "select * from discussion_board where discussion_board_id ='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	   	   
	?>     
   <table width="100%" border="0" cellspacing="10" cellpadding="0">
          
          <tr>
            <td>
<table width="100%" cellpadding="5" cellspacing="0" class="border">

<tr>
<td class="normal_fonts9"><b><?php echo $row["discussion_topic"]; ?></b></td>
</tr>
<tr>
<td class="normal_fonts9"><?php echo $row["discussion_description"]; ?></td>
</tr>
<tr><td>&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onClick="history.go(-1)" /></td></tr>

</table>	 </td>
          </tr>
          
</table>
<?php   } ?>
</form>
<!--   main ends here-->


</td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 </td></tr></table>
</body>
</html>