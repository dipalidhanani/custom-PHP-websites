<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");

?>		 

<table width="100%" border="0" cellspacing="0" cellpadding="0">             
				
                  <tr>
                  
                  <td class="black10">
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                          <tr>
                           
                            <td align="left" valign="top" ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                <tr>
                                  <td colspan="2" align="left" class="black10"><strong>Feedback Details</strong> </td>
                                </tr>
                                <tr>
                                  <td width="19%" align="left" class="black10">Name : </td>
                                  <td width="81%" align="left" class="black10"><?php print($_REQUEST["user_name"]); ?></td>
                              </tr>
                                <tr>
                                  <td align="left" class="black10">Mobile No : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["mobile"]); ?></td>
                              </tr>
                                <tr>
                                  <td align="left" class="black10">E-Mail : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["email"]); ?></td>
                              </tr>
                                <tr>
                                  <td align="left" valign="top" class="black10">Requirements / Comments : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["comments"]); ?></td>
                              </tr>
                                
                      

                            </table></td>
                        
                          </tr>
                          <tr><td height="10"></td></tr>
                         <tr>
                                  <td colspan="2" align="left" valign="top" class="black10">Thanks & Regards,</td>
                              </tr>
                               <tr>
                                  <td colspan="2" align="left" valign="top" class="black10">Klassic Kids Team</td>
                              </tr>
                        </table>
                  
                  </td>
                 </tr>
         
                        </table></td>
                      
                      </tr>
                     
                  </table>
