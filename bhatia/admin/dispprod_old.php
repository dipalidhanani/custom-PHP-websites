<?php 
session_start();
include('config.inc.php'); 
require("Database.class.php");
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect();
$pro=$_REQUEST['pro']; ?>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
                  <tr>
                    <td align="right" valign="top">&nbsp;</td>
                    <td align="left" valign="middle">Select All</td>
                  <tr>
                   <?php 
				$br=mysql_query("select * from prod_mst where Is_Active=1 and Brand_Id='".$pro."' order by Prod_Id");
				$rows=mysql_affected_rows();
				$count=1;
				while($n=mysql_fetch_array($br))
				{
				?>
                    <td width="30" align="right" valign="top">&nbsp;<input type="checkbox" name="prod[]" id="<?php echo $n['Prod_Id']; ?>" value="<?php echo $n['Prod_Id']; ?>" /></td>
                    <td align="left" valign="middle"><?php echo $n['Prod_Name']; ?></td>
                   <?php if($count%3==0) { ?> 
                   <tr><td colspan="2">&nbsp;</td></tr>
                   <?php } ?>
                <?php $count++; } ?>    
                </tr>
                   <tr>
                     <td colspan="6" style="border-bottom:1px dotted;"></td>
                   </tr>
                   <tr>
                     <td colspan="6">&nbsp;</td>
                   </tr>
                </table>
