<?php
ob_start();
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        include "db.php";
        include "filter.php";
        $sql = "select username from users where username=? and password=?";
        $sth = $conn->prepare($sql);
        $username=$_POST['username'];
        $password=$_POST['password'];
        $sth->execute(array($_POST['username'], $_POST['password']));
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $message=checkLogin($_POST['username'], $_POST['password']);
            
        if(strcmp($message,"nothing wrong")==0){
            if ($sth->rowCount() > 0) {
                $row = $sth->fetch(); {
                    $_SESSION['username'] = $row['username'];
                    header("location: index.php");
                    ob_end_flush();
                }
            } else {
                $message = "Wrong username or password";
            }
        }
        
    } catch (PDOException $e) {
        $message =  $sql . "<br>" . $e->getMessage();
    }
}
if (isset($_SESSION['username'])){
    header("location: index.php");
    ob_end_flush();

}

if (isset($message)) echo $message;


?>
