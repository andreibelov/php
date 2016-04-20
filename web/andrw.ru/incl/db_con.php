<?php
	/*Initial conditions*/
	
	$tbl = file_get_contents('../tpl/table.tpl');
	$tr = "<tr><td>#%s</td>
	<td>%s</td>
	<td>20</td>
	<td>10</td>
	<td>@mail</td>
	<td><a class=\"wwwlink\" href=\"http://www.%s/\">%s</a></td>
	<td class=\"checkbox\"><input type=\"checkbox\" class=\"cb-element\" /></td>
	</tr>";
	$tbody = "";
	/* Create a new mysqli object with database connection parameters */
	
		$mysqli = new mysqli("localhost", "c2_monolith", "kIOUYKBT", "c2_db");
	
		if(mysqli_connect_errno()) {
			echo "Connection Failed: " . mysqli_connect_errno();
			exit();
		}
		$mysqli->set_charset("utf8");
		$query = "SELECT * FROM partners";
		
		$result = $mysqli->query($query);

	/* numeric array */
	
		while ($row = $result->fetch_array(MYSQLI_NUM)){
			$tbody .= sprintf($tr,$row[0],$row[1],$row[5],$row[5]);
		}
	
	/* free result set */
		$result->free();
	
	/* Close connection */
		$mysqli -> close();
		
	/* Output */
		$table = str_replace("{TBODY}", $tbody, $tbl);
		echo $table;

?>