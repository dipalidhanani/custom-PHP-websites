<link rel="stylesheet" href="css/fluid.thumbs.css" type="text/css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/fluid.thumbs.js"></script>
		
<table width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
   <div id="thumb-tray">
		<ul id="thumb-list">
 <?php  $qmenu1=mysql_query("select * from bike_mast order by bike_display_order");		
	
		while($rowmenu1=mysql_fetch_array($qmenu1))
		{ ?>
<li><a href="products-1.php?bikeid=<?php echo $rowmenu1["Bike_id"]; ?>">
<img src="bike_photos/<?php echo $rowmenu1["Bike_thumb_photo"]; ?>" alt="<?php echo $rowmenu1["Bike_name"]; ?>" border="0" />
</a></li>
<?php } ?>
</ul>
		</ul>
		<div id="thumb-prev"><a href="javascript:void(0);"><img src="images/left.png" width="15" height="80" border="0"/></a></div>
		<div id="thumb-next"><a href="javascript:void(0);"> <img src="images/right.png" width="15" height="80" border="0" /></a></div>
	</div>
</div>
    </td>
  </tr>
</table>