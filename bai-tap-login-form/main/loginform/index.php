<?php
session_start();
if (!isset($_SESSION['username']))
  header("location: BT1-20521484-20521830-20522026-20521635.html");
?>
<html>

<head>
</head>

<body>
 
  
  
  <div class="container text-center">
    <h1>
      Welcome back, <?php echo $_SESSION['username']; ?>.
      
    </h1>
  </div>
  
  
</body>

</html>