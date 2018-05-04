<?php @session_start();
include("../config.php");
 include("../functions_mysql.php");
 include("../functions.php");
 if ( $_SESSION['user_id'] == "" ) 
	{
		echo $actual_link = "http://$_SERVER[HTTP_HOST]/webform_database/";
		$_SESSION['backtoURL'] = $_SERVER['REQUEST_URI'];
		echo $_SESSION['backtoURL']; 
		$_SESSION['SessionMessage'] = "<span class='error'>Please login First</span>";
		header("Location:".$actual_link."index.php?page=login");
		exit;
	}
  ?>
<html>
<head>
  <title>Form Builder</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="vendor/css/vendor.css" />
  <link rel="stylesheet" href="dist/formbuilder.css" />
  <style>
  * {
    box-sizing: border-box;
  }

  body {
    background-color: #444;
    font-family: sans-serif;
  }

  .fb-main {
    background-color: #fff;
    border-radius: 5px;
    min-height: 600px;
  }

  input[type=text] {
    height: 26px;
    margin-bottom: 3px;
  }

  select {
    margin-bottom: 5px;
    font-size: 40px;
  }
  </style>
</head>
<body>
  <div class='fb-main'></div>
  <input type="hidden" name="hdnjsonstring" id="hdnjsonstring" value="">

  <script src="vendor/js/vendor.js"></script>
  <script src="dist/formbuilder.js"></script>

  <script>
    $(function(){
      fb = new Formbuilder({
        selector: '.fb-main',
        bootstrapData: 
	<?php	if(isset($_SESSION["user_id"])){
$select_db_string = mysql_query("select * from form_fields_json where user_master_id = '".$_SESSION["user_id"]."'");
if(mysql_num_rows($select_db_string) > 0){
$row_db_string = mysql_fetch_array($select_db_string);
echo $row_db_string['form_fields_json_string'];
}else{
	echo '[
           {
            "label": "Journal Entry Title",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "journal_entry_title"
          },
          {
            "label": "Journal Entry Status",
            "field_type": "radio",
			"required": true,
            "field_options": {
                "options": [{
                    "label": "Open",
                    "checked": false
                }, {
                    "label": "Stalking",
                    "checked": false
                }, {
                    "label": "Closed",
                    "checked": false
                }]
            },
            "cid": "journal_entry_status"
          },
          {
            "label": "Journal Entry Priority",
            "field_type": "dropdown",
			"required": false,
            "field_options": {
                "options": [{
                    "label": "Red",
                    "checked": false
                }, {
                    "label": "Yellow",
                    "checked": false
                }, {
                    "label": "Green",
                    "checked": false
                }, {
                    "label": "no Colour/priority",
                    "checked": false
                }]
            },
            "cid": "journal_entry_priority"
          },
		  {
            "label": "Journal Date",
            "field_type": "date",
			"required": true,
            "field_options": {},
            "cid": "journal_entry_date"
          },
		  {
            "label": "Potential Take Profit (Pips)",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_take_profit"
          },
		  {
            "label": "New Potential Take Profit (Pips)",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_take_profit"
          },
		  {
            "label": "Pips earned/lost",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "pips_earned_lost"
          },
		  {
            "label": "Potential Entry Price",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_entry_price"
          },
		  {
            "label": "New Potential Entry Price",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_entry_price"
          },
		  {
            "label": "Actual Entry Price",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "actual_entry_price"
          },
		  {
            "label": "Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_account_risk"
          },
		  {
            "label": "New Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_account_risk"
          },
		  {
            "label": "Actual Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "actual_potential_account_risk"
          },
		  {
            "label": "What should have been Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "what_potential_account_risk"
          },
		  {
            "label": "Potential Risk to Reward",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_risk_to_reward"
          },
		  {
            "label": "New Potential Risk to Reward",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_risk_to_reward"
          },
		  {
            "label": "Actual Potential Risk to Reward",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "actual_potential_risk_to_reward"
          },
          {
            "label": "Currency Group",
            "field_type": "dropdown",
			"required": true,
            "field_options": {
                "options": [{
                    "label": "AUD",
                    "checked": false
                }, {
                    "label": "CAD",
                    "checked": false
                }, {
                    "label": "EUR",
                    "checked": false
                }, {
                    "label": "GBP",
                    "checked": false
                }, {
                    "label": "JPY",
                    "checked": false
                }, {
                    "label": "NZD",
                    "checked": false
                }, {
                    "label": "SGD",
                    "checked": false
                }, {
                    "label": "USD",
                    "checked": false
                }]
            },
            "cid": "currency_group"
          },
		  {
            "label": "Date 4",
			"required": true,
            "field_type": "date",
            "field_options": {},
            "cid": "date4"
          }
        ]';
	}
	}else{
?>
[
           {
            "label": "Journal Entry Title",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "journal_entry_title"
          },
          {
            "label": "Journal Entry Status",
            "field_type": "radio",
			"required": true,
            "field_options": {
                "options": [{
                    "label": "Open",
                    "checked": false
                }, {
                    "label": "Stalking",
                    "checked": false
                }, {
                    "label": "Closed",
                    "checked": false
                }]
            },
            "cid": "journal_entry_status"
          },
          {
            "label": "Journal Entry Priority",
            "field_type": "dropdown",
			"required": false,
            "field_options": {
                "options": [{
                    "label": "Red",
                    "checked": false
                }, {
                    "label": "Yellow",
                    "checked": false
                }, {
                    "label": "Green",
                    "checked": false
                }, {
                    "label": "no Colour/priority",
                    "checked": false
                }]
            },
            "cid": "journal_entry_priority"
          },
		  {
            "label": "Journal Date",
            "field_type": "date",
			"required": true,
            "field_options": {},
            "cid": "journal_entry_date"
          },
		  {
            "label": "Potential Take Profit (Pips)",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_take_profit"
          },
		  {
            "label": "New Potential Take Profit (Pips)",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_take_profit"
          },
		  {
            "label": "Pips earned/lost",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "pips_earned_lost"
          },
		  {
            "label": "Potential Entry Price",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_entry_price"
          },
		  {
            "label": "New Potential Entry Price",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_entry_price"
          },
		  {
            "label": "Actual Entry Price",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "actual_entry_price"
          },
		  {
            "label": "Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_account_risk"
          },
		  {
            "label": "New Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_account_risk"
          },
		  {
            "label": "Actual Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "actual_potential_account_risk"
          },
		  {
            "label": "What should have been Potential Account Risk",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "what_potential_account_risk"
          },
		  {
            "label": "Potential Risk to Reward",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "potential_risk_to_reward"
          },
		  {
            "label": "New Potential Risk to Reward",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "new_potential_risk_to_reward"
          },
		  {
            "label": "Actual Potential Risk to Reward",
            "field_type": "text",
			"required": true,
            "field_options": {},
            "cid": "actual_potential_risk_to_reward"
          },
          {
            "label": "Currency Group",
            "field_type": "dropdown",
			"required": true,
            "field_options": {
                "options": [{
                    "label": "AUD",
                    "checked": false
                }, {
                    "label": "CAD",
                    "checked": false
                }, {
                    "label": "EUR",
                    "checked": false
                }, {
                    "label": "GBP",
                    "checked": false
                }, {
                    "label": "JPY",
                    "checked": false
                }, {
                    "label": "NZD",
                    "checked": false
                }, {
                    "label": "SGD",
                    "checked": false
                }, {
                    "label": "USD",
                    "checked": false
                }]
            },
            "cid": "currency_group"
          },
		  {
            "label": "Date 4",
			"required": true,
            "field_type": "date",
            "field_options": {},
            "cid": "date4"
          }
        ]
<?php } ?>
      });

      fb.on('save', function(payload){
      // console.log(payload);
	   var obj = JSON.parse( payload );
	   var obj1 = JSON.stringify(obj.fields)
	 // console.log(obj.fields);
	 document.getElementById('hdnjsonstring').value = obj1;
	 var data = $("#hdnjsonstring").serialize();
	 $.ajax({
         data: data,
         type: "post",
         url: "ajax_json_string_db.php",
         success: function(data){
              console.log(obj1);
         }
		 });
	
	   
      })
    });
  </script>

</body>
</html>