<?php 
include("include/config.php"); 
require_once("include/function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji | Know Your Duties</title>
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
<script type="text/javascript">
document.oncopy = function(){
    var bodyEl = document.body;
    var selection = window.getSelection();
    selection.selectAllChildren( document.createElement( 'div' ) );
};
</script>

<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="900" style="background:url(images/bg1_01.png)no-repeat right top;">&nbsp;</td>
      <td width="980" align="left" valign="top" style="background:url(images/bg1_02.png) no-repeat 0px top;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top"><?php include("header.php"); ?></td>
        </tr>
        <tr>
          <td height="10">
          
          
          
          <table width="100%" border="0" cellspacing="10" cellpadding="0">
            <tr>
              <td width="220" align="left" valign="top"><?php include("left.php"); ?>
</td>
<td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("slider.php"); ?></td>
  </tr>
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
           <?php 

   $query = "select * from duties_mast where duties_id='".$_GET["duties_id"]."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($rescat=mysql_fetch_array($result))
   {  
    if($rescat["duties_type"]==1){$dtype="FAQ's";}
				if($rescat["duties_type"]==2){$dtype="Landmark Judgments";}
				if($rescat["duties_type"]==3){$dtype="Legal Framework";}
  ?>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="30" align="left" valign="middle" colspan="3" class="black10">
               <a href="index.php">Home</a> > <a href="index.php?page=16">Know Your Duties</a> > <a href="javascript:history.back(-1)"><?php echo $dtype; ?></a>
                 </td>
              </tr>
               <tr><td height="5"></td></tr>
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title">
				<?php	echo $rescat["duties_title"]; ?>
                </h3></td> 
              </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
  
    <tr>
        <td height="5"></td>
    </tr>
                  <tr>
                    <td ><table width="100%" border="0" cellpadding="0" cellspacing="2" >
                      
                      <tr>
                        <td class="black9" ><div align="justify"><?php echo $rescat["duties_desc"]; ?></div></td>
                        </tr>
                     
                      <tr>
                        <td height="5" colspan="2" align="center" valign="top"></td>
                        </tr>
                      </table></td>
                    </tr>
                  
   
                  </table></td>
              </tr>
              </table></td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <?php } ?>   
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>
        
        </td>
        
       
      </tr>
    </table></td>
  </tr>
</table></td>
</tr>
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
