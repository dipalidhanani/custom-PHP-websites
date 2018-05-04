<?php
require_once("include/config.php");
?>		 

<table width="100%" border="0" cellspacing="0" cellpadding="0">              
				 
                  <tr>
                  
                  <td class="normal_fonts10">
                  
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                         
                          <tr>
                           
                            <td align="left" valign="top" ><table width="100%" border="0" cellspacing="3" cellpadding="3">
                                <tr>
                                  <td colspan="2" align="left"  class="normal_fonts10"><strong>Your Details</strong> </td>
                                </tr>
                                <tr>
                                  <td width="17%" align="left" class="normal_fonts10">Name : </td>
                                  <td width="83%" align="left" class="normal_fonts10"><?php print($_REQUEST["user_name"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" class="normal_fonts10">Mobile No : </td>
                                  <td align="left" class="normal_fonts10"><?php print($_REQUEST["mobile"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" class="normal_fonts10">E-Mail : </td>
                                  <td align="left" class="normal_fonts10"><?php print($_REQUEST["email"]); ?></td>
                                </tr>
                                <tr>
                                  <td align="left" valign="top" class="normal_fonts10">Requirements / Comments : </td>
                                  <td align="left" class="normal_fonts10"><?php print($_REQUEST["comments"]); ?></td>
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
