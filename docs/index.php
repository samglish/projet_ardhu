<?php
session_start();
error_reporting(0);
include "config.php";
// Uploads files
if(isset($_POST['save'])) { 
  // Vérification de la taille du fichier uploadé (100 Mo max)
  $maxSize = 100 * 1024 * 1024; // 100 Mo
  if ($_FILES["filename"]["size"] > $maxSize) {
      echo '<script>alert("Le fichier dépasse la taille autorisée de 100 Mo.");</script>';
      exit;
  }
  
  // if save button on the form is clicked
  $filename = $_FILES["filename"]["name"];
  move_uploaded_file($_FILES["filename"]["tmp_name"],"media/".$_FILES["filename"]["name"]);
  $sql = "INSERT INTO pdf_data(filename, file_des, file_date, file_rep)
        VALUES (:filename, :file_des, :file_date, :file_rep)";
$query = $dbh->prepare($sql);
$query->bindParam(':filename', $filename, PDO::PARAM_STR);
$query->bindParam(':file_des', $_POST['file_des'], PDO::PARAM_STR);
$query->bindParam(':file_date', $_POST['file_date'], PDO::PARAM_STR);
$query->bindParam(':file_rep', $_POST['file_rep'], PDO::PARAM_STR);
$query->execute();

  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) 
  {
    echo '<script>alert("Saved successfully")</script>';
    echo "<script>window.location.href ='index.php'</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>Cloud ARDHU</title>

 <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
  <p><br></p>
  <div class="container">
  <center>
 <h2><label class="control-label" for="basicinput"> Cloud ARDHU<a href="../index.php"><img src="../images/logo.jpg" width="10%"></a></label></h2>
 </br>
    <a href="../regist_admin.php">pour ajouter un compte administrateur, cliquez ici</a> 
    </br></br> 
 <h6><label>Téléverser vos documents(tout type de fichier)</label></h6>
 Protection Générale(PG), Paix et Cohésion Sociale(PCS), Activité Générale de Revenue et protection de l'Environnement (AGR ou PENV), (VBG ou PEAS), protection de l'Enfance (PE),Logement-Terre et propriété(LTP), Communication(COM), Santé mentale(SM), Finance(F) </br>
 Parc Cameroun 2024 (PC24), Parc Cameroun 2025 (PC25), CERF 2024 (CF24), CERF 2025 (CF25), ICVA 2024 (IC24), ICVA 2025(IC25) </br>
  <font color="red">NB: Repertoire, uniquement les mots entre parentheses.</font> </br>
  <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
      <div class="control-group"> 
         <div>&nbsp;</div>
        <div class="controls">
      <input type="text" name="file_des" id="file_des" value="" placeholder="Titre du document" class="span8 tip" required>
        <input type="text" name="file_date" id="file_date" value="" placeholder="Année" class="span8 tip" required>
        <input type="text" name="file_rep" id="file_rep" value="" placeholder="Repertoire(Ex:AGR)" class="span8 tip" required>
          <input type="file" name="filename" id="filename" value="" class="span8 tip" required>
        </div>
      </div>
      <div class="form-group row pt-3">
        <div class="col-12">
          <button type="submit" class="btn btn-success" name="save">
            <i class="fa fa-plus "></i> Upload
          </button>
        </div>
      </div>
    </form>
    <table id="" class="table table-bordered">
      <thead>
        <tr>
		 <th>N°</th>
		<th>Fichier</th>
          <th>Titre</th>
          <th>Année</th>
          <th>Répertoire</th>
          <th>ID</th>
        </tr>
      </thead>

      <tbody>

        <?php 
        $sql = "SELECT * from pdf_data order by id desc limit 0, 1000";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
          foreach($results as $result)
          {
            ?>	
            <tr>
            <td><?php echo $cnt;?></td>
              <td><a href="media/<?php echo ($result->filename) ?>"><?php echo ($result->filename) ?></a></td>
              <td><?php echo ($result->file_des) ?></td>
              <td><?php echo ($result->file_date) ?></td>
              <td><?php echo ($result->file_rep) ?></td>
              <td><?php echo ($result->id) ?></td>
            </tr>
            <?php
            $cnt=$cnt+1;
          }
        } ?>
      </tbody>
    </table>
  </div> 
</body>
</html>





