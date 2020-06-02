<?php ob_start(); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>
<?php require_once("includes/db.php"); ?>

<!doctype html>
      <html>
        <head>
            <link href="css/all.css" rel="stylesheet"> <!-- awesomefonts-->
            <link rel="stylesheet" href="css/bootstrap.min.css"/> <!-- bootstrap -->
            <link rel="stylesheet" href="css/styles.css">

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?php echo $currentPage; ?></title>
        </head>
        <body>
          <!-- menu start -->
          <div style="height:6px; background:green;"></div>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a href="index.php" class="navbar-brand"> <i class="fas fa-phone-square-alt"></i> Telefonní seznam VoZP</a>
              <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarcollapseCMS">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a href="new.php" class="nav-link"> <i class="fas fa-plus text-success"></i> Nový kontakt</a>
                </li>
                <!-- <li class="nav-item">
                  <a href="edit.php" class="nav-link"> <i class="fas fa-edit text-success"></i> Editovat kontakt</a>
                </li>
                <li class="nav-item">
                  <a href="delete.php" class="nav-link"> <i class="fas fa-minus text-danger"></i> Smazat kontakt</a>
                </li> -->
                <li class="nav-item">
                  <a href="pobocka.php" class="nav-link"> <i class="fas fa-exchange-alt text-success"></i> Změna pobočky</a>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="Logout.php" class="nav-link text-danger">
                  <i class="fas fa-user-times"></i> Logout</a></li>
              </ul>
              </div>
            </div>
          </nav>
            <div style="height:6px; background:green;"></div>
            <br>
            <!-- menu end -->
