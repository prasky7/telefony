<!-- hlavicka -->
<?php $currentPage = "Přihlášení do administrace"; ?>
<?php require_once("includes/header.php"); ?>

<?php
$_SESSION["UserId"]=null;
$_SESSION["UserName"]=null;
$_SESSION["TrackingURL"]=null;
session_destroy();
Redirect_to("login.php");
?>


<!-- obsah -->

<!-- paticka -->
<?php require_once("includes/footer.php"); ?>
