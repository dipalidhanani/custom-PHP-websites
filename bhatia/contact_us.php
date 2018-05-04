<?php session_start();

	require_once("admin/config.inc.php");

	require_once("admin/Database.class.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect();

	require_once ('pagination/pagination.php');

	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

	$page = ($page == 0 ? 1 : $page);

	$perpage = 3;//limit in each page

	$startpoint = ($page * $perpage) - $perpage;

	?>

<link href="css/css1.css" rel="stylesheet" type="text/css" />

<link href="pagination/style2.css" rel="stylesheet" type="text/css" />

<script language="javascript">

function validation()

{

	var flag=0

	var msg

	msg="Please Enter the folllowing Values "

	msg=msg+ "\n" + "---------------------------------------"

	if(document.getElementById('name').value=='')

	{

		flag=1;

		msg=msg + "\n" + "Please enter your name"

	}

	if(document.getElementById('country').value=='')

	{

		flag=1;

		msg=msg + "\n" + "please enter your country"

	}

	if(document.getElementById('email').value=='')
	{
		flag=1;
		msg=msg + "\n" + "please enter an email address"
	}
	if(document.getElementById('email').value!='')
	{
		var x=document.getElementById('email').value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
  			flag=1
		    msg=msg+ "\n" + "Not a valid email address"
		}	
	}

	if(document.getElementById('mobile').value=='')

	{

		flag=1;

		msg=msg + "\n" + "Please mobile no"

	}

	if(document.getElementById('desc').value=='')

	{

		flag=1;

		msg=msg + "\n" + "please enter message"

	}
	if(document.getElementById('txtcode').value=='')

	{

		flag=1;

		msg=msg + "\n" + "please enter security code"

	}
	

	if (flag==1)

	{

		alert(msg)

		return false;

	}

	else

	{

		return true;		

	}

}

</script>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                          <tr>

                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_01.jpg" width="5" height="41" /></td>

                            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                              <tr>

                                <td height="6" colspan="2" align="left" valign="middle"></td>

                              </tr>

                              <tr>

                                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>

                                <td class="title"><strong>Contact Us</strong></td>

                              </tr>

                            </table></td>

                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>

                          </tr>

                        </table></td>

                      </tr>

                      <tr>

                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">

                          <tr>

                            <td><table width="100%" border="0" cellspacing="0" cellpadding="3">

                              <tr>

                                <td width="50%" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top"><strong><span class="title_10">BHATIA'S THE Mobile one stop shop</span></strong></td>

                                  </tr>

                                  <tr>

                                    <td width="24" align="left" valign="top"><img src="<?php echo HTTP_BASE_URL; ?>images/home.png" width="20" height="20" border="0" /></td>

                                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                      <tr>

                                        <td class="title_10"><strong>Bhatia Comm. &amp; Retail(I) Pvt. Ltd</strong></td>

                                      </tr>

                                      <tr>

                                        <td class="title_10" height="5px"></td>

                                      </tr>

                                      <tr>

                                        <td><span class="title_9">Shop No. 1-2, DR Ambedkar Shopping Centre,&nbsp;Opp Kinnari Cinema,&nbsp;Ring Road,&nbsp;Surat - 395002 </span></td>

                                      </tr>

                                    </table></td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top"><img src="<?php echo HTTP_BASE_URL; ?>images/mobile.png" width="24" height="24" border="0" /></td>

                                    <td align="left" valign="top"><span class="title_9">+(91)-9825811111, 9377411111,,  +(91)-(261)-2349894 </span></td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top">&nbsp;</td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top">&nbsp;</td>

                                  </tr>

                                </table></td>

                                <td align="left" valign="top">

                                <iframe width="350" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?hl=en&amp;q=bhatia+mobile+surat+ring+road&amp;ie=UTF8&amp;hq=bhatia+mobile&amp;hnear=Ring+Rd,+Surat,+Gujarat&amp;ll=21.194708,72.843455&amp;spn=0.010723,0.013797&amp;z=14&amp;vpsrc=0&amp;iwloc=A&amp;cid=3469569813160916023&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?hl=en&amp;q=bhatia+mobile+surat+ring+road&amp;ie=UTF8&amp;hq=bhatia+mobile&amp;hnear=Ring+Rd,+Surat,+Gujarat&amp;ll=21.194708,72.843455&amp;spn=0.010723,0.013797&amp;z=14&amp;vpsrc=0&amp;iwloc=A&amp;cid=3469569813160916023&amp;source=embed" class="title_10" style="color:#0000FF;text-align:left">View Larger Map</a></small>



                                

                                </td>

                              </tr>

                              <tr>

                                <td colspan="2" align="left" valign="top" class="border_bottom"></td>

                              </tr>

                              <tr>

                                <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top"><strong><span class="title_10">BHATIA'S THE Mobile one stop shop</span></strong></td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top" class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/home.png" width="20" height="20" border="0" /></td>

                                    <td align="left" valign="top" class="title_9"> Rajhans Complex,&nbsp;Opp Pizza Hut,&nbsp;Ghoddod Road,&nbsp;Surat - 395007	&nbsp; </td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top" class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/mobile.png" width="24" height="24" border="0" /></td>

                                    <td align="left" valign="top" class="title_9"> +(91)-(261)-2663622 ,  +(91)-9377411111  </td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top">&nbsp;</td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top">&nbsp;</td>

                                  </tr>

                                </table></td>

                                <td align="left" valign="top">

                                <iframe width="350" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?hl=en&amp;q=bhatia+mobile+surat+ghod+dod+road&amp;ie=UTF8&amp;hq=bhatia+mobile&amp;hnear=Connexions+SR3,+Joggers+Park+Rd,+Athwa,+Surat,+Gujarat&amp;ll=21.179495,72.816453&amp;spn=0.03651,0.064806&amp;vpsrc=6&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?hl=en&amp;q=bhatia+mobile+surat+ghod+dod+road&amp;ie=UTF8&amp;hq=bhatia+mobile&amp;hnear=Connexions+SR3,+Joggers+Park+Rd,+Athwa,+Surat,+Gujarat&amp;ll=21.179495,72.816453&amp;spn=0.03651,0.064806&amp;vpsrc=6&amp;source=embed" class="title_10" style="color:#0000FF;text-align:left">View Larger Map</a></small>

                                </td>

                              </tr>

                              <tr>

                                <td colspan="2" align="left" valign="top" class="border_bottom"></td>

                              </tr>

                              <tr>

                                <td align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top"><strong><span class="title_10">BHATIA'S THE Mobile one stop shop</span></strong></td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top" class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/home.png" width="20" height="20" border="0" /></td>

                                    <td align="left" valign="top" class="title_9"> 6,7, Poddar Arcade,,&nbsp;Opp Khand Bazar,&nbsp;Varachha Road,&nbsp;Varachha Road,&nbsp;Surat - 395006 </td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top" class="title_9"><img src="<?php echo HTTP_BASE_URL; ?>images/mobile.png" width="24" height="24" border="0" /></td>

                                    <td align="left" valign="top" class="title_9"> +(91)-9825221007 </td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top">&nbsp;</td>

                                  </tr>

                                  <tr>

                                    <td align="left" valign="top">&nbsp;</td>

                                    <td align="left" valign="top">&nbsp;</td>

                                  </tr>

                                </table></td>

                                <td align="left" valign="top">

                                <iframe width="350" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=bhatia+mobile+surat+varachha&amp;aq=&amp;sll=21.194828,72.843564&amp;sspn=0.001438,0.001725&amp;vpsrc=6&amp;ie=UTF8&amp;hq=bhatia+mobile+surat+varachha&amp;hnear=&amp;ll=21.200763,72.843477&amp;spn=0.014245,0.006295&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=bhatia+mobile+surat+varachha&amp;aq=&amp;sll=21.194828,72.843564&amp;sspn=0.001438,0.001725&amp;vpsrc=6&amp;ie=UTF8&amp;hq=bhatia+mobile+surat+varachha&amp;hnear=&amp;ll=21.200763,72.843477&amp;spn=0.014245,0.006295" class="title_10" style="color:#0000FF;text-align:left">View Larger Map</a></small>

                                </td>

                              </tr>

                            </table></td>

                          </tr>

                          <tr>

                            <td class="border1"></td>

                          </tr>

                          <tr>

                            <td>

                            <form name="frmcontact" method="post" action="contact_process.php" onsubmit="return validation();">

                              <table width="100%" border="0" align="center" cellpadding="3" cellspacing="2" class="title_10">

                               <tr>

                                  <td colspan="3" align="center" valign="middle" class="err_msg_12" height="5"></td>

                                </tr>

                              <?php if($_REQUEST['msg']=='yes') { ?>
                                <tr>
                                  <td colspan="3" align="center" valign="middle" class="err_msg_12">Your query has been submitted successfully</td>
                                </tr>
                                <?php } ?>
                                <?php if($_REQUEST['msg']=='no') { ?>
                                <tr>
                                  <td colspan="3" align="center" valign="middle" class="err_msg_12">Please enter valid security code</td>
                                </tr>
                                <?php } ?> 
                                <?php if($_REQUEST['req']=='yes') { ?>
                                <tr>
                                  <td colspan="3" align="center" valign="middle" class="err_msg_12">Please enter required fields</td>
                                </tr>
                                <?php } ?>
                                <tr>
                                  <td align="right" valign="middle">&nbsp;</td>
                                  <td align="center" valign="middle">&nbsp;</td>
                                  <td align="right" valign="middle">* Required fields</td>
                                </tr>
                                <tr>

                                  <td width="200" align="right" valign="middle">Name *</td>

                                  <td width="10" align="center" valign="middle">:</td>

                                  <td align="left" valign="middle"><input name="name" type="text" id="name" value="<?php echo $_SESSION['txtname']; ?>"  /></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="middle">Country *</td>

                                  <td align="center" valign="middle">:</td>

                                  <td align="left" valign="middle"><input name="country" type="text" id="country" value="<?php echo $_SESSION['txtcountry']; ?>" /></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="middle">E-Mail Address *</td>

                                  <td align="center" valign="middle">:</td>

                                  <td align="left" valign="middle"><input name="email" type="text" id="email" size="30"  value="<?php echo $_SESSION['txtemail']; ?>"/></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="middle">Mobile No. *</td>

                                  <td align="center" valign="middle">:</td>

                                  <td align="left" valign="middle"><input name="mobile" type="text" id="mobile" value="<?php echo $_SESSION['txtmobile']; ?>" /></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top">Message *</td>

                                  <td align="center" valign="top">:</td>

                                  <td align="left" valign="middle"><textarea name="desc" cols="55" rows="7" class="title_10" id="desc"><?php echo $_SESSION['txtdesc']; ?></textarea></td>

                                </tr>
                                <tr>
                                  <td align="right" valign="top">Security Code *</td>
                                  <td align="center" valign="top">:</td>
                                  <td align="left" valign="middle"><span class="normal_fonts9">
                                    <input name="txtcode" type="text" class="title_10" id="txtcode" value="" size="5" />
                                  </span></td>
                                </tr>
                                <tr>
                                  <td align="right" valign="top">&nbsp;</td>
                                  <td align="center" valign="top">&nbsp;</td>
                                  <td align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>CaptchaSecurityImages.php? width=100&amp;height=40&amp;characters=5" /></td>
                                </tr>

                                <tr>

                                  <td align="right" valign="middle">&nbsp;</td>

                                  <td align="right" valign="middle">&nbsp;</td>

                                  <td align="left" valign="middle"><input name="submit" type="submit" class="title_12" value="Submit" /></td>

                                </tr>

                              </table>

                            

                            </form>

                            </td>

                          </tr>

                          

                        </table></td>

                      </tr>

                    </table>