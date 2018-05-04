<?php session_start(); ?>
<script language="javascript" type="text/javascript" src="dropdown.js"></script>


<script language="javascript">

						function loadPropName()
						{
							
							var type = document.getElementById("ddlptype");
							var value = type.selectedIndex;
							var name = type.options[value].text;							
						if(name=="Detached" || name=="Semi-Detached" || name=="Townhouse")
							{	
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = '';
								document.getElementById("bathroom").style.visibility="visible";
								document.getElementById("bathroommsg").style.display = '';
								document.getElementById("bathroommsg").style.visibility="visible";
								
								document.getElementById("balcony").style.display = '';
								document.getElementById("balcony").style.visibility="visible";
								document.getElementById("balconymsg").style.display = '';
								document.getElementById("balconymsg").style.visibility="visible";
																
						
							}
							
							else if(name == "Condominium")
							{
							
								
								document.getElementById("bedroom").style.display = '';
								document.getElementById("bedroom").style.visibility="visible";
								document.getElementById("bedroommsg").style.display = '';
								document.getElementById("bedroommsg").style.visibility="visible";
								
								document.getElementById("bathroom").style.display = '';
								document.getElementById("bathroom").style.visibility="visible";
								document.getElementById("bathroommsg").style.display = '';
								document.getElementById("bathroommsg").style.visibility="visible";
								
								document.getElementById("balcony").style.display = '';
								document.getElementById("balcony").style.visibility="visible";
								document.getElementById("balconymsg").style.display = '';
								document.getElementById("balconymsg").style.visibility="visible";
								
						
							}							
							else if(name == "Vacant Land")
							{								
							
								
								document.getElementById("bedroom").style.display = 'none';
								document.getElementById("bedroom").style.visibility="hidden";
								document.getElementById("txtbedroom").value='';
								document.getElementById("bedroommsg").style.display = 'none';
								document.getElementById("bedroommsg").style.visibility="hidden";
								
								document.getElementById("bathroom").style.display = 'none';
								document.getElementById("bathroom").style.visibility="hidden";
								document.getElementById("txtbathroom").value='';
								document.getElementById("bathroommsg").style.display = 'none';
								document.getElementById("bathroommsg").style.visibility="hidden";
								
								document.getElementById("balcony").style.display = 'none';
								document.getElementById("balcony").style.visibility="hidden";
								document.getElementById("txtbalcony").value='';
								document.getElementById("balconymsg").style.display = 'none';
								document.getElementById("balconymsg").style.visibility="hidden";
								
						
							}
							
						}
						
						
					
						
						function covsom()
						{
  								var txtcovfrom,txtcovrate,txtcovamt,a;
								//txtcovto = document.getElementById("txtcovto").value;
								txtcovfrom = document.getElementById("txtcovfrom").value;
								//area = (txtcovto - txtcovfrom )
  								txtcovrate  = document.getElementById("txtcovrate").value;
  								txtcovamt  = document.getElementById("txtcovamt").value;
 							    document.getElementById("txtcovamt").value = (txtcovfrom * txtcovrate);
						}
						function plotsom()
						{
  								var txtplotfrom,txtcovrate,txtplotamt;
								//txtplotto = document.getElementById("txtplotto").value;
								txtplotfrom = document.getElementById("txtplotfrom").value;
								//area = (txtplotto - txtplotfrom )
  								txtplotrate  = document.getElementById("txtplotrate").value;
  								txtplotamt  = document.getElementById("txtplotamt").value;
 							    document.getElementById("txtplotamt").value = (txtplotfrom * txtplotrate);
						}
						function carpetsom()
						{
  								var txtcarpetfrom,txtcarpetrate,txtcarpetamt;
								//txtcarpetto = document.getElementById("txtcarpetto").value;
								txtcarpetfrom = document.getElementById("txtcarpetfrom").value;
								//area = (txtcarpetto - txtcarpetfrom )
  								txtcarpetrate  = document.getElementById("txtcarpetrate").value;
  								txtcarpetamt  = document.getElementById("txtcarpetamt").value;
 							    document.getElementById("txtcarpetamt").value = (txtcarpetfrom * txtcarpetrate);
						}
						
		</script>

<script type="text/javascript" >

 function checkCiname(frm)
{
	var obj=document.getElementById('ddlcity1');
  	var cname = frm.ddlcity.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlcity.selectedIndex=='0') 
	{
   		error='Select any one city name!';
   		frm.ddlcity.focus();
  	}
  	if (error)
	{
   	frm.ddlcity.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkAname(frm)
{
	var obj=document.getElementById('ddlarea1');
  	var cname = frm.ddlarea.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlarea.selectedIndex=='0') 
	{
   		error='Select any one street!';
   		frm.ddlarea.focus();
  	}
  	if (error)
	{
   	frm.ddlarea.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPostpro(frm)
{
	var obj=document.getElementById('ddlpost1');
  	var cname = frm.ddlpost.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlpost.selectedIndex=='0') 
	{
   		error='Select any one purpose for posting property!';
   		frm.ddlpost.focus();
  	}
  	if (error)

	{
   	frm.ddlpost.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkProtype(frm)
{
	var obj=document.getElementById('ddlptype1');
  	var cname = frm.ddlptype.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlptype.selectedIndex=='0') 
	{
   		error='Select any one property type!';
   		frm.ddlptype.focus();
  	}
  	if (error)
	{
   	frm.ddlptype.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
// function checkProname(frm)
//{
//	var obj=document.getElementById('ddlprop1');
//  	var cname = frm.ddlprop.value;
//  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
//  	var error=false;
//  	obj.innerHTML='';
//  	if (frm.ddlprop.selectedIndex=='0') 
//	{
//   		error='Select any one property name!';
//   		frm.ddlprop.focus();
//  	}
//  	if (error)
//	{
//   	frm.ddlprop.focus();
//   	obj.innerHTML=error;
//   	return false;
//  	}
//  	return true;
// }
 function checkCoverarea(frm)
{
	var obj=document.getElementById('txtcover1');
  	var cname = frm.txtcovfrom.value;
	//var cname1=frm.txtcovto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Cover area is required!';
   		frm.txtcovfrom.focus();
		//frm.txtcovto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	//else if (!p.test(cname1))
//	{
//   error="Only digits are allowed";
//  	}
  	if (error)
	{
   frm.txtcovfrom.focus();
		//frm.txtcovto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCoverarearate(frm)
{
	var obj=document.getElementById('txtcovrate1');
  	var cname = frm.txtcovrate.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Cover area rate is required!';
   		frm.txtcovrate.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcovrate.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCoverareaamt(frm)
{
	var obj=document.getElementById('txtcovamt1');
  	var cname = frm.txtcovamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Cover area amount is required!';
   		frm.txtcovamt.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcovamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPlotarea(frm)
{
	var obj=document.getElementById('txtplot1');
  	var cname = frm.txtplotfrom.value;
	//var cname1=frm.txtplotto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Plot/Land area is required!';
   		frm.txtplotfrom.focus();
		//frm.txtplotto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	//else if (!p.test(cname1))
//	{
//   error="Only digits are allowed";
//  	}
  	if (error)
	{
   frm.txtplotfrom.focus();
		//frm.txtplotto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPlotarearate(frm)
{
	var obj=document.getElementById('txtplotrate1');
  	var cname = frm.txtplotrate.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Plot area rate is required!';
   		frm.txtplotrate.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtplotrate.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPlotareaamt(frm)
{
	var obj=document.getElementById('txtplotamt1');
  	var cname = frm.txtplotamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Plot area amount is required!';
   		frm.txtplotamt.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtplotamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCarpetarea(frm)
{
	var obj=document.getElementById('txtcarpet');
  	var cname = frm.txtcarpetfrom.value;
	//var cname1=frm.txtcarpetto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Carpet area is required!';
   		frm.txtcarpetfrom.focus();
		//frm.txtcarpetto.focus();
  	}  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}	
  	if (error)
	{
   frm.txtcarpetfrom.focus();
		//frm.txtcarpetto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCarpetarearate(frm)
{
	var obj=document.getElementById('txtcarpetrate1');
  	var cname = frm.txtcarpetrate.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Carpet area rate is required!';
   		frm.txtcarpetrate.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcarpetrate.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCarpetareaamt(frm)
{
	var obj=document.getElementById('txtcarpetamt1');
  	var cname = frm.txtcarpetamt.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Carpet area amount is required!';
   		frm.txtcarpetamt.focus();
		
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtcarpetamt.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 
 function checkBudget(frm)
{
	var obj=document.getElementById('txtbudget');
  	var cname = frm.txtbudgetmin.value;
	var cname1=frm.txtbudgetmax.value;
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Property budget is required!';
   		frm.txtbudgetmin.focus();
		frm.txtbudgetmax.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtbudgetmin.focus();
		frm.txtbudgetmax.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkLocality(frm)
{
	var obj=document.getElementById('ddllocality1');
  	var cname = frm.ddllocality.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddllocality.selectedIndex=='0') 
	{
   		error='Select any one property locality!';
   		frm.ddllocality.focus();
  	}
  	if (error)
	{
   	frm.ddllocality.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 
 function checkPprice(frm)
{
	var obj=document.getElementById('txtprice1');
  	var cname = frm.txtprice.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Property price is required!';
   		frm.txtprice.focus();
		
  	}
	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtprice.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkExrent(frm)
{
	var obj=document.getElementById('txtexrent1');
  	var cname = frm.txtexrent.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Expected rent is required!';
   		frm.txtexrent.focus();
		
  	}
	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtexrent.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkExprice(frm)
{
	var obj=document.getElementById('txtexprice1');
  	var cname = frm.txtexprice.value;
	
  	var p = /^[a-z0-9]+[_.-]?[0-9-,]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Expected price is required!';
   		frm.txtexprice.focus();
		
  	}	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtexprice.focus();
		
   	obj.innerHTML=error;	
   	return false;
  	}
  	return true;
 }
 function checkTimerent(frm)
{
	var obj=document.getElementById('txttrent1');
  	var cname = frm.txttrent.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Timeperiod is required!';
   		frm.txttrent.focus();
		
  	}
	if (frm.ddltime.selectedIndex=='0') 
	{
   		error='Select any one timeperiod!';
   		frm.ddltime.focus();
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txttrent.focus();
	frm.ddltime.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPrent(frm)
{
	var obj=document.getElementById('txtprent1');
  	var cname = frm.txtprent.value;
	
  	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Purpose for renting is required!';
   		frm.txtprent.focus();
		
  	}
  	else if (!p.test(cname))
	{
   error="Only characters are allowed";
  	}
	
  	if (error)
	{
   frm.txtprent.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkSreason(frm)
{
	var obj=document.getElementById('txtsreason1');
  	var cname = frm.txtsreason.value;
	
  	var p = /^[a-z0-9]+[_.-]?[a-z- ]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Selling reason is required!';
   		frm.txtsreason.focus();
		
  	}
	
  	
  	else if (!p.test(cname))
	{
   error="Only characters are allowed";
  	}
	
  	if (error)
	{
   frm.txtsreason.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkTypeseller(frm)
{
	var obj=document.getElementById('ddltypeseller1');
  	var cname = frm.ddltypeseller.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddltypeseller.selectedIndex=='0') 
	{
   		error='Select any one type of seller!';
   		frm.ddltypeseller.focus();
  	}
  	if (error)
	{
   	frm.ddltypeseller.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPbuy(frm)
{
	var obj=document.getElementById('ddlbpurpose1');
  	var cname = frm.ddlbpurpose.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlbpurpose.selectedIndex=='0') 
	{
   		error='Select any one purpose for buying property!';
   		frm.ddlbpurpose.focus();
  	}
  	if (error)
	{
   	frm.ddlbpurpose.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkUprop(frm)
{
	var obj=document.getElementById('txtuprop1');
  	var cname = frm.txtuprop.value;
	
  	var p = /^[a-z0-9]+[_.-]?[a-z- ]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Use of property is required!';
   		frm.txtuprop.focus();
		
  	}
	
  	
  	else if (!p.test(cname))
	{
   error="Only characters are allowed";
  	}
	
  	if (error)
	{
   frm.txtuprop.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkBtime(frm)
{
	var obj=document.getElementById('ddlbuytime1');
  	var cname = frm.ddlbuytime.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlbuytime.selectedIndex=='0') 
	{
   		error='Select any one timeframe for buying propery!';
   		frm.ddlbpurpose.focus();
  	}
  	if (error)
	{
   	frm.ddlbuytime.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkSerbuy(frm)
{
	var obj=document.getElementById('ddlserbuy1');
  	var cname = frm.ddlserbuy.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlserbuy.selectedIndex=='0') 
	{
   		error='Select any one seriousness for buying property!';
   		frm.ddlserbuy.focus();
  	}
  	if (error)
	{
   	frm.ddlserbuy.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkTran(frm)
{
	var obj=document.getElementById('ddltransaction1');
  	var cname = frm.ddltransaction.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddltransaction.selectedIndex=='0') 
	{
   		error='Select any one transaction type!';
   		frm.ddlserbuy.focus();
  	}
  	if (error)
	{
   	frm.ddltransaction.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkOwner(frm)
{
	var obj=document.getElementById('ddlownership1');
  	var cname = frm.ddlownership.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlownership.selectedIndex=='0') 
	{
   		error='Select any one Ownership!';
   		frm.ddlserbuy.focus();
  	}
  	if (error)
	{
   	frm.ddlownership.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPoss(frm)
{
	var obj=document.getElementById('ddlpossession1');
  	var cname = frm.ddlpossession.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlpossession.selectedIndex=='0') 
	{
   		error='Select any one possession of property!';
   		frm.ddlpossession.focus();
  	}
  	if (error)
	{
   	frm.ddlpossession.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPage(frm)
{
	var obj=document.getElementById('ddlage1');
  	var cname = frm.ddlage.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlage.selectedIndex=='0') 
	{
   		error='Select any one age of property!';
   		frm.ddlage.focus();
  	}
  	if (error)
	{
   	frm.ddlage.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkBedroom(frm)
{
	var obj=document.getElementById('txtbedroom1');
  	var cname = frm.txtbedroom.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Bedroom no. is required!';
   		frm.txtbedroom.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbedroom.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkBathroom(frm)
{
	var obj=document.getElementById('txtbathroom1');
  	var cname = frm.txtbathroom.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Bathroom no. is required!';
   		frm.txtbathroom.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbathroom.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
function checkBalcony(frm)
{
	var obj=document.getElementById('txtbalcony1');
  	var cname = frm.txtbalcony.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Balcony no. is required!';
   		frm.txtbalcony.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbalcony.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
function checkFloor(frm)
{
	var obj=document.getElementById('txtfloor');
  	var cname = frm.txtfloorfrom.value;
	var cname1=frm.txtfloorto.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' || cname1 == '') 
	{
   		error='Floor no. is required!';
   		frm.txtfloorfrom.focus();
		frm.txtfloorto.focus();
  	}
  	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	else if (!p.test(cname1))
	{
   error="Only digits are allowed";
  	}
  	if (error)
	{
   frm.txtfloorfrom.focus();
		frm.txtfloorto.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkBuilding(frm)
{
	var obj=document.getElementById('txtbuilding1');
  	var cname = frm.txtbuilding.value;
	
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Building no. is required!';
   		frm.txtbuilding.focus();
		
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtbuilding.focus();
		
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFfeature(frm)
{
	var obj=document.getElementById('ddlffeature1');
  	var cname = frm.ddlffeature.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlffeature.selectedIndex=='0') 
	{
   		error='Select any one flat feature!';
   		frm.ddlffeature.focus();
  	}
  	if (error)
	{
   	frm.ddlffeature.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFloring(frm)
{
	var obj=document.getElementById('ddlfloring1');
  	var cname = frm.ddlfloring.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlfloring.selectedIndex=='0') 
	{
   		error='Select any one floring!';
   		frm.ddlfloring.focus();
  	}
  	if (error)
	{
   	frm.ddlfloring.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkDfacing(frm)
{
	var obj=document.getElementById('ddldfacing1');
  	var cname = frm.ddldfacing.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddldfacing.selectedIndex=='0') 
	{
   		error='Select any one directional facing!';
   		frm.ddldfacing.focus();
  	}
  	if (error)
	{
   	frm.ddldfacing.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFacing(frm)
{
	var obj=document.getElementById('ddlfacing1');
  	var cname = frm.ddlfacing.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlfacing.selectedIndex=='0') 
	{
   		error='Select any one facing!';
   		frm.ddlfacing.focus();
  	}
  	if (error)
	{
   	frm.ddlfacing.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkFurniture(frm)
{
	var obj=document.getElementById('ddlfurniture1');
  	var cname = frm.ddlfurniture.value;
  	//var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (frm.ddlfurniture.selectedIndex=='0') 
	{
   		error='Select any one furniture detail!';
   		frm.ddlfurniture.focus();
  	}
  	if (error)
	{
   	frm.ddlfurniture.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
function checkDishigh(frm)
{
	var obj=document.getElementById('txtdisthigh1');
  	var cname = frm.txtdisthigh.value;
  	var p = /^[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '' ) 
	{
   		error='Distance from highway is required!';
   		frm.txtdisthigh.focus();
		
  	}
	if (frm.ddldistance.selectedIndex=='0') 
	{
   		error='Select any one distance type!';
   		frm.ddldistance.focus();
  	}
	
  	else if (!p.test(cname))
	{
   error="Only digits are allowed";
  	}
	
  	if (error)
	{
   frm.txtdisthigh.focus();
	frm.ddldistance.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkPername(frm)
{
	var obj=document.getElementById('txtpname1');
  	var cname = frm.txtpname.value;
  //var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Person name is required!';
   		frm.txtpname.focus();
  	}
  	if (error)
	{
   	frm.txtpname.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
  function checkEmail(frm)
{
	var obj=document.getElementById('txtemail1');
  	var cname = frm.txtemail.value;  	
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Email Address is required!';
   		frm.txtemail.focus();
  	}
	else if(reg.test(cname) == false)
	{
   		error="Enter Valid Email";
  	}
  	if (error)
	{
   	frm.txtemail.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }

 function checkCadd(frm)
{
	var obj=document.getElementById('txtcadd1');
  	var cname = frm.txtcadd.value;
  //	var p = /^[a-z0-9]+[_.-]?[a-z]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Company address is required!';
   		frm.txtcadd.focus();
  	}
  	if (error)
	{
   	frm.txtcadd.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 function checkCno(frm)
{
	var obj=document.getElementById('txtcontactno1');
  	var cname = frm.txtcontactno.value;
  	var p = /^[a-z0-9]+[_.-]?[0-9]+$/i;
  	var error=false;
  	obj.innerHTML='';
  	if (cname == '') 
	{
   		error='Company contact no is required!';
   		frm.txtcontactno.focus();
  	}
	else if (!p.test(cname))
	{
   		error="Only digits are allowed";
  	}
	else if (cname.length != 10) 
	{
    error="Contact should be 10 digits long";
  	}
  	if (error)
	{
   	frm.txtcontactno.focus();
   	obj.innerHTML=error;
   	return false;
  	}
  	return true;
 }
 
// alert(document.getElementById("ddlpost").value);
  
	function validate() 
 	{ 
	if(document.getElementById("ddlpost").value=="Sell")
		{
			var type = document.getElementById("ddlptype");
			var value = type.selectedIndex;
			var name = type.options[value].text;
			if(name=="Semi-Detached" || name=="Townhouse" || name=="Condominium")
 			{
			var form = document.forms['frm'];
 			var ary=[checkCiname,checkAname,checkPostpro,checkProtype,checkPprice,checkBathroom,checkBedroom,checkBalcony,checkPername,checkEmail,checkCadd,checkCno];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
			else if(name=="Vacant Land")
 			{
				var form = document.forms['frm'];
 				var ary=[checkCiname,checkAname,checkPostpro,checkProtype,checkPprice,checkPername,checkEmail,checkCadd,checkCno];
 				var rtn=true;
 				var z0=0;
 				for (var z0=0;z0<ary.length;z0++)
				{
  					if (!ary[z0](form))
  					{
    					rtn=false;
  					}
 				}
 				return rtn;
			}
			else
			{
				var form = document.forms['frm'];
 			var ary=[checkCiname,checkAname,checkPostpro,checkProtype,checkPprice,checkBathroom,checkBedroom,checkBalcony,checkPername,checkEmail,checkCadd,checkCno];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;
  				}
 			}
 			return rtn;
			}
		}
		else 
		{
			var form = document.forms['frm'];
 			var ary=[checkCiname,checkAname,checkPostpro,checkProtype,checkPprice,checkPername,checkEmail,checkCadd,checkCno];
 			var rtn=true;
 			var z0=0;
 			for (var z0=0;z0<ary.length;z0++)
			{
  				if (!ary[z0](form))
  				{
    				rtn=false;					
  				}
 			}
 			return rtn;
		}
		
	}

</script>
<script language="javascript">
function gfe_list(d_n, f_n, fm) 
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



                 <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF">
<form action="property_process.php" method="post" name="frm" id="frm" onsubmit="return validate();" enctype="multipart/form-data">
<?php
	$page = "Add";	
?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
	<tr>
                            <td width="25%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Property Details</strong></td>
                                    </tr>
                                </table></td>            
                              
                                  
                                </tr>
    <tr>
        <td>
        	<table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">           
         
          <tr>
          	<td colspan="3" class="black11" align="left"><strong>Property Details</strong></td>
          </tr>
          
          <tr>
			<td width="388" align="left" class="black9">Country Name</td>
            <td width="5" align="center" class="black9">:</td>
            <td width="956" class="black9">
            <input type="hidden" name="ddlcountry" id="ddlcountry" value="Canada" />Canada
            	
            </td>
         </tr>
         <tr>
            <td align="left"></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlcountry1"></span></td>
        </tr>
         <tr>
			<td width="388" align="left" class="black9">Province</td>
            <td width="5" align="center" class="black9">:</td>
            <td class="black9">
           <input type="hidden" name="ddlstate" id="ddlstate" value="Ontario" />Ontario            	
            </td>
         </tr>
         <tr>
            <td align="left"></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlstate1"></span></td>
        </tr>         
       <tr>
			<td width="388" align="left" class="black9">City</td>
            <td width="5" align="center" class="black9">:</td>
            <td class="black9">
            	<select name="ddlcity" id="ddlcity" style="width:230px"  class="black9" onchange="gfe_list('ajaxareaidprop','findareaprop.php',frm);">
								<option value="">Select City</option>
								<?php		 
		                                          // $qry="select * from property_state_master";
												  	//if($_REQUEST["action"]=="edit")
													//{
								$qry="select DISTINCT * from rm_city_master"; 
														
													 $res=mysql_query($qry);									               
													 while($arr=mysql_fetch_array($res))
													 
		  							    {
										?>
										<option value="<?php echo $arr['rm_city_id']; ?>" ><?php echo $arr['rm_city_title']; ?></option>
                                       <?php
		                                             
		                                           }//}
                                           ?>
				</select>
            </td>
         </tr>
          <tr>
            <td align="left"></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
			<td width="388" align="left" class="black9">Street Name</td>
            <td width="5" align="center" class="black9">:</td>
            <td class="black9">
             <div id="ajaxareaidprop">
            	<select name="ddlarea" id="ddlarea" style="width:230px"  class="black9" onchange="getAreacode(this.value)">
								<option value="">Select Street</option>
								
				</select>
                </div>
            </td>
         </tr>
          <tr>
            <td align="left"></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlcity1"></span></td>
        </tr>
         <tr>
			<td width="388" align="left" class="black9">Postal Code</td>
            <td width="5" align="center" class="black9">:</td>
            <td class="black9">
            <input type="text" name="areacode" readonly="readonly" id="areacode" class="black9" value="<?php echo $areacode; ?>" />
            	
            </td>
         </tr>
         <tr>
            <td align="left"></td>
            <td></td>
            <td class="validationmsg" ><span id="ddlarea1"></span></td>
        </tr>
        <tr>
          
          <tr>
          	<td width="388" align="left" class="black9">Post Property For</td>
            <td width="5" align="center" class="black9">:</td>
            <td class="black9">Sell
            <input type="hidden" name="ddlpost" id="ddlpost" value="Sell" />
            </td>
          </tr>
          <tr>
          	<td align="left"></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlpost1" ></span></td>
         </tr>
         
								
          <tr>
          	<td width="388" align="left" class="black9">Property Type</td>
            <td width="5" align="center" class="black9">:</td>
            <td class="black9">
            	<select name="ddlptype" id="ddlptype" style="width:230px" class="black9" onchange="loadPropName(this.value)">
								<option value="">Select Property Type</option>
								<?php		 
		  							$qry="select * from property_type_master";
							
								
                                   
		  							$res=mysql_query($qry);
		 							 while($arr=mysql_fetch_array($res))
		  							{
									?>
										<option value="<?php echo $arr['property_type_id']; ?>" ><?php echo $arr['property_type_name']; ?></option>
                                     <?php
		      							
		  							}
								?>
						</select>
                       
                      
             </td>
          </tr>
          <tr>
          	<td align="left"></td>
            <td></td>
       		<td class="validationmsg" ><span id="ddlptype1" ></span></td>
         </tr>
                
        <tr>
           <td width="388" align="left" class="black9">Property Price</td>
           <td width="5" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtprice" id="txtprice" class="black9" size="40" >                 
           </td>
        </tr>
        <tr>
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtprice1"></span></td>
        </tr>
        
		 <tr align="left" id="additionalmsg" >
          	<td colspan="3" class="black11"><strong>Additional Details</strong></td>
          </tr>
        	<tr id="bedroom">
           <td width="388" align="left" class="black9">Bedroom </td>
           <td width="5" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtbedroom" id="txtbedroom" class="black9" size="40" >
				               
           </td>
        </tr>
        <tr id="bedroommsg">
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbedroom1" ></span></td>
        </tr>
        
        <tr id="bathroom">
           <td width="388" align="left" class="black9">Bathroom </td>
           <td width="5" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtbathroom" id="txtbathroom" class="black9" size="40" > 
				               
           </td>
        </tr>
        <tr id="bathroommsg" >
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbathroom1"></span></td>
        </tr>
        <tr id="balcony">
           <td width="388" align="left" class="black9">Balconies </td>
           <td width="5" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtbalcony" id="txtbalcony" class="black9" size="40" >              
           </td>
        </tr>
        <tr id="balconymsg">
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtbalcony1"></span></td>
        </tr>  
          <tr>
          	<td colspan="3" class="black11" align="left"><strong>Contact Details</strong></td>
          </tr>
         
        <tr>
           <td width="200" align="left" class="black9">Person Name </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtpname" class="black9" size="40" >             
           </td>
        </tr>
        <tr>
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtpname1" ></span></td>
        </tr>
        <tr>
           <td width="200" align="left" class="black9">Email Address </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtemail" class="black9" size="40">              
           </td>
        </tr>
        <tr>
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtemail1"></span></td>
        </tr>      
        <tr>
           <td width="200" align="left" class="black9">Address </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<textarea class="black9" name="txtcadd" rows="3" cols="37"></textarea>          
           </td>
        </tr>
        <tr>
             <td align="left"></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcadd1"></span></td>
        </tr>
        
        
        
         <tr>
           <td width="200" align="left" class="black9">Contact No </td>
           <td width="10" align="center" class="black9">:</td>
           <td class="black9">
           		<input type="text" name="txtcontactno" class="black9" size="40" maxlength="10">                 
           </td>
        </tr>
        <tr>
             <td></td>
             <td></td>
             <td class="validationmsg" ><span id="txtcontactno1"></span></td>
        </tr>    
   		<tr>
     		<td height="10" colspan="3" align="right" class="black9"></td>
        </tr>
     	<tr></tr>
   		<tr>
 			<td align="right" class="black9">&nbsp;</td>
      		<td align="center" class="black9">&nbsp;</td>
        	<td class="black9">
           
            				<input name="add" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Add" />
                            <a href="home.php?pageno=24"><input name="back" type="button" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Back" /></a>
            			
         
            
            </td>
       </tr>
       	<tr>
       		<td height="10" colspan="3" align="right" class="black9"></td>
   		</tr>
      </table>
     </td>
   </tr>
</table>
</form>
     </td></tr></table>
          
                     <!-- main ends here  -->
            
    