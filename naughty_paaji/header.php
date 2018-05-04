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


<script language="JavaScript1.2" type="text/javascript">
function bookmark() {
title = "Naughty Paaji";
url = "http://www.naughtypaaji.com/";
if (window.sidebar) {
// Mozilla
window.sidebar.addPanel(title, url,"");
} else if( window.external ) {
window.external.AddFavorite( url, title);
}
else if(window.opera && window.print) {
// Opera
return true;
}
}
</script>

<link href="css/css.css" rel="stylesheet" type="text/css" />
<style type="text/css">

#cssmenu ul { margin: 0; padding: 0;}
#cssmenu li { margin: 0; padding: 0;}
#cssmenu a { margin: 0; padding: 0;}
#cssmenu ul {list-style: none;}
#cssmenu a {text-decoration: none;}
#cssmenu { box-shadow: 0px 2px 3px rgba(0,0,0,.4);}


#cssmenu > ul > li {
    float: left;   
    position: relative;
	 width: 115px;
}
#cssmenu > ul > li.last{width: 55px;}

#cssmenu > ul > li > a {
  font-size:15px;
  color:#FFD098;
  text-decoration:none; 
  font-weight:bold;
  outline:none;
  display:block; 
  position:relative; 
  height: 70px;
  background: url("images/menu_seperator.png") no-repeat scroll right center transparent;
  padding: 16px 5px 0 0;
  text-align:center;
  text-decoration:none; 
  font-family: comic sans ms;
}
/*#cssmenu > ul > li.first a{padding-right:5px;}*/

#cssmenu > ul > li > a:hover {color: rgb(250,250,250); color: #D2C2A1;}


#cssmenu > ul > li > ul {
    opacity: 0;
    visibility: hidden;
    padding: 8px 0;
    background-color: #C2B19C;
    text-align: left;
    position: absolute;
    top: 80px;
    left: 50%;
    margin-left: -158px;
    width: 314px;
-webkit-transition: all .3s .1s;
   -moz-transition: all .3s .1s;
     -o-transition: all .3s .1s;
        transition: all .3s .1s;
-webkit-box-shadow: 0px 1px 3px rgba(0,0,0,.4);
   -moz-box-shadow: 0px 1px 3px rgba(0,0,0,.4);
        box-shadow: 0px 1px 3px rgba(0,0,0,.4);
		z-index:400;
}

#cssmenu > ul > li:hover > ul {
    opacity: 1;    
    visibility: visible;
}

#cssmenu > ul > li > ul:before{
    content: '';
    display: block;
    border-color: transparent transparent #C2B19C;
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
    font-family: comic sans ms;
    font-size: 13px;
  
    padding: 5px 8px 7px 16px;
    display: block;
-webkit-transition: background-color .1s;
   -moz-transition: background-color .1s;
     -o-transition: background-color .1s;
        transition: background-color .1s;
}
#cssmenu ul li ul li a{ background-color: #C2B19C;}
#cssmenu ul li ul li ul li a{ background-color: #D3C9B6;}

#cssmenu ul ul a:hover {background-color: rgb(240,240,240);}


#cssmenu ul ul ul {
    visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0px;
	margin-left:118px;
    left: 150px;
    padding: 8px 0;
    background-color: #D3C9B6;
    text-align: left;
    width: 198px;
-webkit-transition: all .3s;
   -moz-transition: all .3s;
     -o-transition: all .3s;
        transition: all .3s;
}


#cssmenu ul ul > li:hover > ul { opacity: 1; left: 196px; visibility: visible;}


#cssmenu ul ul a:hover{
    background-color: #9B805F;
    color: #ffffff;
}
#cssmenu > ul > li.last > a{background:none; padding-right:0; padding-left:7px;}
/*#cssmenu{ height: 70px; display:block; padding:0; margin:20px auto; } 
#cssmenu > ul {list-style:inside none; padding:0; margin:0;} 
#cssmenu > ul > li {list-style:inside none; padding:0; margin:0; float:left; display:block; position:relative; width: 124px;} 
#cssmenu > ul > li > a{ outline:none; display:block; position:relative; padding: 15px 8px; font:bold 13px/100% Arial, Helvetica, sans-serif; text-align:center; text-decoration:none; } 

#cssmenu > ul > li.has-sub:hover > a:before{} 
#cssmenu ul li.has-sub:hover > a{  border-color:#3f3f3f;  z-index:999; } 
#cssmenu ul li.has-sub:hover > ul, #cssmenu ul li.has-sub:hover > div{display:block;} 
#cssmenu ul li.has-sub > a:hover{ border-color:#3f3f3f;} 
#cssmenu ul li > ul, #cssmenu ul li > div{ display:none; width:auto; position:absolute; top:64px; padding:8px 0; background:#C2B19C; border-radius:0 0 5px 5px; z-index:999; } 
#cssmenu ul li > ul{width:200px;} 
#cssmenu ul li > ul li{display:block; list-style:inside none; padding:0; margin:0; position:relative;} 
#cssmenu ul li > ul li a{ outline:none; display:block; position:relative; margin:0; padding:5px 20px; font:10pt Arial, Helvetica, sans-serif; color:#000000; text-decoration:none;  } 


 #cssmenu > ul > li > ul > li a:hover{background:#9B805F;  } 
#cssmenu > ul > li > a{font-size:17px; color:#FFD098; text-decoration:none; font-weight:bold;} 
#cssmenu > ul > li > a:hover{  color: #D2C2A1;} 
*/

</style>
<form>
<table width="980" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="980" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="235" height="175" align="center" valign="bottom"><a href="index.php"><img src="images/logo.png" alt="Logo" title="Logo" width="222" height="168" border="0" /></a></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="42" align="right" class="white10">
            <a href="index.php">Home</a> | 
            <a href="index.php?page=4">Contact us</a> |
            <a href="index.php?page=5">User Registration</a> |  
            <a href="commic_book_list.php">Comic Book</a> | 
             <a href="index.php?page=22">Press</a> | 
            <a href="javascript:bookmark();">Add To Favorites</a> |
            <?php if($_SESSION['user_reg_id']==""){ ?>
             <a href="index.php?page=6">Login</a>  
             <?php }else{ ?> 
             <a href="index.php?page=13">Change Password </a> |
             <a href="logout.php">Logout </a> 
			 <?php } ?>  
              

            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="120">
            <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
            <td>
<div id='cssmenu'>
 <ul>
   <li class='first'><a href="index.php?page=11">About Naughty Paa Ji</a></li>   
   <li><a href="index.php?page=12">Discussion Board</a></li>
    <li class='has-sub'><a href="#">Know Your Rights</a>
  	  <ul>
      <?php
	  $qmenu=mysql_query("select * from rights_mast order by rights_id");
	  while($rowmenu=mysql_fetch_array($qmenu)){
	  ?>
         <li><a href='#'><span><?php echo $rowmenu["rights_title"]; ?></span></a>
         <?php  $qmenud=mysql_query("select * from rights_detail where rights_mast_id='".$rowmenu["rights_id"]."' order by rights_type");
	  $totright=mysql_num_rows($qmenud);
	  if($totright>0){ ?>
         	<ul>
      <?php	 
	  while($rowmenud=mysql_fetch_array($qmenud)){?>
             <li><?php 
			 if($rowmenud["rights_type"]==1){ ?>
             <a href='index.php?page=10&rights_id=<?php echo $rowmenu["rights_id"]; ?>&type=1'><span>FAQ's</span></a>
			 <?php } 
			 if($rowmenud["rights_type"]==2){ ?>
             <a href='index.php?page=10&rights_id=<?php echo $rowmenu["rights_id"]; ?>&type=2'><span>Landmark Judgements</span></a>
             <?php } if($rowmenud["rights_type"]==3){ ?>
             <a href='index.php?page=10&rights_id=<?php echo $rowmenu["rights_id"]; ?>&type=3'><span>Legal Frameworks</span></a>
             <?php } ?></li>
           <?php } ?>
            </ul>  
            <?php } ?>       
         </li>
         <?php } ?>
        
      </ul>
   </li>
   <li><a href="#">Know Your Duties</a>
  		<ul>
        	<li><a href="index.php?page=14&duties_type=1">Fundamental Duties</a></li>
            <li><a href="index.php?page=14&duties_type=2">Duties</a></li>
        </ul>
   </li>
   <li><a href="index.php?page=1">Ask Your Lawyer</a></li>
   <li><a href="index.php?page=20">Share Your Experience</a></li>
   <li class="last"><a href="commic_book_list.php">Archive Comics</a></li>
</ul>
           
            
            </div>
            </td>
            </tr>
            </table>
            </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>