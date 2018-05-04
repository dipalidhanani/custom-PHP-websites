
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
</script>
<script language="javascript">
function gfe(d_n, f_n, fm,id) 
{ 
 
	with(document.frmtestimonials)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "<br>" + "--------------------------------------------------------------------";
			
			if(document.getElementById("user_name").value=='')
			{
				
				error=1;
				message=message + "<br>" + "Please Enter Your Name!";
			}
			if(document.getElementById("title").value=='')
			{
				
				error=1;
				message=message + "<br>" + "Please Enter Your Title!";
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
			if(document.getElementById("description").value=='')
			{
				error=1;
				message=message + "<br>" + "Please Enter Description!";
			}			
			if(error==1)
			{
				
			document.getElementById("basic-modal-content").innerHTML=message;
			//document.getElementById("basic-modal-content").style.backgroundColor='#ddd';
//			document.getElementById("basic-modal-content").style.height='196px';
//			document.getElementById("basic-modal-content").style.border='4px solid #888';
		document.getElementById("basic-modal-content").style.color='#ffffff';
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
	
	getoutput(f_n+'?'+m,d_n)
	
	return false;
			}
	}

}



function getoutput(url,resultpan)
{
	//alert(url);
	var xmlchat = initxmlhttp() ;
	var m = document.getElementById(resultpan);
	m.innerHTML = "<div id='loading' align='center'> </div>";
	xmlchat.open( "POST", url, true ) ;
	xmlchat.onreadystatechange=function()
	{
		//alert("hi");
		if (xmlchat.readyState==4)
		{
			document.getElementById("user_name").value='';
				document.getElementById("title").value='';
					document.getElementById("email").value='';
						document.getElementById("description").value='';
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

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript'>
jQuery(function ($) {	
	$('#basic-modal').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});
});
</script>
<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />

<!-- testimonials Form CSS files -->
<style type='text/css' >

#basic-modal-content{display:none;}

/* Overlay */
#simplemodal-overlay {background-color:#444; cursor:wait;}

/* Container */
#simplemodal-container {height:220px; width:470px; color:#bbb; background-color:#555; border:4px solid #666; padding:0px;}
#simplemodal-container .simplemodal-data {padding:8px;}
#simplemodal-container code {background:#141414; border-left:3px solid #65B43D; color:#bbb; display:block; font-size:12px; margin-bottom:12px; padding:4px 6px 6px;}
#simplemodal-container a {color:#ddd;}
#simplemodal-container a.modalCloseImg {background:url(images/x.png) no-repeat; width:25px; height:29px; display:inline; z-index:3200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
#simplemodal-container h3 {color:#84b8d9;}
</style>

<table width="99%" border="0" cellspacing="0" cellpadding="0">
      
          <tr>           
            <td>           
<form method="post" name="frmtestimonials" id="frmtestimonials">
<table width="100%" border="0" cellspacing="3" cellpadding="3" class="black10" >
                                 <tr>
                            <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Testimonials</strong></td>
                                      <td class="black10" align="right" style="color:#AB2400;"><strong><u>                                      
									  <a href="home.php?pageno=23&notifymsg=testi" style="color:#AB2400;">Post Testimonial</a>									                             
                                      </u></strong></td>
                                    </tr>
                                </table></td>
            
                             
                                  
                                </tr>
                                <?php $qtesti=mysql_query("select * from testimonials where approve_status=1 order by testimonials_id desc");
								$totalrecords=mysql_num_rows($qtesti);
								$i=1;
								while($rowtesti=mysql_fetch_array($qtesti)){
								?>
                                <tr>
                                <td class="black10" valign="top" align="center" width="2%" style="padding-top:6px;"><strong>&nbsp;<?php echo $i."."; ?></strong></td>
                                <td width="98%"><table <?php if($totalrecords!=$i){ ?> style="border-bottom:1px dotted #444;" <?php } ?> width="100%">
                                <tr>
                                  <td align="left" class="black10" style="text-transform:capitalize;"><strong><?php echo $rowtesti["testimonials_name"]." Wrote:"; ?></strong></td>                                 
                                </tr>
                                 <tr>
                                  <td align="left" class="black10"><?php echo $rowtesti["title"]; ?></td>                                 
                                </tr>
                                 <tr>
                                  <td align="left" class="black10"><?php echo $rowtesti["description"]; ?></td>                                 
                                </tr>
                                <tr><td height="5"></td></tr>
                                </table></td></tr>
                                <?php $i++; } ?>
                                
               <div id="basic-modal-content" style="display:none;"></div>
                            </table>

</form></td></tr></table>
