
<html>
  <head>
    <link href="Style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <form action="ViewUserPosts.php" method="POST">
      <select name="username">
        <?php
          $host="mysql.eecs.ku.edu";
          $username="kmittenburg";
          $password="P@\$\$word123";
          $db_name="kmittenburg";
          $tbl_name="Users"; // Table name
          // Connect to server and select databse.
          $mysqli = new mysqli("$host", "$username", "$password", "$db_name")or die("cannot connect");

          $query = "SELECT * FROM $tbl_name";
          $query_results = $mysqli->query($query);
          $users = array();


          while ($row = $query_results->fetch_assoc())
          {
              $users[] = $row;
          }

          sort($users);
          $count = count($users);
          echo "<p>" . $count . "</p>";

          for ($i = 0; $i < $count; $i++)
          {
              $a=(string)$users[$i]['user_id'];
              echo "<option value= \"$a\" >" . $a . "</option>";
          }
        ?>
      </select>

			<input type="submit" value="Submit">
	  </form>
  </body>
</html>
