<?php
//Set style
echo '<head>
        <link href="Style.css" rel="stylesheet" type="text/css" />
      </head>';

////////////////////////////////////////////////////////////////////////////////
///Connection Variables

$host="mysql.eecs.ku.edu"; // Host name
$username="kmittenburg"; // Mysql username
$password="P@\$\$word123"; // Mysql password
$db_name="kmittenburg"; // Database name
$user_tbl_name="Users"; // Table name
$post_tbl_name="Posts";
///Connect to the server
$link = mysql_connect("$host", "$username", "$password")or die("cannot connect");

///Select the database, or display error
mysql_select_db("$db_name")or die("cannot select DB");
////////////////////////////////////////////////////////////////////////////////

$user_id = $_POST["username"];
$post = $_POST["post"];
$query = "SELECT user_id FROM Users WHERE user_id='$user_id'";
$query_results = mysql_query($query);

if($user_id == "" || $user_id == null)
{
  echo "<label>Username cannot be empty. Redirecting in 5 seconds...</label>";
  header( "refresh:5;url=CreatePosts.html" );
}
else if($post == "" || $post == null)
{
  echo "<label>Post cannot be empty. Redirecting in 5 seconds...</label>";
  header( "refresh:5;url=CreatePosts.html" );
}
else if(mysql_num_rows($query_results) == 0)
{
  echo "<label>Username is not in the database. Redirecting in 5 seconds...</lable>";
  header( "refresh:5;url=CreatePosts.html" );
}
else
{
  //echo "INSERT INTO $user_tbl_name (user_id) VALUES ('$user_id')";   //DEBUGGING
  $sql1 = "INSERT INTO $post_tbl_name (content, author_id) VALUES ('$post', '$user_id')";
  if(mysql_query($sql1))
  {
    echo "<label>Success. Redirecting in 5 seconds...</label>";
    header( "refresh:5;url=CreatePosts.html" );
  }
  else
  {
    echo "<label>Failed to add post. Please try again. Redirecting in 5 seconds...</label>";
    header( "refresh:5;url=CreatePosts.html" );
  }
}


?>
