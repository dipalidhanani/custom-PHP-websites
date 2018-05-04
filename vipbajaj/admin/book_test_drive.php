<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO - Book Test Drive</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../menu_style.css" type="text/css" />

<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
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
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
      
         
     
      <tr>
        <td class="normal_fonts14_black">Book Test Drive</td>
        <td align="right" class="normal_fonts14_black"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="bike.php?action=new"><img src="../images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="book_test_drive.php?action=new">Book Test Drive</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="23%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Test Drive Date Time</strong></td>
            <td width="26%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Bike Name</strong></td>
            <td width="24%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Name</strong></td>
            <td width="17%" align="left" bgcolor="#999999" class="normal_fonts10"><strong>Contact No</strong></td>           
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM bike_book_test_drive  
		  INNER JOIN bike_mast ON bike_mast.Bike_id = bike_book_test_drive.Bike_mast_id";
		  
		  $no=1;
		  $recordsetcategory = mysql_query($query);
		  $totrecords=mysql_num_rows($recordsetcategory);
		  if($totrecords>0){
		  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
		  {
			  if(($no%2)==1)
			  {
					$bg="#FFFFFF";
			  }
			  else
			  {
					$bg="#F3F3F3";
			  }
			  $dt1=explode("-",$rowcategory["Book_test_drive_date"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
                                                            $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $book_test_drive_date=$dt."-".$mm1."-".$yy1." ".$tim;	
	
		  ?>
          <tr>
            <td align="left" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $book_test_drive_date;?></td>
            <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Bike_name"];?></td>
           <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Name"];?></td>
           <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Contactno"];?></td> 
            
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                       <?php 
		if($_SESSION['Is_master_admin']==1)
		{
		?>
                    <td align="center"><a href="processBook_test_drive.php?book_test_driveid=<?php echo $rowcategory["Bike_book_test_drive_id"];?>&process=delete" onClick="return confirm('Do You Want to Remove Selected Test drive ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                    <?php }  ?>
                       
                      </tr>
                </table></td>
          </tr>
          <?php
			 } }
			 else{$err="No Records Found";
			 ?>
           <tr>  <td bgcolor="#fff"  colspan="5" class="normal_fonts9" align="center"><?php echo $err;?></td></tr>
             <?php } ?>
        </table></td>
      </tr>
      
     
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
       <tr>
        <td colspan="2">
        <form name="Book_test_driveform" id="Book_test_driveform" method="post" action="processBook_test_drive.php" enctype="multipart/form-data"> 
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border"> 
        <tr><td colspan="3">
          <table  width="100%" border="0" cellpadding="5" cellspacing="0">        
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Bike Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <select name="bike_name" id="bike_name">
              <option value="">Select</option>
              <?php $q=mysql_query("select * from bike_mast"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>"><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
              </select>
              </td>
              </tr>
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="name" id="name" type="text" class="normal_fonts9" size="45" /></td>
              </tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Contact no</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="contactno" id="contactno" type="text" class="normal_fonts9" size="45" /></td>
              </tr>
            
            </table>
        </td>
                   </tr>
         
                  
          <tr>
            <td width="11%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td width="19%" align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td width="70%" align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
              <input type="hidden" name="process" value="addtestdrive" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
          </tr></table>
          </form>
        </td>
      </tr>
       
      <?php
	  }
	  ?>
     <?php /*?> <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
         <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
        <form name="Book_test_driveform" method="post" action="processBook_test_drive.php" enctype="multipart/form-data">
        <?php
		$recordsetbike = mysql_query("SELECT * FROM  bike_book_test_drive			
			 where Bike_book_test_drive_id 	='".$_REQUEST["book_test_driveid"]."'");
	  if($rowbike = mysql_fetch_array($recordsetbike,MYSQL_ASSOC))
	  {
		  ?>
           <tr><td colspan="3">
          <table  width="100%" border="0" cellpadding="5" cellspacing="0">        
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Bike Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <input type="hidden" name="bike_book_test_drive_id" value="<?php echo $rowbike['Bike_book_test_drive_id']; ?>" />
              <input name="bike_name" type="text" class="normal_fonts9" size="45" value="<?php echo $rowbike['Bike_name']; ?>" /></td>
            </tr>
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Bike Color</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_color" type="text" class="normal_fonts9" size="45" value="<?php echo $rowbike['Bike_colors']; ?>" /></td>
              </tr>
              
    
            <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Bike Price</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_price" type="text" class="normal_fonts9" size="45" value="<?php echo $rowbike['Bike_price']; ?>" /></td>
              </tr>
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
              <td width="1%" align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top"><span class="normal_fonts9"><strong>Features &amp; Specifications</strong></span>
                </td>
              </tr>
           
              
            
            </table>
        </td>
                   </tr>
      <?php
	  }
	  ?>
        <tr>
            <td width="11%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td width="19%" align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td width="70%" align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
            
              <input type="hidden" name="process" value="edittestdrive" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Update" /></td>
          </tr>
          </form>
    </table> 
    </td></tr>
    <?php } ?><?php */?>
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
