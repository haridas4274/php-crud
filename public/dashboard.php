<?php

require './layout/header.php';
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
}

require_once "../classes/User.php";

$user = new User();

$users = $user->all();
?>

<a href="logout.php">Logout</a>

<table class="table">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>

<?php foreach($users as $row): ?>

<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>

    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">
            Edit
        </a>

        <a href="delete.php?id=<?= $row['id'] ?>">
            Delete
        </a>
    </td>
</tr>

<?php endforeach; ?>

</table>
<?php require './layout/footer.php';?>
<script>
    $(document).ready(function(){
        // alert('jquery loaded');
    });
</script>