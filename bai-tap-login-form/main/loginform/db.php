<?php
try{
$conn = new PDO("mysql:host=db;dbname=loginDB", "crystal", "password");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo $e;
    exit();
}
?>