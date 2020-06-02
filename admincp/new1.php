<!-- hlavicka -->
<?php $currentPage = "Nový kontakt"; ?>
<?php require_once("includes/header.php"); ?>

<?php
if(isset($_POST["Submit"])){
  $firstname  = $_POST["firstname"];
  $lastname   = $_POST["lastname"];
  $title      = $_POST["title"];
  $pozice     = $_POST["pozice"];
  $work       = $_POST["work"];
  $mobile     = $_POST["mobile"];
  $voip       = $_POST["voip"];
  $lokalita   = $_POST["kancelar"];
  $kancelar   = $_POST["role"];

  if(empty($firstname)){
    $_SESSION["ErrorMessage"]= "Jméno nesmí být prázdné";
    Redirect_to("new1.php");
  }elseif (empty($lastname)){
    $_SESSION["ErrorMessage"]= "Příjmení nesmí být prázdné";
    Redirect_to("new1.php");
  }else{
    // pokude je vse OK vloz data
    global $ConnectingDB;
    $sql = "INSERT INTO ab_addressbook (firstname,lastname,title,pozice,work,mobile,voip,kancelar,role)";
    $sql .= "VALUES(:firstName,:lastName,:Title,:Pozice,:Work,:Mobile,:Voip,:Lokalita,:Kancelar)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':firstName',$firstname);
    $stmt->bindValue(':lastName',$lastname);
    $stmt->bindValue(':Title',$title);
    $stmt->bindValue(':Pozice',$pozice);
    $stmt->bindValue(':Work',$work);
    $stmt->bindValue(':Mobile',$mobile);
    $stmt->bindValue(':Voip',$voip);
    $stmt->bindValue(':Lokalita',$lokalita);
    $stmt->bindValue(':Kancelar',$kancelar);
    $Execute=$stmt->execute();
    if($Execute){
      $_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." added Successfully";
      Redirect_to("new1.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("new1.php");
    }
  }
}
?>

<!-- obsah -->
<div class="text-center">
<h2> <i class="fas fa-plus" style="color:green;"></i> <?php echo $currentPage; ?></h2>
<br>
</div>

<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo ErrorMessage();
       echo SuccessMessage();
       ?>
      <form class="" action="new1.php" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="firstname"> <span class="FieldInfo"> Jméno: </span></label>
               <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Vyplňte zde jméno..." value="">
            </div>
            <div class="form-group">
              <label for="lastname"> <span class="FieldInfo"> Příjmení: </span></label>
               <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Vyplňte zde příjmení..." value="">
            </div>
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Titul: </span></label>
               <input class="form-control" type="text" name="title" id="title" placeholder="Vyplňte zde titul..." value="">
            </div>
            <div class="form-group">
              <label for="pozice"> <span class="FieldInfo"> Pozice: </span></label>
               <input class="form-control" type="text" name="pozice" id="pozice" placeholder="Vyplňte zde pozici..." value="">
            </div>
            <div class="form-group">
              <label for="work"> <span class="FieldInfo"> Pevná linka: </span></label>
               <input class="form-control" type="text" name="work" id="work" placeholder="Vyplňte zde telefon..." value="">
            </div>
            <div class="form-group">
              <label for="mobile"> <span class="FieldInfo"> Mobil: </span></label>
               <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Vyplňte zde mobil..." value="">
            </div>
            <div class="form-group">
              <label for="voip"> <span class="FieldInfo"> VoIP: </span></label>
               <input class="form-control" type="text" name="voip" id="voip" placeholder="Vyplňte zde VoIP..." value="">
            </div>
            <div class="form-group">
              <label for="role"> <span class="FieldInfo"> Kancelář: </span></label>
               <input class="form-control" type="text" name="role" id="role" placeholder="Vyplňte zde číslo kanceláře..." value="">
            </div>
            <div class="form-group">
              <label for="kancelar"> <span class="FieldInfo"> Vyberte pobočku: </span></label>
               <select class="form-control" id="kancelar"  name="kancelar">
                  <option>Praha</option>
                  <option>Brno</option>
               </select>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="index.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Zpět na administraci</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Vložit nový kontakt
                </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  </section>

  <!-- paticka -->
  <?php require_once("includes/footer.php"); ?>
