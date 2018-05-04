<?php session_start();

require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM Realtor - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
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
</style>

</head>

<body>

<script language="javascript" type="text/javascript" src="js/checkbox.js"></script>
<script language="javascript" type="text/javascript" src="dropdown.js"></script>
<script language="javascript">
function gfe(d_n, f_n, fm) 
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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("header.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>                  
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  --> 
                 <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF">

                    
                    <table width="100%" border="0" cellspacing="5" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="138" height="35" class="normal_fonts14_black">Properties Detail</td>
                            
                            <td width="768">
                            
                            </td>
                            <td width="80" align="right"><table width="80" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="25" align="left"><a href="property_step1.php?action=add"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                                <td align="left" class="normal_fonts9" style="font-size:13px"><a href="property_step1.php?action=add" class="normal_fonts9">Add New</a></td>
                                </tr>
                                
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
 
                      <tr><td>
                       <form name="frmpropsearch" id="frmpropsearch" method="post" action="propertyDetail_list.php">
                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                        <tr>
                                <td width="37" align="right" class="normal_fonts9">City :</td>
                                <td width="167" height="28" valign="middle">
                                <select name="ddlcity" class="normal_fonts9" id="cityid" style="width:160px; padding:2px; border:1px solid #ddd;" onchange="gfe('ajaxareaid_search','findarea_search.php',frmpropsearch);">
                                    <option value="" selected="selected">Select City</option>                                  
									<?php		 
                                    $qryc="select * from rm_city_master"; 
                                                                
                                     $resc=mysql_query($qryc);									               
                                     while($arrc=mysql_fetch_array($resc))
                                     {	?>
                                                <option value="<?php echo $arrc['rm_city_id']; ?>" <?php if($arrc['rm_city_id']==$_REQUEST["ddlcity"]){ ?> selected="selected" <?php } ?>><?php echo $arrc['rm_city_title']; ?></option>
                                    <?php }  ?>
                                    </select>
                                </td>
                           
                          
                                <td width="51" align="right" class="normal_fonts9">Street :</td>
                                <td width="166" height="28" valign="middle">
                                <div id="ajaxareaid_search">
                                <select name="areaid" class="normal_fonts9" id="ddlarea" style="width:160px; padding:2px; border:1px solid #ddd;" onchange="getAreacode(this.value)">
                                    <option value="0">Select Street</option>    
                                    <?php
									if($_REQUEST["ddlcity"]!="")
													{
															$qry="select DISTINCT a.rm_area_title,a.rm_area_id from rm_area_master a where a.rm_city_mast_id='".$_REQUEST["ddlcity"]."'"; 
									$qry1="select a.rm_area_title from rm_area_master a, property_propertydetail_master p where a.rm_area_id = '".$_REQUEST["areaid"]."'";
														
													 $res=mysql_query($qry);
									                 $rs=mysql_query($qry1);
													 while($a=mysql_fetch_array($rs))
		  							                  {
									                 $nm=$a['rm_area_title'];
										
									                   }
													 while($arr=mysql_fetch_array($res))
													 
		  							    {
										?>
										<option value="<?php echo $arr['rm_area_id'] ?>" <?php 	if($_REQUEST["areaid"]!="") {if($nm == $arr['rm_area_title']){ ?> selected="selected" <?php }} ?>><?php echo $arr['rm_area_title']; ?></option>
                                       <?php
		                                             
		                                           }}
                                           ?>
                                </select>
                                </div>
                                </td>
                          
                          
                                <td width="81" align="right" class="normal_fonts9">Postal Code :</td>
                                <td width="146" height="28" valign="middle"><input type="text" name="areacode" id="areacode" value="<?php echo $_REQUEST["areacode"]; ?>" style="width:140px; padding:2px; border:1px solid #ddd;" class="normal_fonts9" /></td>
                        <td width="83" align="right" class="normal_fonts9">Property For :</td>   
                       <td width="140" height="28" valign="middle">          
            	<select name="ddlpost" id="ddlpost" class="normal_fonts9" style="width:140px; padding:2px; border:1px solid #ddd;">
                <option value="">Select Property For</option>
								<option value="Sell" <?php if($_REQUEST["ddlpost"]=="Sell"){ ?> selected="selected" <?php } ?>>Sell</option>
                                <option value="Rent" <?php if($_REQUEST["ddlpost"]=="Rent"){ ?> selected="selected" <?php } ?>>Rent</option>  
                                <option value="Buy" <?php if($_REQUEST["ddlpost"]=="Buy"){ ?> selected="selected" <?php } ?>>Buy</option> 
						</select>
                        </td>                            
                      
                                <td width="1" align="right" class="white-text">&nbsp;</td>
                                <td width="59" height="28" valign="middle"><input type="submit" name="button" id="button" value="Search" onClick="return validation_right();" /></td>
                        
                       </tr>     
                        </table>
                        </form>
                      </td></tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#CCCCCC">
                        <table width="100%" border="0" cellspacing="1" cellpadding="4">
                          <tr>
                            <td width="90" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>City</strong></td>
                            <td width="160" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>Street</strong></td>
                            <td width="86" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>Postal Code</strong></td>                           
                            <td width="117" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>Property Type</strong></td>
                            <td width="123" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>Post Property For</strong></td>
                            <td width="117" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>Property Price</strong></td>
                            <td width="118" align="center" bgcolor="#999999" class="normal_fonts10" ><strong>Property Post By</strong></td>                          
                            <td width="50" align="center" valign="middle" bgcolor="#999999" class="normal_fonts10"><strong>Active</strong></td>
                            <td width="43" align="center" valign="middle" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
                          </tr>
<?php
if(($_REQUEST["ddlcity"]==0) && ($_REQUEST["areaid"]==0) && ($_REQUEST["areacode"]=="") && ($_REQUEST["ddlpost"]==""))
{
	$result="select * from property_propertydetail_master";
}
if($_REQUEST["ddlcity"]!=0){
$result="select * from property_propertydetail_master where property_propertydetail_city_id = '".$_REQUEST["ddlcity"]."'";
}
if($_REQUEST["areaid"]!=0){
$result.=" and propperty_propertydetail_area_id = '".$_REQUEST["areaid"]."'";
}
if($_REQUEST["areacode"]!=""){
$result.=" and propperty_propertydetail_area_code = '".$_REQUEST["areacode"]."'";
}
if($_REQUEST["ddlpost"]!=""){
$result.=" and property_propertydetail_postpropertyfor = '".$_REQUEST["ddlpost"]."'";
}

$result.=" order by property_propertydetail_id desc ";
							// start for searching...............
								
					if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
					
					$data = mysql_query($result);
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
					
					
					$qmax=$result.$max;
					
					
					$res = mysql_query($qmax);	

					
				if($rows1>0){			
				while($row=mysql_fetch_array($res))
				{
					
							
							$qtype=mysql_query("select * from property_type_master where property_type_id='".$row['property_propertdetail_property_type_id']."'");
							$rtype=mysql_fetch_array($qtype);
							$ptype=$rtype['property_type_name'];
							
							
							$post=$row['property_propertydetail_postpropertyfor'];
							$price=$row['property_propertydetail_property_price'];
							$status=$row['property_propertydetail_status'];
							$pid=$row['property_propertydetail_id'];
							$qcity=mysql_query("select * from rm_city_master where rm_city_id='".$row['property_propertydetail_city_id']."'");
							$rcity=mysql_fetch_array($qcity);
							$city=$rcity['rm_city_title'];
							
							$qstreet=mysql_query("select * from rm_area_master where rm_area_id='".$row['propperty_propertydetail_area_id']."'");
							$rstreet=mysql_fetch_array($qstreet);
							$street=$rstreet['rm_area_title'];
							
							if($row['property_submitted_by_id']==0){
								$postby="Admin";
							}
							else{
							$qpostby=mysql_query("select * from rm_user_registration where rm_user_reg_id='".$row['property_submitted_by_id']."'");
							$rpostby=mysql_fetch_array($qpostby);
							$postby=$rpostby['rm_user_name'];
							}
							
							$postalcode=$row['propperty_propertydetail_area_code'];
	
				?>
							
                          	<tr>     
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo $city; ?></td>
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo $street; ?></td>
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo $postalcode; ?></td> 
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo $ptype; ?></td>
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo $post; ?></td>
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo "CAD $".number_format($price,2); ?></td>  
                                <td bgcolor="#FFFFFF" align="center" class="normal_fonts9"><?php echo $postby; ?></td>                          
                           	    <td align="center" valign="middle" bgcolor="#FFFFFF" class="normal_fonts9">
								<?php 
								///echo $status."<br>";
									if ($status == "Yes")
									{
								?>
										<a onClick="return confirm('Are you sure you want to change status?');" href="propertyDetail_status.php?status=<?php echo "No"; ?>&pid=<?php echo $pid; ?>"><img src="images/yes.png" width="20" height="20" title="Active" border="0" /></a>
								<?php
									}
									else 
									{
								?>
										<a onClick="return confirm('Are you sure you want to change status?');" href="propertyDetail_status.php?status=<?php echo "Yes"; ?>&pid=<?php echo $pid; ?>"><img src="images/delete_on.gif" width="20" height="20" title="Inactive"  border="0"/></a>
								<?php
									}
								?>
							    
							  </td>
                            <td  bgcolor="#FFFFFF" class="normal_fonts9" align="center">
							<table  border="0" cellspacing="0" cellpadding="0">
                             <tr>
							   <td align="center">
                             <a href="view_property_detail.php?pid=<?php echo $pid; ?>&action=view"><img src="images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a>
                             </td>
 							 <td align="center">
                             <a href="property_step1.php?pid=<?php echo $pid; ?>&action=edit"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a>
                             </td>
								
							
							<td>
                            <a href="deleteproperty_detail.php?pid=<?php echo $pid; ?>" onClick="return confirm('Are you sure you want to Delete this Property?');">
                            <img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" />
                            </a>
                            </td>
						</tr>
								
                          </table>
                          </td>
                         </tr>
                          
						<?php
						} } else{
						?>
                        <tr>
                          <td class="normal_fonts9" align="center" colspan="9" bgcolor="#ffffff">No Records Found</td></tr>
                        <?php } ?>
                      <tr>
                      
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr><td colspan="8" height="10" bgcolor="#FFFFFF"></td></tr>
                          <tr bgcolor="#FFFFFF">
                    
                            <td  class="normal_fonts9" align="center">
                            	<!-- start for display paging links-->
                            	 <?php 
if($rows1!=0)
{
if ($pagenum == 1)
{
}
else
{
?>
				<a href='propertyDetail_list.php?pagenum=1&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>' > << first 
                </a>
				<a href='propertyDetail_list.php?pagenum=<?php echo $pagenum-1; ?>&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>'>Previous
                </a>	
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
			   <a href='propertyDetail_list.php?pagenum=<?php echo $i; ?>&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>'><?php echo $i; ?></a> | 
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
					   <a href='propertyDetail_list.php?pagenum=<?php echo $i; ?>&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>'><?php echo $i; ?></a> |
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
					   <a href='propertyDetail_list.php?pagenum=<?php echo $i; ?>&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>'><?php echo $i; ?></a> |
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
				<a href='propertyDetail_list.php?pagenum=<?php echo $pagenum+1; ?>&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='propertyDetail_list.php?pagenum=<?php echo $last; ?>&ddlcity=<?php echo $_REQUEST["ddlcity"]; ?>&areaid=<?php echo $_REQUEST["areaid"]; ?>&areacode=<?php echo $_REQUEST["areacode"]; ?>&ddlpost=<?php echo $_REQUEST["ddlpost"]; ?>'>Last >> </a>	
				<?php
				}
			}
				?>
								<!-- end for display paging links-->
                            </td>
                            </tr>
                          </table>
                        </tr>
                      </table>
                     </td></tr></table>
                    
                        </td></tr></table>
                  
                     <!-- main ends here  -->
            
         </td>
          </tr>
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