<?php
//Set style
echo '<html><head>
        <link href="Style.css" rel="stylesheet" type="text/css" />
      </head>';
///Connection Variables

$host="mysql.eecs.ku.edu"; // Host name
$username="kmittenburg"; // Mysql username
$password="P@\$\$word123"; // Mysql password
$db_name="kmittenburg"; // Database name
$tbl_name="Posts"; // Table name

$delete = $_POST['delete'];

///Connect to the server
$mysqli = new mysqli("$host", "$username", "$password", "$db_name")or die("cannot connect");
if(count($delete) > 0)
{

  echo "<table><tr><th>Post_Ids deleted</th></tr>";

  for($i = 0; $i < count($delete); $i++)
  {
    $query = "DELETE FROM $tbl_name WHERE post_id = $delete[$i]";
    $query_results = $mysqli->query($query);

    echo '<tr><td id ="bottomLine">' . $delete[$i] . "</td></tr>";
  }
}
echo "<label>Redirecting in 5 seconds...</label>";
header( "refresh:5;url=DeletePostFrontend.php" );
//echo "<table>";
//while($row = $query_results->fetch_assoc())
//{
//  echo "<tr><label><td>" . $row['content'] . "</td></label></tr>";
//}
//echo "</table>";
?>
