<?php
require('dbconnect.php'); //??


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<form action="index.php" method="POST">
<input type="hidden" name="id" value="<?=$_POST['id'];?>"><br>
  <input type="text" name="content" value="<?=$_POST['editPun'];?>"><br>
  <input type="submit" name="editPun" value="Update"><br>
</form>

</body>
</html>