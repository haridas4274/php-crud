<?php

session_start();

require_once "../classes/Auth.php";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $auth = new Auth();

    print_r($_POST);
    if(
        $auth->login(
            $_POST['email'],
            $_POST['password']
        )
    )
    {
        header("Location: dashboard.php");
        exit;
    }

    echo "Invalid Login";
}
?>

<form method="POST">
    <input type="email" name="email">

    <input type="password" name="password">

    <button type="submit">Login</button>
</form>