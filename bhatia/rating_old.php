<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>votedemo</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
$(".like").click(function()
{
var id=$(this).attr("id");
var name=$(this).attr("name");
var dataString = 'id='+ id + '&name='+ name;
$("#votebox").slideDown("slow");

$("#flash").fadeIn("slow");

$.ajax
({
type: "POST",
url: "rating.php",
data: dataString,
cache: false,
success: function(html)
{
$("#flash").fadeOut("slow");
$("#content").html(html);
} 
});
});

$(".close").click(function()
{
$("#votebox").slideUp("slow");
});

});
</script>
<style>

body
{
font-family:Arial, Helvetica, sans-serif;
font-size:13px;

}
a
{
text-decoration:none
}
a:hover
{
text-decoration:none

}
#votebox
{
border:solid 1px #dedede; padding:3px;
display:none;
padding:15px;
width:230px;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
}
.close
{
color:#333
}


#greebar
{
float:left;
background-color:#aada37;
border:solid 1px #698a14;
width:0px;
height:12px;
}
#redbar
{
float:left;
background-color:#cf362f;
border:solid 1px #881811;
width:0px;
height:12px;
}

#flash
{
display:none;
font-size:10px;
color:#666666;
}
#close
{
float:right; font-weight:bold; padding:3px 5px 3px 5px; border:solid 1px #333;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
}
h1
{
font-family:'Georgia', Times New Roman, Times, serif;
font-size:36px;
color:#333333;
}
</style>
</head>

<body>
<div style="margin:50px">
<a href="#" class="like" id="1" name="up">Like</a> -- <a href="#" class="like" id="1" name="down">Dislike</a>
<div id="votebox">
<span id='close'><a href="#" class="close" title="Close This">X</a></span>
<div style="height:13px">
<div id="flash">Loading........</div>
</div>
<div id="content">
</div>

</div>
</div>
</body>
</html>
