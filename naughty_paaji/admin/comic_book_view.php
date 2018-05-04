<?php session_start();
	include("../include/config.php");
	$comic=mysql_query("select * from comic_book_mast where book_id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($comic);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
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
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
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
            <td class="normal_fonts14_black"><a href="comic_book.php">Comic Book Details</a></td>
            </tr>
          <tr>
            <td>
           
            <form name="frmcomic" method="post">
            
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td align="right" class="normal_fonts9" width="203">Book Title</td>
                <td align="center" class="normal_fonts9" width="11">:</td>
                <td width="734" align="left" class="normal_fonts9"><?php echo $k['book_title']; ?></td>
               
              </tr>
               <tr  bgcolor="#f3f3f3">
                <td align="right" class="normal_fonts9">Author Name</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9" align="left"><?php echo $k['book_author_name']; ?></td>
                
              </tr>
               <tr>
                <td align="right" class="normal_fonts9">Book Description</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9" align="left"><?php echo $k['book_description']; ?></td>
               
              </tr>
               <?php if($k['book_cover_image']!=""){?> 
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Book Cover Image</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9" align="left">
      			<img src="../books_images/<?php echo $k['book_cover_image']; ?>" width="200" height="200"  border="0" />
				</td>
              </tr>
             <?php } ?>
            <tr>
                <td align="right" class="normal_fonts9" colspan="3">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" >
                <?php $qselect=mysql_query("select * from comic_book_detail where book_mast_id='".$k["book_id"]."' order by book_detail_id asc"); 
			  $i=1;
			  $totaldetails=mysql_num_rows($qselect); 
			
			  while($bookdetail=mysql_fetch_array($qselect)){	
			if($i%2==0){$bg="#F2F2F2";} else{$bg="#FFFFFF";}
			
			if($bookdetail["book_type"]=='1'){ 
			  $display='';}else{$display='none';}
			  
			  if($bookdetail["book_type"]=='2')
			  {$display1='';}else{$display1='none';}
			 
			  ?>
                      <tr bgcolor="<?php echo $bg; ?>">
                        <td width="197" height="35" align="right" valign="middle" class="normal_fonts9">Book Page <?php echo $i; ?></td>
                        <td width="10" align="center" class="normal_fonts9" valign="middle">:</td>
                        <td width="731" valign="middle">
                        <?php if($bookdetail["book_type"]==1){ ?>
                        <img src="../books_images/<?php echo $bookdetail['book_image']; ?>" height="200" width="200" />
                        <?php } ?>
                        <?php if($bookdetail["book_type"]==2){ echo $bookdetail['advertisement']; } ?>
                        </td>
                       
                      </tr>
                      <tr id="txtexist<?php echo $i; ?>" style="display:<?php echo $display1; ?>;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        </tr>
                      <tr id="txttest<?php echo $i; ?>" style="display:<?php echo $display; ?>;" bgcolor="<?php echo $bg; ?>">
                       
                        </tr>
                         <?php $i++;} ?>
                    </table>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
               <input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" />
                </td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
              </tr>
            </table>
            </form>
            </td>
          </tr>
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
