<?php
session_start();
if (isset($_SESSION['username']))
    die(header('location: index.php'));
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen($_POST['username']) > 20)
        $message = "Sorry name too long";
    else {
        try {
            include "db.php";
            include "filter.php";
            $sql = "select username from users where username=?";
            $sth = $conn->prepare($sql);
            $message=checkRegister($_POST['username']);
            
                if(strcmp($message,"nothing wrong")==0){
                    $sth->execute(array($_POST['username']));
                    if ($sth->rowCount() > 0) {
                        $message = "Sorry this username already registered";
                    }
                    else{
                        $sql = "insert into users(username, password) values (?, ?)";
                    $sth = $conn->prepare($sql);
                    $sth->execute(array($_POST['username'], $_POST['password']));
                    $message = "Create successful";
                    }
                    
            }
        } catch (PDOException $e) {
            $message =  $sql . "<br>" . $e->getMessage();
        }
    }
}
?>

<html>

<head>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        
        
        <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-light my-2 my-sm-0" href="login.php">Sign In</a>
        </form>
    </nav>
    <div class="container" style="margin-top: 10%">
        <div class="card" style="width: 18rem; margin: auto">
            <div class="card-body">
                <h5 class="card-title">Register</h5>
                <form action="/register.php" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <?php if (isset($message)) echo $message; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>