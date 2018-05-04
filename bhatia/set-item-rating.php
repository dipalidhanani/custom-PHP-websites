<?php
$itemID = $_POST['itemId'];
$rating = $_POST['rating'];
require_once('RatingManager.php');

$status = RatingManager::saveRating($itemID, $rating);

if ($status === false) {
	exit;
}
?>
<html>
<head>
<script type="text/javascript">
function bodyLoaded() {
	if (!parent.document.getElementById('itemRating_<?php print $itemID; ?>')) {
		return;
	}
	parent.document.getElementById('itemRating_<?php print $itemID; ?>').innerHTML = document.getElementById('bodyContainer').innerHTML;
	document.getElementById('bodyContainer').innerHTML = '';
}
</script>

</head>
<body onLoad="return bodyLoaded();" id="bodyContainer">
<?php
RatingManager::drawItemRating($itemID, false);
?>
</body>
</html>