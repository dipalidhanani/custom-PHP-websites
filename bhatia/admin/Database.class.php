<?php
# Name: DatabaseConnection.class.php
# File Description: MySQL Class to allow easy and clean access to common mysql commands

class Database {
		
		var $server   = DB_SERVER; //database server
		var $user     = DB_USER; //database login name
		var $pass     = DB_PASS; //database login password
		var $database = DB_DATABASE; //database name
		var $pre      = ""; //table prefix
		
		
		#######################
		//internal info
		var $error = "";
		var $errno = 0;
		
		//number of rows affected by SQL query
		var $affected_rows = 0;
		
		var $link_id = 0;
		var $query_id = 0;
		
		
		#-#############################################
		# desc: constructor
		function Database($server, $user, $pass, $database, $pre=''){
			$this->server=$server;
			$this->user=$user;
			$this->pass=$pass;
			$this->database=$database;
			$this->pre=$pre;
		}#-#constructor()
		
		
		#-#############################################
		# desc: connect and select database using vars above
		function connect($new_link=false) {
			$this->link_id=@mysql_connect($this->server,$this->user,$this->pass,$new_link);
		
			if (!$this->link_id) {//open failed
				$this->oops("Could not connect to server: <b>$this->server</b>.");
				}
		
			if(!@mysql_select_db($this->database, $this->link_id)) {//no database
				$this->oops("Could not open database: <b>$this->database</b>.");
				}
		
			// unset the data so it can't be dumped
			$this->server='';
			$this->user='';
			$this->pass='';
			$this->database='';
		}#-#connect()
		
		
		#-#############################################
		# desc: close the connection
		function close() {
			if(!@mysql_close($this->link_id)){
				$this->oops("Connection close failed.");
			}
		}
		
		#-#############################################
		# Desc: escapes characters to be mysql ready
		function escape($string) {
			if(get_magic_quotes_runtime()) $string = stripslashes($string);
			return @mysql_real_escape_string($string,$this->link_id);
		}
		
		#-#############################################
		# Desc: executes SQL query to an open connection
		function dbselect($sql) {
			// do query
			$this->query_id = @mysql_query($sql, $this->link_id);
		
			if (!$this->query_id) {
				$this->oops("<b>MySQL Select Query fail:</b> $sql");
				return 0;
			}
			
			$this->affected_rows = @mysql_affected_rows($this->link_id);
		
			return $this->query_id;
		}
		
		function dbselect1($sql) {
			// do query
			$this->query_id = @mysql_fetch_array(@mysql_query($sql, $this->link_id));
		
			if (!$this->query_id) {
				$this->oops("<b>MySQL Select Query fail:</b> $sql");
				return 0;
			}
			
			$this->affected_rows = @mysql_affected_rows($this->link_id);
		
			return $this->query_id;
		}
		
		#-#############################################
		# desc: fetches and returns results one line at a time
		function fetch_array($query_id=-1) {
			// retrieve row
			if ($query_id!=-1) {
				$this->query_id=$query_id;
			}
		
			if (isset($this->query_id)) {
				$record = @mysql_fetch_assoc($this->query_id);
			}else{
				$this->oops("Invalid query_id: <b>$this->query_id</b>. Records could not be fetched.");
			}
		
			return $record;
		}
		
		#-#############################################
		# desc: returns all the results (not one row)
		function fetch_all_array($sql) {
			$query_id = $this->query($sql);
			$out = array();
		
			while ($row = $this->fetch_array($query_id)){
				$out[] = $row;
			}
		
			$this->free_result($query_id);
			return $out;
		}
		
		#-#############################################
		# desc: frees the resultset
		function free_result($query_id=-1) {
			if ($query_id!=-1) {
				$this->query_id=$query_id;
			}
			if($this->query_id!=0 && !@mysql_free_result($this->query_id)) {
				$this->oops("Result ID: <b>$this->query_id</b> could not be freed.");
			}
		}
		
		#-#############################################
		# desc: does a query, fetches the first row only, frees resultset
		function query_first($query_string) {
			$query_id = $this->query($query_string);
			$out = $this->fetch_array($query_id);
			$this->free_result($query_id);
			return $out;
		}
		
		#-#############################################
		# desc: does an update query with an array
		function dbupdate($table, $data, $where='1') {
			$q="UPDATE `".$this->pre.$table."` SET ";
		
			foreach($data as $key=>$val) {
				if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
				elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
				elseif(preg_match("/^increment\((\-?\d+)\)$/i",$val,$m)) $q.= "`$key` = `$key` + $m[1], "; 
				else $q.= "`$key`='".$this->escape($val)."', ";
			}
		
			$q = rtrim($q, ', ') . ' WHERE '.$where.';';
			//echo $q; exit;
			return $this->query($q);
		}
		
		#-#############################################
		# desc: does an insert query with an array
		function dbinsert($table, $data) {
			$q="INSERT INTO `".$this->pre.$table."` ";
			$v=''; $n='';
		
			foreach($data as $key=>$val) {
				$n.="`$key`, ";
				if(strtolower($val)=='null') $v.="NULL, ";
				elseif(strtolower($val)=='now()') $v.="NOW(), ";
				else $v.= "'".$this->escape($val)."', ";
			}
		
			$q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
		
			if($this->query($q)){
				//$this->free_result();
				return mysql_insert_id($this->link_id);
			}
			else return false;
		
		}
		
		#-#############################################
		# Desc: executes SQL query to an open connection
		# Param: (MySQL query) to execute
		# returns: (query_id) for fetching results etc
		function query($sql) {
			// do query
			$this->query_id = @mysql_query($sql, $this->link_id);
		
			if (!$this->query_id) {
				$this->oops("<b>MySQL Query fail:</b> $sql");
				return 0;
			}
			
			$this->affected_rows = @mysql_affected_rows($this->link_id);
		
			return $this->query_id;
		}#-#query()

		/////////Paging Function//////////////		
		function pagingLimit($query,$pos,$pagesize)
		{		 
		 	//echo $query." LIMIT $pos,$pagesize"; exit;
			$query=mysql_query($query." LIMIT $pos,$pagesize") or die(mysql_error()); 		 	
		 	return $query;
		}
		
		#-#############################################
		# desc: throw an error message
		function oops($msg='') {
			if($this->link_id>0){
				$this->error=mysql_error($this->link_id);
				$this->errno=mysql_errno($this->link_id);
			}
			else{
				$this->error=mysql_error();
				$this->errno=mysql_errno();
			}
			?>
				<table align="center" border="1" cellspacing="0" style="background:white;color:black;width:80%;">
				<tr><th colspan=2>Database Error</th></tr>
				<tr><td align="right" valign="top">Message:</td><td><?php echo $msg; ?></td></tr>
				<?php if(!empty($this->error)) echo '<tr><td align="right" valign="top" nowrap>MySQL Error:</td><td>'.$this->error.'</td></tr>'; ?>
				<tr><td align="right">Date:</td><td><?php echo date("l, F j, Y \a\\t g:i:s A"); ?></td></tr>
				<?php if(!empty($_SERVER['REQUEST_URI'])) echo '<tr><td align="right">Script:</td><td><a href="'.$_SERVER['REQUEST_URI'].'">'.$_SERVER['REQUEST_URI'].'</a></td></tr>'; ?>
				<?php if(!empty($_SERVER['HTTP_REFERER'])) echo '<tr><td align="right">Referer:</td><td><a href="'.$_SERVER['HTTP_REFERER'].'">'.$_SERVER['HTTP_REFERER'].'</a></td></tr>'; ?>
				</table>
			<?php
		}
		
		function order($table,$field)
		{
			$query="SELECT * FROM $table order by $field";
			return mysql_query($query);
		}
		
		function displayall($tbl_name,$field)
		{
		$query = "SELECT * FROM $tbl_name ORDER BY $field";
		
		$q=mysql_query($query);
		return ($q);
		}
	
function display($columns, $table, $where_attributes, $order_column, $is_asc_order,$limit,$startpoint)
	{
		$order = "";
		if ($order_column != "")
		{
			$order_type = "";
			if ($is_asc_order == true)
				$order_type = "ASC";
			else
				$order_type = "DESC";
			
			$order = "ORDER BY ".$order_column." ".$order_type;
		}
		
		if ($where_attributes != "")
			$where_attributes = " WHERE ".$where_attributes;
		
		if ($limit != 0)
			$limit = "LIMIT ".$startpoint.",".$limit;
		else
			$limit = "";
			$pages=0;
								
		$sql = "SELECT ".$columns." FROM ".$table." ".$where_attributes." ".$order." ".$limit;
		//echo $sql; 
		return mysql_query($sql);
	}
	
	function delete($table, $column, $value)
	{
		//echo "DELETE FROM `".$table."` WHERE `".$column."` = '".$value."'";
		
		mysql_query("DELETE FROM `".$table."` WHERE `".$column."` = '".$value."'");
//		exit;
	}
	
	function insert($table, $column_names, $column_values)
	{
		
		
		$index = 0;
		$query  = "INSERT INTO `".$table."`( ";
		
		//Columns.
		foreach ($column_names as $name)
		{			
			$query .= "`".$name."`";
			
			$comma = "";
			if ($index != (count($column_names)-1))
				$comma = ",";
			$query .= $comma;
			
			$index++;
		}
		
		$index = 0;
		$query .= ") VALUES (";

		//Values.
		foreach ($column_values as $name)
		{
			if( $column_values[$index] == 'NOW()' )
			{
				//$column_values[$index]=NOW();
				$query .= "NOW()";
			}
			else
			{
				$query .= "'".$column_values[$index]."'";
			}
			
			$comma = "";
			if ($index != (count($column_names)-1))
				$comma = ",";
			$query .= $comma;
			
			$index++;
		}

		$query .= ");";
		//echo $query; exit;
			return @mysql_query($query);
	}
	
	function records($table)
	{
		$result=mysql_query("SELECT COUNT(*) FROM '".$table."' ");
		return $result;
	}
	
	function update($table, $id_column, $id_value, $column_names, $column_values)
	{
		global $query;
		$index = 0;
		$query  = "UPDATE `".$table."` SET ";
		
		foreach ($column_names as $name)
		{
			if( $column_values[$index] == 'NOW()' )
			{
				//$column_values[$index]=NOW();
				$query .= "`".$name."`= NOW()";
			}
			else
			{
			$query .= "`".$name."` = '".$column_values[$index]."'";
			}
			$comma = "";
			if ($index != (count($column_names)-1))
				$comma = ",";
			$query .= $comma;
			
			$index++;
		}
		
		$query .= " WHERE `".$id_column."` = '".$id_value."'";
		//echo $query; exit;
		mysql_query($query);
	}
	
	function numberofrows($table, $where)
	{
		$sql = sprintf("SELECT COUNT(*) as TOTALFOUND FROM $table %s", !empty($where) ? "WHERE $where": "");
		
		$my_table = mysql_query($sql); //EXECUTE SQL CODE

		return (mysql_result($my_table,0,"TOTALFOUND"));
	}
	

function backup_tables($host,$user,$pass,$name,$tables = '*')
{
  
  $link = mysql_connect($host,$user,$pass);
  mysql_select_db($name,$link);
  
  //get all of the tables
  if($tables == '*')
 {
    $tables = array();
    $result = mysql_query('SHOW TABLES');
    while($row = mysql_fetch_row($result))
    {
      $tables[] = $row[0];
    }
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  foreach($tables as $table)
  {
    $result = mysql_query('SELECT * FROM '.$table);
    $num_fields = mysql_num_fields($result);
    
    $return.= 'DROP TABLE '.$table.';';
    $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysql_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = ereg_replace("\n","\\n",$row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  }
 
  //save file
  $handle = fopen('backups/backup-'.time().'.sql','w+');
  fwrite($handle,$return);
  fclose($handle);
}
public function hidecheckbox()
	{
	?>
    <script language="javascript">
	$(document).ready(function()
		{
			$("input[@type=checkbox]").each(function()
			{
				$("input[@type=checkbox]").hide()
			});	
			
		});
	</script>
<?php 
}	
    public function hideadd()
	{
	?>
    <script language="javascript">
	$(document).ready(function()
		{
			$("a[@name=addme]").each(function()
			{
				$("a[@name=addme]").hide()
			});	
			
		});
	</script>
<?php 
}	
	
	 public function hidebackup()
	{
	?>
    <script language="javascript">
	$(document).ready(function()
		{
			$("a[@name=backup]").each(function()
			{
				$("a[@name=backup]").hide()
			});	
			
		});
	</script>
<?php 
}	
 
 public function hideexport()
	{
	?>
    <script language="javascript">
	$(document).ready(function()
		{
			$("a[@name=export]").each(function()
			{
				$("a[@name=export]").hide()
			});	
			
		});
	</script>
<?php 
}	

	public function hideeditbtn()
	{
	?>
    <script language="javascript">
	$(document).ready(function()
		{
			$("a[@name=hideme]").each(function()
			{
				$("a[@name=hideme]").hide()
			});	
			
		});
	</script>
<?php 

	}
	
	
	
	
	
}
?>