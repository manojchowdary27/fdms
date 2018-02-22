<?php $password='supersecretpassword';
$hash = password_hash($password, PASSWORD_BCRYPT);
echo $hash;
?>
