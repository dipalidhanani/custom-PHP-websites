<?php session_start();
include("include/config.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comic Book</title>
<style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
	background-repeat: repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #DDD9C0;
}
-->
</style>
<link href="css/css.css" rel="stylesheet" type="text/css" />

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=305445802858917";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
<tr>
  <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="900" style="background:url(images/bg1_01.png)no-repeat right top;">&nbsp;</td>
      <td width="980" align="left" valign="top" style="background:url(images/bg1_02.png) no-repeat 0px top;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      
        <tr>
          <td align="left" valign="top"><?php include("header.php"); ?></td>
        </tr>
        
        
        <tr>
        
            <td valign="top" align="center" class="table_corner">
            
                <table width="100%" border="0" cellpadding="2" cellspacing="2"  >
                <?php
if($_GET["display_order"]==""){ 
$query1 = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' limit 1";
}
else{
	$query1 = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' and display_order='".$_GET["display_order"]."'";

	}
                   
                   $result1= mysql_query($query1) or die (mysql_error());
                 
                   $rescat1=mysql_fetch_array($result1);
				   
				   $qpages=mysql_query("select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."'");
				   $totpages=mysql_num_rows($qpages);
				   
?>	
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0"  >
 
         <tr>
       <td width="40%" class="pagecolor">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?php if($_GET["display_order"]!=""){ ?>
       Page <?php echo $_GET["display_order"]; ?> of <?php echo $totpages; ?>
       <?php } ?>
       </td>
         <td align="center" >        
          <table><tr><td valign="top">
 <?php $query2 = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' order by display_order asc limit 1";
  $result2= mysql_query($query2) or die (mysql_error());
                 
                   $rescat2=mysql_fetch_array($result2);				
				   if($rescat2["display_order"]!=$_GET["display_order"]){
				if($_GET["display_order"]!=0){	   
 ?>       
           <a href="comic_book.php?book_id=<?php echo $_GET["book_id"]; ?>&display_order=<?php echo $rescat1["display_order"]-1; ?>"><img src="images/prev.png" border="0" alt="Previous"  title="Previous" /></a>
           <?php } } 
           if($_GET["display_order"]==1){
			   ?>
               <a href="comic_book.php?book_id=<?php echo $_GET["book_id"]; ?>"><img src="images/prev.png" border="0" alt="Previous"  title="Previous" /></a>
               <?php } ?>
   </td>
           <td valign="top">
           
            <?php $query3 = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' order by display_order desc limit 1";
  $result3= mysql_query($query3) or die (mysql_error());
                 
                   $rescat3=mysql_fetch_array($result3);
				  
				   if($rescat3["display_order"]!=$_GET["display_order"]){
					   if($_GET["display_order"]==""){$disorder=1;}
					   else{$disorder=$rescat1["display_order"]+1;}
 ?>       
 <a href="comic_book.php?book_id=<?php echo $_GET["book_id"]; ?>&display_order=<?php echo $disorder; ?>">
 <img src="images/next.png" border="0" alt="Next" title="Next" />
 </a>
   <?php } ?>
   </td>
   
   </tr></table>   
         </td>
         
            <td align="right"  width="30%"><div class="fb-like" data-href="http://www.naughtypaaji.com" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false" data-font="arial"></div></td>
            
            
             <td align="right"  width="10%"></td>

         
         </tr>
           
  </table></td></tr>      
            <tr>
            
           		<td class="black10"  align="center" colspan="2">
                
 
                <?php
				$querycover = "select * from comic_book_mast where book_id='".$_GET["book_id"]."'";
                   
                   $resultcover= mysql_query($querycover) 
                   or die (mysql_error());
				$rowcover=mysql_fetch_array($resultcover);
				if($_GET["display_order"]==""){ ?>
                
               <a> <img src="books_images/<?php echo $rowcover["book_cover_image"]; ?>" width="800" height="980" alt=""/></a>
					
					<?php }
				else{
            $query = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' and display_order='".$_GET["display_order"]."'";
                   
                   $result= mysql_query($query) or die (mysql_error());
                 
                   $rescat=mysql_fetch_array($result);
                  
				   ?>
				<a><img src="books_images/<?php echo $rescat["book_image"]; ?>" width="800" height="980" alt=""/></a>
                
                
                 <?php  } ?>
                
 		
                
                </td>
            
            </tr>

          <tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0"  >
 
         <tr>
       <td width="40%" >&nbsp;
       </td>
         <td align="center" >        
          <table><tr><td valign="top">
 <?php $query2 = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' order by display_order asc limit 1";
  $result2= mysql_query($query2) or die (mysql_error());
                 
                   $rescat2=mysql_fetch_array($result2);				
				   if($rescat2["display_order"]!=$_GET["display_order"]){
				if($_GET["display_order"]!=0){	   
 ?>       
           <a href="comic_book.php?book_id=<?php echo $_GET["book_id"]; ?>&display_order=<?php echo $rescat1["display_order"]-1; ?>"><img src="images/prev.png" border="0" alt="Previous"  title="Previous" /></a>
           <?php } } 
           if($_GET["display_order"]==1){
			   ?>
               <a href="comic_book.php?book_id=<?php echo $_GET["book_id"]; ?>"><img src="images/prev.png" border="0" alt="Previous"  title="Previous" /></a>
               <?php } ?>
   </td>
           <td valign="top">
           
            <?php $query3 = "select * from comic_book_detail where book_mast_id='".$_GET["book_id"]."' order by display_order desc limit 1";
  $result3= mysql_query($query3) or die (mysql_error());
                 
                   $rescat3=mysql_fetch_array($result3);
				  
				   if($rescat3["display_order"]!=$_GET["display_order"]){
					   if($_GET["display_order"]==""){$disorder=1;}
					   else{$disorder=$rescat1["display_order"]+1;}
 ?>       
 <a href="comic_book.php?book_id=<?php echo $_GET["book_id"]; ?>&display_order=<?php echo $disorder; ?>">
 <img src="images/next.png" border="0" alt="Next" title="Next" />
 </a>
   <?php } ?>
   </td>
   
   </tr></table>   
         </td>
         
            <td align="right"  width="30%">&nbsp;</td>
            
            
             <td align="right"  width="10%"></td>

         
         </tr>
           
  </table></td></tr>  
        </table>
            
            </td>
        </tr>

<tr>
<td valign="top"><?php include("footer.php"); ?></td>
</tr>
        

</table>
</td>
<td>&nbsp;</td>
</tr>
</table>
</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
</table>
</body>
</html>
