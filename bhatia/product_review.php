<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 10;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;

	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="virtuemart.css" type="text/css">



<title>Untitled Document</title>

<link href="css/css1.css" rel="stylesheet" type="text/css" />

<link href="pagination/style2.css" rel="stylesheet" type="text/css" />

</head>

<body>
<script language="javascript">
var xmlHttp
function show_first_brand(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="review_brand.php";
url=url+"?is_brand="+str;
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML="";
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
</script>

<script language="javascript">
function validation()
{
	if(document.getElementById('sel_brand').value=='')
	{
		alert('Please select brand');
		return false;
	}
	if(document.getElementById('sel_product').value=='')
	{
		alert('Please select product');
		return false;
	}
	if(document.getElementById('txtname').value=='')
	{
		alert('Please enter your name');
		return false;
	}
	if(document.getElementById('txtemail').value=='')
	{
		alert('Please enter your email address');
		return false;
	}
	if(document.getElementById('txtemail').value!='')
	{
			var x=document.getElementById('txtemail').value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert('please enter valid email address');
				return false;
			}
	}
	if(document.getElementById('comment').value=='')
	{
		alert('Please enter your comment');
		return false;
	}
	
	
}
		
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_01.jpg" width="5" height="41" /></td>

                <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>

                    <td height="6" colspan="3" align="left" valign="middle"></td>

                  </tr>

                  <tr>

                    <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>

                    <td class="title">Product Review</td>
                    <td align="right" valign="middle" class="title"><form action="index.php" method="get" name="frmsearchme" id="frmsearchme">
                    <input type="hidden" name="pageno" value="16" />
                      <table width="350" border="0" align="right" cellpadding="2" cellspacing="0" class="title_10">
                        <tr>
                          <td align="right" valign="middle" class="title_10">Search Model No</td>
                          <td width="10" align="center" valign="middle">:</td>
                          <td align="left" valign="middle"><input type="text" name="model" id="model" /></td>
                          <td align="left" valign="middle"><input type="submit" name="submit" value="Search" style="background-color:#CCC;border:1px solid;" /></td>
                        </tr>
                      </table>
                    </form></td>

                  </tr>

                </table></td>

                <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td align="left" valign="top">

           

            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>

                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding:5px;">
<?php
if($_REQUEST['model']!='')
{
	$query="SELECT review_mst.Review_Id,review_mst.Name,review_mst.Description ,review_mst.Dt,review_mst.Prod_Id,review_mst.Is_Approve,prod_mst.Prod_Id,prod_mst.Prod_Name,prod_mst.Is_Active FROM review_mst,prod_mst WHERE prod_mst.Is_Active=1 and prod_mst.Prod_Name like '%".$_REQUEST['model']."%' and prod_mst.Prod_Id=review_mst.Prod_Id and review_mst.Is_Approve=1";
}	
else
{
	$query="SELECT * FROM review_mst WHERE Is_Approve=1 ORDER BY Review_Id desc";
}

$rows=mysql_num_rows(mysql_query($query));
$count=1;
$result=$db->pagingLimit($query,$startpoint,$perpage);
while($di=mysql_fetch_array($result))
{
 ?>
                  <?php
		  $prod_img=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$di['Prod_Id']."' ORDER BY Disp_Order LIMIT 1");
		  $pi=mysql_fetch_array($prod_img);
		  ?>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($count!=$rows) { ?> class="border_bottom" <?php } ?>>
                      <tr>
                        <td width="100" align="center" valign="top"><a href="<?php echo $HTTP_BASE_URL; ?>index.php?pageno=17&eid=<?php echo $di['Prod_Id']; ?>" class="title_10" title="View related reviews"><img src="<?php echo HTTP_BASE_URL; ?>product/<?php echo $pi['Is_Image']; ?>" width="80" height="100" border="0" /></a></td>
                        <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td class="title_10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <?php
		  $prod_dd=mysql_query("SELECT * FROM prod_mst WHERE Prod_Id='".$di['Prod_Id']."'");
		  $pp=mysql_fetch_array($prod_dd);
		  ?>
                                <td align="left" valign="middle"><strong><a href="<?php HTTP_BASE_URL; ?>index.php?pageno=17&eid=<?php echo $di['Prod_Id']; ?>&rid=<?php echo $di['Review_Id']; ?>" class="title_10" title="View related reviews"><?php echo $pp['Prod_Name']; ?></a></strong>&nbsp;</td>
                                <td align="right" valign="middle">&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                          <tr>
                            <td valign="top" style="text-align:justify" class="title_9">
							<?php  
							$word=strlen($di['Description']);
							if($word>=250)
							{
								echo substr($di['Description'],0,250)."...";
							}
							else
							{
								echo $di['Description'];
							}
							?>&nbsp;
                            <?php if($word>=250) { ?>
                            <a href="<?php HTTP_BASE_URL; ?>index.php?pageno=18&eid=<?php echo $di['Prod_Id']; ?>&rid=<?php echo $di['Review_Id']; ?>" class="fonts8" style="text-decoration:underline;">Read More...</a>
                            <?php } ?>
                            </td>
                          </tr>
                          <tr>
                            <td valign="top" style="text-align:justify" class="fonts8">By <?php echo $di['Name']; ?> on
                              <?php $dx=split(" ",$di['Dt']);
		$date=$dx[0];
		$time=$dx[1];
		$d=split("-",$date);
		echo $final_date=$d[2]."/".$d[1]."/".$d[0]." ".$time;
		?></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td colspan="2" align="center" valign="top" height="2"></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="2"></td>
                  </tr>
                  <?php $count++; } ?>
                </table></td>

              </tr>

            </table>

          

            </td>

          </tr>
           <?php if($rows==0) { ?>
			<tr>
            <td height="35" align="center" valign="middle" class="err_msg_10">No Record found</td>
            </tr>
            <?php } ?>
	      <tr>

            <td align="center" valign="top" class="title_10">

             <?php
			$sql=$query;
			if($_REQUEST['model']!='')
			{
				$query="SELECT COUNT(*) as num FROM review_mst,prod_mst ".substr($query,202,strlen($query)) ;
			}
			else
			{
				$query="SELECT COUNT(*) as num FROM review_mst ".substr($query,15,strlen($query)) ;
			}
			if($_REQUEST['model']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=16"."&"); 
			}
			else
			{
				echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=16&model=".$_REQUEST['model']."&"); 
			}

			?>

            </td>

          </tr>
          <tr>
            <td align="center" valign="top" bgcolor="#f3f3f3" class="title_10">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" class="title_10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="middle" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="title"><span class="title_red">Write</span>Your Reviews</td>
                            <td align="right" valign="middle">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                    <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" bgcolor="#FFFFFF" >
                <form name="frmcom" method="post" action="<?php echo HTTP_BASE_URL; ?>comment_process.php" onsubmit="return validation();">
                <input type="hidden"  name="url" value="<?php echo HTTP_BASE_URL; ?>index.php?pageno=16" />
                <table width="100%" border="0" cellpadding="5" cellspacing="0" class="title_10">
                <?php if($_REQUEST['msg']=='no') { ?>
                  <tr>
                    <td colspan="3" align="center" valign="middle" class="err_msg_10">Please enter required fields value.</td>
                  </tr>
                 <?php } ?> 
                 <?php if($_REQUEST['msg']=='yes') { ?>
                  <tr>
                    <td colspan="3" align="center" valign="middle" class="err_msg_10">Thank you for your review.Your review will display after admin approval.</td>
                    </tr>
                   <?php } ?> 
                  <tr>
                    <td align="right" valign="middle">Select Brand</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><select name="sel_brand" id="sel_brand" onchange="show_first_brand(this.value);">
                      <option selected="selected" value="">Select Brand</option>
                      <?php
								 $first_query=mysql_query("SELECT * FROM brand_mst WHERE Is_Active=1 ORDER BY Name");
								 while($first_barnd=mysql_fetch_array($first_query))
								 {
								 ?>
                      <option value="<?php echo $first_barnd['Brand_Id']; ?>"><?php echo $first_barnd['Name']; ?></option>
                      <?php } ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="200" align="right" valign="middle">Select Product</td>
                    <td width="20" align="center" valign="middle">:</td>
                    <td align="left" valign="middle">
                    <div id="txtHint">
                    <select name="sel_product" id="sel_product" >
                      <option selected="selected" value="">Select Product</option>
                    </select>
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">Name</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><input type="text" name="txtname" id="txtname" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">E-Mail Address</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><input type="text" name="txtemail" id="txtemail" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top">Review</td>
                    <td align="center" valign="top">:</td>
                    <td align="left" valign="middle"><textarea name="comment" id="comment" cols="50" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">&nbsp;</td>
                    <td align="center" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle"><input type="submit" name="Submit" value="Submit" /></td>
                  </tr>
                </table>
                </form>
                </td>
              </tr>
            </table></td>
            </tr>
        </table>
		</td>
      </tr>
    </table></td>

      </tr>

    </table></td>

  </tr>

</table>

</body>

</html>