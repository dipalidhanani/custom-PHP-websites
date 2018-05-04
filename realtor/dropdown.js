function getXMLHTTP() { 

var xmlhttp=false; 

try{

xmlhttp=new XMLHttpRequest();

}

catch(e) { 

try{ 

xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

}

catch(e){

try{

xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

}

catch(e1){

xmlhttp=false;

}

}

}



return xmlhttp;

}

function getAreacode(area) { 

var strURL="findareacode.php?area="+area;

var req = getXMLHTTP();



if (req) {



req.onreadystatechange = function() {

if (req.readyState == 4) {

// only if "OK"

if (req.status == 200) { 

document.getElementById('areacode').value=req.responseText; 

} else {

alert("Error:\n Cannot Proccess Area Code Find request.\n Please Contact the website admin about this error.");

}

} 

} 

req.open("GET", strURL, true);

req.send(null);

}



}
function getAreacode_right(areaid) { 

var strURL="findareacode.php?area="+areaid;

var req = getXMLHTTP();



if (req) {



req.onreadystatechange = function() {

if (req.readyState == 4) {

// only if "OK"

if (req.status == 200) { 

document.getElementById('txtareacode').value=req.responseText; 

} else {

alert("Error:\n Cannot Proccess Area Code Find request.\n Please Contact the website admin about this error.");

}

} 

} 

req.open("GET", strURL, true);

req.send(null);

}



}

function getArea(city) { 
alert(city);
var strURL="findarea.php?city="+city;
alert(strURL);
var req = getXMLHTTP();
if (req) {
req.onreadystatechange = function() {
if (req.readyState == 4) {
// only if "OK"
if (req.status == 200) { 
document.getElementById('areaid').innerHTML=req.responseText; 
} else {
alert("Error:\n Cannot Proccess Area Find request.\n Please Contact the website admin about this error.");
}
} 
} 

req.open("GET", strURL, true);

req.send(null);

}
}



function getAreaprop(city) { 
var strURL="findarea.php?city="+city;

var req = getXMLHTTP();



if (req) {



req.onreadystatechange = function() {

if (req.readyState == 4) {

// only if "OK"

if (req.status == 200) { 

document.getElementById('ddlarea').innerHTML=req.responseText; 

} else {

alert("Error:\n Cannot Proccess Area Find request.\n Please Contact the website admin about this error.");

}

} 

} 

req.open("GET", strURL, true);

req.send(null);

}
}



function getProp(prop) { 

var strURL="findprop.php?prop="+prop;

var req = getXMLHTTP();



if (req) {



req.onreadystatechange = function() {

if (req.readyState == 4) {

// only if "OK"

if (req.status == 200) { 

document.getElementById('ddlprop').innerHTML=req.responseText; 

} else {

alert("Error:\n Cannot Proccess Area Find request.\n Please Contact the website admin about this error.");

}

} 

} 

req.open("GET", strURL, true);

req.send(null);

}
}








