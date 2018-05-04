<?php
require_once("include/files.php");
?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="titel_2"><strong>SQ Jeans - Photo Gallery</strong></td>
              </tr>
              <tr>
                <td class="font9" height="30"><b>Click on Image to enlarge.</b></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
            </table></td>
        </tr>
    <?php
					 $sp=0;	
					 $query="SELECT * FROM gallery_master where gallery_available=1 order by gallery_ID desc ";			
					
							
							
					if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
					
					$data = mysql_query($query);
    				$rows1 = mysql_num_rows($data);	
					
				
				       
											
					$page_rows = 10;
   
					$last = ceil($rows1/$page_rows);
				  
					if ($pagenum < 1)
					{
					$pagenum = 1;
					}
					elseif ($pagenum > $last)
					{
					$pagenum = $last;
					}
				
				   if($rows1!="")
				   {
					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
				   }
					
					$qmax=$query.$max;
					
					$res = mysql_query($qmax) or die(mysql_error());	
							
					$recordsetgallery = mysql_query($query);
					
					if($rows1>0)
					{
					while($rowgallery=mysql_fetch_array($res))
					{
					$sp++;
							 ?>
        <tr>
          <td><table width="100%" border="0"  cellpadding="5" cellspacing="0">
                <tr>
                  <td align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/pgbg02a.jpg" class="border3">
                    <tr>
                     
                      <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td align="center" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="5" class="border2">
                            
                            <tr>
                              <td width="250" height="200" align="center" valign="middle"><a href="images/gallery/<?php echo $rowgallery["gallery_image"];?>" rel="lightbox[]" title="<?php echo $rowgallery["gallery_name"];?>"><img src="images/gallery/g<?php echo $rowgallery["gallery_image"];?>" alt="<?php echo $rowgallery["gallery_name"];?>" width="250" height="200" border="0" title="<?php echo $rowgallery["gallery_name"];?>" /></a></td>
                              <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="5">
                                <tr>
                                  <td align="left" valign="middle" class="fontblue"><b><?php echo $rowgallery["gallery_name"];?></b></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="middle" class="fontblue9"><?php echo displayeditorvalue($rowgallery["gallery_description"]);?></td>
                                </tr>
                              </table></td>
                            </tr>
                            </table></td>
                          </tr>
                        
                        </table></td>
                      </tr>
                    
                    </table></td>
                </tr>
            </table></td>
        </tr>
     <?php
	 }
		}
		?>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="center" class="font10"><?php

				if($rows1!=0)
				{
				if ($pagenum == 1)
				{
				}
				else
				{
			?>
				<a href='index.php?object=13&pagenum=1'> First </a>
				<a href='index.php?object=13&pagenum=<?php echo $pagenum-1; ?>'> | Previous</a>	
				<?php
				}
				?>								
				<?php				
				if ($pagenum == $last) 
				{
					if($pagenum ==1)
					{
						$pagenum=1;
					}
					else
					{
					
					if($last-10>10)
					{
						$v=$last-10;						
					}
					else
					{
						$v=1;
					}
												
					for($i=$v;$i<=$last;$i++)
				{				
				?>				
			   <a href='index.php?object=13&pagenum=<?php echo $i; ?>'><?php 
			   		   if($pagenum==$i)
					   {
							echo "<font size='4'><strong>".$i."</strong></font>";
					   }
					   else
					   {
							echo $i;
					   }
			    ?></a> |
			   <?php
			 	}		
				}		
				}
				else 
				{	
					if($pagenum<10)
					{
					    if($last>10)
						{
							$pageupto=10;
						}
						else
						{
							$pageupto=$last;
						}
						
						for($i=1;$i<=$pageupto;$i++)
						{				
						?>				
					   <a href='index.php?object=13&pagenum=<?php echo $i; ?>'><?php 
					   if($pagenum==$i)
					   {
							echo "<font size='4'><strong>".$i."</strong></font>";
					   }
					   else
					   {
							echo $i;
					   }
					    ?></a> |
					   <?php
						}		
					}
					else
					{
					
						for($i=$pagenum-5;$i<=$pagenum+5;$i++)
						{
						if($i<=$last)
						{				
						?>				
					   <a href='index.php?object=13&pagenum=<?php echo $i; ?>'><?php 
					   if($pagenum==$i)
					   {
							echo "<font size='4'><strong>".$i."</strong></font>";
					   }
					   else
					   {
							echo $i;
					   }
					   ?></a> |
					   <?php
						}
						}
					}
				 }
				 
			   ?>
			   <?php
				if ($pagenum == $last)
				{
				}
				else
				{
			?>
				<a href='index.php?object=13&pagenum=<?php echo $pagenum+1; ?>'>Next | </a>
			   <a href='index.php?object=13&pagenum=<?php echo $last; ?>'>Last </a>	
				<?php
				}
				}
				?></td>
        </tr>
        
    </table></td>
    <td width="10">&nbsp;</td>
  </tr>

</table>
