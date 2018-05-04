<?php
session_start();
include("../include/config.php");

	if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			//echo "helloo";
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	else
	{
	$query = "select * from admin_mast where admin_name = '".$_SESSION['Admin_name']."'";
	$rs = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($rs);
	$a = $row['admin_name'];
	$ad = $row['is_master_admin'];
	}

?>
<link href="css/css.css" rel="stylesheet" type="text/css" />
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
</style>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="125" valign="middle"><img src="../images/v3 logo .png" width="125" height="125" /></td>
            <td>&nbsp;</td>
            <td width="270" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="normal_fonts14_black"><strong>Welcome   		<?php echo $a; ?></strong></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    
                    <td class="normal_fonts12_black"><a href="welcomeAdmin.php" >Home</a> | 
                    <a href="changepassword.php" class="normal_fonts10">Change Password</a> | <a href="logout.php">Logout</a>
                    </td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><div class="menu">
          <ul>
            <li><a href="#" >Users</a>
            <ul>
             <?php  if($ad!='0') { ?>
            
            <li><a href="disAdmin.php" id="current">Admins</a></li>
            <li><a href="registered_user.php">Registered Users</a></li>
                <?php } ?>
            </ul>
            
            </li>
            
            
                
            
              <li><a href="comic_book.php" >Comic Book</a></li>
               
                <li><a href="rights_title.php">Rights</a></li>
               <!-- <li><a href="duties.php">Duties</a></li>-->
          
           <li><a href="dis_discussion.php">Discussion</a></li> 
           <li><a href="ask_lawyer.php">Ask Your Lawyer</a></li> 
           <li><a href="share_experience.php">Share your Experience</a></li>
          <li class="last"><a href="#" >Extra</a>
          <ul>           
           <li><a href="testimonial.php" >Testimonial</a></li>
           <li><a href="inquiry.php" >Inquiry</a></li>
           <li><a href="contact_us.php">Contact Us</a></li>
           <li><a href="press.php">Press Section</a></li>
          </ul>
          </li>
            </ul>
          </div></td>
      </tr>
       
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
</table>
