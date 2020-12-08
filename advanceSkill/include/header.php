<?php

include (__DIR__ . DIRECTORY_SEPARATOR . 'db_connection.php'); 
require (__DIR__ . DIRECTORY_SEPARATOR . 'User.php');
include (__DIR__ . DIRECTORY_SEPARATOR . 'PHP_script.php');
session_start();
$user = new User();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Jean Pierre Louis Peterson">
  <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
  <title>Advanced Skill | <?php if(isset($title)){echo$title;}?></title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><span style="color:red;">Advanced</span>SKILL</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php if($title == 'Accueil'){echo 'active';} ?>">
            <a class="nav-link" href="index.php">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item <?php if($title == 'About'){echo 'active';} ?>">
            <a class="nav-link" href="about.php">A Propos</a>
          </li>
          <li class="nav-item <?php if($title == 'Service'){echo 'active';} ?>">
            <a class="nav-link" href="service.php">Services</a>
          </li>
          <li class="nav-item <?php if($title == 'Contact'){echo 'active';} ?>">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>

          <?php if(isset($_SESSION['email_user'])){ ?>
            <li class="nav-item active dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> <?php echo ucfirst($_SESSION['username']);?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"> <i class="fa fa-user"></i> Profile</a>
                <?php if($_SESSION['niveau_user'] == 'niveau1'): ?>
                <a class="dropdown-item" href="dashboard.php"><i class="fa fa-list"></i> Dashboard</a>
                <?php endif ?>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Deconnexion</a>
            </li>
          <?php } ?>

          <?php if(!isset($_SESSION['email_user'])){ ?>
          <li class="nav-item">
            <a class="btn btn-danger" href="login.php">S'idenifier</a>
          </li>
          <?php } ?>

        </ul>
      </div>
    </div>
  </nav>