
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  
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
  
<div class="account-login-home "> <span class="btn-log">
Log In 
</span>       <form action="http://livedemo00.template-help.com/magento_41643/customer/account/loginPost/" method="post" id="login-form">
    <div class="col2-set">
      <div class="col-home">
        <div class="content">
          <h2>Offers</h2>        
          <div class="buttons-set">
            <button type="button" title="Create an Account" class="button" onclick="window.location='http://livedemo00.template-help.com/magento_41643/customer/account/create/';"><span><span>Create an Account</span></span></button>
          </div>
        </div>
      </div>
      <div class="col-home-2">
        <div class="content">
          <h2>Registered Customers</h2>
          <p>If you have an account with us, please log in.</p>
          <ul class="form-list">
            <li>
              <label for="email" class="required"><em>*</em>Email Address</label>
              <div class="input-box">
                <input name="login[username]" id="email" class="input-text required-entry validate-email" title="Email Address" type="text">
              </div>
            </li>
            <li>
              <label for="pass" class="required"><em>*</em>Password</label>
              <div class="input-box">
                <input name="login[password]" class="input-text required-entry validate-password" id="pass" title="Password" type="password">
              </div>
            </li>
                      </ul>
          <div class="buttons-set"> <a href="http://livedemo00.template-help.com/magento_41643/customer/account/forgotpassword/" class="f-left">Forgot Your Password?</a>
            <p class="required">* Required Fields</p>
            <button type="submit" class="button" title="Login" name="send" id="send2"><span><span>Login</span></span></button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <script type="text/javascript">
    //<![CDATA[
        var dataForm = new VarienForm('login-form', true);
    //]]>
    </script> 
</div>
  
 
<script type="text/javascript">
//<![CDATA[
    var contactForm = new VarienForm('contactForm', true);
//]]>
</script>

</body>
</html>