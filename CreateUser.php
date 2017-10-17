<?php

///Connection Variables

$host="mysql.eecs.ku.edu"; // Host name
$username="kmittenburg"; // Mysql username
$password="P@\$\$word123"; // Mysql password
$db_name="kmittenburg"; // Database name
$tbl_name="Users"; // Table name

///Connect to the server
$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");

///Select the database, or display error
mysql_select_db("$db_name")or die("cannot select DB");




$user_id = $_POST["username"];
$query = "SELECT user_id FROM Users WHERE user_id='$user_id'";
$query_results = mysql_query($query);
if($user_id == "" || $user_id == null)
{
  echo "Username cannot be empty. Redirecting in 5 seconds...";
  header( "refresh:5;url=CreateUser.html" );
}
else if(mysql_num_rows($query_results) != 0)
{
  echo "Username is already in the database. Redirecting in 5 seconds...";
  header( "refresh:5;url=CreateUser.html" );
}
else
{
  //echo "INSERT INTO $tbl_name (user_id) VALUES ('$user_id')";   //DEBUGGING
  $sql1 = "INSERT INTO $tbl_name (user_id) VALUES ('$user_id')";
  if(mysql_query($sql1))
  {
    echo "Success. Redirecting in 5 seconds...";
    header( "refresh:5;url=CreateUser.html" );
  }
  else
  {
    echo "Failed to add username. Please try again. Redirecting in 5 seconds...";
    header( "refresh:5;url=CreateUser.html" );
  }
}


?>
