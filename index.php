<?php
require ('config.php');
session_start();
if(isset($_SESSION['id']) && $_SESSION['username'] != "") {
    echo "";
  } else { 
    header('location:login.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cloud</title>
    <link rel="stylesheet" href="css/all.css" />
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
      &nbsp;&nbsp;&nbsp;<a href="log_admin.php"> <img src="images/upload.png" width="4%"> upload file</a>
      <main class="main">
        <section class="page-content">
        <article class="header">
            <img src="images/folder3.png" width="7%">
          <div id="barre_search">
        


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
         $req = "SELECT * FROM pdf_data WHERE file_des LIKE '%$requete%'"; 
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
             echo ' <font size="2px" color="red"> résultats trouvé</font>  '
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
         echo '<pre><font color="blue"><font size="5px">' .$_POST['requete'].'</font></font> </br></br> Nous n\'avons trouver aucun résultats pour votre requête
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


        
          </article>
              
  
     </div>
   
        </section>
          <div id="Accueil">
          </br></br></br></br></br></br>
            <h1>
            <a href="page25.php"><img src="images/folder1.png" />2025</a>
            <a href="page24.php"><img src="images/folder1.png" />2024</a>
            <a href="page23.php"><img src="images/folder1.png" />2023</a>
            <a href="page22.php"><img src="images/folder1.png" />2022</a>
            <a href="page21.php"><img src="images/folder1.png" />2021</a>  
            <a href="page20.php"><img src="images/folder1.png" />2020</a>
            <a href="page19.php"> <img src="images/folder1.png" />2019</a>
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
