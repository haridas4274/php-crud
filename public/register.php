<?php

require_once "../classes/Auth.php";

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $auth = new Auth();

    $auth->register(
        $_POST['name'],
        $_POST['email'],
        $_POST['password']
    );

    header("Location: login.php");
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Name">

    <input type="email" name="email" placeholder="Email">

    <input type="password" name="password" placeholder="Password">

    <button type="submit">Register</button>
</form>