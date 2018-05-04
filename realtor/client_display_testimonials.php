<?php
require_once("include/config.php");
?>		 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  
                  <td class="black10">
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                          <tr>
                           
                            <td align="left" valign="top" ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                <tr>
                                  <td colspan="2" align="left" class="black10"><strong>Your Details</strong> </td>
                                </tr>
                                <tr>
                                  <td width="13%" align="left" class="black10">Name : </td>
                                  <td width="87%" align="left" class="black10"><?php print($_REQUEST["user_name"]); ?></td>
                                </tr>                               
                                <tr>
                                  <td align="left" class="black10">E-Mail : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["email"]); ?></td>
                                </tr>
                                 <tr>
                                  <td align="left" class="black10">Title : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["title"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" class="black10">Description : </td>
                                  <td align="left" class="black10"><?php print($_REQUEST["description"]); ?></td>
                                </tr>
                                
                      

                            </table></td>
                        
                          </tr>
                         <tr><td height="10"></td></tr>
                         <tr>
                                  <td colspan="2" align="left" valign="top" class="black10">Thanks & Regards,</td>
                              </tr>
                               <tr>
                                  <td colspan="2" align="left" valign="top" class="black10">RM Realtor Team</td>
                              </tr>
                        </table>
                  
                  </td>
                 </tr>
				
          
                        </table></td>
                      
                      </tr>
                     
                  </table>
