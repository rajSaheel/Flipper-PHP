<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTable</title>
</head>
<body>
  <!-- Form layout -->
    <form action="mytable.php" method="post">
    <label for="Table Name">Table Name: <input type="text" name=table_name required/><br>
    <input type="submit" name="create_table"/>
    </form>
    <br>
</body>
</html>

<?php
//if form submitted
if ($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['create_table'])){
  // Creating connection
  $conn = new mysqli("localhost","root",'',"myDB");
  //Checking connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //query to create table
  $sql = "CREATE TABLE $_POST[table_name] ()";

  //result
  if ($conn->query($sql) === TRUE) {
    echo "Table $_POST[table_name] created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
  $conn->close();
}
?>