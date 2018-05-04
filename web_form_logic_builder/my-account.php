<?php      
	  $select_target_level = mysql_query("select * from set_target_level where set_target_user_master_id = '".$_SESSION["user_id"]."'");
$row_target_level = mysql_fetch_array($select_target_level);

 $target_start1 = $row_target_level['set_target_weekly'];
 $target_end1 = $row_target_level['set_target_weekly'] + ((20*$row_target_level['set_target_weekly'])/100);
 
 $target_start2 = ((40*$row_target_level['set_target_weekly'])/100);
 $target_end2 = ((20*$row_target_level['set_target_weekly'])/100);
 
 $target_start3 = ((20*$row_target_level['set_target_weekly'])/100);
 $target_end3 = ((0*$row_target_level['set_target_weekly'])/100);
 
 
 
  $monthly_target_start1 = $row_target_level['set_target_monthly'];
 $monthly_target_end1 = $row_target_level['set_target_monthly'] + ((20*$row_target_level['set_target_monthly'])/100);
 
 $monthly_target_start2 = ((40*$row_target_level['set_target_monthly'])/100);
 $monthly_target_end2 = ((20*$row_target_level['set_target_monthly'])/100);
 
 $monthly_target_start3 = ((20*$row_target_level['set_target_monthly'])/100);
 $monthly_target_end3 = ((0*$row_target_level['set_target_monthly'])/100);
 
 
 
  $quarterly_target_start1 = $row_target_level['set_target_quarterly'];
 $quarterly_target_end1 = $row_target_level['set_target_quarterly'] + ((20*$row_target_level['set_target_quarterly'])/100);
 
 $quarterly_target_start2 = ((40*$row_target_level['set_target_quarterly'])/100);
 $quarterly_target_end2 = ((20*$row_target_level['set_target_quarterly'])/100);
 
 $quarterly_target_start3 = ((20*$row_target_level['set_target_quarterly'])/100);
 $quarterly_target_end3 = ((0*$row_target_level['set_target_quarterly'])/100);
 
 
 
 $yearly_target_start1 = $row_target_level['set_target_yearly'];
 $yearly_target_end1 = $row_target_level['set_target_yearly'] + ((20*$row_target_level['set_target_yearly'])/100);
 
 $yearly_target_start2 = ((40*$row_target_level['set_target_yearly'])/100);
 $yearly_target_end2 = ((20*$row_target_level['set_target_yearly'])/100);
 
 $yearly_target_start3 = ((20*$row_target_level['set_target_yearly'])/100);
 $yearly_target_end3 = ((0*$row_target_level['set_target_yearly'])/100);

  ?>  

<script type="text/javascript" src="js/fusioncharts.js"></script>
<script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js"></script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "line",
        "renderAt": "chartContainer",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Weekly Progress",
        "xaxisname": "*Start Dates of the week",
        "yaxisname": "Pips earned/lost",
		"yaxismaxvalue": "<?php echo $target_end1; ?>",
        "bgcolor": "FFFFFF",
        "linecolor": "008ee4",
        "anchorsides": "3",
        "anchorradius": "5",
        "plotgradientcolor": " ",
        "showalternatehgridcolor": "0",
        "showplotborder": "0",
        "showvalues": "0",
        "divlinecolor": "666666",
        "canvasborderthickness": "1",
        "canvasbordercolor": "CCCCCC"
    },
    "data": [	
	<?php 
	$date = date('m/d/Y');
// parse about any English textual datetime description into a Unix timestamp
$ts = strtotime($date);
// find the year (ISO-8601 year number) and the current week
$year = date('o', $ts);
$week = date('W', $ts);
// print week for the current date
$pips_earned_lost = 0;
for($i = 1; $i <= 7; $i++) {
    // timestamp from ISO week date format
    $ts = strtotime($year.'W'.$week.$i);
    $weeklydate = date("m/d/Y", $ts);	
	$q_journal_form_mast = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_field_name = 'date4' and journal_form_field_value = '".$weeklydate."'");
	
	$total_journal_form_mast = mysql_num_rows($q_journal_form_mast);
	
	while($row_journal_form_mast = mysql_fetch_array($q_journal_form_mast)){
		if($total_journal_form_mast == 1){
		$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}else{
			$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}
	}
	if($i != 1){echo ",";}
	?>
	{
            "label": "<?php echo $weeklydate; ?>",
            "value": "<?php echo $pips_earned_lost; ?>"
        }
	<?php	
	  } ?> 

        
    ],
    "trendlines": [
        {
            "line": [
                {
                    "startvalue": "<?php echo $target_start1; ?>",
                    "endvalue": "<?php echo $target_end1; ?>",
                    "displayvalue": "Great!",
                    "color": "BCE1BB",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
                {
                    "startvalue": "<?php echo $target_start2; ?>",
                    "endvalue": "<?php echo $target_end2; ?>",
                    "displayvalue": "Warning!",
                    "color": "F8D39C",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $target_start3; ?>",
                    "endvalue": "<?php echo $target_end3; ?>",
                    "displayvalue": "Critical!",
                    "color": "FBB8AC",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $target_start1; ?>",
                    "endvalue": "",
                    "istrendzone": "",
                    "valueonright": "1",
                    "color": "fda813",
                    "displayvalue": "Target Level",
                    "showontop": "1",
                    "thickness": "2"
                }
            ]
        }
    ]
}
    });

    revenueChart.render();
})
</script>

<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "line",
        "renderAt": "chartContainer2",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Monthly Progress",
        "xaxisname": "*Start Dates of the week",
        "yaxisname": "Pips earned/lost",
		"yaxismaxvalue": "<?php echo $monthly_target_end1; ?>",
        "bgcolor": "FFFFFF",
        "linecolor": "008ee4",
        "anchorsides": "3",
        "anchorradius": "5",
        "plotgradientcolor": " ",
        "showalternatehgridcolor": "0",
        "showplotborder": "0",
        "showvalues": "0",
        "divlinecolor": "666666",
        "canvasborderthickness": "1",
        "canvasbordercolor": "CCCCCC"
    },
    "data": [	
	<?php 
	$totalDays = date('t'); 
	$weekdt=1;   
for( $i=1; $i<= $totalDays; $i++)
{
	$dateschedule = date('Y') . "-". date('m')."-". str_pad($i,2,'0', STR_PAD_LEFT);
	  $weekend = date("l",strtotime($dateschedule));
 $dates[$weekdt]= str_pad($i,2,'0', STR_PAD_LEFT); 
 if($weekend == 'Sunday'){
 $weekdt += 1;
 }
}
$k = 1;
$pips_earned_lost = 0;
//echo "weekdt:".$weekdt;
for($j=1; $j<= $weekdt; $j++){
//echo ($dates[$j]);

for($k=$k; $k<= $dates[$j]; $k++){
	 $dateschedule1 = date('m') . "/". str_pad($k,2,'0', STR_PAD_LEFT)."/". date('Y');


	$date = date('m/d/Y');
// parse about any English textual datetime description into a Unix timestamp
$ts = strtotime($dateschedule1);
// find the year (ISO-8601 year number) and the current week
$year = date('o', $ts);
$week = date('W', $ts);
// print week for the current date
//for($i = 1; $i <= 7; $i++) {
    // timestamp from ISO week date format
    $ts = strtotime($year.'W'.$week.$k);
    $weeklydate = date("m/d/Y", $ts);	
	$q_journal_form_mast = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_field_name = 'date4' and journal_form_field_value = '".$dateschedule1."'");
	
	$total_journal_form_mast = mysql_num_rows($q_journal_form_mast);
	
	while($row_journal_form_mast = mysql_fetch_array($q_journal_form_mast)){
		if($total_journal_form_mast == 1){
		$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}else{
			$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}
	}
	
	
		}
		
		if($j != 1){echo ",";}
	?>
	{
            "label": "<?php echo $dateschedule1; ?>",
            "value": "<?php echo $pips_earned_lost; ?>"
        }
	<?php

}
	 // } ?> 

        
    ],
    "trendlines": [
        {
            "line": [
                {
                    "startvalue": "<?php echo $monthly_target_start1; ?>",
                    "endvalue": "<?php echo $monthly_target_end1; ?>",
                    "displayvalue": "Great!",
                    "color": "BCE1BB",					
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
                {
                    "startvalue": "<?php echo $monthly_target_start2; ?>",
                    "endvalue": "<?php echo $monthly_target_end2; ?>",
                    "displayvalue": "Warning!",
                    "color": "F8D39C",					
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $monthly_target_start3; ?>",
                    "endvalue": "<?php echo $monthly_target_end3; ?>",
                    "displayvalue": "Critical!",
                    "color": "FBB8AC",					
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $monthly_target_start1; ?>",
                    "endvalue": "",
                    "istrendzone": "",
                    "valueonright": "1",
                    "color": "fda813",
                    "displayvalue": "Target Level",
                    "showontop": "1",
                    "thickness": "2"
                }
            ]
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "line",
        "renderAt": "chartContainer3",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Quarterly Progress",
        "xaxisname": "*Start Dates of the week",
        "yaxisname": "Pips earned/lost",
		"yaxismaxvalue": "<?php echo $quarterly_target_end1; ?>",
        "bgcolor": "FFFFFF",
        "linecolor": "008ee4",
        "anchorsides": "3",
        "anchorradius": "7",
        "plotgradientcolor": " ",
        "showalternatehgridcolor": "0",
        "showplotborder": "0",
        "showvalues": "0",
        "divlinecolor": "666666",
        "canvasborderthickness": "1",
        "canvasbordercolor": "CCCCCC"
    },
    "data": [	
	<?php 
		
	// set current date
$date = date('m/d/Y');
// parse about any English textual datetime description into a Unix timestamp
$ts = strtotime($date);
// calculate the number of days since Monday
$dow = date('w', $ts);
$offset = $dow - 1;
if ($offset < 0) {
    $offset = 6;
}
// calculate timestamp for the Monday
$ts = $ts - $offset*86400;
// print current week
$inc=1;
$abc = 7;
$pips_earned_lost = 0;
for($k=1;$k<=12;$k++){
	

for ($i = $inc; $i <= $abc; $i++) {
    $dateschedule1 = date("m/d/Y", $ts + $i * 86400);

	$q_journal_form_mast = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_field_name = 'date4' and journal_form_field_value = '".$dateschedule1."'");
	
	$total_journal_form_mast = mysql_num_rows($q_journal_form_mast);
	
	while($row_journal_form_mast = mysql_fetch_array($q_journal_form_mast)){
		if($total_journal_form_mast == 1){
		$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}else{
			$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}
	}
	
	
}
$abc += 7;
$inc += 7;
		
		if($k != 1){echo ",";}
	?>
	{
            "label": "<?php echo $dateschedule1; ?>",
            "value": "<?php echo $pips_earned_lost; ?>"
        }
	<?php

}
	 // } ?> 

        
    ],
    "trendlines": [
        {
            "line": [
                {
                    "startvalue": "<?php echo $quarterly_target_start1; ?>",
                    "endvalue": "<?php echo $quarterly_target_end1; ?>",
                    "displayvalue": "Great!",
                    "color": "BCE1BB",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
                {
                    "startvalue": "<?php echo $quarterly_target_start2; ?>",
                    "endvalue": "<?php echo $quarterly_target_end2; ?>",
                    "displayvalue": "Warning!",
                    "color": "F8D39C",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $quarterly_target_start3; ?>",
                    "endvalue": "<?php echo $quarterly_target_end3; ?>",
                    "displayvalue": "Critical!",
                    "color": "FBB8AC",					
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $quarterly_target_start1; ?>",
                    "endvalue": "",
                    "istrendzone": "",
                    "valueonright": "1",
                    "color": "fda813",
                    "displayvalue": "Target Level",
                    "showontop": "1",
                    "thickness": "2"
                }
            ]
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "line",
        "renderAt": "chartContainer4",
        "width": "1000",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Yearly Progress",
        "xaxisname": "*Start Dates of the month",
        "yaxisname": "Pips earned/lost",
		"yaxismaxvalue": "<?php echo $yearly_target_end1; ?>",
        "bgcolor": "FFFFFF",
        "linecolor": "008ee4",
        "anchorsides": "3",
        "anchorradius": "7",
        "plotgradientcolor": " ",
        "showalternatehgridcolor": "0",
        "showplotborder": "0",
        "showvalues": "0",
        "divlinecolor": "666666",
        "canvasborderthickness": "1",
        "canvasbordercolor": "CCCCCC"
    },
    "data": [	
	<?php 
$curryear = date('Y');
$pips_earned_lost = 0;
for($k=1;$k<=12;$k++){	
$totaldays=cal_days_in_month(CAL_GREGORIAN,$k,$curryear);
for ($i = 1; $i<=$totaldays; $i++) {
    
	$dateschedule = $curryear . "-". $k."-". str_pad($i,2,'0', STR_PAD_LEFT);
	$dateschedule1 = date("m/d/Y",  strtotime($dateschedule));

	$q_journal_form_mast = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_field_name = 'date4' and journal_form_field_value = '".$dateschedule1."'");
	
	$total_journal_form_mast = mysql_num_rows($q_journal_form_mast);
	
	while($row_journal_form_mast = mysql_fetch_array($q_journal_form_mast)){
		if($total_journal_form_mast == 1){
		$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}else{
			$pips_earned_lost += $row_journal_form_mast['pips_earned_lost'];
		}
	}
	
	
}
	if($k != 1){echo ",";}
	?>
	{
            "label": "<?php echo $dateschedule1; ?>",
            "value": "<?php echo $pips_earned_lost; ?>"
        }
	<?php

}
	 // } ?> 
    ],
    "trendlines": [
        {
            "line": [
                {
                    "startvalue": "<?php echo $yearly_target_start1; ?>",
                    "endvalue": "<?php echo $yearly_target_end1; ?>",
                    "displayvalue": "Great!",
                    "color": "BCE1BB",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
                {
                    "startvalue": "<?php echo $yearly_target_start2; ?>",
                    "endvalue": "<?php echo $yearly_target_end2; ?>",
                    "displayvalue": "Warning!",
                    "color": "F8D39C",
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $yearly_target_start3; ?>",
                    "endvalue": "<?php echo $yearly_target_end3; ?>",
                    "displayvalue": "Critical!",
                    "color": "FBB8AC",					
                    "istrendzone": "1",
                    "showontop": "0",
                    "alpha": "35",
                    "valueonright": "1"
                },
				{
                    "startvalue": "<?php echo $yearly_target_start1; ?>",
                    "endvalue": "",
                    "istrendzone": "",
                    "valueonright": "1",
                    "color": "fda813",
                    "displayvalue": "Target Level",
                    "showontop": "1",
                    "thickness": "2"
                }
            ]
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer1",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(This Week)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php // $past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	// set current timestamp
	$today = time();
	// calculate the number of days since Monday
	$dow = date('w', $today);
	$offset = $dow - 1;
	if ($offset < 0) {
		$offset = 6;
	}
	// calculate timestamp for Monday and Sunday
	$monday = $today - ($offset * 86400);
	$sunday = $monday + (6 * 86400);
	
	$thisweek_startdate = date("m/d/Y", $monday);
    $thisweek_enddate = date("m/d/Y", $sunday);
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer2",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(Last Week)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$lastweek_startdate = date('m/d/Y',strtotime('-1 week'));
    $lastweek_enddate = date('m/d/Y',strtotime('last sunday'));
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastweek_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastweek_enddate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer3",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(This Month)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$thismonth_startdate = date('m/01/Y',strtotime('this month'));
    $thismonth_enddate = date('m/t/Y',strtotime('this month'));
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thismonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thismonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer4",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(Last Month)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$lastmonth_startdate = date('m/01/Y',strtotime('last month'));
    $lastmonth_enddate = date('m/t/Y',strtotime('last month'));
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastmonth_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastmonth_enddate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer5",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(This Quarter)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$thisquarter_startdate = date('m/01/Y');
    $thisquarter_enddate = date('m/t/Y',strtotime('+2 month'));
	
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer6",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(Last Quarter)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$lastquarter_startdate = date('m/01/Y',strtotime('-3 month'));
    $lastquarter_enddate = date('m/t/Y',strtotime('last month'));
	
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastquarter_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastquarter_enddate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer7",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(This Year)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$thisyear_startdate = date('m/01/Y', strtotime('first day of January this year'));
    $thisyear_lastdate = date('m/t/Y',strtotime('last day of December this year'));
	
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$thisyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$thisyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script>
	FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Pie2D",
        "renderAt": "piechartContainer8",
        "width": "100%",
        "height": "400",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
		 "caption": "Pie Chart for Completed Entries(Last Year)",
        "bgcolor": "FFFFFF",
        "showvalues": "1",
        "showpercentvalues": "1",
        "showborder": "0",
        "showplotborder": "0",
        "showlegend": "1",
        "legendborder": "0",
        "legendposition": "bottom",
        "enablesmartlabels": "1",
        "use3dlighting": "0",
        "showshadow": "0",
        "legendbgcolor": "#CCCCCC",
        "legendbgalpha": "20",
        "legendborderalpha": "0",
        "legendshadow": "0",
        "legendnumcolumns": "3",
        "showBorder": "0"
        
    },
    "data": [	
	<?php  //$past3monthdate = date("m/d/Y",strtotime("-3 Months"));
	$lastyear_startdate = date('m/01/Y', strtotime('first day of January last year'));
    $lastyear_lastdate = date('m/t/Y',strtotime('last day of December last year'));
	
	$q_total_completed_AUD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'AUD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_AUD = mysql_num_rows($q_total_completed_AUD);
	
		$q_total_completed_CAD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'CAD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_CAD = mysql_num_rows($q_total_completed_CAD);
	
	$q_total_completed_EUR = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'EUR' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_EUR = mysql_num_rows($q_total_completed_EUR);
	
	$q_total_completed_GBP = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'GBP' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_GBP = mysql_num_rows($q_total_completed_GBP);
	
	$q_total_completed_JPY = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'JPY' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_JPY = mysql_num_rows($q_total_completed_JPY);
	
	$q_total_completed_NZD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'NZD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_NZD = mysql_num_rows($q_total_completed_NZD);
	
	$q_total_completed_SGD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'SGD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_SGD = mysql_num_rows($q_total_completed_SGD);
	
	$q_total_completed_USD = mysql_query("SELECT * FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION['user_id']."' and journal_form_field_label = 'Currency Group' and journal_form_field_value = 'USD' and journal_entry_status = 'Closed' and STR_TO_DATE(`journal_entry_date`, '%m/%d/%Y') BETWEEN STR_TO_DATE('".$lastyear_startdate."', '%m/%d/%Y') AND STR_TO_DATE('".$lastyear_lastdate."', '%m/%d/%Y')");
	
	$total_completed_USD = mysql_num_rows($q_total_completed_USD);

	?>
	{
            "label": "AUD",
            "value": "<?php echo $total_completed_AUD; ?>"
        },
		{
            "label": "CAD",
            "value": "<?php echo $total_completed_CAD; ?>"
        },
		{
            "label": "EUR",
            "value": "<?php echo $total_completed_EUR; ?>"
        },
		{
            "label": "GBP",
            "value": "<?php echo $total_completed_GBP; ?>"
        },
		{
            "label": "JPY",
            "value": "<?php echo $total_completed_JPY; ?>"
        },
		{
            "label": "NZD",
            "value": "<?php echo $total_completed_NZD; ?>"
        },
		{
            "label": "SGD",
            "value": "<?php echo $total_completed_SGD; ?>"
        },
		{
            "label": "USD",
            "value": "<?php echo $total_completed_USD; ?>"
        }
    ]
}
    });

    revenueChart.render();
})
</script>
<script type ="text/javascript">
/*function printform()
        { 
        var divToPrint = document.getElementById('chartContainer');
        var popupWin = window.open('', '_blank', 'width=1000,height=500');
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
        }*/
		function printContent(el){ 
		var restorepage = document.body.innerHTML; 
		var printcontent = document.getElementById(el).innerHTML;
		 document.body.innerHTML = printcontent; 
		 window.print(); 
		 document.body.innerHTML = restorepage; 
		}
</script>
<style>
.ui-widget-content{border:none;}
</style>
<div style="text-align:right; text-decoration:underline;"><h3><a href="index.php?page=set_target_level"><strong>Set Targets</strong></a></h3></div>
<div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('chartContainer');">Print</a></h3></div>
	<div id="chartContainer" ></div><br />
<div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('chartContainer2');">Print</a></h3></div>
    <div id="chartContainer2" ></div><br />
    <div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('chartContainer3');">Print</a></h3></div>
    <div id="chartContainer3" ></div><br />
    <div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('chartContainer4');">Print</a></h3></div>
    <div id="chartContainer4" ></div><br />

     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
<div id="tabs">
<ul>
<li><a href="#tabs-1">This week</a></li>
<li><a href="#tabs-2">Last week</a></li>
<li><a href="#tabs-3">This Month</a></li>
<li><a href="#tabs-4">Last Month</a></li>
<li><a href="#tabs-5">This Quarter</a></li>
<li><a href="#tabs-6">Last Quarter</a></li>
<li><a href="#tabs-7">This Year</a></li>
<li><a href="#tabs-8">Last Year</a></li>
</ul>
<div id="tabs-1">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer1');">Print</a></h3></div>
    <div id="piechartContainer1" ></div></p>
</div>
<div id="tabs-2">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer2');">Print</a></h3></div>
    <div id="piechartContainer2" ></div></p>
</div>
<div id="tabs-3">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer3');">Print</a></h3></div>
    <div id="piechartContainer3" ></div></p>
</div>
<div id="tabs-4">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer4');">Print</a></h3></div>
    <div id="piechartContainer4" ></div></p>
</div>
<div id="tabs-5">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer5');">Print</a></h3></div>
    <div id="piechartContainer5" ></div></p>
</div>
<div id="tabs-6">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer6');">Print</a></h3></div>
    <div id="piechartContainer6" ></div></p>
</div>
<div id="tabs-7">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer7');">Print</a></h3></div>
    <div id="piechartContainer7" ></div></p>
</div>
<div id="tabs-8">
<p><div style="text-align:left; text-decoration:underline;"><h3> <a href="javascript:void(0);" onclick="printContent('piechartContainer8');">Print</a></h3></div>
    <div id="piechartContainer8" ></div></p>
</div>
</div>