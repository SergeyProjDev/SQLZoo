<?php //showDB
	 $connection = mysql_connect("localhost", "root", "");
	 mysql_select_db("test");

	 $query = "SELECT * FROM table1";
	 $result = mysql_query($query);

	 echo "<table>";
	   echo "<tr><td>   id    |    name   </td></tr>";
	   
	   while($row = mysql_fetch_array($result))
	   { 
         echo "<tr><td>" . $row['id'] . "    |    </td><td>" . $row['name'] . "</td></tr>";
	   }

	 echo "</table>"; 

	 mysql_close();
   ?>