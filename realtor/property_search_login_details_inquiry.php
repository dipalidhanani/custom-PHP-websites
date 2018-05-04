	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

<table width="99%" border="0" cellspacing="0" cellpadding="0">
      
          <tr>           
            <td>           

<table width="100%" border="0" cellspacing="10" cellpadding="0">
 <tr>
                                  
                                    <td class="black9" ><strong><a href="index.php">Home</a></strong> > <strong><a href="home.php?pageno=20&ddlcity=<?php echo $_SESSION["city"]; ?>&areaid=<?php echo $_SESSION["areaid"]; ?>&areacode=<?php echo $_SESSION["areacode"]; ?>&ddlpost=<?php echo $_SESSION["ddlpost"]; ?>&ddlptype=<?php echo $_SESSION["ddlptype"]; ?>&ddlprop=<?php echo $_SESSION["ddlprop"]; ?>&minprice=<?php echo $_SESSION["minprice"]; ?>&maxprice=<?php echo $_SESSION["maxprice"]; ?>">Property Search</a></strong> > Send An Inquiry</td>
           </tr>
           <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Send An Inquiry</strong></td>
                                    </tr>
                                </table></td>
</tr>
          
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php 


$queryprop="select * from property_propertydetail_master where property_propertydetail_id = '".$_GET["pid"]."'";


$data_p = mysql_query($queryprop) or die(mysql_error());
$totalrecords=mysql_num_rows($data_p);


$i=1;	
 while($rowprop = mysql_fetch_array($data_p))
 {	
 $qcity=mysql_query("select * from rm_city_master where rm_city_id='".$rowprop["property_propertydetail_city_id"]."'");
 $rowcity=mysql_fetch_array($qcity);
 
 $qarea=mysql_query("select * from rm_area_master where rm_area_id='".$rowprop["propperty_propertydetail_area_id"]."'");
 $rowarea=mysql_fetch_array($qarea);
 
 $qptype=mysql_query("select * from property_type_master where property_type_id='".$rowprop["property_propertdetail_property_type_id"]."'");
 $rowptype=mysql_fetch_array($qptype); 

?>
          <tr>
          <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="5" <?php if($totalrecords!=$i){ ?> style="border-bottom:1px dotted #999;" <?php } ?>  >     
           <?php if(($rowprop["property_propertydetail_photo"]!='') || ($rowprop["property_propertydetail_photo2"]!='') || ($rowprop["property_propertydetail_photo3"]!='') || ($rowprop["property_propertydetail_photo4"]!='') || ($rowprop["property_propertydetail_photo5"]!='')){ ?>     
          <tr>       
          <td><table cellpadding="2" cellspacing="4" >
           <tr>
           <td class="black11" style="color:#AB2400;"><strong>Property Gallery</strong></td>
           </tr>
          <tr>  
           <td align="center" class="black10" valign="top"  <?php if($rowprop["property_propertydetail_photo"]!=''){ ?> style="border:1px solid #ddd;" <?php } ?> width="128">
              <?php if($rowprop["property_propertydetail_photo"]!=''){ ?>
            <a href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo"]; ?>" rel="lightbox[plants]"  ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo"]; ?>" width="128" height="130" /></a>
            <?php } ?>
           </td>
           <td align="center" class="black10" valign="top"  <?php if($rowprop["property_propertydetail_photo2"]!=''){ ?> style="border:1px solid #ddd;" <?php } ?> width="128">
              <?php if($rowprop["property_propertydetail_photo2"]!=''){ ?>
            <a href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo2"]; ?>" rel="lightbox[plants]" ><img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo2"]; ?>" width="128" height="130" /></a>
            <?php } ?>
           </td>
           <td align="center" class="black10" valign="top"  <?php if($rowprop["property_propertydetail_photo3"]!=''){ ?> style="border:1px solid #ddd;" <?php } ?> width="128">
           <?php if($rowprop["property_propertydetail_photo3"]!=''){ ?>
            <a href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo3"]; ?>" rel="lightbox[plants]" >  <img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo3"]; ?>" width="128" height="130" /></a>
            <?php } ?>
           </td>
           <td align="center" class="black10" valign="top"  <?php if($rowprop["property_propertydetail_photo4"]!=''){ ?> style="border:1px solid #ddd;" <?php } ?> width="128">
          <?php if($rowprop["property_propertydetail_photo4"]!=''){ ?>
            <a href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo4"]; ?>" rel="lightbox[plants]" >  <img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo4"]; ?>" width="128" height="130" /></a>
            <?php } ?>
           </td>
           <td align="center" class="black10" valign="top"  <?php if($rowprop["property_propertydetail_photo5"]!=''){ ?> style="border:1px solid #ddd;"<?php } ?> width="128">
           <?php if($rowprop["property_propertydetail_photo5"]!=''){ ?>
           <a href="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo5"]; ?>" rel="lightbox[plants]" > <img src="admin/uploadimages/property/<?php echo $rowprop["property_propertydetail_photo5"]; ?>" width="128" height="130" /></a><?php } ?>
           </td>
           </tr></table></td>
           </tr>
            <?php } ?>
           <tr>
           <td valign="top" colspan="5"><table width="100%" border="0" cellspacing="0" cellpadding="5">
             <tr>
               <td class="black11" style="color:#AB2400;"><strong>Property Details</strong></td>
               <td class="black11" style="color:#AB2400;"><strong>Send An Inquiry</strong></td>
             </tr>
             <tr>
               <td valign="top" width="40%"><table cellspacing="0" cellpadding="5">
               <?php if($rowprop["property_propertydetail_property_name"]!=''){ ?>
                 <tr>
                   <td class="black10" ><strong>Property Name : </strong><?php echo $rowprop["property_propertydetail_property_name"]; ?></td>
                 </tr>
                 
                 <?php } ?>
                  <tr>
           <td class="black9"><strong>Property For : </strong><?php echo $rowprop["property_propertydetail_postpropertyfor"]; ?></td>
           </tr>
          
                 <tr>
                   <td class="black10" ><strong>City :</strong> <?php echo $rowcity["rm_city_title"]; ?></td>
                 </tr>
                 <tr>
                   <td class="black10"><strong>Street :</strong> <?php echo $rowarea["rm_area_title"]; ?></td>
                 </tr>
                 <tr>
                   <td class="black10"><strong>Postal Code : </strong><?php echo $rowprop["propperty_propertydetail_area_code"]; ?></td>
                 </tr>
                 <tr>
                   <td class="black10"><strong>Property Type : </strong><?php echo $rowptype["property_type_name"]; ?></td>
                 </tr>                 
                 <tr>
                   <td class="black10"><strong>Property Price : </strong><?php echo "CAD $".number_format($rowprop["property_propertydetail_property_price"],2); ?></td>
                 </tr>
               
               </table></td>
               <td width="60%" valign="top"> 
<script language="javascript">
function check_valid_email(emailval)
{
	if(emailval=="")
	{
		return true;
	}
	else
	{
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(reg.test(emailval) == false)
		{
			 return false;
		}
		else
		{
			return true;
		}
	}
}
</script><script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript'>
jQuery(function ($) {
	$('#basic-modaly').click(function (e) {
		$('#basic-modal-contenty').modal();

		return false;
	});
});
</script>
<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />

<!-- Contact Form CSS files -->
<style type='text/css'>
#basic-modal-contenty{display:none;}

/* Overlay */
#simplemodal-overlay {background-color:#444; cursor:wait;}

/* Container */
#simplemodal-container {height:200px; width:460px; color:#bbb; background-color:#555; border:4px solid #666; padding:0px;}
#simplemodal-container .simplemodal-data {padding:8px;}
#simplemodal-container code {background:#141414; border-left:3px solid #65B43D; color:#bbb; display:block; font-size:12px; margin-bottom:12px; padding:4px 6px 6px;}
#simplemodal-container a {color:#ddd;}
#simplemodal-container a.modalCloseImg {background:url(images/x.png) no-repeat; width:25px; height:29px; display:inline; z-index:3200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
#simplemodal-container h3 {color:#84b8d9;}

</style>
<script language="javascript">
function gfe_inq(d_n, f_n, fm) 
{ 
	with(document.frminq)
	{ 
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(document.getElementById("user_name").value=='')
			{
				
				error=1;
				message=message + "<br>" + "Please Enter Your Name!";		
			}
			else if (isNaN(document.getElementById('user_name').value)==false)
       		{
		
		        error=1;
				message=message + "<br>" + "Please Enter Valid Name!";
			
			}
			
			if(document.getElementById("email").value=='')
			{
				error=1;
				message=message + "<br>" + "Please Enter Your Emailid!";
				
			}
			
			if(check_valid_email(document.getElementById("email").value)==false)
			{
				error=1;
				message=message + "<br>" + "Please Enter Valid Emailid!";
			}
			
			
			if(document.getElementById("mobile").value=='')
			{
				error=1;
			message=message + "<br>" + "Please Enter Mobile Number!";
			}
			else if (isNaN(document.getElementById('mobile').value)==true)
			{
			
					error=1;
					message=message + "<br>" + "Please Enter Digits In Mobile Number!";				
			}
			
			if(document.getElementById("comments").value=='')
			{
				error=1;
				message=message + "<br>" + "Please Enter Comments!";
			}
			
			if(error==1)
			{// alert(message);			
			document.getElementById("basic-modal-contenty").innerHTML=message;			
			document.getElementById("basic-modal-contenty").style.color='#ffffff';
			return false;			
			}
			else
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
	
	getoutput_inq(f_n+'?'+m,d_n)
	
	return false;
			}
	}

}



function getoutput_inq(url,resultpan)
{
	//alert(url);
	var xmlchat = initxmlhttp() ;
	var m = document.getElementById(resultpan);
	m.innerHTML = "<div id='loading' align='center'> </div>";
	xmlchat.open( "POST", url, true ) ;
	xmlchat.onreadystatechange=function()
	{
				if (xmlchat.readyState==4)
		{
			document.getElementById("user_name").value='';
				document.getElementById("mobile").value='';
					document.getElementById("email").value='';
						document.getElementById("comments").value='';
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

                 <form name="frminq" id="frminq"  method="post" enctype="multipart/form-data" >
               
               <table width="100%" border="0" cellspacing="3" cellpadding="3" class="black10" >
                              
                                <tr>
                                  <td width="30%" align="left" class="black10"><span class="validationmsg">*</span>Name : </td>
                                  <td align="left" class="black10">
                                  <input type="text" name="user_name" id="user_name" />
                                 </td>
                                </tr>                               
                                <tr>
                                  <td align="left" class="black10"><span class="validationmsg">*</span>Mobile No : </td>
                                  <td align="left" class="black10">
                                    <input name="mobile" type="text" id="mobile" maxlength="10" />
                                 </td>
                                </tr>
                                <tr>
                                  <td align="left" class="black10"><span class="validationmsg">*</span>E-Mail : </td>
                                  <td align="left" class="black10">
                                    <input name="email" type="text" id="email" size="25"/>
                                  </td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" class="black10"><span class="validationmsg">*</span>Requirements : </td>
                                  <td align="left" class="black10">
                                    <textarea name="comments" id="comments" cols="25" rows="3" ></textarea>
                                  </td>
                                </tr>
                                
                                
                                <tr>
                        <td colspan="2" align="center" valign="top">
						<input type="hidden" name="propertyid" id="propertyid" value="<?php print($rowprop["property_propertydetail_id"]); ?>"/>
						<a id="basic-modaly"><input  name="submit" id="submit" type="submit" value="Submit" class="basic"  onClick="return gfe_inq('basic-modal-contenty','inquiry_process.php',frminq);"/></a></td>
                      </tr>
                    
                             <div id="basic-modal-contenty"></div>  

                            </table>
                            </form></td>
             </tr>
           </table></td>
           
           </tr>
      
           </table></td>
          </tr>
         
          
  <?php  $i++; }  ?>
  
       
      
          </table></td></tr>
          
          
           <tr><td height="5"></td></tr>
          
        </table>
</td></tr></table>
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.smooth-scroll.min.js"></script>
<script src="js/lightbox.js"></script>

<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>