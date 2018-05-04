<?php

session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Welcome to SQ Jeans - Admin Panel</title>

<link rel="stylesheet" href="css/css.css" type="text/css" />

<?php

require_once("include/files.php");

?>

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

            <td class="normal_fonts14_black">Registered Users</td>

    </tr>

     <tr>

       <td bgcolor="#CCCCCC">

  <?php 



$query="select * from register_master order by register_ID desc ";



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

				

				   

					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 

					

					

					$qmax=$query.$max;

					

					$res = mysql_query($qmax);	



?>

<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">

<tr>

<td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>

                <td align="left" valign="middle" bgcolor="#999999"><strong>Email</strong></td>

                <td align="left" valign="middle" bgcolor="#999999"><strong>Password</strong></td>

                <td align="left" valign="middle" bgcolor="#999999"><strong>Location</strong></td>

                <td align="left" valign="middle" bgcolor="#999999"><strong>Mobile no</strong></td>

                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>

</tr>

<?php 

$i=1;



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

<td bgcolor="<?php echo $bg;?>"><?php  echo $row["register_user_first_name"]." ".$row["register_user_last_name"];?></td>

<td bgcolor="<?php echo $bg;?>"><?php echo $row["register_user_email"];?></td>

<td bgcolor="<?php echo $bg;?>"><?php echo base64_decode($row["register_user_password"]);?></td>

<td bgcolor="<?php echo $bg;?>"><?php echo $row["register_user_state"].", ".$row["register_user_country"];?></td>

<td bgcolor="<?php echo $bg;?>"><?php echo $row["register_user_mobile"];?></td>

<td bgcolor="<?php echo $bg;?>" width="80"> 

  <table width="80" border="0" cellspacing="0" cellpadding="0">

    <tr>

      <td align="center"><img src="images/zoom.png" alt="View" width="20" height="20" border="0" title="View" onclick="return hs.htmlExpand(this, { headingText: '<?php  echo $row["register_user_first_name"]." ".$row["register_user_last_name"];?>' })" style="cursor:pointer;"/>

      <div class="highslide-maincontent">

        <table width="100%" border="0" cellpadding="5" cellspacing="0">

              

              <tr>



                          <td width="30%" align="right" valign="top" class="normal_fonts9" >First Name   </td>

                          <td class="normal_fonts9">:</td>

                          <td width="69%" class="normal_fonts9"><?php  echo $row["register_user_first_name"];?></td>

                        </tr>

                        <tr>

                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Last Name   </td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $row["register_user_last_name"];?></td>

                        </tr>
						<tr>

                          <td align="right" valign="top" class="normal_fonts9" >Date of Birth  </td>

                          <td class="normal_fonts9">:</td>

                          <td class="normal_fonts9"><?php  echo $row["register_date_of_birth"];?></td>

                        </tr>
                        <tr>

                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Gender  </td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $row["register_gender"];?></td>

                        </tr>
                        <tr>

                          <td align="right" valign="top" class="normal_fonts9" >Address  </td>

                          <td class="normal_fonts9">:</td>

                          <td class="normal_fonts9"><?php  echo $row["register_user_address"];?></td>

                        </tr>

                        <tr>



                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Address (Cntd.) </td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $row["register_user_address_2"];?></td>

                        </tr>

                        <tr>

                          <td align="right" valign="top" class="normal_fonts9" >City  </td>

                          <td class="normal_fonts9">:</td>

                          <td class="normal_fonts9"><?php  echo $row["register_user_city"];?></td>

                        </tr>



                        <tr>

                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >State / Province   </td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $row["register_user_state"];?></td>

                        </tr>

                        <tr>

                          <td align="right" valign="top" class="normal_fonts9" >Post Code </td>

                          <td class="normal_fonts9">:</td>

                          <td class="normal_fonts9"><?php  echo $row["register_user_pincode"];?></td>

                        </tr>



                        <tr>

                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Country  </td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                        <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $row["register_user_country"];?></td>

                        </tr>

                        <tr>

                          <td align="right" valign="top" class="normal_fonts9" >Email Address  </td>

                          <td width="1%" class="normal_fonts9">:</td>

                          <td class="normal_fonts9"><?php  echo $row["register_user_email"];?></td>

                        </tr>

                        <tr>

                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Phone&nbsp;</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo $row["register_user_phone"];?></td>

                        </tr>

                        <tr>

                          <td align="right" valign="top" class="normal_fonts9" >Mobile </td>

                          <td class="normal_fonts9">:</td>

                          <td class="normal_fonts9"><?php  echo $row["register_user_mobile"];?></td>

                        </tr>

                         <tr>

                          <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9" >Password  </td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                          <td bgcolor="#F3F3F3" class="normal_fonts9"><?php  echo base64_decode($row["register_user_password"]);?></td>

                        </tr>

                        

              <tr>

                <td height="10" colspan="4" align="right" class="normal_fonts9"></td>

              </tr>

            </table>    

      </div>      </td>

      </tr>

  </table></td>

</tr>



<?php

		  $i++; }

		  

		   }

				else

				{

					$err="No Record Found";

				?>

				<tr>

					<td colspan="14" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>

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

    <a href='registeredusers.php?pagenum=1' > << first      </a>

    <a href='registeredusers.php?pagenum=<?php echo $pagenum-1; ?>'>Previous      </a>	

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

    <a href='registeredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 

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

    <a href='registeredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |

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

    <a href='registeredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |

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

    <a href='registeredusers.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;

    <a href='registeredusers.php?pagenum=<?php echo $last; ?>'>Last >> </a>	

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