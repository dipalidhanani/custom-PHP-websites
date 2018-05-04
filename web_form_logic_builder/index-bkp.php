<?php session_start();
include("config.php");
 include("functions_mysql.php");
 include("functions.php");
$unsession_pageArray = array("login");
if ( !in_array(@$_GET['page'],$unsession_pageArray) && @$_GET['page'] != "" )
 {
	if ( $_SESSION['user_id'] == "" ) 
	{
		$_SESSION['backtoURL'] = $_SERVER['REQUEST_URI'];
		echo $_SESSION['backtoURL']; 
		$_SESSION['SessionMessage'] = "<span class='error'>Please login First</span>";
		header("Location:index.php?page=login");
	}
}
if ( @$_SESSION['user_id'] == "" ) 
	{
$pagename = ( isset($_GET['page']) ) ? $_GET['page'] : "login";
	}else{
	$pagename = ( isset($_GET['page']) ) ? $_GET['page'] : "home";	
		}
$pagename .= ".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Website with web forms and database</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen"  />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

</head>

<body>

<table border="0" width="764" cellpadding="0" cellspacing="0" class="table_width" align="center">
	<tr><td><table border="0" align="center" cellpadding="3" cellspacing="0" class="maintable">
		<tr>

			<td align="left" height="145"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top" class="content"><h1><?php echo "Website with web forms and database";?></h1></td>
				</tr>
			</table></td>
		</tr>
		<tr>
		  <td id="mainmenu"><table width="905" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="13"><img src="images/nav_left.gif" width="13" height="37" alt="" /></td>
    <td width="879" class="nav">
    <ul>
    	<?php if(@$_SESSION["user_id"] != "") { ?>
		<li style="float:right; border:none; text-align:right; padding:0px; width:25%;">Welcome <?php echo @$_SESSION["user_fullname"]; ?></li>	
       <li> <a href="index.php?page=my-account">My Account</a></li>
       <li> <a href="index.php?page=new_journal">New</a></li>
       <li> <a href="#">Delete</a></li>
       <li> <a href="#">Export Data</a></li>      
       <li> <a href="index.php?page=view_journal_entries">Entries</a></li>
       <li> <a href="formbuilder-gh-pages/index.php">Edit Form</a></li>
       <li> <a href="index.php?page=view_form">View Form</a></li>
       <li> <a href="index.php?page=set_target_level">Set Targets</a></li>
       <li> <a href="logout.php">Logout</a></li>
        <?php } else { ?>
        <li> <a href="index.php?page=login">Login</a></li>
        <?php } ?>
    </ul></td>
    <td width="13"><img src="images/nav_right.gif" width="13" height="37" alt="" /></td>
  </tr>
</table></td>
	    </tr>
		<tr>

			
			<td align="left" valign="top" class="container"><table border="0" cellspacing="0" cellpadding="0" width="915">
			  <tr>
			  

			    <td width="769" height="500" valign="top" class="content">
                <table><tr><td>
				<?php //if(@$_GET['bookmsg']==1){echo "<span style=\"float:left; padding-left: 25px; width:100%; color:red;\">Data Successfully Added.</span>";}
				if(isset($_SESSION["successmessage"])){echo "<span style=\"float:left; padding-left: 5px; width:100%; color:green;\">".$_SESSION["successmessage"]."</span>"; }
				?>
                </td></tr>
                <tr><td>
                <?php
				include($pagename);
				  ?>
                  </td></tr></table>
				</td>
			    
		      </tr>
		    </table></td>
		</tr>

		<tr>
		  <td align="left" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="2">
            <tr>
              <td class="footer" align="center">Copyright&copy;. All rights reserved.</td>
            </tr>
          </table></td>
	    </tr>
		</table></td>

	</tr>
	<tr>
		<td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
<?php unset($_SESSION["errormessage"]);
unset($_SESSION["successmessage"]);
 ?>