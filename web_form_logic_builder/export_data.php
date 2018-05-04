<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
 <script>
			$(function() {
			$( "#exportfromdate" ).datepicker();
			});
 </script>
  <script>
			$(function() {
			$( "#exporttodate" ).datepicker();
			});
 </script>
 <script language="javascript">

function chk_dates()
{
	with(document.form2)
	{
			var error=0;
			var message;
			message="";			
			if(exportfromdate.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter From Date!";
			}
			if(exporttodate.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter To Date!";
			}			
			
			if (error==1)
			{
			
				alert(message);
				return false;
			}
			else
			{
				
				return true;		
			}
	}
}
</script>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td colspan="2" >
<div class="heading"><strong>Export Data</strong></div>
 <form name="form2" id="form2" method="post" action="process_export_data.php" onsubmit="return chk_dates();"> 
 
<div class="form-inner">
<div class="form-row"> <label>From Date:</label>
  <input type="text" name="exportfromdate" id="exportfromdate" class="text" />
  </div>
<div class="form-row"> <label>To Date:</label>
    <input type="text" name="exporttodate" id="exporttodate" class="text" />
    </div>
<div class="form-row"> <label>&nbsp;</label>
    <input class="button1" type="submit" value="Export" />
</div>
</div>
 </form>
</td>
</tr>
</table>