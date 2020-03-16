<?php
include 'config.php';
in(1);

$username = x($_POST['search']);
users("WHERE  `username` LIKE '%$username%' AND `id` <> '$userid'" , 0);

?>