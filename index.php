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
            <a href="logout.php">Deconnexion</a>
          </div>
        </nav>
        <!-- end of feeds navigation -->
      </header>
      <main class="main">
        <section class="page-content">
          <article class="header">
            <img src="images/folder3.png" width="7%">
          <div id="barre_search">
            <form action="">
           <input type="search" id="search" name="search" placeholder="recherchez un fichier"/>
          </div>
          <div>
            <input type="submit" value="search">
          </div>
          </form>
          </article>
        </br>
      </br>
    
     </div>
   
        </section>
          <div id="Accueil">
            <h1>
            <a href=""><img src="images/folder1.png" />2025</a>
            <a href=""><img src="images/folder1.png" />2024</a>
            <a href=""><img src="images/folder1.png" />2023</a>
            <a href=""><img src="images/folder1.png" />2022</a>
            <a href=""><img src="images/folder1.png" />2021</a>  
            <a href=""><img src="images/folder1.png" />2020</a>
            <a href=""> <img src="images/folder1.png" />2019</a>
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
