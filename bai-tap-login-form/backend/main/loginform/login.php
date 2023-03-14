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
    


?>
<html>

<head>
    <script src = "check.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 10%">
        <div class="card" style="width: 18rem; margin: auto">
            <div class="card-body">
                <h5 class="card-title">Login</h5>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return check();">Submit</button>
                    <?php if (isset($message)) echo $message; ?>
                </form>
                <div class="form-group">
                    <h6 for="exampleInputEmail1">Don't have account</h6>
                    <a class="btn btn-outline-light my-2 my-sm-0" href="register.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
