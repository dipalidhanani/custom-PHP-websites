<?php



session_start();



require_once("include/config.php");



require_once("include/function.php");



u_Connect("cn");







if(($_REQUEST["paymentmethod"]=="")||($_REQUEST["paymentmethod"]==0))



{



	$paymentmethodtitle="Paypal";



}



if($_REQUEST["paymentmethod"]==1)



{



	$paymentmethodtitle="Net Banking";



}



elseif($_REQUEST["paymentmethod"]==2)



{



	$paymentmethodtitle="Cheque";



}



elseif($_REQUEST["paymentmethod"]==3)



{



	$paymentmethodtitle="Cash";



}



elseif($_REQUEST["paymentmethod"]==4)



{



	$paymentmethodtitle="Demand Draft";



}



?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title>Welcome to SQ Jeans - Admin Panel</title>



<link rel="stylesheet" href="css/css.css" type="text/css" />



</head>







<body>







      



<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">



  <tr>



    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">



      <tr>



        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>



      </tr>



      



      



      <tr>



        <td bgcolor="#FFFFFF">         



<table width="100%" border="0" cellpadding="0">







<tr><td bgcolor="#FFFFFF">







<table width="99%" border="0" cellspacing="10" cellpadding="0" >



    



    <tr>



            <td class="normal_fonts14_black"><?php echo $paymentmethodtitle;?> Orders</td>



    </tr>



     <tr>



       <td align="center" class="normal_fonts12_black"><table width="100%" border="0" cellspacing="0" cellpadding="0">



         <tr>



           <td width="40%" align="center"><table border="0" cellspacing="5" cellpadding="0" class="border">



             <form action="orders.php" method="get" name="orderform" id="orderform">



               <tr>



                 <td align="left">Search by Invoice :</td>



                 <td align="left"><input type="text" name="invoice" value="<?php echo $_REQUEST["invoice"];?>" class="normal_fonts9"/></td>



                 <td align="left">



                 <input type="hidden" name="paymentmethod" value="<?php echo $_REQUEST["paymentmethod"]?>" />



                 <input type="submit" name="submit" value="Submit" /></td>



               </tr>



             </form>



           </table></td>



           <td width="5%" align="center">OR</td>



           <td align="center"><table border="0" cellspacing="5" cellpadding="0" class="border">



             <form action="orders.php" method="get" name="orderform" id="orderform">



               <tr>



                 <td align="left">Search by Order Status:</td>



                 <td align="left" class="normal_fonts10"><table width="100%" border="0" cellspacing="5" cellpadding="0">



                      <tr>



                    <td align="left"><input name="orderstatus" type="radio" value="0" <?php if($_REQUEST["orderstatus"]!="") { if($_REQUEST["orderstatus"]==0) { ?> checked="checked" <?php } }?> /></td>



                    <td align="left">Pending</td>



                    <td align="left"><input name="orderstatus" type="radio" value="1" <?php if($_REQUEST["orderstatus"]==1) { ?> checked="checked" <?php } ?>/></td>



                    <td align="left">Completed</td>



                    <td align="left"><input name="orderstatus" type="radio" value="2" <?php if($_REQUEST["orderstatus"]==2) { ?> checked="checked" <?php } ?>/></td>



                    <td align="left">Cancelled</td>



                  </tr>



                    </table></td>



                 <td align="left">



                 <input type="hidden" name="paymentmethod" value="<?php echo $_REQUEST["paymentmethod"]?>" />



                 <input type="submit" name="submit" value="Submit" /></td>



               </tr>



             </form>



           </table></td>



         </tr>



       </table></td>



     </tr>



     <tr>



       <td bgcolor="#CCCCCC">



  <?php 



if($_REQUEST["paymentmethod"]=="")



{



	$paymentmethod=0;



}  



else



{



	$paymentmethod=$_REQUEST["paymentmethod"];



}







if(($_REQUEST["invoice"]=="")&&($_REQUEST["orderstatus"]==""))



{



	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and (bill_payment_status='Completed' or bill_payment_status='Pending') order by bill_master_ID desc ";



}



if($_REQUEST["orderstatus"]!="")



{



	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and bill_order_completed='".$_REQUEST["orderstatus"]."' and  (bill_payment_status='Completed' or bill_payment_status='Pending') order by bill_master_ID desc ";



}



if($_REQUEST["invoice"]!="")



{



	$query="select * from bill_master where bill_payment_type='".$paymentmethod."' and bill_invoice_no='".$_REQUEST["invoice"]."' and  (bill_payment_status='Completed' or bill_payment_status='Pending') order by bill_master_ID desc ";



}











if($_REQUEST["pagenum"]=="")



					{



						$pagenum = 1;



					}



					else



					{



						$pagenum=$_REQUEST["pagenum"];



					}



					



					$data = mysql_query($query);



    				$rows1 = mysql_num_rows($data);	


					$page_rows = 100;



   



					$last = ceil($rows1/$page_rows);



				  



					if ($pagenum < 1)



					{



					$pagenum = 1;



					}



					elseif ($pagenum > $last)



					{



					$pagenum = $last;



					}



				



				   if($rows1!="")



				   {



					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 



				   }



					



					$qmax=$query.$max;



					



					$res = mysql_query($qmax) or die(mysql_error());	







?>



<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">



<tr>



  <td width="5%" align="center" valign="middle" bgcolor="#999999"><strong>No.</strong></td>



<td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>



                <td width="12%" align="center" valign="middle" bgcolor="#999999"><strong>Payment Status</strong></td>



                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Invoice No</strong></td>



                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Total Amt</strong></td>



                <td align="left" valign="middle" bgcolor="#999999"><strong>Location</strong></td>



                <td width="12%" align="center" valign="middle" bgcolor="#999999"><strong>Datetime</strong></td>



                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Order Status</strong></td>



                <td width="10%" align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>



</tr>



<?php 



$i=1;



$totorders=mysql_num_rows($res);



if($rows1>0)



{



while($row=mysql_fetch_array($res))



{



 if($i%2!=0)



{



	$bg="#FFFFFF";



}



else 



{



	$bg="#F3F3F3";



} 



		



?>



<tr>



  <td align="center" bgcolor="<?php echo $bg;?>"><?php echo $totorders;?></td>



<td bgcolor="<?php echo $bg;?>"><?php  echo $row["bill_name_user"]."<br/>".$row["bill_email_id"];?></td>



<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["bill_payment_status"];?></td>



<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["bill_invoice_no"];?></td>



<td align="center" bgcolor="<?php echo $bg;?>">$<?php echo $row["bill_final_amount"];?></td>



<td bgcolor="<?php echo $bg;?>"><?php



$recordsetshipping = mysql_query("select * from bill_shipping_address where shipping_bill_master_ID='".$row["bill_master_ID"]."'");								



                                while($rowshipping = mysql_fetch_array($recordsetshipping))



                                {



									echo $rowshipping["shipping_user_state"].", ".$rowshipping["shipping_user_country"];



								}



								?></td>



<td align="center" bgcolor="<?php echo $bg;?>"><?php 



	$datetime=$row["bill_payment_transaction_recieve_datetime"];



	$datetime=explode(" ",$datetime);



	$date=$datetime[0];



	$date=explode("-",$date);



	$year=$date[0];



	$mon=$date[1];



	$day=$date[2];



	$date=$day."-".$mon."-".$year;



	$datetime=$date." ".$datetime[1];



	echo $datetime;?></td>



<td width="80" align="center" bgcolor="<?php echo $bg;?>">



<?php



if($row["bill_order_completed"]==0)



{



	echo "Pending";



}



elseif($row["bill_order_completed"]==1)



{



	echo "Completed";



}



elseif($row["bill_order_completed"]==2)



{



	echo "Cancelled";



}



?></td>



<td bgcolor="<?php echo $bg;?>" width="80"> 



  <table width="80" border="0" cellspacing="0" cellpadding="0">



    <tr>



      <td align="center"><a href="orderdetails.php?invoice=<?php echo $row["bill_invoice_no"]; ?>"><img src="images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a></td>



      <td align="center"><a href="orderstatus.php?invoice=<?php echo $row["bill_invoice_no"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>



      </tr>



  </table></td>



</tr>







<?php



$totorders--;		  $i++; }



		  



		   }



				else



				{



					$err="No Record Found";



				?>



				<tr>



					<td colspan="17" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>



				</tr>



				<?php



				}



		  



		  ?>



</table></td></tr>



<tr><td>



<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">



<tr>



  <td align="center" class="normal_fonts9">



    <?php 



if($rows1!=0)



{



if ($pagenum == 1)



{



}



else



{



?>



    <a href='orders.php?pagenum=1&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>' > << first      </a>



    <a href='orders.php?pagenum=<?php echo $pagenum-1; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'>Previous      </a>	



    <?php



}



if ($pagenum == $last) 



				{



					if($pagenum ==1)



					{



						$pagenum=1;



					}



					else



					{



					



					if($last-100>100)



					{



						$v=$last-100;						



					}



					else



					{



						$v=1;



					}



												



					for($i=$v;$i<=$last;$i++)



				{				



				?>				



    <a href='orders.php?pagenum=<?php echo $i; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'><?php echo $i; ?></a> | 



    <?php



				}		



				}		



				}



				else 



				{	



					if($pagenum<100)



					{



					    if($last>100)



						{



							$pageupto=100;



						}



						else



						{



							$pageupto=$last;



						}



						



						for($i=1;$i<=$pageupto;$i++)



						{				



						?>				



    <a href='orders.php?pagenum=<?php echo $i; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'><?php echo $i; ?></a> |



    <?php



						}		



					}



					else



					{



					



						for($i=$pagenum-5;$i<=$pagenum+5;$i++)



						{



						if($i<=$last)



						{				



						?>				



    <a href='orders.php?pagenum=<?php echo $i; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'><?php echo $i; ?></a> |



    <?php



						}



						}



					}



				 }



				 



			   ?>



    <?php



				if ($pagenum == $last)



				{



				}



				else



				{



			?>



    <a href='orders.php?pagenum=<?php echo $pagenum+1; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'>Next</a>&nbsp;&nbsp;



    <a href='orders.php?pagenum=<?php echo $last; ?>&paymentmethod=<?php echo $_REQUEST["paymentmethod"];?>'>Last >> </a>	



    <?php



				}



			}



				?>    </td>



</tr> 



    </table></td></tr>       



</table>



</td></tr></table>		</td>



      </tr>



    </table></td>



  </tr>



  <tr>



    <td><?php include("footer.php");?></td>



  </tr>



</table>



 



</body>



</html>