<html>
  <head>
    <link href="Style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <a href="AdminHome.html">Back to home...</a><br>
    <form action="DeletePostBackend.php" method="POST">
      <table>
              <?php
                $host="mysql.eecs.ku.edu";
                $username="kmittenburg";
                $password="P@\$\$word123";
                $db_name="kmittenburg";
                $tbl_name="Posts"; // Table name
                // Connect to server and select databse.
                $mysqli = new mysqli("$host", "$username", "$password", "$db_name")or die("cannot connect");

                $query = "SELECT * FROM $tbl_name";
                $query_results = $mysqli->query($query);
                echo "<tr><th>Author_Id</th><th>Content</th><th>Delete?</th></tr>";
                while($row = $query_results->fetch_assoc())
                {
                    echo "<tr>";
                    $a = (string)$row['author_id'];
                    echo '<td id = "bottomLine">' . $a . "</td>";
                    $a = (string)$row['content'];
                    echo '<td id = "bottomLine">' . $a . "</td>";
                    $a = (string)$row['post_id'];
                    echo '<td id = "bottomLine"><input type="checkbox" name="delete[]" value = "' .$a . '" ></td>';
                }
                $mysqli->close();
              ?>
      </table><br>

			<input type="submit" name="submit" id="submit" value="Submit">
	  </form>
  </body>
</html>
