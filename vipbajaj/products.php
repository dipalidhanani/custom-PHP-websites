<?php
include("include/config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIP AUTO</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<link href="css/home.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td><table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td class="blue"><a href="index.php">Home</a> &gt; Products</a></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                  <tr>
                    <td class="title">Products</td>
                    </tr>
                  <tr>
                    <td height="5" class="title"></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="5" cellpadding="0" >
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
                            <td  align="center" valign="middle" ><a href="products-1.php?bikeid=<?php echo $rowbike["Bike_id"]; ?>">
                            <img src="bike_photos/<?php echo $rowbike["Bike_thumb_photo"]; ?>" width="98" height="56" border="0" />
                            </a></td>
                          </tr>
                          <tr>
                            <td height="10" align="center"></td>
                          </tr>
                          <tr>
                            <td align="center" class="blue"><a href="products-1.php?bikeid=<?php echo $rowbike["Bike_id"]; ?>"><?php echo $rowbike["Bike_name"]; ?></a></td>
                          </tr>
                        </table></td>
                        
                        <td width="20"></td>
                       
                        <?php
                      
						} ?>
                        
                      </tr>
                    </table></td>
                  </tr>
                  
                  <?php } ?>
                
                </table></td>
              </tr>
            </table></td>
            <td width="12">&nbsp;</td>
            <td width="182" align="left" valign="top"><table width="180" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php include("booktestdrive.php"); ?></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td><?php include("bookservice.php"); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="80" align="left" valign="top"><?php include("bikeslider1.php"); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
