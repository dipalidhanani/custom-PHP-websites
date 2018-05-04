//====================================================================================================
//	File Name		:	validate.js
//----------------------------------------------------------------------------------------------------
//	Purpose			:	Client side validation in JavaScript.
//====================================================================================================

var ie4=document.all&&navigator.userAgent.indexOf("Opera")==-1;
var ns6=document.getElementById&&navigator.userAgent.indexOf("Opera")==-1;
var ns4=document.layers;
var ffox=!(navigator.userAgent.indexOf("Firefox")==-1);

//====================================================================================================
//	Function Name	:	IsEmpty
//----------------------------------------------------------------------------------------------------
function IsEmpty(fld,msg)
{
	if((fld.value == "" || fld.value.length == 0) && (msg == ''))
	{
		return false;
	}
	if(fld.value == "" || fld.value.length == 0)
	{
		alert(msg);
		try {fld.focus();}catch(e){return true;}
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsEmail
//----------------------------------------------------------------------------------------------------
function IsEmail(fld,msg)
{
	var regex = /^[\w]+(\.[\w]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/ ;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsInt
//----------------------------------------------------------------------------------------------------
function IsInt(fld,msg)
{
	var regex = /^[0-9]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}


//====================================================================================================
//	Function Name	:	IsFloat
//----------------------------------------------------------------------------------------------------
function IsFloat(fld,msg)
{
	var regex = /^[0-9.]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsValidUserId
//----------------------------------------------------------------------------------------------------
function IsValidUserId(fld,msg)
{
	var regex = /^[a-zA-Z0-9._]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}


//====================================================================================================
//	Function Name	:	IsValidString
//----------------------------------------------------------------------------------------------------
function IsValidString(fld,msg)
{
	var regex = /^[_]*[a-zA-Z_]+[a-zA-Z0-9_]*$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsPassword
//----------------------------------------------------------------------------------------------------
function IsPassword(fld,msg)
{
	var regex = /^[_]*[a-zA-Z]+[0-9]+[a-zA-Z0-9]*$/;
	if(!regex.test(fld.value))
  	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsLen
//----------------------------------------------------------------------------------------------------
function IsLen(fld, minlen, maxlen, msg)
{
	if(fld.value.length < minlen || fld.value.length > maxlen)
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsCurrency
//----------------------------------------------------------------------------------------------------
function IsCurrency(fld,msg)
{
    val = fld.value.replace(/\s/g, "");

	regex = /^\$?\d{1,3}(,?\d{3})*(\.\d{1,2})?$/;

    if(!regex.test(val)) {
         alert(msg);
		 fld.focus();
		 return false;
    }
	return true;
}

//====================================================================================================
//	Function Name	:	IsZip
//----------------------------------------------------------------------------------------------------
function IsZip(fld,msg)
{
	var num = /^[\d]+$/;
	if(!num.test(fld.value) || (fld.value.length !=5 && fld.value.length !=6))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsValidFormat
//----------------------------------------------------------------------------------------------------
function IsValidFormat(fld, filelist, msg)
{
	var regex = new RegExp('(' + filelist.toLowerCase() + ')$');
	if(!regex.test(fld.value.toLowerCase()))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsUrl
//----------------------------------------------------------------------------------------------------
function IsUrl(fld,msg)
{
//	var regex = /^(http:\/\/)/;
	var regex = /^(http:\/\/|https:\/\/)/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	checkImageType
//	Purpose			:	It checks the image type. It must be either jpg, gif, bmp or png.
//	Parameters		:	fld -  field name containig image file name
//						msg -  error message to be displayed
//----------------------------------------------------------------------------------------------------
function checkImageType(fld,msg)
{
	var regex = /(.jpg|.jpeg|.gif|.bmp|.png)$/;
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

//====================================================================================================
//	Function Name	:	IsValidSize
//----------------------------------------------------------------------------------------------------
function IsValidSize(fld, msg)
{
	var regex = /^[0-9]*x[0-9]*$/i;
	
	if(!regex.test(fld.value))
	{
		alert(msg);
		fld.focus();
		return false;
	}
	return true;
}

function isNumericKey()
{
	if (window.event.keyCode < 48 || window.event.keyCode > 57)
	{
		window.event.keyCode = 0;
	} 
}
function FieldValid(frm)
{
	with(frm)
	{
		if(!IsEmpty(fname,"Please insert First Name"))
		{
			return false;
		}
		if(!IsEmpty(lname,"Please insert Last Name"))
		{
			return false;
		}
		if(!IsEmpty(companyname,"Please insert Company Name"))
		{
			return false;
		}
		if(!IsEmpty(address,"Please insert Address"))
		{
			return false;
		}
		if(!IsEmpty(city,"Please insert City"))
		{
			return false;
		}
		if(!IsEmpty(state,"Please insert State"))
		{
			return false;
		}
		if(!IsEmpty(zipcode,"Please insert Zipcode"))
		{
			return false;
		}
		if(!IsEmpty(email,"Please insert E-mail"))
		{
			return false;
		}
		else if(!IsEmail(email,"Please insert valid e-mail Id"))
		{
			return false;
		}
		if(!IsEmpty(phone,"Please insert Phone number"))
		{
			return false;
		}
		return true;
	}
}