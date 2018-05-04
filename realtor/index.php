<?php session_start();
	  include("include/config.php");
	  ?>
<html>
<head>
<title>RM Realtor</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<?php include("font.php"); ?>
<link href="css/home.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
     
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

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><?php include("header.php"); ?></td>
                </tr>
            </table></td>
        </tr>
        <tr>
            <td width="70%" valign="top" bgcolor="#FFFFFF"><?php include("middle.php"); ?></td>
            <td width="30%" valign="top" bgcolor="#E0E0E0"><?php include("right.php"); ?></td>
        </tr>
        <tr>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><?php include("fotter.php"); ?>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
