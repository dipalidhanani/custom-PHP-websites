<HTML>
<HTML>
<HEAD>
<TITLE>Transaction Failure Page</TITLE>
</HEAD>
<BODY>
<center>

<b><font size=5 color="red"> Transaction Failed </font> </b>

<br><br><br>

<?php
echo "<font size=3 color=blue>";
echo "<b><br>";
$strMessage =  isset($_GET['message']) ? $_GET['message'] : '';
$strMTRCKID =  isset($_GET['ME_TX_ID']) ? $_GET['ME_TX_ID'] : '';

?>

<TABLE align=center border=1  bordercolor=black><tr><td>
<TABLE align=center border=0  bordercolor=black><tr><td>

		<TR>
			<TD colspan="2" align="center">
				<FONT size="4"><B> Transaction Failed  </B></FONT>
			</TD>
		</TR>
		<TR>
			<TD colspan="2" align="center">
				<HR>
			</TD>
		</TR>

		<TR>
			<TD width="40%">Your Transaction Status</TD>
			<TD><?php echo $strMessage;?></TD>
		</TR>


		<TR>
			<TD>Merchant Reference. No:[TrackID]: </TD>
			<TD><?php echo $strMTRCKID;?></TD>
		</TR>
	
		</td></tr></table></td></tr>
		</table>
</b>
</center>
</HTML>  
<!-- 
Disclaimer:- Important Note in Sample Pages
- This is a sample demonstration page only ment for demonstration, this page 
should not be used in production
- Transaction data should only be accepted once from a browser at the point 
of input, and then kept in a way that does not allow others to modify it 
(example server session, database  etc.)
- Any transaction information displayed to a customer, such as amount, should 
be passed only as display information and the actual transactional data should 
be retrieved from the secure source last thing at the point of processing the transaction.
- Any information passed through the customer's browser can potentially be 
modified/edited/changed/deleted by the customer, or even by third parties to 
fraudulently alter the transaction data/information. Therefore, all transaction 
information should not be passed through the browser to Payment Gateway in a way
that could potentially be modified (example hidden form fields). 
-->

