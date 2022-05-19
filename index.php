<?php
require('dbconnect.php');

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// die; // Stop exekver

/**
 * CRUD (Create Read Update Delete)
 */


/**
 * DELETE 
 */

 if (isset($_POST['deletePun'])) {
   $sql = "DELETE FROM puns WHERE id = :id;";

   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(":id", $_POST['deletePun']);
   $stmt->execute();
 }


/**
 * CREATE 
 */

if (isset($_POST['addPun'])) {
  $sql = "INSERT INTO puns (content) VALUES (:content);";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":content", $_POST['content']);
  $stmt->execute();
};


/**
 * UPDATE 
 */

if (isset($_POST['editPun'])) {
  $sql = "UPDATE puns SET content = :newContent WHERE id = :id;";

  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":id", $_POST['id']);
  $stmt->bindParam(":newContent", $_POST['content']);
  $stmt->execute();
}


/**
 * READ (SELECT )
 */

$stmt = $pdo->query("SELECT * FROM puns");  // VIKTIGT! Ha sist, efter man manipulerat (delete, update, post)
$puns = $stmt->fetchAll();

// print_r($puns[0]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>PDO</title>
</head>
<body>
  <h1>PUNS</h1>
  <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Pun</th>
      <th>Date</th>
      <th>Ta bort</th>
      <th>Ändra</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($puns as $pun) { ?>

      <tr>
        <td><?=htmlentities($pun['id']) ?></td>
        <td><?=htmlentities($pun['content']) ?></td>
        <td><?=htmlentities($pun['create_date']) ?></td>
        <td>
        <form action="" method="POST">
          <input
            type="hidden"
            name="deletePun"
            value="<?=$pun['id'] ?>"
          />
          <button>Delete</button>
        </form>
        </td>
        <td>
        <form action="update.php" method="POST">
          <input
            type="hidden"
            name="editPun"
            value="<?=$pun['content'] ?>"
          />
          <input type="hidden" name="id" value="<?=$pun['id'] ?>">
          <button>Edit</button>
        </form>
        </td>            
      </tr>

      <?php }?>
  </tbody>
</table>

<form action="" method="POST">
  <input type="text" name="content" placeholder="Write a pun"><br>
  <input type="submit" name="addPun" value="Create pun"><br>
</form>


</body>
</html>