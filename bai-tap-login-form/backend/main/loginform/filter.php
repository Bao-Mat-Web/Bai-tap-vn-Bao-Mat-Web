<?php

function checkLogin($username,$password){
    $message="nothing wrong";
    if(empty($username) or empty($password)){
        $message='username or password empty!!!';
        
    }
    else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $username)){
        {
            $message= 'username contains special characters!!!';
        
        }
    }
    else if (preg_match('/\s/', $username)){
        {
            $message= 'username contains space!!!';
        
        }
    }
    return $message;
}
function checkRegister($username){
    $message="nothing wrong";
    if(empty($username)){
        $message='username or password empty!!!';
        
    }
    else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $username)){
        {
            $message= 'username contains special characters!!!';
        
        }
    }
    else if (preg_match('/\s/', $username)){
        {
            $message= 'username contains space!!!';
        
        }
    }
    return $message;
}
?>



