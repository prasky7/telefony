<!-- hlavicka -->
<?php $currentPage = "Administrace telefonního seznamu"; ?>
<?php require_once("includes/header.php"); ?>



<!-- obsah -->
<div class="text-center">
<h2 style="color:red;"> <i class="fas fa-user-shield fa-2x" style="color:green;"></i> <?php echo $currentPage; ?></h2>
<br>
</div>

<!-- <section class="container py-2 mb-4"> -->
  <div class="row ml-4 mr-4 py-2">
    <div class="col-lg-12">

      <?php
       echo ErrorMessage();
       echo SuccessMessage();
      ?>

       <table class="table table-striped table-hover">
         <thead class="thead-dark">
         <tr>
           <th>ID</th>
           <th>Jméno</th>
           <th>Přijmení</th>
           <th>Titul</th>
           <th>Pozice</th>
           <th>Pevná linka</th>
           <th>Mobilní telefon</th>
           <th>VoIP</th>
           <th>Kancelář</th>
           <th>Lokalita</th>
           <th>Upravit</th>
           <th>Smazat</th>
         </tr>
         </thead>
                 <?php
                 global $ConnectingDB;
                 $sql  = "SELECT * FROM ab_addressbook ORDER BY lastname ASC";
                 $stmt = $ConnectingDB->query($sql);
                 while ($DataRows = $stmt->fetch()) {
                   $id        = htmlspecialchars($DataRows["id"]);
                   $firstname = htmlspecialchars($DataRows["firstname"]);
                   $lastname  = htmlspecialchars($DataRows["lastname"]);
                   $titul     = htmlspecialchars($DataRows["title"]);
                   $pozice    = htmlspecialchars($DataRows["pozice"]);
                   $work      = htmlspecialchars($DataRows["work"]);
                   $mobile    = htmlspecialchars($DataRows["mobile"]);
                   $voip      = htmlspecialchars($DataRows["voip"]);
                   $lokalita  = htmlspecialchars($DataRows["kancelar"]);
                   $kancelar  = htmlspecialchars($DataRows["role"]);
                 ?>
     <tbody>
     <tr>
       <td>
           <?php echo $id; ?>
       </td>
       <td>
           <?php echo html_entity_decode($firstname); ?>
        </td>
        <td>
           <?php echo html_entity_decode($lastname); ?>
        </td>
        <td>
           <?php echo html_entity_decode($titul); ?>
       </td>
       <td>
           <?php echo html_entity_decode($pozice); ?>
       </td>
       <td>
           <?php echo html_entity_decode($work); ?>
       </td>
       <td>
           <?php echo html_entity_decode($mobile); ?>
       </td>
       <td>
           <?php echo html_entity_decode($voip); ?>
       </td>
       <td>
           <?php echo html_entity_decode($kancelar); ?>
       </td>
       <td>
           <?php echo html_entity_decode($lokalita); ?>
       </td>
           <td>
             <a href="edit.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Editovat</span></a>
           </td>
           <td>
             <a href="delete.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Smazat</span></a>
           </td>
             </tr>
             </tbody>
     <?php } ?>   <!--  Ending of While loop -->
       </table>

    </div>
  </div>
  <!-- </section> -->


<?php


 ?>

<!-- paticka -->
<?php require_once("includes/footer.php"); ?>
