<?php 
session_start();
include('config.inc.php'); 
require("Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
$offer=$_REQUEST['offer'];
$price=$_REQUEST['price'];
?>
<input type="text" name="oamt" value="
<?php 

						  if($offer!='' && $offer!='0')
						  {
							  $offerdetail=$db->dbselect("select * from offer where OfferId='".$offer."' and Offer_Type='Discount' and IsActive=1");
							  if(mysql_affected_rows()>0)
  							  $offerdetail=$db->dbselect1("select * from offer where OfferId='".$offer."' and Offer_Type='Discount' and IsActive=1");
							  $offercount=mysql_affected_rows();
						 	 if($offercount>0)
							 {
								   $today=date("Y-m-d"); 		
								  if(strtotime($today)>=strtotime($offerdetail['StartDate']) && strtotime($today)<=strtotime($offerdetail['EndDate']))
								  { 
									  if($offerdetail['AmountType']=='Persentage')
									  {
										  $amount=$price;
										  $offeramount=$offerdetail['Amount'];
										  $type=100;										  
										  $resultcalc=(($amount*$offeramount)/$type);
										  $resultf=(($amount)-($resultcalc));
										  echo $offeramount=$resultcalc;
									  }
									  else
									  {
										  $amount=$price;
										  echo $offeramount=$offerdetail['Amount'];
										  $resultf=($amount-$offeramount);
									  }									
						  		}
								else  { echo $offeramount='0.00'; }
						  	}
						  }
						  else
						  {
							  echo $offeramount='0.00';
						  }
						  ?>
" size="15" readonly="readonly" style="text-align:right" class="normal_fonts9" />

