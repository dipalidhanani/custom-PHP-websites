<?php 
$userid=$_SESSION['user_reg_id'];
$a=$_GET["share_experience_id"];
?>

<script type="text/javascript" src="p_flies/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="p_flies/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = 'p_flies/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>


<link rel="stylesheet" type="text/css" media="screen" href="css/css.css" />
  
 <script type="text/javascript" src="jquery.min.js"></script>
 
<script type="text/javascript">
$(document).ready(function()
{
$(".comment_button").click(function(){

var element = $(this);
var I = element.attr("id");

$("#slidepanel"+I).slideToggle(300);
$(this).toggleClass("active"); 

return false;});});
</script>
<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;

}
.comment_box
{
background-color:#D3E7F5; border-bottom:#ffffff solid 1px; padding-top:3px
}
h1
{
color:#555555
}
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}

	
	
	ol.timeline
	{list-style:none;font-size:11px;}ol.timeline li{ position:relative;padding:.7em 0 .6em 0;  height:45px; border-bottom:#dedede dashed 1px}ol.timeline li:first-child{border-top:1px dashed #dedede;}
	.comment_button
	{
	margin-right:30px; padding:3px; font-weight:bold; font-size:11px; font-family:Arial, Helvetica, sans-serif
	}
	
	.comment_submit
	{
	background-color:#3b59a4; color:#FFFFFF; border:none; font-size:11px; padding:3px; margin-top:3px;
	}
	.panel
	{
	margin-left:60px; margin-bottom:84px; height:80px; padding:6px; width:330px;
	display:none;
	}
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              

<?php 

   $query = "select * from share_experience where share_experience_id ='".$a."' ";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   if($row=mysql_fetch_array($result))
   {
	?>
    		 <tr>
              <td height="30" align="left" valign="middle" colspan="3" class="black10">
                <a href="index.php">Home</a> > <a href="javascript:history.go(-1);">Experience</a> > <?php echo substr($row["experience"], 0, 50)."..";?>
              </td>
              </tr>
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title"><?php echo substr($row["experience"], 0, 50)."..";?></h3></td>
              </tr>
               <tr>
                <td align="left" valign="middle" class="black9"><?php echo $row["experience"];?></td>
              </tr>
              <tr><td height="5"></td></tr>
              <tr>
                <td>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">               
        <tr><td class="black9" height="1" bgcolor="#D3C9B6" colspan="2"> </td></tr>
         <tr>
                <td height="30" align="left" valign="middle"><h3 class="title">Comments</h3></td>
         </tr> 
          <?php if($_GET["msg"]==1){ ?>
        <tr class="err_validate">
          <td>Your comment is successfully submitted!</td></tr>   
          <?php } ?>
		
          <tr>
            <td align="left" valign="top"><?php include("share_experience_comment.php");?></td>
          </tr>
      
            <?php if($userid=="") { ?>
          <?php
$errormsg=$_GET["errormsg"];
?>
  <tr>  <td class="black9" height="1" bgcolor="#D3C9B6" colspan="2"> </td></tr>
  <tr><td height="5"></td></tr>
            <tr>
            <td class="black10">     
            <table width="500" border="0" cellpadding="0" cellspacing="0">
  
     <tr><td class="black10" colspan="2"><strong>Please log in to your 'Naughty Paa Ji' account to post Comments! </strong>         
      </td></tr>
      <tr>       
        <td>
       <form method="post" name="frmuserlogin" id="frmuserlogin" action="process_login.php" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td height="10" colspan="3"></td>
            </tr>
          <tr>
          <td width="242" class="black10"> Email Address : </td>
            <td width="642"><input name="txtEmail" type="text" class="textcss" id="txtEmail" value="Email" size="24" onFocus="if(this.value == 'Email') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Email';}" tabindex="1"  /></td>
            <td width="10">&nbsp;</td>
            <td width="80" rowspan="3" align="center" valign="middle">
            <input type="hidden" name="process" value="login"  />
           
            <input type="image" name="submit" src="images/index2_26.jpg" value=""  tabindex="3"/>
           </td>
          </tr>
          
          <tr>
            <td height="10"></td>
            <td height="10"></td>
            </tr>
          <tr>
           <td class="black10"> Password : </td>
            <td><input name="txtPass" type="Password" class="textcss" id="txtPass" value="Password" size="24"   onFocus="if(this.value == 'Password') {this.value = '';}"  onBlur="if (this.value == '') {this.value = 'Password';}"  tabindex="2" /></td>
            <td width="10">&nbsp;</td>
            </tr>
          <tr><td height="5"></td></tr>
          <?php
            	if($errormsg!="")
				{ ?>
          <tr>
            <td height="15" colspan="3" class="black10">
            <font color="#FF0000" >
            <?php  echo $errormsg; ?>
            </font>
            </td>
          </tr>
          <?php } ?>
           <tr><td height="5"></td></tr>
          
        </table>
</form>
        </td>
       
      </tr>
     
    
</table>
            </td>
            
            </tr>
          
<?php } ?>
          </table>
 
         
      </td>
              </tr>
               <?php   } ?>
              </table></td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>   
         
  