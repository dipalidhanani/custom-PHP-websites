<?php
session_start();
include("include/config.php");


	if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			//echo "helloo";
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	else
	{
	$query = "select * from admin_mast where Admin_name = '".$_SESSION['Admin_name']."'";
	$rs = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($rs);
	$a = $row['Admin_name'];
	$ad = $row['Is_master_admin'];

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO -  Admin Homepage</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />

<style type='text/css'>

	body {
		text-align: left;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>

</head>


<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0"  class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->            
<table width="100%" border="0" cellspacing="5" cellpadding="0" >
                <?php $qmodel=mysql_query("select * from model_mast order by Model_id");
				while($rowmodel=mysql_fetch_array($qmodel))
				{
				?>
                  <tr>
                    <td height="25" bgcolor="#E6E6E6" class="black11"><strong>&nbsp;<?php echo $rowmodel["Model"]; ?></strong></td>
                  </tr>
                  <tr>
                    <td><table  border="0" cellspacing="0" cellpadding="0" align="left">
                      <tr>
                      <?php 
					
					 
					  	$qbike=mysql_query("select * from bike_mast where Model_mast_id ='".$rowmodel["Model_id"]."' order by Bike_id desc LIMIT 6");
							while($rowbike=mysql_fetch_array($qbike))
							{
								
						?>
                      
                         <td align="left" valign="top" ><table align="left"  border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td  align="center" valign="middle" ><a href="bike.php?action=view&bikeid=<?php echo $rowbike["Bike_id"]; ?>">
                            <img src="../bike_photos/<?php echo $rowbike["Bike_thumb_photo"]; ?>" width="98" height="56" border="0" />
                            </a></td>
                          </tr>
                          <tr>
                            <td height="10" align="center"></td>
                          </tr>
                          <tr>
                            <td align="center" class="blue normal_fonts9"><a href="bike.php?action=view&bikeid=<?php echo $rowbike["Bike_id"]; ?>"><?php echo $rowbike["Bike_name"]; ?></a></td>
                          </tr>
                        </table></td>
                        
                        <td width="20"></td>
                       
                        <?php
                      
						} ?>
                        
                      </tr>
                    </table></td>
                  </tr>
                  
                  <?php } ?>
                
                </table>
 <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>