<!-- hlavicka -->
<?php $currentPage = "Administrace telefonního seznamu"; ?>
<?php require_once("includes/header.php"); ?>

<?php Confirm_Login(); ?> 

<!-- obsah -->
<div class="text-center">
<h2> <i class="fas fa-user-shield fa-2x" style="color:green;"></i> <?php echo $currentPage; ?></h2>
<br>
</div>

<!-- <section class="container py-2 mb-4"> -->
  <div class="row ml-4 mr-4 py-2">
    <div class="col-lg-12">

      <?php
       echo ErrorMessage();
       echo SuccessMessage();
      ?>

      <!-- hledani  start -->
      <script type="text/javascript"
       src="js/jquery-3.5.1.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){

        // Search all columns
        $('#txt_searchall').keyup(function(){
          // Search Text
          var search = $(this).val();

      	// Hide all table tbody rows
          $('table tbody tr').hide();

          // Count total search result
          var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

          if(len > 0){
            // Searching text in columns and show match row
            $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
              $(this).closest('tr').show();
            });
          }else{
            $('.notfound').show();
          }

        });

        // Search on name column only
        $('#txt_name').keyup(function(){
          // Search Text
          var search = $(this).val();

          // Hide all table tbody rows
          $('table tbody tr').hide();

          // Count total search result
          var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+search+'")').length;

          if(len > 0){
            // Searching text in columns and show match row
            $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
      		 $(this).closest('tr').show();
            });
          }else{
            $('.notfound').show();
          }

        });
      });
      </script>


      <div class="text-center">
        <div class="form-group">
        <input class="form-control mr-2" type="text" name="Search" id="txt_searchall" placeholder=" Zadejte hledáný kontakt ! Pozor na malá a velká písmena !">
      <!-- <input type='text'  placeholder=' Zadejte hledáný kontakt '>&nbsp; <br><br><br> -->
      </div>
      </div>
      <!-- hledani  end -->

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
             <a href="edit.php?id=<?php echo $id; ?>"><span class="btn btn-warning">Editovat</span></a>
           </td>
           <td>
             <a href="delete.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Smazat</span></a>
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
