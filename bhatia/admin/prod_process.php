<?php 
session_start();
include("session_check.php");
require("config.inc.php"); 
require("Database.class.php"); 
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
$db->connect(); 

$is_edit=$_REQUEST['is_edit'];

$column=array("Brand_Id","Prod_Name","Is_Active","Prod_Code","MRP_Price","Final_Price","Dillar_Price","Offer_Id","Offer_Amt","Description","Dt","Tech_Type","Is_Tablet","Prod_Mobile_OS","Is_3G","Is_Bluetooth","Is_Camera","Is_Dual_SIM","Is_FM_Radio","Is_Infrared","Is_Memory_Slot","Is_QWERTY","Is_Secondary_Camera","Is_SmartPhone","Is_Touchscreen","Is_Video_Recording","Is_WiFi");

	$brand=$_POST["brand"];
	$pname=$_POST['pname'];
	$pcode=$_POST["pcode"];
	$mrp=$_POST["mrp"];
	$fprice=$_POST["fprice"];
	$active=$_POST["active"];
	$order=$_POST["order"];
	$dillar=$_POST['dillar'];
	$offer=$_POST['offer'];
	$oamt=$_POST['oamt'];
	$descr=$_POST['descr'];
	$date=date('Y-m-d');
	$model=$_POST['model'];
	$tablet=$_POST['tablet'];
	$mobile_os=$_POST['mobile_os'];

	$is_3g=$_POST['is_3g'];
	$is_bluetooth=$_POST['is_bluetooth'];
	$is_camera=$_POST['is_camera'];
	$is_dualsim=$_POST['is_dualsim'];
	$is_FM_radio=$_POST['is_FM_radio'];
	$is_infrared=$_POST['is_infrared'];
	$is_memory_slot=$_POST['is_memory_slot'];
	$is_qwerty=$_POST['is_qwerty'];
	$is_secondary_camera=$_POST['is_secondary_camera'];
	$is_smartphone=$_POST['is_smartphone'];
	$is_touchscreen=$_POST['is_touchscreen'];
	$is_video_recording=$_POST['is_video_recording'];
	$is_wifi=$_POST['is_wifi'];
	

	$value=array($brand,$pname,$active,$pcode,$mrp,$fprice,$dillar,$offer,$oamt,$descr,$date,$model,$tablet,$mobile_os,$is_3g,$is_bluetooth,$is_camera,$is_dualsim,$is_FM_radio,$is_infrared,$is_memory_slot,$is_qwerty,$is_secondary_camera,$is_smartphone,$is_touchscreen,$is_video_recording,$is_wifi);
if($is_edit==1)
{ 
	$txtid=$_POST['txtid'];
	$db->update("prod_mst","Prod_Id",$txtid,$column,$value);
	mysql_query("delete from color_mst where Prod_Id='".$txtid."'") or die(mysql_error());
	$dx=explode(',',$_POST['color']);
	foreach ($dx as $val)
	{
		mysql_query("insert into color_mst values('".NULL."','".$txtid."','".$val."')") or die(mysql_error());
	}
	
	/*mysql_query("DELETE FROM mobile_features_relation WHERE Mobile_Features_Reration_Prod_Id='".$txtid."'") or die(mysql_error());
	$features_id=$_POST['mobile_features'];
	if($features_id!='')
	{
		foreach($features_id as $val)
		{
		mysql_query("INSERT INTO mobile_features_relation(Mobile_Features_Id,Mobile_Features_Reration_Prod_Id) VALUES('".$val."','".$txtid."')") or die(mysql_error());
		}
	}*/
			mysql_query("delete from prod_desc where Prod_Id='".$txtid."'") or die(mysql_error());
		  $qry=mysql_query("select * from prod_title group by Prod_Desc_Cat_Id");
		  $main=1;
		  while($cat=mysql_fetch_array($qry))
		  {
			  $cat_mst=mysql_query("select * from prod_desc_cat where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order");

			  $pcat=mysql_fetch_array($cat_mst);
			  $an=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order");
	      	  $cnt=1;
			  $x=1;
		  	 if(mysql_affected_rows()>0){
		 	 while($a=mysql_fetch_array($an))
		  	 {

					 $title_id=$a['Title_Id'];
					$new_qry="insert into prod_desc values('".NULL."','".$txtid."','".$title_id."','".$_POST['desc_'.$x."_".$main]."')"; 
				mysql_query($new_qry) or die(mysql_error());
			$x++;	
			 } 		 
			 } 
			 $main++;
			 }
}
else
{ 
	$db->insert("prod_mst",$column,$value);
	$last_id=mysql_insert_id();
	$dx=explode(',',$_POST['color']);
	foreach ($dx as $val)
	{
		mysql_query("insert into color_mst values('".NULL."','".$last_id."','".$val."')") or die(mysql_error());
	}
	
	/*$features_id=$_POST['mobile_features'];
	foreach($features_id as $val)
	{
		mysql_query("INSERT INTO mobile_features_relation(Mobile_Features_Id,Mobile_Features_Reration_Prod_Id) VALUES('".$val."','".$last_id."')") or die(mysql_error());
	}*/
		  $qry=mysql_query("select * from prod_title group by Prod_Desc_Cat_Id");
		  $main=1;
		  while($cat=mysql_fetch_array($qry))
		  {
			  $cat_mst=mysql_query("select * from prod_desc_cat where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order");
			  $pcat=mysql_fetch_array($cat_mst);
			  $an=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order");
	      	  $cnt=1;
			  $x=1;
		  	 if(mysql_affected_rows()>0){
		 	 while($a=mysql_fetch_array($an))
		  	 {
					 $title_id=$a['Title_Id'];
					$new_qry="insert into prod_desc values('".NULL."','".$last_id."','".$title_id."','".$_POST['desc_'.$x."_".$main]."')"; 
				mysql_query($new_qry) or die(mysql_error());
			$x++;	
			 } 		 
			 } 
			 $main++;
			 }
}

?>

<script type="text/javascript">
javascript:history.go(-2);
</script>

