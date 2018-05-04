<link href="css/css.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0"  cellpadding="0" cellspacing="0">
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td style="background-color:#000; height:1px"></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="center" class="black10">
  <a href="index.php">Home</a> | 
  <a href="index.php?page=11">About Naughty Paa Ji</a> | 
  <a href="commic_book_list.php">Archive Comics</a> | 
  <a href="index.php?page=4">Contact us</a> |
   <a href="index.php?page=17">Disclaimer</a> | 
  <a href="index.php?page=18">Privacy Policy</a> | 
  <a href="index.php?page=19">Terms Of Use</a></td>
</tr>

<?php 
$query_visitors=mysql_query("select * from visitors_mast where visitors_ip='".$_SERVER['REMOTE_ADDR']."' order by visitors_id") or die(mysql_error());

$result_visitors=mysql_fetch_array($query_visitors);

if(mysql_num_rows($query_visitors)==0)
{
	
$query="insert into  visitors_mast(visitors_ip,visitors_date) values('".$_SERVER['REMOTE_ADDR']."',NOW())";
$result=mysql_query($query)
or die(mysql_error());
	
$id=mysql_insert_id();

	$visitors=$id;
}
else
{
	
	
	$query_visitors=mysql_query("select * from visitors_mast order by visitors_id desc LIMIT 1") or die(mysql_error());
	
	$result_visitors=mysql_fetch_array($query_visitors);

	$visitors=$result_visitors['visitors_id'];
	
}

?>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td align="center" class="black10">Copyright &copy; 2012 Naughty Paaji - All rights reserved | Designed & Developed by - <strong><a href="http://indoushosting.com" target="_blank">V3+ Web Solutions</a></strong> &nbsp;|&nbsp;Join Us On &nbsp;<a href="http://www.facebook.com/pages/Naughty-Paa-Ji/269860203116880#!/pages/Naughty-Paa-Ji/269860203116880?fref=ts" target="_blank"><img src="images/fb.png" align="absmiddle"  border="0" height="32" width="32"/></a>&nbsp;&nbsp;|&nbsp;&nbsp;Visitors : <strong class="title"><?php echo $visitors; ?></strong></td>
</tr>
</table>

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35868388-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
