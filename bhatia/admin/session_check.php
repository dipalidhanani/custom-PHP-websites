<?php 
session_start();
if($_SESSION['bhatia_id']=='') {?>
<script language="javascript">
window.location='index.php';
</script>
<?php } ?>