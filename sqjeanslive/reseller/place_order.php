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

<title>Welcome to SQ Jeans - Reseller Panel</title>

<link href="css/css.css" rel="stylesheet" type="text/css" />

<?php

require_once("include/files.php");

?>
<script language="javascript">

function validation_form()
{
		
	if(!document.getElementById('terms').checked)
	{
		
		document.getElementById('errterms').style.display='';
		
		return false;
			
	}
	
}
</script>
<script language="javascript">

function validation(id)
{
	
	if(id==1)
	{
		if(!document.getElementById('terms').checked)
		{
			document.getElementById('errterms').style.display='';
			
		}
		else
		{
			document.getElementById('errterms').style.display='none';
		}
	}
	
}
</script>
</head>

<body>

<table width="980" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#FFF">

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0"  bgcolor="#F2D9B8">

      <tr>

        <td align="left" valign="top" bgcolor="#F3F3F3"><?php include("header.php");?></td>

      </tr>

      

      

     


<tr>
  <td  bgcolor="#F3F3F3">



<table width="100%" border="0" cellspacing="10" cellpadding="0" >

    <tr>
      
      <td align="center"  class="normal_fonts14_black" colspan="2"><strong>Place New Order</strong></td>
      
    </tr>

    <tr>
<form name="orderform" id="orderform" method="post" onsubmit="return validation_form()" action="process.php" enctype="multipart/form-data" >

      <td width="50%" valign="top" >
      <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
       <script language="javascript">

function load1(test1)
{

document.getElementById("rise2").style.display = '';
document.getElementById("rise1").style.display = 'none';
//document.getElementById("testadd").style.visibility="visible";
}
function load2(test2)
{

document.getElementById("fitting_style2").style.display = '';
document.getElementById("fitting_style1").style.display = 'none';
//document.getElementById("testadd").style.visibility="visible";
}
function load3(test3)
{

document.getElementById("leg_style2").style.display = '';
document.getElementById("leg_style1").style.display = 'none';
//document.getElementById("testadd").style.visibility="visible";
}
function load4(test4)
{

document.getElementById("wash_treatment2").style.display = '';
document.getElementById("wash_treatment1").style.display = 'none';
//document.getElementById("testadd").style.visibility="visible";
}
</script>
       <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Customer Name</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td width="64%" align="left" valign="top" class="normal_fonts9"><input name="customer_name" id="customer_name" type="text" class="normal_fonts9" size="50" />
    </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Order For</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td width="64%" align="left" valign="top" class="normal_fonts9">
           <input type="radio" name="reseller_order_for" value="Men" />&nbsp;Men&nbsp;
           <input type="radio" name="reseller_order_for" value="Women" checked="checked" />&nbsp;Women&nbsp;
            </td>
          </tr>
            <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Fabric</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select name="fabric" id="fabric">
            <option value="">Select</option>
            <?php $query=mysql_query("select * from material_master where material_available=2 order by material_name asc");
			while($rowfabric=mysql_fetch_array($query))
			{
							
			?>
            <option value="<?php echo $rowfabric["material_name"]; ?>"><?php echo $rowfabric["material_name"]; ?></option>
            <?php } ?>
            </select>
            
            </td>
          </tr>
           
            <tr bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Wash Treatment</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select id="wash_treatment1" name="wash_treatment1">
            <option value="">Select</option>
            <option value="00 Unwashed (Raw)">00 Unwashed (Raw)</option>
            <option value="01 Desized">01 Desized</option>
            <option value="02 Enzyme">02 Enzyme</option>
            <option value="03 Bleached">03 Bleached</option>
            <option value="04 Super Bleached">04 Super Bleached</option>
            <option value="05 OD Black">05 OD Black</option>
            <option value="06 Blast">06 Blast</option>            
            <option value="Other" onclick="load4('test4')">Other</option>
            </select>
            <input type="text" name="wash_treatment2" id="wash_treatment2" style="display:none;" />
            
           
            </td>
          </tr>
            <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Special Wash</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select name="special_wash" id="special_wash" >
            <option value="">Select</option>
            <?php $queryspecial=mysql_query("select * from special_wash_master where special_wash_available=2");
			while($rowspecial=mysql_fetch_array($queryspecial))
			{
							
			?>
            <option value="<?php echo $rowspecial["special_wash_name"]; ?>"><?php echo $rowspecial["special_wash_name"]; ?></option>
            <?php } ?>
            </select>
            
            </td>
          </tr>
          <tr  bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Rise</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select id="rise1" name="rise1" >
             <option value="">Select</option>
            <option value="01 Low Rise">01 Low Rise</option>
            <option value="02 Mid Rise">02 Mid Rise</option>
            <option value="03 High Rise">03 High Rise</option>
            <option value="Other" onclick="load1('test1')">Other</option>
            </select>
            <input type="text" name="rise2" id="rise2" style="display:none;" />
             
            </td>
          </tr>
          
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Fitting Style</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
           <select id="fitting_style1" name="fitting_style1">
             <option value="">Select</option>
            <option value="01 Super Tight">01 Super Tight</option>
            <option value="02 Tight">02 Tight</option>
            <option value="03 Slim">03 Slim</option>
            <option value="04 Relaxed">04 Relaxed</option>
            <option value="05 Comfort (Trouser)">05 Comfort (Trouser)</option>
            <option value="11 Slim (Men)">11 Slim (Men)</option>
             <option value="12 Relaxed (Men)">12 Relaxed (Men)</option>
            <option value="13 Comfort (Men)">13 Comfort (Men)</option>
            <option value="14 Baggy">14 Baggy</option>
            <option value="Other" onclick="load2('test2')">Other</option>
            </select>
              <input type="text" name="fitting_style2" id="fitting_style2" style="display:none;" />
              
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Leg Style</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <select id="leg_style1" name="leg_style1">
             <option value="">Select</option>
            <option value="01 Narrow">01 Narrow</option>
            <option value="02 Tapered">02 Tapered</option>
            <option value="03 Straight">03 Straight</option>
            <option value="04 Boot Cut (Wide)">04 Boot Cut (Wide)</option>
            <option value="05 Flair">05 Flair</option>
            <option value="Other" onclick="load3('test3')">Other</option>
            </select>
              <input type="text" name="leg_style2" id="leg_style2" style="display:none;" />
            
            </td>
          </tr>
           <tr>
             <td align="right" valign="top" class="normal_fonts9"><b>Belt Style</b></td>
             <td align="left" valign="top">:</td>
             <td align="left" valign="top" class="normal_fonts9"><select name="belt_style" id="belt_style" >
               <option value="">Select</option>
               <?php $querybelt=mysql_query("select * from belt_style_master where belt_style_available=2 order by belt_style_order asc");
			while($rowbelt=mysql_fetch_array($querybelt))
			{
							
			?>
               <option value="<?php echo $rowbelt["belt_style_name"]; ?>"><?php echo $rowbelt["belt_style_name"]; ?></option>
               <?php } ?>
             </select></td>
           </tr>
           <tr bgcolor="#FFFFFF">
             <td align="right" valign="top" class="normal_fonts9"><b>Thread Color 1</b></td>
             <td align="left" valign="top">:</td>
             <td align="left" valign="top" class="normal_fonts9"><select name="thread_primary" id="thread_primary" >
               <option value="">Select</option>
               <?php $querythread=mysql_query("select * from thread_master where thread_available=2");
			while($rowthread=mysql_fetch_array($querythread))
			{
							
			?>
               <option value="<?php echo $rowthread["thread_name"]; ?>"><?php echo $rowthread["thread_name"]; ?></option>
               <?php } ?>
             </select></td>
           </tr>
            <tr>
              <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Thread Color 2</b></td>
              <td width="3%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9"><select name="thread_secondary" id="thread_secondary" >
                <option value="">Select</option>
                <?php $querythread1=mysql_query("select * from thread_master where thread_available=2");
			while($rowthread1=mysql_fetch_array($querythread1))
			{
							
			?>
                <option value="<?php echo $rowthread1["thread_name"]; ?>"><?php echo $rowthread1["thread_name"]; ?></option>
                <?php } ?>
              </select></td>
            </tr>
           <tr bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Fly</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><select name="fly_style" id="fly_style" >
              <option value="">Select</option>
              <?php $queryfly=mysql_query("select * from fly_style_master where fly_style_available=2");
			while($rowfly=mysql_fetch_array($queryfly))
			{
							
			?>
              <option value="<?php echo $rowfly["fly_style_name"]; ?>"><?php echo $rowfly["fly_style_name"]; ?></option>
              <?php } ?>
            </select></td>
          </tr>
           <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Front Pocket Style</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><select name="frontpocket_style" id="frontpocket_style" >
              <option value="">Select</option>
              <?php $queryfrontpocket=mysql_query("select * from pocket_style_master where pocket_style_available=2 and pocket_style_type=1 order by pocket_style_display_order asc");
			while($rowfrontpocket=mysql_fetch_array($queryfrontpocket))
			{
							
			?>
              <option value="<?php echo $rowfrontpocket["pocket_style_name"]; ?>"><?php echo $rowfrontpocket["pocket_style_name"]; ?></option>
              <?php } ?>
            </select></td>
          </tr>
         
           <tr bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Back Pocket Style</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><select name="backpocket_style" id="backpocket_style" >
              <option value="">Select</option>
              <?php $querybackpocket=mysql_query("select * from pocket_style_master where pocket_style_available=2 and pocket_style_type=2 order by pocket_style_display_order asc");
			while($rowbackpocket=mysql_fetch_array($querybackpocket))
			{
							
			?>
              <option value="<?php echo $rowbackpocket["pocket_style_name"]; ?>"><?php echo $rowbackpocket["pocket_style_name"]; ?></option>
              <?php } ?>
            </select></td>
          </tr>
         <tr>
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Flap</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><select name="buttonrivets_style" id="buttonrivets_style" >
              <option value="">Select</option>
              <?php $querybuttonrivets=mysql_query("select * from buttonrivets_master where buttonrivets_available=2 order by buttonrivets_order asc");
			while($rowbuttonrivets=mysql_fetch_array($querybuttonrivets))
			{
							
			?>
              <option value="<?php echo $rowbuttonrivets["buttonrivets_name"]; ?>"><?php echo $rowbuttonrivets["buttonrivets_name"]; ?></option>
              <?php } ?>
            </select></td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Loops Style</b></td>
            <td width="3%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><select name="loops_style" id="loops_style" >
              <option value="">Select</option>
              <?php $queryloops=mysql_query("select * from loops_style_master where loops_style_available=2 order by loops_style_order asc");
			while($rowloops=mysql_fetch_array($queryloops))
			{
							
			?>
              <option value="<?php echo $rowloops["loops_style_name"]; ?>"><?php echo $rowloops["loops_style_name"]; ?></option>
              <?php } ?>
            </select></td>
          </tr>
           <tr>
             <td width="33%" align="right" valign="top" class="normal_fonts9"><b>Embroidery Style</b></td>
             <td width="3%" align="left" valign="top">:</td>
             <td align="left" valign="top" class="normal_fonts9"><select name="embroidery_style" id="embroidery_style" >
               <option value="">Select</option>
               <?php $queryembroidery=mysql_query("select * from embroidery_style_master where embroidery_style_available=2 order by embroidery_style_order asc");
			while($rowembroidery=mysql_fetch_array($queryembroidery))
			{
							
			?>
               <option value="<?php echo $rowembroidery["embroidery_style_name"]; ?>"><?php echo $rowembroidery["embroidery_style_name"]; ?></option>
               <?php } ?>
               </select></td>
           </tr>
           <tr bgcolor="#FFFFFF">
             <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
             <td align="left" valign="top">&nbsp;</td>
             <td align="left" valign="top" class="normal_fonts9">&nbsp;</td>
           </tr>
         
      

      </table></td>
        <td  width="50%" valign="top" >
      <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0" class="border" >

      
        <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Full Length</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="full_length" class="normal_fonts9" />
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Inside Length</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="inside_length" class="normal_fonts9" />
            </td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Seat / Hips</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="seat" class="normal_fonts9" />
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Waist</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="waist" class="normal_fonts9" />
            </td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Front Rise</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="front_rise" class="normal_fonts9" />
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Front Low</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="front_low" class="normal_fonts9" />
            </td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Back Rise</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="back_rise" class="normal_fonts9" />
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Full U-Crotch</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="full_ucrotch" class="normal_fonts9" />
            </td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Thighs on 1&quot;</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="thighs_on1" class="normal_fonts9" />
            </td>

          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Thighs on 6&quot;</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="thighs_on6" class="normal_fonts9" />
            </td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Knee</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="knee" class="normal_fonts9" />
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Bottom (Leg Open)</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="text" name="bottom" class="normal_fonts9" width=""/>
            </td>
          </tr>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9"><b>Order Details</b></td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <textarea name="order_details1" class="normal_fonts9" rows="3" cols="50"></textarea>
            </td>
          </tr>
           <tr bgcolor="#FFFFFF">
            <td width="30%" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td width="1%" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <textarea name="order_details2" class="normal_fonts9" rows="3" cols="50"></textarea>
            </td>
          </tr>
          
           <tr >
            <td align="right" valign="top" class="normal_fonts9">
              <b>All details are OK?<span style="color:#F00">*</span>
              </b><br /><span id="errterms" style="display:none" ><font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please ckeck this box after double check all details</font></span>            </td>
            <td align="left" valign="top" class="normal_fonts9">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input type="checkbox" id="terms" name="terms"  onblur="validation(1)"/>&nbsp;&nbsp;Check to proceed</td>
            </tr>
          <tr bgcolor="#FFFFFF">
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">             
         
            <input type="hidden" name="process" value="placeorder" />
            <input name="submit" id="submit" type="submit" class="normal_fonts9" value="Place Order" /></td>
          </tr>
      
      </table></td>
 </form>

    </tr>

      

</table>

</td></tr>

    </table></td>

  </tr>

  <tr>

    <td><?php include("footer.php");?></td>

  </tr>

</table>

 

</body>

</html>