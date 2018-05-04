// JavaScript Document

var checked=false;
var frmname='';
function checkedAll(frmname)
{
	var valus= document.getElementById(frmname);
	if (checked==false)
    {
		checked=true;
    }
    else
    {
		checked = false;
    }
	for (var i =0; i < valus.elements.length; i++) 
	{
		valus.elements[i].checked=checked;
	}
}
function selectToggle(toggle, form) {
     var myForm = document.forms[form];
     for( var i=0; i < myForm.length; i++ ) { 
          if(toggle) {
               myForm.elements[i].checked = "checked";
          } 
          else {
               myForm.elements[i].checked = "";
          }
     }
}
