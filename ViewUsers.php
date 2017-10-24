<?php
//Set style
echo '<head>
        <link href="Style.css" rel="stylesheet" type="text/css" />
      </head>';
///Connection Variables

$host="mysql.eecs.ku.edu"; // Host name
$username="kmittenburg"; // Mysql username
$password="P@\$\$word123"; // Mysql password
$db_name="kmittenburg"; // Database name
$tbl_name="Users"; // Table name

///Connect to the server
$mysqli = new mysqli("$host", "$username", "$password", "$db_name")or die("cannot connect");

$query = "SELECT * FROM $tbl_name";
$query_results = $mysqli->query($query);
echo '<a href="AdminHome.html">Back to home...</a><br>';
echo "<table>";
while($row = $query_results->fetch_assoc())
{
  echo '<tr><label><td id ="bottomLine">' . $row['user_id'] . "</td></label></tr>";
}
echo "</table>";
?>
