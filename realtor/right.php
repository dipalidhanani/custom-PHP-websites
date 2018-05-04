<link href="css/home.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="dropdown.js"></script>
<script language="javascript">
function postcodenull(){
	document.getElementById('txtareacode').value='';
	}
function validation_right() 
{ 
 
	with(document.frmpropsearch)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message + "\n" + "--------------------------------------------------------------------";
			if(document.getElementById("cityid").value==0)
			{
				
				error=1;
				message=message + "\n" + "Please Select City!";
			}
		else if ((isNaN(document.getElementById('minprice').value)==true) || (isNaN(document.getElementById('maxprice').value)==true))
        {
		
		error=1;
		message=message + "\n" + "Please Enter Digits In Price!";
			
	} else if((document.getElementById('minprice').value=='') && (document.getElementById('maxprice').value==''))
			{
				error=2;	
				return true;
			}
			else
			if((document.getElementById('minprice').value=='') || (document.getElementById('maxprice').value==''))
			{
				error=1;
				message=message + "\n" + "Please Enter Both Price!";
			}
											
			
			if(error==1)
			{
				
			alert(message);
			return false;
			
			}
			else
			{
	return true;
			}
	}

}
</script>
<script language="javascript">
function gfe_2(d_n, f_n, fm) 
{
	f=fm;
	l=f.elements.length;
	m="";
	i=0;
	for(i=0;i<l;i++) 
	{
		if(f.elements[i].type=="checkbox")
		{
			if(f.elements[i].checked==true)
			{
				m +=f.elements[i].name+"="+f.elements[i].value+"&";
			}
		}
		else if(f.elements[i].type=="radio")
		{
			if(f.elements[i].checked==true)
			{
				m +=f.elements[i].name+"="+f.elements[i].value+"&";
			}
		}
		else
		{
			m +=f.elements[i].name+"="+f.elements[i].value+"&";
		}
	}
	//dt(d_n, f_n+'?'+m);
	
	getoutput(f_n+'?'+m,d_n)
	
	return false;
}



function getoutput(url,resultpan)
{
	//alert(url);
	var xmlchat = initxmlhttp() ;
	var m = document.getElementById(resultpan);
	m.innerHTML = "<div id='loading' align='center'> </div>";
	xmlchat.open( "GET", url, true ) ;
	xmlchat.onreadystatechange=function()
	{
		//alert("hi");
		if (xmlchat.readyState==4)
		{
			document.getElementById(resultpan).innerHTML = xmlchat.responseText;
			var str = xmlchat.responseText;	
			
		}
		
	}
	xmlchat.send(null) ;
	//	xmlchat.close();
//	var temp = setTimeout("xmlpull()",) ;
}


function initxmlhttp()

{
		var xmlhttp ;
 	    if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
           //    xmlHttpReq.overrideMimeType('text/xml');
        }
        // IE
        else if (window.ActiveXObject) {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		return xmlhttp ;
}


</script>

<table width="100%" border="0" cellspacing="10" cellpadding="0">
    <tr>
        <td><img src="images/index_14.gif" width="137" height="33" alt="" /></td>
    </tr>
    <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="center" bgcolor="#FFFFFF"><iframe width="240" height="212" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Ontario,+Canada&amp;aq=0&amp;oq=ontari&amp;sll=21.125498,81.914063&amp;sspn=28.201884,46.538086&amp;ie=UTF8&amp;hq=&amp;hnear=Ontario,+Canada&amp;t=m&amp;z=5&amp;ll=51.253775,-85.323214&amp;output=embed"></iframe></td>
            </tr>
            <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td height="35" align="center" valign="middle" bgcolor="#CCCCCC" class="black10"><strong>Property Search</strong></td>
                                
                            </tr>
                        </table></td>
                    </tr>
                    <tr>
                        <td height="5" bgcolor="#A32101"></td>
                    </tr>
                  
                    <tr>
                        <td bgcolor="#A32101">	
                          <form name="frmpropsearch" id="frmpropsearch" method="post" action="home.php?pageno=20">
                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                                <td width="194" align="right" class="white9">City :</td>
                                <td height="28" valign="top">
                                <select name="ddlcity" class="black9" id="cityid" style="width:160px; padding:2px; border:none;" onchange="gfe_2('ajaxareaid','findarea.php',frmpropsearch);postcodenull();">
                                    <option value="0">Select City</option>                                  
									<?php		 
                                    $qryc="select * from rm_city_master"; 
                                                                
                                     $resc=mysql_query($qryc);									               
                                     while($arrc=mysql_fetch_array($resc))
                                     {	?>
                                                <option value="<?php echo $arrc['rm_city_id']; ?>" <?php if($arrc['rm_city_id']==$_SESSION["city"]){ ?> selected="selected" <?php } ?>><?php echo $arrc['rm_city_title']; ?></option>
                                    <?php }  ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="194" align="right" class="white9">Street :</td>
                                <td height="28" valign="top">
                                <div id="ajaxareaid">
                                <select name="areaid" class="black9" id="areaid" style="width:160px; padding:2px; border:none;" onchange="getAreacode_right(this.value)">
                                
                                    <option value="0">Select Street</option>    
                                    <?php
									if($_SESSION["city"]!="")
													{
															$qry="select DISTINCT a.rm_area_title,a.rm_area_id from rm_area_master a where a.rm_city_mast_id='".$_SESSION["city"]."'"; 
									$qry1="select a.rm_area_title from rm_area_master a, property_propertydetail_master p where a.rm_area_id = '".$_SESSION["areaid"]."'";
														
													 $res=mysql_query($qry);
									                 $rs=mysql_query($qry1);
													 while($a=mysql_fetch_array($rs))
		  							                  {
									                 $nm=$a['rm_area_title'];
										
									                   }
													 while($arr=mysql_fetch_array($res))
													 
		  							    {
										?>
										<option value="<?php echo $arr['rm_area_id'] ?>" <?php 	if($_SESSION["areaid"]!="") {if($nm == $arr['rm_area_title']){ ?> selected="selected" <?php }} ?>><?php echo $arr['rm_area_title']; ?></option>
                                       <?php
		                                             
		                                           }}
                                           ?>                                
                                </select></div></td>
                            </tr>
                            <tr>
                                <td align="right" class="white9">Postal Code :</td>
                                <td height="28" valign="top"><input type="text" name="txtareacode" id="txtareacode" value="<?php echo $_SESSION["areacode"]; ?>" style="width:160px; padding:2px; border:none;" class="black9" /></td>
                            </tr>
                       <?php					
						if($_SESSION['user_reg_id']!="")
						{
						?>
                         <tr>
          	<td width="194" align="right" class="white9">Property For :</td>
                                <td height="28" valign="top">          
            	<select name="ddlpost" id="ddlpost" class="black9" onchange="loadproperty();" style="width:160px; padding:2px; border:none;">
                <option value="" <?php if($_SESSION["ddlpost"]==" "){ ?>  selected="selected" <?php } ?>>Select Property For</option>
               					<option value="Buy" <?php if($_SESSION["ddlpost"]=="Buy"){ ?> selected="selected" <?php } ?>>Sell</option>
								<option value="Sell" <?php if($_SESSION["ddlpost"]=="Sell"){ ?> selected="selected" <?php } ?>>Buy</option>
                                <option value="Rent" <?php if($_SESSION["ddlpost"]=="Rent"){ ?> selected="selected" <?php } ?>>Rent</option>  
						</select>
                        </td></tr>
                        <tr>
                        <td width="194" align="right" class="white9">Property&nbsp;Type :</td>
                                <td height="28" valign="top">          
  		            	<select name="ddlptype" id="ddlptype" class="black9" style="width:160px; padding:2px; border:none;">
								<option value="">Select Property Type</option>
								<?php		 
		  							$qry="select * from property_type_master";							
                                   
		  							$res=mysql_query($qry);
		 							 while($arr=mysql_fetch_array($res))
		  							{
									?>
										<option value="<?php echo $arr['property_type_id']; ?>" <?php if($arr['property_type_id']==$_SESSION["ddlptype"]){ ?> selected="selected" <?php } ?>><?php echo $arr['property_type_name']; ?></option>
                                     <?php
		      							
		  							}
								?>
						</select>
                        </td></tr>
                      
                        <?php } ?>
                            <tr>
                                <td align="right" class="white9">Price Min : </td>
                                <td height="28" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="50"><input type="text" name="minprice" class="black-text-regular black9" id="minprice" style="width:62px; padding:2px; border:none;" value="<?php echo $_SESSION["minprice"]; ?>" >
                                        </td>
                                        <td  class="white9">&nbsp;Max :&nbsp; </td>
                                        <td><input type="text" name="maxprice" class="black-text-regular black9" id="maxprice"  style="width:62px; padding:2px; border:none;" value="<?php echo $_SESSION["maxprice"]; ?>" ></td>
                                    </tr>
                                </table></td>
                            </tr>
                            
                            
                            <tr>
                                <td align="right" class="white-text">&nbsp;</td>
                                <td height="28" valign="top"><input type="submit" name="button" id="button" value="Search" onClick="return validation_right();" /></td>
                            </tr>
                            
                        </table>
                        </form>
                        </td>
                    </tr>
                    <tr>
                        <td height="5" valign="top" bgcolor="#4D4D4D"></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>
</table>
