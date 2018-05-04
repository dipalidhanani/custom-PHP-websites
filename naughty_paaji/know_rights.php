<?php 
				if($_GET["type"]==1){$rtype="FAQ's";}
				if($_GET["type"]==2){$rtype="Landmark Judgments";}
				if($_GET["type"]==3){$rtype="Legal Framework";}
?>
<?php 

  $query = "select * from rights_detail
   INNER JOIN rights_mast ON rights_mast.rights_id=rights_detail.rights_mast_id
   where rights_mast_id='".$_GET["rights_id"]."' and rights_type='".$_GET["type"]."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($rescat=mysql_fetch_array($result))
   {   
  ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10" height="10"><img src="images/box2_01.png" width="10" height="10" /></td>
            <td background="images/box2_02.png" style="background-repeat:repeat-x;"></td>
            <td width="10" height="10"><img src="images/box2_03.png" width="10" height="10" /></td>
          </tr>
          <tr>
            <td background="images/box2_04.png" style="background-repeat:repeat-y;">&nbsp;</td>
            <td bgcolor="#E4DFD3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="30" align="left" valign="middle" colspan="3" class="black10"><a href="index.php">Home</a> > <a href="#">Know Your Rights</a> > <?php echo $rescat["rights_title"]; ?> </td>
              </tr>
               
               <tr><td class="black9" height="1" bgcolor="#D3C9B6" colspan="2"> </td></tr>
                <tr>
                <td height="30" align="left" valign="middle" colspan="3" class="black10">
                 <strong><?php  $qmenud=mysql_query("select * from rights_detail where rights_mast_id='".$rescat["rights_id"]."' order by rights_type");
	  $totright=mysql_num_rows($qmenud);
	  if($totright>0){ ?>
         	
      <?php	 
	  while($rowmenud=mysql_fetch_array($qmenud)){?>
            <?php 
			 if($rowmenud["rights_type"]==1){ ?>
             <a href='index.php?page=10&rights_id=<?php echo $rescat["rights_id"]; ?>&type=1'><span>FAQ's</span></a> | 
			 <?php } 
			 if($rowmenud["rights_type"]==2){ ?>
              <a href='index.php?page=10&rights_id=<?php echo $rescat["rights_id"]; ?>&type=2'><span>Landmark Judgements</span></a>  
             <?php } if($rowmenud["rights_type"]==3){ ?>
              | <a href='index.php?page=10&rights_id=<?php echo $rescat["rights_id"]; ?>&type=3'><span>Legal Frameworks</span></a>  
             <?php } ?>
           <?php } ?>
            
            <?php } ?>  </strong>
                </td>
              </tr>
               <tr><td height="5"></td></tr>               
               
              <tr>
                <td height="30" align="left" valign="middle"><h3 class="title"><?php echo $rtype; ?></h3></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
   
    <tr>
        <td height="5"></td>
    </tr>
                  <tr>
                    <td ><table width="100%" border="0" cellpadding="0" cellspacing="2"  >
                      <tr>
                        
                        <td class="black9">
                       <div align="justify"><?php echo $rescat["rights_desc"]; ?></div>
                       </td>
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
          <tr>
            <td><img src="images/box2_07.png" width="10" height="10" /></td>
            <td background="images/box2_08.png" style="background-repeat:repeat-x;"></td>
            <td><img src="images/box2_09.png" width="10" height="10" /></td>
          </tr>
        </table>
        
            <?php } ?>  