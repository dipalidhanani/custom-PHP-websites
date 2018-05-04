<?php session_start();
	include("../include/config.php");
	$comic=mysql_query("select * from comic_book_mast where book_id='".$_REQUEST['eid']."'");
	$k=mysql_fetch_array($comic);
	$q=mysql_query("select * from comic_book_detail where book_mast_id='".$_REQUEST['eid']."' order by book_detail_id asc"); 
			  
	$totaldetails=mysql_num_rows($q); 
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script language="JavaScript">

 var count=<?php echo count($cntype)==0?"1":count($cntype);?>;
				  function addcontact(abc)
				  {
					  
					<?php 
					if(($_REQUEST['eid']=='') || ($totaldetails==0)) 
					{
						
					?>  
					  abc=abc+1;
					<?php  
					}
					?>
					  
					count1=(abc+count);					
					
				  	count=count+1;					
					
					var ldiv=document.getElementById("test"+count1);
					ldiv.style.display="block";
					if(count1==30)
					{
						var objbutton=document.getElementById("addtestbutton");
						objbutton.style.display="none";						
					}				
				  } 
</script>
<script language="javascript">


function load3(a)
{
document.getElementById("txtexist"+a).style.display = 'none';
document.getElementById("txttest"+a).style.display = '';
}

function load4(a)
{
 document.getElementById("txttest"+a).style.display = 'none';
 document.getElementById("txtexist"+a).style.display = '';
 document.getElementById("book_image"+a).value='';
}
</script>
<script language="javascript">

function validation_frm()
{
	
		
	if(document.getElementById('book_title').value=='')
	{
		
		document.getElementById('errbook_title').style.display='';
		return false;
			
	}
	
	if(document.getElementById('book_author_name').value=='')
	{
		
		document.getElementById('errbook_author_name').style.display='';
		return false;
			
	}
	
	
	
}

</script>
<script language="javascript">

function validation1(id)
{
	
	if(id==1)
	{
		if(document.getElementById('book_title').value=='')
		{
			
			document.getElementById('errbook_title').style.display='';
			
		}
		else
		{
			document.getElementById('errbook_title').style.display='none';
		}
	}
	
	if(id==2)
	{
		if(document.getElementById('book_author_name').value=='')
		{
			document.getElementById('errbook_author_name').style.display='';
			
		}
		else
		{
			document.getElementById('errbook_author_name').style.display='none';
		}
	}
	
	
	
	
}

</script>

<script language="javascript">

function check_numeric(id)
{
	if(isNaN(document.getElementById('display_order'+id).value))
	{
		alert("Please Enter Numeric Value Only!");
		
		document.getElementById('display_order'+id).value='';
		
		return false;
	}
}

</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->   
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black"><a href="comic_book.php">Comic Book Details</a></td>
            </tr>
          <tr>
            <td>
            <?php if($_REQUEST['eid']=='') { ?>
            <form name="frmcomic"  method="post" action="comic_book_process.php" enctype="multipart/form-data" onsubmit="return validation_frm();">
            <?php } else { ?>
            <form name="frmcomic"  method="post" action="comic_book_process.php?is_edit=1" enctype="multipart/form-data" onsubmit="return validation_frm();">
            <input type="hidden" name="txtid" value="<?php echo $k['book_id']; ?>" />
            <?php } ?>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td align="right" class="normal_fonts9" width="200">Book Title</td>
                <td align="center" class="normal_fonts9" width="10">:</td>
                <td class="normal_fonts9" width="372"><input name="book_title" type="text" class="normal_fonts9" id="book_title" size="50" value="<?php echo $k['book_title']; ?>" onblur="validation1(1)"/><br /><span id="errbook_title" style="display:none" class="err_validate" >Please enter Book Title</span></td>
                <td width="356"></td>
              </tr>
              <tr  bgcolor="#f3f3f3">
                <td align="right" class="normal_fonts9">Author Name</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="book_author_name" type="text" class="normal_fonts9" id="book_author_name" size="50" value="<?php echo $k['book_author_name']; ?>" onblur="validation1(2)"/><br /><span id="errbook_author_name" style="display:none" class="err_validate" >Please enter Author Name</span></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Book Description</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><textarea name="book_description" rows="7" cols="60" type="text" class="normal_fonts9" id="book_description" ><?php echo $k['book_description']; ?></textarea></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Book Cover Image</td>
                <td align="center" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9" valign="middle" ><input name="book_cover_image" id="book_cover_image" type="file" />
                  <input type="hidden" name="existing_book_cover_image" value="<?php echo $k['book_cover_image']; ?>" /></td>
                <td bgcolor="#f3f3f3"><?php if($k['book_cover_image']!=""){?>
                  <img src="../books_images/<?php echo $k['book_cover_image']; ?>" width="200" height="200"  border="0" />
                  <?php } ?></td>
              </tr>
              
              <?php $qselect=mysql_query("select * from comic_book_detail where book_mast_id='".$k["book_id"]."' order by book_detail_id asc"); 
			  $i=1;
			  $totaldetails=mysql_num_rows($qselect); 
			
			  while($bookdetail=mysql_fetch_array($qselect)){	
			if($i%2==0){$bg="#F2F2F2";} else{$bg="#FFFFFF";}
			
			if($bookdetail["book_type"]=='1'){ 
			  $display='';}else{$display='none';}
			  
			  if($bookdetail["book_type"]=='2')
			  {$display1='';}else{$display1='none';}
			 
			  ?>
              <tr>
                <td colspan="4">
                <table width="100%" border="0" cellspacing="0" cellpadding="5" >
                      <tr bgcolor="<?php echo $bg; ?>">
                        <td width="194" height="35" align="right" valign="top" class="normal_fonts9">Book Page <?php echo $i; ?></td>
                        <td width="10" align="center" class="normal_fonts9" valign="top">:</td>
                        <td class="normal_fonts9" width="372" valign="top"><input type="radio" name="book_type<?php echo $i; ?>" id="book_type<?php echo $i; ?>" value="1" onclick="load3('<?php echo $i; ?>')" <?php if($bookdetail['book_type']==1){ echo "checked"; } ?> />
                          Image
                          <input type="radio" name="book_type<?php echo $i; ?>" id="book_type<?php echo $i; ?>" value="2" onclick="load4('<?php echo $i; ?>')" <?php if($bookdetail['book_type']==2){ echo "checked"; } ?> />
                          Advertisement Content </td>
                        <td width="205" rowspan="3" valign="middle"><img src="../books_images/<?php echo $bookdetail['book_image']; ?>" height="200" width="200" /></td>
                        <td width="136" rowspan="3" valign="middle"><a href="comic_book_delete.php?book_detail_id=<?php echo $bookdetail['book_detail_id']; ?>&process=comicdetaildelete"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                      </tr>
                      <tr id="txtexist<?php echo $i; ?>" style="display:<?php echo $display1; ?>;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        <td valign="top"><textarea name="advertisement<?php echo $i; ?>" id="advertisement<?php echo $i; ?>" cols="30" rows="5"><?php echo $bookdetail['advertisement']; ?></textarea></td>
                        </tr>
                      <tr id="txttest<?php echo $i; ?>" style="display:<?php echo $display; ?>;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        <td valign="top">
                          <input type="file" name="book_image<?php echo $i; ?>" id="book_image<?php echo $i; ?>"  />
                          
                          <input type="hidden" name="existing_book_image<?php echo $i; ?>" id="existing_book_image<?php echo $i; ?>" value="<?php echo $bookdetail['book_image']; ?>" />
                          <input type="hidden" name="book_detail_id<?php echo $i; ?>" id="book_detail_id<?php echo $i; ?>" value="<?php echo $bookdetail['book_detail_id']; ?>" />
                        </td>
                        </tr>
                        
                        
                        <tr bgcolor="<?php echo $bg; ?>">
                <td align="right" class="normal_fonts9">Display Order</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input type="text" name="display_order<?php echo $i; ?>" id="display_order<?php echo $i; ?>"  class="normal_fonts10" onblur="check_numeric(<?php echo $i; ?>);"  value="<?php echo $bookdetail['display_order']; ?>"/>&nbsp;&nbsp;<span class="err_validate">[Enter Numeric Value Only]</span></td>
                <td></td>
              </tr>
                        
                    </table>
                </td>
              </tr>
              
              
              <tr>
              <td height="5"></td>
              </tr>
              
              <?php $i++;} 
			  
			  if($totaldetails==0){
			  ?>
             
               <tr>
                <td colspan="4" style="padding:0"><?php 
$i=1;
if(count($cntype)==0)
{
	if($i%2==0){$bg="#F2F2F2";} else{$bg="#FFFFFF";}
?>
                  <div id="test<?php echo $i;?>" class="divpad">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5" >
                      <tr bgcolor="<?php echo $bg; ?>">
                        <td width="194" align="right" class="normal_fonts9">Book Page <?php echo $i; ?></td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9" width="372"><input type="radio" name="book_type<?php echo $i; ?>" id="book_type<?php echo $i; ?>" value="1" onclick="load3('<?php echo $i; ?>')" />
                         Book Image
                          <input type="radio" name="book_type<?php echo $i; ?>" id="book_type<?php echo $i; ?>" value="2" onclick="load4('<?php echo $i; ?>')" />
                          Advertisement Content </td>
                        <td width="352"></td>
                      </tr>
                      <tr id="txtexist<?php echo $i; ?>" style="display:none;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        <td><textarea name="advertisement<?php echo $i; ?>" id="advertisement<?php echo $i; ?>" cols="30" rows="5"></textarea></td>
                        <td></td>
                      </tr>
                      <tr id="txttest<?php echo $i; ?>" style="display:none;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        <td ><input type="file" name="book_image<?php echo $i; ?>" id="book_image<?php echo $i; ?>" />
                        </td>
                        <td></td>
                      </tr>
                      
                      <tr bgcolor="<?php echo $bg; ?>">
                <td align="right" class="normal_fonts9">Display Order</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input type="text" name="display_order<?php echo $i; ?>" id="display_order<?php echo $i; ?>"  class="normal_fonts10" onblur="check_numeric(<?php echo $i; ?>);" />&nbsp;&nbsp;<span class="err_validate">[Enter Numeric Value Only]</span></td>
                <td></td>
              </tr>
                    </table>
                    
                  </div>
                  <?php 

}
}
?>
</td></tr>


<tr>
<td height="5"></td>
</tr>


 <tr>
                <td colspan="4">
<?php
if($totaldetails>0){$i=$totaldetails+1;}else {$i=2;}
			  
for(;$i<=30;$i++)
{if($i%2==0){$bg="#F2F2F2";} else{$bg="#FFFFFF";}
?>
                  <div id="test<?php echo $i;?>" class="divpad"  style="display:none;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5"  >
                      <tr bgcolor="<?php echo $bg; ?>">
                        <td width="194" align="right" class="normal_fonts9">Book Page <?php echo $i; ?></td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9" width="318"><input type="radio" name="book_type<?php echo $i; ?>" id="book_type<?php echo $i; ?>" value="1" onclick="load3('<?php echo $i; ?>')"  />
                          Book Image
                          <input type="radio" name="book_type<?php echo $i; ?>" id="book_type<?php echo $i; ?>" value="2"  onclick="load4('<?php echo $i; ?>')"/>
                          Advertisement Content </td>
                        <td></td>
                      </tr>
                      <tr id="txtexist<?php echo $i; ?>" style="display:none;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        <td><textarea name="advertisement<?php echo $i; ?>" id="advertisement<?php echo $i; ?>" cols="30" rows="5"></textarea></td>
                        <td></td>
                      </tr>
                      <tr id="txttest<?php echo $i; ?>" style="display:none;" bgcolor="<?php echo $bg; ?>">
                        <td></td>
                        <td></td>
                        <td><input type="file" name="book_image<?php echo $i; ?>" id="book_image<?php echo $i; ?>" /></td>
                        <td></td>
                      </tr>
                      
                      <tr>
                <td align="right" class="normal_fonts9">Display Order</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input type="text" name="display_order<?php echo $i; ?>" id="display_order<?php echo $i; ?>"  class="normal_fonts10" onblur="check_numeric(<?php echo $i; ?>);" />&nbsp;&nbsp;<span class="err_validate">[Enter Numeric Value Only]</span></td>
                <td></td>
              </tr>
              
              <tr>
              <td height="5"></td>
              </tr>
              
                    </table>
                  </div>
                  <?php } ?></td>
              </tr>
             
              <tr>
                <td class="normal_fonts9" align="right"></td>
                <td></td>
                <td class="normal_fonts9" align="center"><a href="javascript:void(0);" onclick="addcontact(<?php echo $totaldetails+count($cntype); ?>);"  class="normal_hyper_link_fonts10"><u><strong>Add Another</strong> </u></a></td>
                <td></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td align="center" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9"><input name="submit" type="submit" class="normal_fonts12_black" id="submit" style="width:80px; height:30px" value="Submit" />
                  &nbsp;&nbsp;
                  <input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
              </tr>
              <tr>
                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>
              </tr>
            </table>
            </form>
            </td>
          </tr>
          </table>
          
           <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
