 <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10" height="10"><img src="images/box1_01.png" width="10" height="10" /></td>
        <td background="images/box1_02.png" style="background-repeat:repeat-x;"></td>
        <td width="10" height="10"><img src="images/box1_03.png" width="10" height="10" /></td>
      </tr>
      <tr>
        <td background="images/box1_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
        <td bgcolor="#D3C9B6">
        
                <table border="0" align="center" cellpadding="0" cellspacing="0" width="100%">      
                     <tr>
                              <td height="25" align="center"><h3 class="title">Comic Book</h3></td>
                     </tr>
                      <tr><td height="5"></td></tr>
                      <tr>
			   <?php 
                
                   $query = "select * from comic_book_mast order by book_id DESC limit 1";
                   
                   $result= mysql_query($query) 
                   or die (mysql_error());
                   
                   if($rescat=mysql_fetch_array($result))
                   { 
                ?>
                           <td width="210">
                                <table>
                                <tr><td>
                                <a href="comic_book.php?book_id=<?php echo $rescat["book_id"]; ?>" title="<?php echo $rescat['book_title']; ?>" ><img src="books_images/<?php echo $rescat["book_cover_image"]; ?>" height="200" width="200"  style=" border: 1px solid #8B6C49;
    padding: 2px;"/></a>
                                </td></tr>
                                <tr><td class="black10" align="center"><?php echo $rescat['book_title']; ?>
                                </td></tr>
                                </table>
                                </td>
                             
                             
                              <?php
						   }
						   ?>
                           
                       
                      
                                              
                      </tr>
                      <tr><td class="red9" align="right"> <a href="commic_book_list.php" style="text-decoration:underline;">Archive</a></td></tr>
   				 </table>

              </td>
        <td background="images/box1_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
      </tr>
      <tr>
        <td><img src="images/box1_07.png" width="10" height="10" /></td>
        <td background="images/box1_08.png" style="background-repeat:repeat-x;"></td>
        <td><img src="images/box1_09.png" width="10" height="10" /></td>
      </tr>
    </table>
    
   