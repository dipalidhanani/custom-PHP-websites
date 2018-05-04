<form id="fabricform" name="fabricform" method="post" action="select_fabricprocess.php">
<?php 
if($_SESSION['sqjeansloginuseremail']!="")
    {
			unset($_SESSION['sqjeanscart']);
			unset($_SESSION['cartno']);
	}
?>
<table width="100%"  background="images/pgbg02a.jpg" border="0" cellpadding="0" cellspacing="5"  class="border3">
<tr>
<td>
<a href="select_fabricprocess.php?fabric_for=1&display_order_for=1" onclick="document.fabricform.submit()"><img src="images/men.jpeg" width="314" height="400" /></a>
</td><td>
<a href="select_fabricprocess.php?fabric_for=2&display_order_for=2" onclick="document.fabricform.submit()"><img src="images/woman.jpg" width="314" height="400" /></a>
</td>

</tr>
                    <tr>

                      <td align="center" class="font10">
                     <a href="select_fabricprocess.php?fabric_for=1&display_order_for=1" onclick="document.fabricform.submit()"><img src="images/for_men.png" width="67" height="25" alt="For Men" /></a>
                     <!-- <input type="radio" name="fabric_for" id="fabric_for" value="1" checked="checked">For Men-->
                      </td>
                       <td align="center" class="font10">
                  <a href="select_fabricprocess.php?fabric_for=2&display_order_for=2" onclick="document.fabricform.submit()"><img src="images/for_women.png" width="88" height="25" alt="For Women" /></a>
                    <!--  <input type="radio" name="fabric_for" id="fabric_for" value="2">For Women     -->               
                      </td>
                      </tr>
                     

                    </table>
 </form>