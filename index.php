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
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    <style>
#Accueil {
  padding: 13em;

  text-align: center;
}

#Accueil h1 {
  font-size: 2rem;
  margin-bottom: 1.5rem;
  color: #333;
}

.year-folder {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 2.5rem;
}

.year-folder a {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  background-color: #fff;
  padding: 8rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.2s;
  width: 110px;
}

.year-folder a:hover {
  transform: translateY(-15px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.year-folder img {
  width: 100px;
  margin-bottom: 0.5rem;
}

.year-folder a span,
.year-folder a {
  color: #333;
  font-weight: 500;
  font-size: 1.6rem;
}

/* Responsive */
@media (max-width: 600px) {
  .year-folder a {
    .year-folder a {
    display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  background-color: #fff;
  padding: 1rem;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  transition: transform 0.2s;
  width: 80px;
  }

  .year-folder img {
    width: 40px;
  }

  #Accueil h1 {
    font-size: 2rem;
  }
}

    </style>
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
          <a href="logout.php"><h2>⏻</h2></a>
            <a href="login.php" class="user-link"> <?php echo $_SESSION['username'] ?></a> &nbsp;
            <div class="user-img-wrapper">
              <a href="connexion.html"><img src="images/logonew.png" alt="User 1" /></a> 
            </div>
          </div>
        </nav>
        <!-- end of feeds navigation -->
      </header>
      &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <h3><a href="log_admin.php"><img src="images/upload.png" width="3%"> upload file</ h3></a>
      <center><img src="images/folder3.png" width="3.5%"><h1>ARCHIVES ARDHU </h1>


      <main class="main">
        
        <section class="page-content">
            
        <article class="header">
         <center>
          <div id="barre_search">
          </center>
        


          <?php
     
     // Connexion à  la base donnée
      
     $db_server = 'localhost'; // Adresse du serveur MySQL
     $db_name = 'clouda8989_dbArdhu';            // Nom de la base de données
     $db_user_login = 'clouda8989_ardhu';  // Nom de l'utilisateur
     $db_user_pass = 'CloudArdhu2025';       // Mot de passe de l'utilisateur
 
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
       echo '<font color="blue">Résultats de votre recherche </font><br/>
             <font size="4px">'.$nb_resultats.'</font>';
 
 
     if($nb_resultats > 1)
     {
         echo ' <font size="3px" color="red"> résultat(s) trouvé(s)</font> ';
     }
         else
         {
             echo ' <font size="3px" color="red"> résultat(s) trouvé(s)</font>  '
 ;
         } 
 
        echo  '<font size="3px"> dans notre base de données :</font><br/><br/>'
 ;
 
 
 
     while($donnees = mysqli_fetch_array($exec))
     {
     ?>
 
     <?php
          echo '🔍<span> <a href="docs/media/'.$donnees['filename'].'"> '; 
          echo  ' <font size="3px">'.$donnees['filename'].' </font> </a>';
          echo ' <font size="3px">  🗂️'.$donnees['file_date'].'(</font>';
          echo ' <font size="3px">  '.$donnees['file_rep'].')</font><br/>';
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


        
          </article>
          <center>
          <font size="2px">Nombre total de documents <font size="3px">📁 </font></font>  <h1><font color="red">   <?php
  $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pdf_data");
  $row = mysqli_fetch_assoc($result);
  echo $row['total'];
?> </h1></font>   </center> </br>
     </div>
   
        </section>
    </br></br>
    <div id="Accueil" class="year-folder">
     
  <a href="page25.php">
    <img src="images/folder1.png" alt=""/>
    <span>🗂️2025</span>
  </a>
  <a href="page24.php">
    <img src="images/folder1.png" alt="" />
    <span>🗂️2024</span>
  </a>
  <a href="page23.php">
    <img src="images/folder1.png" alt="" />
    <span>🗂️2023</span>
  </a>
  <a href="page22.php">
    <img src="images/folder1.png" alt="" />
    <span>🗂️2022</span>
  </a>
  <a href="page21.php">
    <img src="images/folder1.png" alt="" />
    <span>🗂️2021</span>
  </a>
  <a href="page20.php">
    <img src="images/folder1.png" alt="" />
    <span>🗂️2020</span>
  </a>
  <a href="page19.php">
    <img src="images/folder1.png" alt="" />
    <span>🗂️2019</span>
  </a>
  <a href="pageP.php">
    <img src="images/folderp.png" alt="PROJETS" />
    <span>🗂️PROJETS</span>
  </a>
</div>
    </main>
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
