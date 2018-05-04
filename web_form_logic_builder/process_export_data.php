<?php session_start();
include("config.php");
 include("functions_mysql.php");
 include("functions.php");

// retrive data which you want to export
$query = "SELECT journal_id,journal_entry_title,journal_entry_status,journal_entry_priority,journal_entry_date,potential_take_profit,new_potential_take_profit,pips_earned_lost,potential_entry_price,new_potential_entry_price,actual_entry_price,potential_account_risk,new_potential_account_risk,actual_potential_account_risk,what_potential_account_risk,potential_risk_to_reward,new_potential_risk_to_reward,actual_potential_risk_to_reward
 FROM `journal_form`
INNER JOIN journal_form_master ON journal_form_master.journal_id=journal_form.journal_master_id 
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id=journal_form.journal_field_master_id 
where  journal_form_master.user_master_id = '".$_SESSION["user_id"]."' and journal_field_name = 'date4' 
and (STR_TO_DATE(`journal_form_field_value`, '%m/%d/%Y') >= STR_TO_DATE('".$_REQUEST["exportfromdate"]."', '%m/%d/%Y'))
 and (STR_TO_DATE(`journal_form_field_value`, '%m/%d/%Y') <= STR_TO_DATE('".$_REQUEST["exporttodate"]."', '%m/%d/%Y'))";
$header = '';
$data ='';
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
 
// extract the field names for header
//$fields = mysql_num_fields ( $export );
// 
//for ( $i = 0; $i < $fields; $i++ )
//{
//    $header .= mysql_field_name( $export , $i ) . "\t";
//}
//
// 
//// export data
//while( $row = mysql_fetch_row( $export ) )
//{ 
//	$query2 = mysql_query("SELECT * FROM journal_form
//INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
//where journal_master_id='".$row[0]."'");
//while( $row2 = mysql_fetch_array( $query2 ) )
//{$header .= $row2['journal_form_field_label']. "\t";
//	
//	}
//    $line = '';
//    foreach( $row as $value )
//    {                                            
//        if ( ( !isset( $value ) ) || ( $value == "" ) )
//        {
//            $value = "\t";
//        }
//        else
//        {
//            $value = str_replace( '"' , '""' , $value );
//            $value = '"' . $value . '"' . "\t";
//        }
//        $line .= $value;
//    }
//	
//	$query3 = mysql_query("SELECT * FROM journal_form
//INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
//where journal_master_id='".$row[0]."'");
//while( $row3 = mysql_fetch_array( $query3 ) )
//{$line .= '"' . $row3['journal_form_field_value'] . '"'. "\t";	}	
//}
//    $data .= trim( $line ) . "\n";
//	 
//$data = str_replace( "\r" , "" , $data );
//
// 
//if ( $data == "" )
//{
//    $data = "\nNo Record(s) Found!\n";                        
//}
//

// allow exported file to download forcefully
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=export.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

$sep = "\t"; //tabbed character
//start of printing column names as names of MySQL fields
for ($i = 0; $i < mysql_num_fields($export); $i++) {
$header .= mysql_field_name($export,$i) . "\t";
}
   
//end of printing column names  
//start while loop to get data
if($row = mysql_fetch_row($export))
    {
	$query2 = mysql_query("SELECT * FROM journal_form
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
where journal_master_id='".$row[0]."'");
while( $row2 = mysql_fetch_array( $query2 ) )
{$header .= $row2['journal_form_field_label']. "\t";
	
	}
	}
echo $header;
print("\n"); 
$export = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
while( $row = mysql_fetch_row( $export ) )
{ 
	
    $line = '';
    foreach( $row as $value )
    {                                            
        if ( ( !isset( $value ) ) || ( $value == "" ) )
        {
            $value = "\t";
        }
        else
        {
            $value = str_replace( '"' , '""' , $value );
            $value = '"' . $value . '"' . "\t";
        }
        $line .= $value;
    }
	
	$query3 = mysql_query("SELECT * FROM journal_form
INNER JOIN journal_field_master ON journal_field_master.journal_form_field_id = journal_form.journal_field_master_id
where journal_master_id='".$row[0]."'");
while( $row3 = mysql_fetch_array( $query3 ) )
{$line .= '"' . $row3['journal_form_field_value'] . '"'. "\t";	}
 $data = trim( $line ) . "\n";	
 echo $data;
}
   

?>