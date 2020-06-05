<!-- hlavicka -->
<?php $currentPage = "Přihlášení do administrace"; ?>
<?php require_once("includes/header.php"); ?>

<?php
if(isset($_SESSION["UserId"])){
  Redirect_to("index.php");
}

if (isset($_POST["Submit"])) {
  $UserName = $_POST["Username"];
  $Password = $_POST["Password"];
  if (empty($UserName)||empty($Password)) {
    $_SESSION["ErrorMessage"]= "All fields must be filled out";
    Redirect_to("login.php");
  }else {
    // code for checking username and password from Database
    $Found_Account=Login_Attempt($UserName,$Password);
    if ($Found_Account) {
      $_SESSION["UserId"]=$Found_Account["user_id"];
      $_SESSION["UserName"]=$Found_Account["username"];
      $_SESSION["SuccessMessage"]= "Vítejte ".$_SESSION["UserName"]."!";
      if (isset($_SESSION["TrackingURL"])) {
        Redirect_to($_SESSION["TrackingURL"]);
      }else{
      Redirect_to("index.php");
    }
    }else {
      $_SESSION["ErrorMessage"]="Incorrect Username/Password";
      Redirect_to("login.php");
    }
  }
}


?>

<!-- obsah -->
<div class="text-center">
<h2> <i class="fas fa-user fa-2x" style="color:green;"></i> <?php echo $currentPage; ?></h2>
<br>
</div>

<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-sm-3 col-sm-6" style="min-height:500px;">
      <br><br><br>
      <?php
       echo ErrorMessage();
       echo SuccessMessage();
       ?>
      <div class="card bg-secondary text-light">
        <div class="card-header">
          <h4>Vítejte zpět!</h4>
          </div>
          <div class="card-body bg-dark">
          <form class="" action="login.php" method="post">
            <div class="form-group">
              <label for="username"><span class="FieldInfo">Jméno:</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-success"> <i class="fas fa-user"></i> </span>
                </div>
                <input type="text" class="form-control" name="Username" id="username" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="password"><span class="FieldInfo">Heslo</span></label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text text-white bg-success"> <i class="fas fa-lock"></i> </span>
                </div>
                <input type="password" class="form-control" name="Password" id="password" value="">
              </div>
            </div>
            <input type="submit" name="Submit" class="btn btn-success btn-block" value="Přihlásit">
          </form>

        </div>

      </div>

    </div>

  </div>

</section>

<!-- paticka -->
<?php require_once("includes/footer.php"); ?>
