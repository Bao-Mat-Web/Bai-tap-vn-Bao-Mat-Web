<?php
try{
$connectionString = "mysql:host=localhost;dbname=loginDB";
$conn = new \PDO($connectionString, "crystal", "password");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e;
    exit();
}
?>