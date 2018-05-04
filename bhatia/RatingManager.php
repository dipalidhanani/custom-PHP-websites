<?php

// Database related constants.
define('RATING_DATABASE_NAME', 'bhatiamo_db');
define('RATING_TABLE_NAME', 'items_ratings');

// Star Rating system scale. 
define('RATING_SCALE', 5);

// Star images dairecotry.
define('RATING_IMAGES_DIR', 'rating_me/images');

class RatingManager {
	
	private static $instance = null;
	private static $mysqlHandler = null;
	
	/*
	 * constructor - private to support singelton  
	 */
	private function __construct() {}
	
	/*
	 * Function initializes the database connection for rating system
	 * 
	 * If you already have mysql connection created, use that connection for rating system as well
	 * Example:
	 * 
	 * global $mysqlConnection;
	 * RatingManager::$mysqlHandler = $mysqlConnection;
	 *  
	 */
	private static function initializeRating() {
		if (RatingManager::$mysqlHandler != null) {
			return;
		}
		
		RatingManager::$mysqlHandler = mysql_connect('localhost', 'bhatiamo_dbuser', 'mobiledb8587');
		
		if (!RatingManager::$mysqlHandler) {
			RatingManager::debug("Can't connect to database. Error: " . mysql_error());
			return;
		}
		
		if(!mysql_select_db(RATING_DATABASE_NAME, RatingManager::$mysqlHandler)) {
			RatingManager::debug("Can't select database. Error: " . mysql_error());
			return;
		}
	}
	
	/*
	 * 
	 * @public
	 * @static
	 * 
	 * Call function if you need class instance
	 * 
	 */
	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new RatingManager();
		}
		
		return self::$instance;
	}
	
	/*
	 * Fetches current rating from database
	 * Pass the item ID and will return the rating for that item
	 */
	public static function fetchCurrentRating($itemID) {
		if (!is_numeric($itemID) || $itemID <= 0) {
			self::debug("Invalid itemID: '$itemID'");
			return false;
		}
		
		RatingManager::initializeRating();
		
		if (RatingManager::$mysqlHandler == null) {
			RatingManager::debug("Database connection error.");
			return;
		}
		
		$sql = "SELECT sum(rating) sum, count(ID) count from " . RATING_TABLE_NAME . " WHERE item_id = $itemID";
		
		$result = mysql_query($sql, RatingManager::$mysqlHandler);
		
		if ($result === false) {
			RatingManager::debug("Database query error while fetching ratings for item: $itemID");
			return;
		}
		
		$result = mysql_fetch_object($result);
		
		$sum = $result->sum;
		$count = $result->count;
		
		if ($count == 0) {
			return array('rating' => 0, 'count' => $count);
		}
		
		$rating = $sum / $count;
		
		return array('rating' => $rating, 'count' => $count);
		
	}
	
	/*
	 * Show the rating selection grid for the item
	 */
	public static function drawRatingSelection($itemID) {
		if (!is_numeric($itemID) || $itemID <= 0) {
			self::debug("Invalid itemID: '$itemID'");
			return false;
		}
						
		for($i = 1; $i <= RATING_SCALE; $i++) {
			print RatingManager::drawRatingImage($itemID, $i);
		}
		
		require_once("javascript.php");
		
	}
	
	/*
	 * Private function to draw the rating selection image.
	 */
	private static function drawRatingImage($itemID, $value) {
		$image = '<img id="image_' . $itemID . '_' . $value . '" src="' . RATING_IMAGES_DIR . '/star1.gif"  onmouseover="highlightRatingStar(' . $itemID . ', ' . $value . ')" onmouseout="normalRatingStar(' . $itemID . ', ' . $value . ')" onclick="setItemRating(' . $itemID . ', ' . $value . ')">';
		return $image;
	}
	
	/*
	 * @public
	 * @static
	 * 
	 * Function to show the current rating for item
	 */
	public static function drawItemRating($itemID, $drawContainer = true) {
		if (!is_numeric($itemID) || $itemID <= 0) {
			self::debug("Invalid itemID: '$itemID'");
			return false;
		}
		
		$ratings = RatingManager::fetchCurrentRating($itemID);
		
		$rating = $ratings['rating'];
		$totalRatings = $ratings['count'];
		
		if ($drawContainer) {
			print '<div id="itemRating_' . $itemID . '">';
		}
		
		for($i = 0; $i <= $rating - 1; $i++) {
			print '<img src="' . RATING_IMAGES_DIR . '/star3.gif" height="16px" width="16px">';			
		}
		
		// rating is highest
		if ($rating == RATING_SCALE) {
			if ($drawContainer) {
				print "</div>";
			}
			return;
		}
		
		// fractional rating
		if ($i != $rating) {
			print '<img src="' . RATING_IMAGES_DIR . '/star2.gif" height="16px" width="16px">';
			$i++;
		}
		
		for($i; $i < RATING_SCALE; $i++) {
			print '<img src="' . RATING_IMAGES_DIR . '/star1.gif" height="16px" width="16px">';			
		}
		
		if ($drawContainer) {
			print "</div>";
		}
	}
	
	
	/*
	 * @public
	 * 
	 * Function saves the rating for item
	 * 
	 * @param $itemID itemID for which rating has to be saved
	 * @param $rating rating selected for item
	 */
	public static function saveRating($itemID, $rating) {
		if (!is_numeric($itemID) || $itemID <= 0) {
			self::debug("Invalid itemID: '$itemID'");
			return false;
		}
		
		if (!is_numeric($rating) || $rating <= 0 || $rating > RATING_SCALE) {
			self::debug("Invalid rating: '$rating'");
			return false;
		}
		
		RatingManager::initializeRating();
		if (RatingManager::$mysqlHandler == null) {
			RatingManager::debug("Database connection error.");
			return false;
		}
		
		
		
		if ( isset($_SERVER["REMOTE_ADDR"]) )    {
    		$ip = $_SERVER["REMOTE_ADDR"];
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    {
    		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    {
    		$ip = $_SERVER["HTTP_CLIENT_IP"];
		} 
		
		$sql = "INSERT INTO " . RATING_TABLE_NAME . " (item_id, rating, rater_ip) VALUES ($itemID, $rating, '$ip');";

		$result = mysql_query($sql, RatingManager::$mysqlHandler);
		
		if ($result === false) {
			RatingManager::debug("Database query error while saving ratings for item: $itemID");
			return false;
		}
		
		return true;
	}
	
	
	/*
	 * @private
	 * 
	 * Function to bebug the messages
	 */
	private static function debug($message) {
		//print $message . "<br>";
	}
	
	
}
?>