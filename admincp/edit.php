<!-- hlavicka -->
<?php $currentPage = "Editace kontaktu"; ?>
<?php require_once("includes/header.php"); ?>

<?php Confirm_Login(); ?>

<?php

$mojeid = $_GET['id'];

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
  }

if(isset($_POST["Submit"])){
  $firstnameU  = $_POST["firstname"];
  $lastnameU   = $_POST["lastname"];
  $titleU      = $_POST["title"];
  $poziceU     = $_POST["pozice"];
  $workU       = $_POST["work"];
  $mobileU     = $_POST["mobile"];
  $voipU       = $_POST["voip"];
  $lokalitaU   = $_POST["kancelar"];
  $kancelarU   = $_POST["role"];
  $groupidU    = $_POST["groups"];

  if(empty($firstnameU)){
    $_SESSION["ErrorMessage"]= "Jméno nesmí být prázdné";
    Redirect_to("edit.php");
  }elseif (empty($lastnameU)){
    $_SESSION["ErrorMessage"]= "Příjmení nesmí být prázdné";
    Redirect_to("edit.php");
  }elseif (empty($poziceU)){
    $_SESSION["ErrorMessage"]= "Pozice nesmí být prázdná";
    Redirect_to("edit.php");
  }else{
    // pokude je vse OK vloz data
    global $ConnectingDB;
    $sql = "UPDATE ab_addressbook
            SET firstname='$firstnameU', lastname='$lastnameU', title='$titleU', pozice='$poziceU', work='$workU', mobile='$mobileU', voip='$voipU', kancelar='$lokalitaU', role='$kancelarU'
            WHERE id='$mojeid'";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':firstName',$firstnameU);
    $stmt->bindValue(':lastName',$lastnameU);
    $stmt->bindValue(':Title',$titleU);
    $stmt->bindValue(':Pozice',$poziceU);
    $stmt->bindValue(':Work',$workU);
    $stmt->bindValue(':Mobile',$mobileU);
    $stmt->bindValue(':Voip',$voipU);
    $stmt->bindValue(':Lokalita',$lokalitaU);
    $stmt->bindValue(':Kancelar',$kancelarU);
    $Execute=$stmt->execute();
    if($Execute){
        $_SESSION["SuccessMessage"]="Kontakt je aktualizovaný";
        // prirad posledni ID ke zvolene pobocce
        if (isset($groupidU)) {
        global $ConnectingDB;
        $sql1 = "UPDATE ab_address_in_groups
                SET group_id='$groupidU'
                WHERE id='$mojeid'";
        $stmt1 = $ConnectingDB->prepare($sql1);
        $Execute1=$stmt1->execute();
        Redirect_to("index.php");
        }
        $_SESSION["ErrorMessage"]= "Zadejte pobočku prosím, pokud se změnila.";
          } else {
            $_SESSION["ErrorMessage"]= "Něco se pokazilo, zkuste to prosím znovu !";
            Redirect_to("edit.php");
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

       <?php
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
       ?>

      <form class="" action="edit.php?id=<?php echo $mojeid; ?>" method="post">
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
                <option value="" selected disabled>Vyberte pobočku!</option>
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
                  <i class="fas fa-check"></i> Aktualizovat kontakt
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
