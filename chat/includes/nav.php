<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body class="bg-gradient-teal">
    <?php if(isset($userid)){?>
<nav class="container mt-5  navbar navbar-expand-lg navbar-light bg-white radius-20">
  <a class="navbar-brand" href="index.php">Messenger</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-danger" href="?logout">LOGOUT</a>
      </li>
    </ul>
</nav>
    <?php } ?>