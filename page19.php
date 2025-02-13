<?php
require ('docs/config.php');
session_start();
if(isset($_SESSION['id']) && $_SESSION['username'] != "") {
    echo "";
  } else { 
    header('location:login.php');
  }

?>

<?php
error_reporting(0);
// Uploads files
if(isset($_POST['save'])) { 
  // if save button on the form is clicked
  $filename=$_FILES["filename"]["name"];
  move_uploaded_file($_FILES["filename"]["tmp_name"],"media/".$_FILES["filename"]["name"]);
  $sql="insert into pdf_data(filename)values(:filename)";
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

          <?php
/*---------------------------------------------------------------*/
/*
    Titre : Moteur de recherche simple - MySQLi                                                                           
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=441
    Auteur           : freemh                                                                                             
    Date édition     : 02 Aout 2008                                                                                       
    Date mise à jour : 18 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                
*/
/*---------------------------------------------------------------*/?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cloud</title>
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="docs/css/style.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <title></title>
  </head>
  <body>
    <div class="container">
      <header>
        <!-- Carrotsuite navigation -->
        <nav class="carrotsuite-nav">
          <div class="logo">
            <a href="index.php" class="active nav-item">
              <img src="images/logo.jpg" alt="Wadjonautes" />
            </a>
          </div>

          <div class="user" id="user">
            <a href="login.php" class="user-link"> <?php echo $_SESSION['username'] ?> </a>
            <div class="user-img-wrapper">
              <a href="connexion.html"><img src="images/logonew.png" alt="User 1" /></a> 
            </div>
           &nbsp;&nbsp;&nbsp; <a href="logout.php">logout</a>
          </div>
        </nav>
        <!-- end of feeds navigation -->
      </header>
      </br> 
       <main class="main">
        <section class="page-content">
            <center>
        <h1>Documents 2019</h1> </br></br></center>
          <article class="header">
<?php
     
    // Connexion à  la base donnée
     
    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = 'db_maroua';            // Nom de la base de données
    $db_user_login = 'samglish';  // Nom de l'utilisateur
    $db_user_pass = '1234';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);


    if ( isset($_POST['requete']) )
    $requete = htmlentities($conn->real_escape_string($_POST['requete']));


    if (!empty($requete))
    {
        $req = "SELECT * FROM pdf_data WHERE file_des LIKE '%$requete%' and file_date LIKE 2019"; 
        $exec = $conn->query($req);                            
// exécuter la requête
        $nb_resultats = $exec->num_rows;              
// compter les résultats


    if($nb_resultats != 0) 
    {
       echo '<center>';   
       echo '
           <form action="" method="Post">
           <input type="text" name="requete" size="60px">
           <input type="submit" value="Search">
           </form>';
      echo '</center>
        </article>
    
     </div>
   
     <center>
            </center>
            
        </section>
          <div id="Accueil">
          </br></br></br></br></br></br>
            <h1>
          
            <table id="" class="table table-bordered">

      <tbody>';
      echo '<font color="blue">Résultat de votre recherche </font><br/>
            <font size="2px">'.$nb_resultats.'</font>';


    if($nb_resultats > 1)
    {
        echo ' <font size="2px" color="red">résultats</font> ';
    }
        else
        {
            echo ' <font size="2px" color="red"> résultat(s) trouvé(s)</font>  '
;
        } 

       echo  '<font size="2px"> dans notre base de données :</font><br/><br/>'
;



    while($donnees = mysqli_fetch_array($exec))
    {
    ?>

    <?php
         echo '<span> <a href="docs/media/'.$donnees['filename'].'">'; 
         echo ' <font size="2px"> '.$donnees['file_des'].'</font> ';
         echo  '<font size="2px">'.$donnees['filename'].' </font>';
         echo ' <font size="2px">  '.$donnees['file_date'].'</font><br/></a>';
         echo '</span>';
    ?>

    <?php
    } // fin de la boucle
    ?>


    <?php
    }


    else {
        echo '<center>';   
        echo '
           <form action="" method="Post">
           <input type="text" name="requete" size="60px">
           <input type="submit" value="Search">
           </form>';
        echo '</center>
         </article>
    
     </div>
   
     <center>
      
            </center>
            
        </section>
          <div id="Accueil">
          </br></br></br></br></br></br>
            <h1>
          
            <table id="" class="table table-bordered">

      <tbody>';
        echo '<h5>Pas de résultats</h3>';
        echo '<pre><font color="blue"><font size="5px">' .$_POST['requete'].'</font></font> </br></br> Nous n\'avons trouvé aucun résultat pour votre requête
              </pre>
              ';
      
     }
    }

    else
    { 


     echo '<center>';   
     echo '
           <form action="" method="Post">
           <input type="text" name="requete" size="60px">
           <input type="submit" value="Search">
           </form>';
     echo '</center>';      

    }
?>
        
      </tbody>



      <tbody>


      <tbody>

<?php
echo '</article>
    
     </div>
   
     <center>
            </center>
            
        </section>
          <div id="Accueil">
          </br></br></br></br></br></br>
            <h1>
          
            <table id="" class="table table-bordered">
      <thead>
        <tr>
             <th>ID</th>
		<th>Fichier</th>
          <th>Titre</th>
          <th>Année</th>
        </tr>
      </thead>';
$sql = "SELECT * from pdf_data  WHERE file_date LIKE 2019 order by id desc";
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
    <td><a href="docs/media/<?php echo ($result->filename) ?>"><?php echo ($result->filename) ?></a></td>
      <td><?php echo ($result->file_des) ?></td>
      <td><?php echo ($result->file_date) ?></td>
    </tr>
    <?php
    $cnt=$cnt+1;
  }
} ?>






</tbody>
    </table>



          </h1>
          </br></br>
        </br></br>
      </main>
    </div>
    <script>
      const menuLinks = document.querySelectorAll(".sidebar .menu a");

      for (const link of menuLinks) {
        link.addEventListener("mouseenter", function () {
          if (window.matchMedia("(max-width: 626px)").matches) {
            const tooltip = this.querySelector("span").textContent;
            this.setAttribute("title", tooltip);
          } else {
            this.removeAttribute("title");
          }
        });
      }
    </script>
  </body>
</html>
