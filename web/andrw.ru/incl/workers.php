<?php
		$ttitle = "<tr>
			<th>ID</th>
			<th>Активен</th>
			<th>Client</th>
			<th>Агент</th>
			<th>Профессия</th>
			<th class=\"chkbox\">
				<input type=\"checkbox\" name=\"Check_ctr\" value=\"yes\" onClick=\"checkAll(document.list00.client, this)\">
			</th>
			</tr>";
		$tfilter = "<tr>
            <td><input type=\"text\" name=\"search_domain_id\" size=\"4\" value=\"\"></td>
            <td><select name=\"search_active\"><option value=\"\"></option><option value=\"y\">Yes</option>
						<option value=\"n\">No</option>
						</select></td>
            <td><select name=\"search_sys_groupid\"><option value=\"\"></option><option value=\"3\">andrw</option>
						<option value=\"2\">WhiteRabbit</option>
						</select></td>
            <td><select name=\"search_server_id\"><option value=\"\"></option><option value=\"1\">Ivanov</option>
						</select></td>
            <td class=\"search_field\"><input type=\"search\" name=\"search\" value=\"\"  class=\"search_field\" size=\"35\"></td>
            <td class=\"chkbox\"></td>
          </tr>";
		$thead = "<thead>" . $ttitle . $tfilter . "</thead>";
		
		/*database query here*/
		
		#$trow = "<td>#{ID}</td><td><span>{ACTIVE}</span></td><td>(FIO)</td><td>{AGENT}</td><td>{PROFESSION}</td><td> <input type=\"checkbox\" name=\"client\" value=\"id1\"></td>";
		$trows = "
		<tr class=\"tbl_row_uneven\">
		</tr>
		<tr class=\"tbl_row_even\">
		</tr>";
		$tbody = "<tbody class=\"scrollContent\">".$trows."</tbody>";
		$table = "<table class=\"list\">".$thead.$tbody."</table>";
		
		$content = $table;
		
		$content = "<form name =\"list00\" action=\"index.php\">".$table."</form>";
		mysql_close($con);
		return  $content;
?>	