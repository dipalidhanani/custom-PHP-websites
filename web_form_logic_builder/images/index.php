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
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Website with web forms and database</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen"  />
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>

<table border="0" cellpadding="0" cellspacing="0" class="table_width" align="center">
	<tr><td><table border="0" align="center" cellspacing="0" class="maintable">
		<tr>

			<td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td align="left" valign="top" class="content logo"> <h1> <img src="images/Ver2.png" alt="Logo"> </h1> </td>
				</tr>
			</table></td>
		</tr>
		<tr>
		  <td id="mainmenu"><table  border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="" class="nav">
		<div class="nav-inner">
    <ul>
    	<?php if(@$_SESSION["user_id"] != "") { ?>
		<li class="first">Welcome <?php echo @$_SESSION["user_fullname"]; ?></li>	
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
    </ul>
	</div>
	</td>

  </tr>
</table>
</td>
	    </tr>
		<tr>

			
			<td align="left" valign="top" class="container"  width="100%">
			<table border="0" cellspacing="0" cellpadding="0" width="100%">
			  <tr>
			  

			    <td width="100%" valign="top" class="content">
                <table width="100%" ><tr><td>
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