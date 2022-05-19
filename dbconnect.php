<?php

// echo "</pre>";
// print_r(PDO::getAvailableDrivers());
// echo "</pre>";

$host       = "localhost";
$database   = "my_db";
$user       = "root";
$pass       = "root";
$charset    = "utf8mb4";

$dsn        = "mysql:host={$host};dbname={$database};charset={$charset}";


$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Error mode
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    // Fetch style // OBJ-object ->name // ASSOC-array['name']
];


try {
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  // Catch blocket körs om något går fel med DB kopplingen
  // echo $e->getMessage();
  // echo $e->getCode();
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


?>


