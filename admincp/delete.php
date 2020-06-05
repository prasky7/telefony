<!-- hlavicka -->
<?php $currentPage = "Smazání kontaktu"; ?>
<?php require_once("includes/header.php"); ?>

<?php Confirm_Login(); ?> 

<?php

$mojeid = $_GET['id'];


global $ConnectingDB;
$sql2  = "SELECT * FROM ab_addressbook WHERE id='$mojeid'";
$stmt2 = $ConnectingDB->query($sql2);
while ($DataRows = $stmt2->fetch()) {
  $id2        = htmlspecialchars($DataRows["id"]);
  $firstname2 = htmlspecialchars($DataRows["firstname"]);
  $lastname2  = htmlspecialchars($DataRows["lastname"]);
  $titul2     = htmlspecialchars($DataRows["title"]);
  $pozice2    = htmlspecialchars($DataRows["pozice"]);
  $work2      = htmlspecialchars($DataRows["work"]);
  $mobile2    = htmlspecialchars($DataRows["mobile"]);
  $voip2      = htmlspecialchars($DataRows["voip"]);
  $lokalita2  = htmlspecialchars($DataRows["kancelar"]);
  $kancelar2  = htmlspecialchars($DataRows["role"]);
  }

  // kontrola zda je ID předáno a zda existuje
  if (!isset($mojeid)) {
    $_SESSION["ErrorMessage"]="Špatný požadavek!";
    Redirect_to("index.php");
    }
    $sql  = "SELECT * FROM ab_addressbook  WHERE id= '$mojeid'";
    $stmt =$ConnectingDB->query($sql);
    $Result=$stmt->rowcount();
    if ($Result!=1) {
    $_SESSION["ErrorMessage"]="Kontakt neexistuje!";
    Redirect_to("index.php");

if(isset($_POST["Submit"])){
  global $ConnectingDB;
  $sql = "DELETE FROM ab_addressbook WHERE id='$mojeid'";
  $Execute =$ConnectingDB->query($sql);
  if($Execute){
    $_SESSION["SuccessMessage"]="Kontakt je smazaný";
    Redirect_to("index.php");
  }else {
    $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
    Redirect_to("delete.php");
  }
}
}
?>

<!-- obsah -->
<div class="text-center">
<h2> <i class="fas fa-edit" style="color:green;"></i> <?php echo $currentPage; ?></h2>
<br>
</div>

<section class="container py-2 mb-4">
  <div class="row">
    <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php
       echo ErrorMessage();
       echo SuccessMessage();
       ?>



      <form class="" action="delete.php?id=<?php echo $mojeid; ?>" method="post">
        <div class="card bg-secondary text-light mb-3">
          <div class="card-body bg-dark">
            <div class="form-group">
              <label for="firstname"> <span class="FieldInfo"> Jméno: </span></label>
               <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Vyplňte zde jméno..." value="<?php echo $firstname2; ?>">
            </div>
            <div class="form-group">
              <label for="lastname"> <span class="FieldInfo"> Příjmení: </span></label>
               <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Vyplňte zde příjmení..." value="<?php echo $lastname2; ?>">
            </div>
            <div class="form-group">
              <label for="title"> <span class="FieldInfo"> Titul: </span></label>
               <input class="form-control" type="text" name="title" id="title" placeholder="Vyplňte zde titul..." value="<?php echo $titul2; ?>">
            </div>
            <div class="form-group">
              <label for="pozice"> <span class="FieldInfo"> Pozice: </span></label>
               <input class="form-control" type="text" name="pozice" id="pozice" placeholder="Vyplňte zde pozici..." value="<?php echo $pozice2; ?>">
            </div>
            <div class="form-group">
              <label for="work"> <span class="FieldInfo"> Pevná linka: </span></label>
               <input class="form-control" type="text" name="work" id="work" placeholder="Vyplňte zde telefon ve formátu XXX XXX XXX" value="<?php echo $work2; ?>">
            </div>
            <div class="form-group">
              <label for="mobile"> <span class="FieldInfo"> Mobil: </span></label>
               <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Vyplňte zde mobil ve formátu XXX XXX XXX" value="<?php echo $mobile2; ?>">
            </div>
            <div class="form-group">
              <label for="voip"> <span class="FieldInfo"> VoIP: </span></label>
               <input class="form-control" type="text" name="voip" id="voip" placeholder="Vyplňte zde VoIP..." value="<?php echo $voip2; ?>">
            </div>
            <div class="form-group">
              <label for="role"> <span class="FieldInfo"> Kancelář: </span></label>
               <input class="form-control" type="text" name="role" id="role" placeholder="Vyplňte zde číslo kanceláře..." value="<?php echo $kancelar2; ?>">
            </div>
            <div class="form-group">
              <label for="kancelar"> <span class="FieldInfo"> Lokalita: </span></label>
               <input class="form-control" type="text" name="kancelar" id="kancelar" placeholder="Vyplňte zde lokalitu..." value="<?php echo $lokalita2; ?>">
            </div>
            <div class="form-group">
              <label for="groups"> <span class="FieldInfo"> Vyberte pobočku: </span></label>
               <select class="form-control" id="groups"  name="groups">
                <option value="2">Ústředí VOZP ČR</option>
               	<option value="3">Pobočka VoZP ČR Plzeň</option>
               	<option value="4">Pobočka VoZP ČR Brno</option>
               	<option value="5">Pobočka VoZP Praha</option>
               	<option value="6">Pobočka VoZP Olomouc</option>
               	<option value="7">Pobočka VoZP České Budějovice</option>
               	<option value="8">Pobočka VoZP Hradec Králové</option>
               	<option value="9">Pobočka VoZP Ústí na Labem</option>
              </select>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-2">
                <a href="index.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Zpět na administraci</a>
              </div>
              <div class="col-lg-6 mb-2">
                <button type="submit" name="Submit" class="btn btn-success btn-block">
                  <i class="fas fa-check"></i> Smazat kontakt
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
