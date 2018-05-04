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
                              <td height="25" align="left"><h3 class="title">Testimonial</h3></td>
                     </tr>
                     <tr><td height="5"></td></tr>
                      <tr>
                      
                        <td class="black10">
                        <marquee direction="up" scrolldelay="200" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 6, 0);">
                          
						  <?php 
						    $result2=mysql_query("select * from testimonial_mast order by testimonial_id desc");
							while($k=mysql_fetch_array($result2))
						   {
						  ?>
                             <strong><?php echo $k["testimonial_title"]; ?></strong><br />
                     		 <?php echo $k["testimonial_desc"];  ?><br /><br />
                              <?php
						   }
						   ?>
                           
                         </marquee>
                        </td>
                                              
                      </tr>
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
    
   