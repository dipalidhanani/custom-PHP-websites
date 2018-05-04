<link href="css/css.css" rel="stylesheet" type="text/css" />
<table border="0" cellspacing="0" cellpadding="0" width="100%">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title">Press Released</h3></td>
              </tr>
              
               <tr><td class="black9">
              Click on title to view the press released contents...
              </td></tr>
              <tr><td class="black9" height="8">           
               </td></tr>
               <tr><td class="black9" bgcolor="#D3C9B6" height="1">               
               </td></tr>
              
            
              <tr>
                <td>
                <table border="0" align="center" cellpadding="0" cellspacing="10" width="100%">
      
     <?php 
	 $t=1;
	 $query_press=mysql_query("select * from press_mast order by press_id desc") or die(mysql_error());
	 while($result_press=mysql_fetch_array($query_press))
	 {
	 ?>
     
      <tr>
       <td width="2%" align="center"><img src="images/hand_point.png" align="absmiddle" /></td>
        <td height="32" class="black10"><a href="<?php echo $result_press['press_link']; ?>" target="_blank"><?php echo $result_press['press_title']; ?></a></td>
        </tr>
     <?php 
	 if($t!=mysql_num_rows($query_press))
	 {
	 ?>   
        <tr>
        <td colspan="2"  class="bottom_border"></td>
        </tr>
      
    <?php
	 }
	$t++;
	} ?>   
      
    </table>
                </td>
              </tr>
              </table></td>
            <td background="images/box2_06.png" style="background-repeat:repeat-y;">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>
        
      