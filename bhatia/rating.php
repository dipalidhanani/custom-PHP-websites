<?php
require_once('RatingManager.php');
?>

<link href="css/css1.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="p_flies/highslide-with-html.js"></script>

<link rel="stylesheet" type="text/css" href="p_flies/highslide.css" />

<script type="text/javascript">

	hs.graphicsDir = 'p_flies/graphics/';

	hs.outlineType = 'rounded-white';

	hs.showCredits = false;

	hs.wrapperClassName = 'draggable-header';

</script>

<?php

$pr=mysql_query("select * from prod_mst where Prod_Id='".$_REQUEST['pid']."' and Is_Active=1");

$pp=mysql_fetch_array($pr);

if($pp['Offer_Id']!='' && $pp['Offer_Id']!='0') {

?>

<?php 

$off=mysql_query("select * from offer where OfferId='".$pp['Offer_Id']."' and IsActive=1");

$of=mysql_fetch_array($off);

	if($of['Offer_Type']!='Discount')

	{

?>

<a href="#" onclick="return hs.htmlExpand(this, { headingText: 'Attached Gift' })">

<img src="<?php echo HTTP_BASE_URL; ?>images/gift.png" width="130" height="36" border="0" title="See the attached Gift with the Product" alt="See the attached Gift with the Product"/></a>

<br/>

<span class="fonts8">See the attached Gift with the Product</span>

<div class="highslide-maincontent"><font color="#000000">

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td align="left" valign="middle">&nbsp;</td>

    <td align="left" valign="middle">&bull;&nbsp;<strong><?php echo $of['Offer']; ?></strong></td>

  </tr>

  <tr>

    <td align="left" valign="middle">&nbsp;</td>

    <td align="left" valign="middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $of['Description']; ?></td>

  </tr>

  <tr>

    <td width="30" align="left" valign="top">&nbsp;</td>

    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td width="110" align="left" valign="top"><strong>Free Gift :</strong></td>

        <td width="10" align="left" valign="top"><strong></strong></td>

        <td align="left" valign="top"><img src="gift/<?php echo $of['Is_Image']; ?>" border="0"/></td>

      </tr>

    </table></td>

  </tr>

</table>

</font></div>

<?php } } ?>

<br />

<br/></br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="150" border="0" align="left" cellpadding="3" cellspacing="0" class="title_10">
      <tr>
        <td width="45" align="right" valign="middle">Rate </td>
        <td width="5" align="left" valign="middle">:</td>
        <td align="left" valign="middle"><?php RatingManager::drawRatingSelection($_REQUEST['pid']); ?></td>
      </tr>
      <tr>
        <td align="right" valign="middle">Average </td>
        <td align="left" valign="middle">:</td>
        <td align="left" valign="middle"><?php

	$rate1=mysql_query("select sum(rating) as rate from items_ratings where item_id='".$_REQUEST['pid']."'") or die(mysql_error());

	$r=mysql_fetch_array($rate1);

	echo $r['rate']*5/100;

	?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="fonts10"><strong>Ships in 3 to 4 business days</strong></td>
  </tr>
</table>
<br/><br/></br>

<table width="150" border="0" align="left" cellpadding="3" cellspacing="0" class="title_10">

  <tr>

   <td>
</td>

  </tr>

</table>



