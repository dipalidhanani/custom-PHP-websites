<?php session_start();

	include("../include/config.php"); 
	
if($_REQUEST["process"]="comicbookdelete")
{
	$del=mysql_query("select * from comic_book_mast where book_id='".$_REQUEST['eid']."'");

	$d=mysql_fetch_array($del);

	$fileiscover=$d['book_cover_image'];

	$pathcover='../books_images/'.$fileiscover;

	unlink($pathcover);
	
	$de2=mysql_query("select * from comic_book_detail where book_mast_id='".$_REQUEST['eid']."'");
	while($d2=mysql_fetch_array($de2)){
	
	$fileis1=$d2['book_image'];

	$path1='../books_images/'.$fileis1;

	unlink($path1);
	
	}
		

	mysql_query("delete from comic_book_mast where book_id='".$_REQUEST['eid']."'") or die(mysql_error());
	mysql_query("delete from comic_book_detail where book_mast_id='".$_REQUEST['eid']."'") or die(mysql_error());
}
if($_REQUEST["process"]="comicdetaildelete")
{
	$de3=mysql_query("select * from comic_book_detail where book_detail_id='".$_REQUEST['book_detail_id']."'");
	$d3=mysql_fetch_array($de3);
	
	$fileis2=$d3['book_image'];

	$path2='../books_images/'.$fileis2;

	unlink($path2);
	
	mysql_query("delete from comic_book_detail where book_detail_id='".$_REQUEST['book_detail_id']."'") or die(mysql_error());
}
?>	

<script language="javascript">

javascript:history.go(-1);

</script>