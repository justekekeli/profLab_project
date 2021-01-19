<?php session_start();
if(isset($email) && isset($role)){
    $_SESSION['user']=$email;
    $_SESSION['role']=$role;
}
if(isset($finded)){
    foreach($finded as $user){
        $_SESSION['user']=$user['email'];
        $_SESSION['role']=$user['roleUser'];
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Dashboard</title>
    </head>
    <body>
        <h1>BIENVENUE</h1>
        <button onclick="<?php session_abort(); header('Location: view/test.php');?>">SE DÉCONNECTER</button>
    </body>
</html>