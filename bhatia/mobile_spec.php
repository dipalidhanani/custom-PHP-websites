<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
	<?php
    $query=mysql_query("select * from prod_desc_cat order by Disp_Order");
    while($l=mysql_fetch_array($query))
    {  ?>
  <tr>
    <td height="20" colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="title_10">&nbsp;<?php echo $l['Category']; ?></td>
</tr>

		<?php
        $query1=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$l['Prod_Desc_Cat_Id']."' group by Prod_Desc_Cat_Id");
		
        while($k=mysql_fetch_array($query1))
        { 
		
		?>
        <?php 
					$query4=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$k['Prod_Desc_Cat_Id']."' order by Disp_Order");
					$c=1;
					while($r=mysql_fetch_array($query4))
					{ 
					if($c%2==0)
					{
						$color='#f3f3f3';
					}
					else
					{
						$color='#FFFFFF';
					}
					?>
                    
                  <?php 
					$query5=mysql_query("select * from prod_desc where Title_Id='".$r['Title_Id']."' and Prod_Id='".$_REQUEST['pid']."' order by Prod_Desc_Id");
					while($rr=mysql_fetch_array($query5))
					{ ?>  	
                    
              <tr class="fonts9" bgcolor="<?php echo $color; ?>">
                <td width="150" height="25" align="right" 
                <?php if($r['Title']=='Other Features ' || $r['Title']=='Other Features' || $r['Title']==' Other Features') { ?>
                valign="top" 
                <?php } else { ?>
                valign="middle"
                <?php } ?>
                bgcolor="<?php echo $color; ?>" style="color:#000;"><?php 
				echo $r['Title'];?></td>
                <td width="20" height="25" align="center"
                <?php if($r['Title']=='Other Features ' || $r['Title']=='Other Features' || $r['Title']==' Other Features') { ?>
                valign="top" 
                <?php } else { ?>
                valign="middle"
                <?php } ?>
                 >:</td>
                <td height="25" align="left" valign="middle" bgcolor="<?php echo $color; ?>">
                <?php if($r['Title']=='Other Features ' || $r['Title']=='Other Features' || $r['Title']==' Other Features') { ?>
                <?php 
				$valid=$rr['Desc'];
				$dx=explode(",",$valid);
				$i=0;
				foreach ($dx as $val)
				{ ?>
					&diams;&nbsp;
					<?php echo $dx[$i]."</br>";
					$i++;
				}
				?>
                <?php } else { ?>
				<?php 
				if($rr['Desc']=='')
				{
					$desc_d="-";
				}
				else
				{
					$desc_d=$rr['Desc'];	
				}
				echo $desc_d;
					?>
                <?php } ?>
                </td>
  </tr>
  					
  				<?php } ?>	
			<?php $c++; } ?>	
  		<?php  } ?>
 <?php  } ?> 
</table>
