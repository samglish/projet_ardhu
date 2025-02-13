<?php
session_start();
error_reporting(0);
include "config.php";
// Uploads files
if(isset($_POST['save'])) { 
  // if save button on the form is clicked
  $filename=$_FILES["filename"]["name"];
  move_uploaded_file($_FILES["filename"]["tmp_name"],"media/".$_FILES["filename"]["name"]);
  $sql="insert into pdf_data(filename,file_des,file_date)values(:filename,'".$_POST['file_des']."', '".$_POST['file_date']."')";
  $query=$dbh->prepare($sql);
  $query->bindParam(':filename',$filename,PDO::PARAM_STR);
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
 <title>Cloud Ardhu</title>
 <!--Bootstrap -->
 <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
  <p><br></p>
  <div class="container">
  <center>
 <h2><label class="control-label" for="basicinput"> Cloud Ardhu<a href="../index.php"><img src="../images/logo.jpg" width="10%"></a></label></h2>
  <h6><label>Téléverser vos documents(tout type de fichier)</label></h6>
    <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
      <div class="control-group"> 
         <div>&nbsp;</div>
        <div class="controls">
        <input type="text" name="file_des" id="file_des" value="" placeholder="Titre du document" class="span8 tip" required>
        <input type="text" name="file_date" id="file_date" value="" placeholder="Année" class="span8 tip" required>
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
		 <th>ID</th>
		<th>Fichier</th>
          <th>Titre</th>
          <th>Année</th>
        </tr>
      </thead>

      <tbody>

        <?php 
        $sql = "SELECT * from pdf_data  order by id desc";
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





