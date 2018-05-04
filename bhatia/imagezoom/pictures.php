<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/lightbox-slideshow.js" type="text/javascript"></script>
<link href="css/lightbox.css" type="text/css" rel="stylesheet" />
<link href="css/home.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    $(document).ready(function(){
        $('.thumbnails  A').lightBox({
	        slideshow: true, nextSlideDelay: 20000
        });
    });
</script>
<?php 
$queryarticle2=mysql_query("select * from article_pic_title_master where article_pic_title_id='".$_REQUEST['id']."'") or die(mysql_error());
$resultarticle2=mysql_fetch_array($queryarticle2);
?>
<table width="657" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="9" bgcolor="#fffdd6"><img src="images/tab2_01.png" width="9" height="30" /></td>
                <td width="639" background="images/tab2_03.png" align="center" class="font10"> <strong>Picture Gallery - <?php echo $resultarticle2['article_pic_title_name'];  ?></strong> </td>
                <td width="9"><img src="images/tab2_04.png" width="9" height="30" /></td>
              </tr>
              <tr>
                <td colspan="3" bgcolor="#fffdd6" >
                <table width="100%" border="0" cellspacing="3" cellpadding="3">
                  <tr>
                
                  <?php 
				  $queryarticle=mysql_query("select * from article_picture_master where article_picture_title='".$_REQUEST['id']."' order by article_picture_id ") or die(mysql_error());
				  $count=1;
				 while($resultarticle=mysql_fetch_array($queryarticle))
				 {
					 ?>
                     <td width="5"></td>
                      <td align="center" class="thumbnails"> 
                     
                    <a href="pictures/f<?php echo $resultarticle['article_picture_img']; ?>"><img src="pictures/<?php echo $resultarticle['article_picture_img']; ?>" alt="" height="120" width="120"  border="0"/></a></td>
        <td width="5"></td>
                     <?php   
                    if(($count==4) or ($count==8) or ($count==12) or ($count==16) or ($count==20) or ($count==24) or ($count==28) or ($count==32))
					  {
						 
                 echo "<tr>
                    <td></td>
                    </tr>";
                   
					  }
					   $count++;
					?>
               
               
 				<?php } ?>
        
    <div class="clear"></div>    
         
                  </tr>
                </table></td>
                </tr>
</table>



