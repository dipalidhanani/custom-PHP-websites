<script language="javascript">
var ratingImageDir = '<?php print RATING_IMAGES_DIR; ?>';

function highlightRatingStar(item, value) {
	//	Replaces the star image when selected. 
	for(var y=1; y <= value; y++) {
		document.getElementById('image_' + item + '_' + y).src = ratingImageDir + "/star3.gif";
	}
}

function normalRatingStar(item, value) {
	//	Replaces the star image when unselected.
	for(var y=1; y <= value; y++)	{
		document.getElementById('image_' + item + '_' + y).src = ratingImageDir + "/star1.gif";
	}
}

function setItemRating(item, value) {
	document.getElementById('itemId').value = item;
	document.getElementById('rating').value = value;
	document.forms['itemRatingForm'].submit();
}
</script>
<div style="display: none; width: 0px; height: 0px;">
<img src="<?php print RATING_IMAGES_DIR; ?>/star3.gif">
<img src="<?php print RATING_IMAGES_DIR; ?>/star2.gif">
</div>

<form name="itemRatingForm" method="post" action="set-item-rating.php" target="setRatingIFrame">
	<input name="rating" id="rating" type="hidden">
	<input name="itemId" id="itemId" type="hidden">
</form>
<iframe style="display: none; width: 0px; height: 0px;" id="setRatingIFrame" name="setRatingIFrame"></iframe>