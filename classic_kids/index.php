<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Klassic Kids</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/main-bg.jpg);
}
-->
</style>
<script type="text/javascript" src="js1/jquery.js"></script>
<script type="text/JavaScript" src="js1/slimbox2.js"></script>
<link href="js1/cloud-zoom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js1/cloud-zoom.js"></script>


<link href="css/home.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="p_flies/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="p_flies/highslide_small.css" />
<script type="text/javascript">
	hs.graphicsDir = 'p_flies/graphics/';
	hs.outlineType = 'rounded-white';
	hs.showCredits = false;
	hs.wrapperClassName = 'draggable-header';
</script>

<link href="css/css-home.css" rel="stylesheet" type="text/css" />
   
<script type="text/javascript" src="panel/jquery-1.js"></script>
<script type="text/javascript" src="panel/scripts.js"></script>
<script type="text/javascript" src="panel/jqtransform.js"></script>
  
<script type="text/javascript" src="panel/prototype.js"></script>
<script type="text/javascript" src="panel/validation.js"></script>
<script type="text/javascript" src="panel/effects.js"></script>
<script type="text/javascript" src="panel/form.js"></script>
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
<script type="text/javascript">
function thanksmsg()
{
if((document.getElementById("name").value!='') && (document.getElementById("email").value!='') && (document.getElementById("comment").value!='') ){
	if(check_valid_email(document.getElementById("email").value)==true)
			{
			
	alert("Thank You For Your Feedback !");
			

			}
}
	}
</script>
<script language="javascript">
function gfe_feed(d_n, f_n, fm) 
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
	
	getoutput_feed(f_n+'?'+m,d_n)
	
	return false;
}



function getoutput_feed(url,resultpan)
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


</script>
    
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



function gfe2(d_n, f_n, fm) 
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
	
	getoutput(f_n+'&'+m,d_n)
	
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
<link rel="stylesheet" type="text/css" href="panel/styles.css" media="all">


</head>

<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td><?php include("header.php"); ?></td>
    </tr>
    <tr>
        <td height="10"></td>
    </tr>
    <tr>
        <td align="center" valign="top"><?php include("slider.php"); ?></td>
    </tr>
    <tr>
        <td height="5"></td>
    </tr>
    <tr>
    <td align="center" valign="top" class="black10">
	<?php	
	$content=$_GET['content'];
			
			switch($content)
			{
				 case 1:
				     include("productlist.php"); 
				 break;	
				 
				 case 2:
				     include("productdetails.php"); 
				 break;
				 
				 case 3:
				     include("viewcart.php"); 
				 break;
				 
				 case 4:
				     include("register.php"); 
				 break;
				 
				 case 5:
				     include("thanks.php"); 
				 break;
				 
				 case 6:
				     include("login.php"); 
				 break;
				 
				 case 7:
				     include("myprofile.php"); 
				 break;
				 
				 case 8:
				     include("aboutus.php"); 
				 break;
				 
				 case 9:
				     include("enquiry.php"); 
				 break;
				 
				 case 10:
				     include("contactus.php"); 
				 break;
				 
				 case 11:
				     include("testimonials.php"); 
				 break;
				 
				 case 12:
				     include("confirmation.php"); 
				 break;
				 
				 case 13:
				     include("confirmorder.php"); 
				 break;
				 
				 case 14:
				     include("signin.php"); 
				 break;
				 
				 case 15:
				     include("payment.php"); 
				 break;
				 
				 case 16:
				     include("mywishlist.php"); 
				 break;
				 
				 case 17:
				     include("ipn.php"); 
				 break;
				 
				 case 18:
				     include("notifyurl.php"); 
				 break;
				 
				 case 19:
				     include("searchproduct.php"); 
				 break;
				 
				 case 20:
				     include("myorders.php"); 
				 break;
				 
				 case 21:
				     include("myorderdetails.php"); 
				 break;
				 
				 case 22:
				     include("updateprofile.php"); 
				 break;
				 
				 case 23:
				     include("mydetails.php"); 
				 break;
				 
				 case 24:
				     include("changepassword.php"); 
				 break;
				 
				 case 25:
				     include("size_chart.php"); 
				 break;
				  case 26:
				     include("company_info.php"); 
				 break;
				 
				 default:
		         	 include("main.php"); 
				 break;
			}	
	?></td>
  </tr>
    <tr>
        <td height="15"></td>
    </tr>
    <tr>
        <td align="center" valign="top"><?php include("footer.php"); ?></td>
    </tr>
</table>
<div class="contact-main jqtransformdone">
			<span class="btn-contact">Feedback</span>
			<form id="contactForm" name="contactForm" method="post" >
			    <div class="fieldset">
	              <h2 class="legend">Feedback Information</h2>
	              <ul class="form-list">
	                  <li class="fields">
	                      <div class="field">
	                          <label for="name" class="required"><em>*</em>Name</label>
	                          <div class="input-box">
	                              <div style="width: 294px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input name="name" id="name" title="Name" class="input-text required-entry jqtranformdone jqTransformInput" type="text"></div></div></div>
	                          </div>
	                      </div>
	                      <div class="field">
	                          <label for="email" class="required"><em>*</em>Email</label>
	                          <div class="input-box">
	                              <div style="width: 294px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input name="email" id="email" title="Email" class="input-text required-entry validate-email jqtranformdone jqTransformInput" type="text"></div></div></div>
	                          </div>
	                      </div>
							<div class="field last">
								<label for="telephone">Telephone</label>
								<div class="input-box">
									<div style="width: 294px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input name="telephone" id="telephone" title="Telephone" class="input-text jqtranformdone jqTransformInput" type="text"></div></div></div>
								</div>
							</div>
	                  </li>
	                  <li class="wide">
	                      <label for="comment" class="required"><em>*</em>Comment</label>
	                      <div class="input-box">
	                          <table class="jqTransformTextarea" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td id="jqTransformTextarea-tl"></td><td id="jqTransformTextarea-tm"></td><td id="jqTransformTextarea-tr"></td></tr><tr><td id="jqTransformTextarea-ml">&nbsp;</td><td id="jqTransformTextarea-mm"><div><textarea name="comment" id="comment" title="Comment" class="required-entry input-text jqtransformdone" cols="5" rows="3"></textarea></div></td><td id="jqTransformTextarea-mr">&nbsp;</td></tr><tr><td id="jqTransformTextarea-bl"></td><td id="jqTransformTextarea-bm"></td><td id="jqTransformTextarea-br"></td></tr></tbody></table>
	                      </div>
	                  </li>
	              </ul>
	          </div>
	          <div class="buttons-set">
	              <div style="width: 138px;" class="jqTransformInputWrapper"><div class="jqTransformInputInner"><div><input class="jqtranformdone jqTransformInput" name="hideit" id="hideit" style="display: none;" type="text"></div></div></div>
	              <button type="submit" title="Submit" class="button" onclick="gfe_feed('ajax_thanks','process_feedback.php',contactForm);thanksmsg();"><span><span>Submit</span></span></button><p class="required">* Required Fields</p>
	          </div>
             <div id="ajax_thanks" style="color:#FFF;"></div>
	      </form>
	</div>
    <script type="text/javascript">
//<![CDATA[
    var contactForm = new VarienForm('contactForm', true);
//]]>
</script>




  
</body>
</html>
