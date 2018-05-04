<?php 
session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn"); ?>


<?php
$m=1;
$md=0;
if($_REQUEST["selectedjeanstype"]==1){

					$query1="SELECT * FROM measurement_master where measurement_available=1 and measurement_ID ='".$_GET["mid"]."'";			

						 $recordsetmeasurement1 = mysql_query($query1);

						 while($rowmeasurement1 = mysql_fetch_array($recordsetmeasurement1,MYSQL_ASSOC))

						 {
							 
							 
							 /*?><img src="images/QuestionMark.gif" width="19" height="19" border="0" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $rowmeasurement["measurement_name"];?> - Make My Jeans' })" style="cursor:pointer;"/>

                          <div class="highslide-maincontent"><?php */?>

                            <table border="0" cellspacing="0" cellpadding="5" >

                              <tr>

                                <td valign="top"><img src="images/measurement/makemyjeans/<?php echo $rowmeasurement1["measurement_make_image"];?>" alt="<?php echo $rowmeasurement1["measurement_name"];?>" title="<?php echo $rowmeasurement1["measurement_name"];?>" border="0" style="max-height:400px;  height: expression(this.height &gt; 400 ? 400: true); max-width:350px;  width: expression(this.width &gt; 350 ? 350: true);"/></td>
	</tr>
    <tr>
                                <td valign="top">

								<?php

                    				displayeditorvalue($rowmeasurement1["measurement_make_desc"]);

                    			?></td>

                              </tr>

                            </table>
                            
  <?php } }
  
  if($_REQUEST["selectedjeanstype"]==2){
	  $query2="SELECT * FROM measurement_master where measurement_available=1 and measurement_ID ='".$_GET["mid"]."'";			

						 $recordsetmeasurement2 = mysql_query($query2);

						 while($rowmeasurement2 = mysql_fetch_array($recordsetmeasurement2,MYSQL_ASSOC))

						 {
  ?>

                            <table border="0" cellspacing="0" cellpadding="5" >

                              <tr>

                                <td valign="top"><img src="images/measurement/copyajeans/<?php echo $rowmeasurement2["measurement_copy_image"];?>" alt="<?php echo $rowmeasurement2["measurement_name"];?>" title="<?php echo $rowmeasurement2["measurement_name"];?>" border="0" style="max-height:400px;  height: expression(this.height &gt; 400 ? 400: true); max-width:350px;  width: expression(this.width &gt; 350 ? 350: true);"/></td>
</tr>
<tr>
                                <td valign="top"><?php

                    displayeditorvalue($rowmeasurement2["measurement_copy_desc"]);

                    ?></td>

                              </tr>

                            </table>

                         <!-- </div>-->
                          
                          

                         <?php } } /*?> How to Measure &quot;<?php echo $rowmeasurement["measurement_name"];?>&quot;<?php */?>