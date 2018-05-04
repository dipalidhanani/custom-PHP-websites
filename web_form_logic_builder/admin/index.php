<?php session_start();
include("../config.php");
 include("functions_mysql.php");
 include("functions.php");
$unsession_pageArray = array("login", "forgot_pwd");
if ( !in_array($_GET['page'],$unsession_pageArray) && $_GET['page'] != "" )
 {
	if ( $_SESSION['admin_id'] == "" ) 
	{
		$_SESSION['backtoURL'] = $_SERVER['REQUEST_URI'];
		echo $_SESSION['backtoURL']; 
		$_SESSION['SessionMessage'] = "<span class='error'>Please login First</span>";
		header("Location:index.php?page=login");
	}
}
$pagename = ( isset($_GET['page']) ) ? $_GET['page'] : "login";
$pagename .= ".php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Website with web forms and database</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen"  />
<link href="ui.datepicker.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="ui.datepicker.js"></script>

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
    	<?php if(@$_SESSION["admin_name"] != "") { ?>
		<li style="float:right; border:none; text-align:right; padding:0px; width:25%;">Welcome <?php echo @$_SESSION["admin_name"]; ?></li>	
        <?php } ?>
    </ul></td>
    <td width="13"><img src="images/nav_right.gif" width="13" height="37" alt="" /></td>
  </tr>
</table></td>
	    </tr>
		<tr>

			
			<td align="left" valign="top" class="container"><table border="0" cellspacing="0" cellpadding="0" width="915">
			  <tr>
			  	<td width="110" valign="top" class="right" ><?php include("leftbar.php"); ?>	</td>

			    <td width="769" height="500" valign="top" class="content">
				<?php //if(@$_GET['bookmsg']==1){echo "<span style=\"float:left; padding-left: 25px; width:100%; color:red;\">Data Successfully Added.</span>";}
				if(isset($_SESSION["successmessage"])){echo "<span style=\"float:left; padding-left: 25px; width:100%; color:green;\">".$_SESSION["successmessage"]."</span>"; }
				include($pagename);
				  ?>
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