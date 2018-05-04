<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shipping</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <?php
	  if($_REQUEST["action"]=="")
	  {	 	 
	  ?>
      <tr>
        <td align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="shipping.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="shipping.php?action=new">New Shipping Charge</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td width="10%" align="left" bgcolor="#999999"><strong>Zone</strong></td>
            <td width="17%" align="center" bgcolor="#999999"><strong>Post Code</strong></td>
            <td width="15%" align="center" bgcolor="#999999"><strong>Incl GST</strong></td>
            <td width="17%" align="center" bgcolor="#999999"><strong>GST</strong></td>
            <td width="16%" align="center" bgcolor="#999999"><strong>Ex GST</strong></td>
            <td width="13%" align="center" bgcolor="#999999"><strong>Available</strong></td>
            <td width="12%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM shipping_charges order by shipping_charge_ID ";	
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
				
				   
					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
					
					
					$qmax=$query.$max;
					
					
					$recordsetshipping = mysql_query($qmax);
					
			
			 if(mysql_num_rows($recordsetshipping)>0){
			 while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
			 {	
			    if($i%2!=0)
				{
					$bg="#FFFFFF";
				}
				else 
				{
					$bg="#F3F3F3";
				}	
			?>
          <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowshipping["shipping_zone"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowshipping["postcode"];	?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowshipping["incl_GST"];	?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowshipping["GST"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowshipping["ex_GST"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php
			if($rowshipping["shipping_is_avail"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="shipping.php?action=edit&shippingid=<?php echo $rowshipping["shipping_charge_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removeshipping&shippingid=<?php echo $rowshipping["shipping_charge_ID"];?>" onClick="return confirm('Do you want to delete selected Shipping?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>
            <?php
			$i++;
			 } } else {
			 ?>
               <tr class="normal_fonts9"><td align="center" colspan="7">No Records Found</td></tr>
             <?php } ?>
        </table></td>
      </tr>
      <tr><td>
      <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">

       <tr>
       <td align="center" class="normal_fonts9">
<?php 
if($rows1!=0)
{
if ($pagenum == 1)
{
}
else
{
?>
				<a href='shipping.php?pagenum=1' > < first 
                </a>
				<a href='shipping.php?pagenum=<?php echo $pagenum-1; ?>'>Previous</a>	
				<?php
}
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
			   <a href='shipping.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='shipping.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='shipping.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='shipping.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='shipping.php?pagenum=<?php echo $last; ?>'>Last > </a>	
				<?php
				}
			}
				?>
  
  </td>
    </tr>
    </table>
      </td></tr>
      <?php
	  }
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>New Shipping</strong></td>
            <td align="right" bgcolor="#999999"><strong>Price in AUD</strong></td>
          </tr>
            <tr class="normal_fonts9">
            <td colspan="2" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="shippingform" method="post" action="process.php" enctype="multipart/form-data">
          
          
          <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Zone</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			 <select name="shipping_zone" class="normal_fonts8" style="width:150px;">
            <option value="" selected="selected" >Select Zone</option>
                      <option value="N1">N1</option>
                      <option value="N2">N2</option>
                      <option value="V1">V1</option>
                      <option value="V2">V2</option>
                      <option value="Q1">Q1</option>
                      <option value="Q2">Q2</option>
                      <option value="Q3">Q3</option>
                      <option value="Q4">Q4</option>
                      <option value="N1">N1</option>
                      <option value="N2">N2</option>    
                       <option value="W1">W1</option>
                      <option value="W2">W2</option>    
                       <option value="W3">W3</option>
                      <option value="NF">NF</option>   
                      <option value="NT1">NT1</option>
                      <option value="T1">T1</option>                     
            </select></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Post Code</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input name="postcode_starts" type="text" class="normal_fonts9" size="30" /> To <input name="postcode_ends" type="text" class="normal_fonts9" size="30" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Incl GST</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="incl_GST" type="text" class="normal_fonts9" size="10" />  (Shipping Free = 0.00)</td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">GST</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="GST" type="text" class="normal_fonts9" size="10" />  (Shipping Free = 0.00)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Ex GST</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="ex_GST" type="text" class="normal_fonts9" size="10" />  (Shipping Free = 0.00)</td>
          </tr>         
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top" >:</td>
            <td align="left" valign="top" class="normal_fonts9">
              <input type="radio" name="shippingavailable" value="1" checked="checked"/>
              &nbsp;Yes
              <input type="radio" name="shippingavailable" value="0"/>
              &nbsp;No</td>
          </tr>
          

          <tr bgcolor="#F3F3F3">
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="hidden" name="process" value="newshipping" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Change Shipping Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="shippingform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		     $query="SELECT * FROM shipping_charges where shipping_charge_ID='".$_REQUEST["shippingid"]."'";			
			 $recordsetshipping = mysql_query($query);
			 while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
			 {
			 	$zone=$rowshipping["shipping_zone"];
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Zone</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select name="shipping_zone" class="normal_fonts8" style="width:150px;">            
                      <option value="N1"<?php echo $zone=="N1"?"Selected":"";?>>N1</option>
                      <option value="N2"<?php echo $zone=="N2"?"Selected":"";?>>N2</option>
                      <option value="V1"<?php echo $zone=="V1"?"Selected":"";?>>V1</option>
                      <option value="V2"<?php echo $zone=="V2"?"Selected":"";?>>V2</option>
                      <option value="Q1"<?php echo $zone=="Q1"?"Selected":"";?>>Q1</option>
                      <option value="Q2"<?php echo $zone=="Q2"?"Selected":"";?>>Q2</option>
                      <option value="Q3"<?php echo $zone=="Q3"?"Selected":"";?>>Q3</option>
                      <option value="Q4"<?php echo $zone=="Q4"?"Selected":"";?>>Q4</option>
                      <option value="N1"<?php echo $zone=="N1"?"Selected":"";?>>N1</option>
                      <option value="N2"<?php echo $zone=="N2"?"Selected":"";?>>N2</option>    
                       <option value="W1"<?php echo $zone=="W1"?"Selected":"";?>>W1</option>
                      <option value="W2"<?php echo $zone=="W2"?"Selected":"";?>>W2</option>    
                       <option value="W3"<?php echo $zone=="W3"?"Selected":"";?>>W3</option>
                      <option value="NF"<?php echo $zone=="NF"?"Selected":"";?>>NF</option>   
                      <option value="NT1"<?php echo $zone=="NT1"?"Selected":"";?>>NT1</option>
                      <option value="T1"<?php echo $zone=="T1"?"Selected":"";?>>T1</option>                     
            </select>
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Post Code</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="postcode" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["postcode"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Incl GST</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="incl_GST" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["incl_GST"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">GST</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="GST" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["GST"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Ex GST</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="ex_GST" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["ex_GST"];?>"/></td>
          </tr>        
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="shippingavailable" value="1" <?php if($rowshipping["shipping_is_avail"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="shippingavailable" value="0" <?php if($rowshipping["shipping_is_avail"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No</td>
          </tr>
          

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
            <input type="hidden" name="shippingid" value="<?php echo $_REQUEST["shippingid"];?>" />
            <input type="hidden" name="process" value="editshipping" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          <?php
		  }
		  ?>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  ?>
    </table></td>
  </tr>
 </table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
 


</body>
</html>
