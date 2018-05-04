<?php
include("include/config.php");

?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<style type="text/css" >

#cssmenu ul { margin: 0; padding: 0;}
#cssmenu li { margin: 0; padding: 0;}
#cssmenu a { margin: 0; padding: 0;}
#cssmenu ul {list-style: none;}
#cssmenu a {text-decoration: none;}
#cssmenu { box-shadow: 0px 2px 3px rgba(0,0,0,.4);}


#cssmenu > ul > li {
    float: left;
    margin-left: 10px;
    position: relative;
}

#cssmenu > ul > li > a {
   color: #FFFFFF;
    font-family: Verdana,'Lucida Grande';
    font-size: 13px;
    padding: 11px 2px;
    transition: color 0.15s ease 0s;
}

#cssmenu > ul > li > a:hover {color: rgb(250,250,250); }


#cssmenu > ul > li > ul {
    opacity: 0;
    visibility: hidden;
    padding: 16px 0 20px 0;
    background-color: rgb(250,250,250);
    text-align: left;
    position: absolute;
    top: 55px;
    left: 50%;
    margin-left: -90px;
    width: 180px;
-webkit-transition: all .3s .1s;
   -moz-transition: all .3s .1s;
     -o-transition: all .3s .1s;
        transition: all .3s .1s;
-webkit-border-radius: 5px;
   -moz-border-radius: 5px;
        border-radius: 5px;
-webkit-box-shadow: 0px 1px 3px rgba(0,0,0,.4);
   -moz-box-shadow: 0px 1px 3px rgba(0,0,0,.4);
        box-shadow: 0px 1px 3px rgba(0,0,0,.4);
		z-index:400;
}

#cssmenu > ul > li:hover > ul {
    opacity: 1;
    top: 30px;
    visibility: visible;
}

#cssmenu > ul > li > ul:before{
    content: '';
    display: block;
    border-color: transparent transparent rgb(250,250,250) transparent;
    border-style: solid;
    border-width: 10px;
    position: absolute;
    top: -20px;
    left: 50%;
    margin-left: -10px;
}

#cssmenu > ul ul > li { position: relative;}

#cssmenu ul ul a{
    color: rgb(50,50,50);
    font-family: Verdana, 'Lucida Grande';
    font-size: 13px;
    background-color: rgb(250,250,250);
    padding: 5px 8px 7px 16px;
    display: block;
-webkit-transition: background-color .1s;
   -moz-transition: background-color .1s;
     -o-transition: background-color .1s;
        transition: background-color .1s;
}

#cssmenu ul ul a:hover {background-color: rgb(240,240,240);}


#cssmenu ul ul ul {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    top: -16px;
	margin-left:-15px;
    left: 150px;
    padding: 16px 0 20px 0;
    background-color: rgb(250,250,250);
    text-align: left;
    width: 160px;
-webkit-transition: all .3s;
   -moz-transition: all .3s;
     -o-transition: all .3s;
        transition: all .3s;
-webkit-border-radius: 5px;
   -moz-border-radius: 5px;
        border-radius: 5px;
-webkit-box-shadow: 0px 1px 3px rgba(0,0,0,.4);
   -moz-box-shadow: 0px 1px 3px rgba(0,0,0,.4);
        box-shadow: 0px 1px 3px rgba(0,0,0,.4);
}


#cssmenu ul ul > li:hover > ul { opacity: 1; left: 196px; visibility: visible;}


#cssmenu ul ul a:hover{
    background-color: #0851a0;
    color: #ffffff;
}

#cssmenu ul ul ul ul{margin-left:-35px;}
</style>
<script language="javascript">
function check_valid_email(emailval)
{
	if(emailval=="")
	{
		return true;
	}
	else
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(emailval) == false)
		{
			 return false;
		}
		else
		{
			return true;
		}
	}
}
</script>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="83" align="center" valign="middle" style="background:url(images/header_02.png) repeat-x;"><table width="980" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="235" align="left" valign="middle"><a href="index.php"><img src="images/logo.png" width="235" height="38" border="0"></a></td>
        <td>&nbsp;</td>
        <td align="right"><table width="180" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td width="22"><img src="images/tle-icon.png" width="20" height="18"></td>
            <td class="black11" align="left"><font size="+1"><strong>(0261) 2428191</strong></font></td>
          </tr>
          <tr>
            <td><img src="images/email-icon.png" width="20" height="18"></td>
            <td class="black11"><font size="+1"><strong>vipsurat@vipauto.co.in</strong></font></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="20"><img src="images/header_04.png" width="20" height="40"></td>
        <td style="background:url(images/header_05.png) repeat-x;">
        <!--MegaMenu Starts-->
          <div id='cssmenu'>
    <ul>
    <li><a href="index.php">Home</a></li>
     <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="profile.php">Profile</a></li>
          <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
      <li class='has-sub'>
        <a href="products.php">Products</a>
        <ul>
        <li>  <a href="#">Two Wheelers</a>    
        <ul>
        <?php $qmenu=mysql_query("select * from bike_mast
								 INNER JOIN model_mast ON model_mast.Model_id=bike_mast.Model_mast_id where type=0 group by Model");
		while($rowmenu=mysql_fetch_array($qmenu))
		{
		?>
        <li class='has-sub'>
        <a href="products.php"><?php echo $rowmenu["Model"]; ?></a>
        <?php  $qmenu1=mysql_query("select * from bike_mast where Model_mast_id='".$rowmenu["Model_id"]."'");
		$totmenu=mysql_num_rows($qmenu1);
		if($totmenu>0){
		?>
        <ul>
        <?php
		while($rowmenu1=mysql_fetch_array($qmenu1))
		{
		?>
        <li>
         <a href="products-1.php?bikeid=<?php echo $rowmenu1["Bike_id"]; ?>"><?php echo $rowmenu1["Bike_name"]; ?></a>
        </li>
        <?php } ?>
        </ul>
        <?php } ?>
        </li>
        <?php } ?>
        </ul> 
        
        </li>
        
    
        
        
        
         <li>  <a href="#">Commercial Vehicles</a>    
        <ul>
        <?php $qmenu=mysql_query("select * from bike_mast
								 INNER JOIN model_mast ON model_mast.Model_id=bike_mast.Model_mast_id where type=1 group by Model order by Model_id asc");
		while($rowmenu=mysql_fetch_array($qmenu))
		{
		?>
        <li class='has-sub'>
        <a href="products.php"><?php echo $rowmenu["Model"]; ?></a>
        <?php  $qmenu1=mysql_query("select * from bike_mast where Model_mast_id='".$rowmenu["Model_id"]."'");
		$totmenu=mysql_num_rows($qmenu1);
		if($totmenu>0){
		?>
        <ul>
        <?php
		while($rowmenu1=mysql_fetch_array($qmenu1))
		{
		?>
        <li>
         <a href="products-1.php?bikeid=<?php echo $rowmenu1["Bike_id"]; ?>"><?php echo $rowmenu1["Bike_name"]; ?></a>
        </li>
        <?php } ?>
        </ul>
        <?php } ?>
        </li>
        <?php } ?>
        </ul> 
        
        </li>
         </ul> 
                
       
      </li>
        <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
          <li> <a href="business_arena.php">Business Arena</a></li>
            <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="booktestdrivefull.php">Book Test Drive</a></li>
          <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="bookservicefull.php">Book Your Service</a></li>
          <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="doorstep.php">Door Step</a></li>
         <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="pricing.php">Pricing</a></li>
         <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="carrers.php">Carrers</a></li>
       	  <li style="background-color:#ffffff;width:1px;height:18px; margin-top:2px;">&nbsp;</li>
       <li><a href="contactus.php">Contact Us</a></li>
          
    </ul>
    </div>
<!--MegaMenu Ends-->
        </td>
        <td width="20"><img src="images/header_06.png" width="20" height="40"></td>
      </tr>
    </table></td>
  </tr>
</table>

