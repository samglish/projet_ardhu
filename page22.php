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
            <style>
#Accueil {
  padding: 2em;

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
  padding: 7rem;
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
  font-size: 1.5rem;
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
        <section class="page-content">
        <article class="header">
        <center>
        <h1>Documents 2022</h1> </br></br></center>
          </article>
     </div>
        </section>
      <div id="Accueil" class="year-folder">
      <a href="page22_AGR.php">
    <img src="images/folder1_AGR.png" alt="" />
    <span>AGR_PE 2022</span>
  </a>
   <a href="page22_COM.php">
    <img src="images/folder1_COM.png" alt="" />
    <span>COMMUNICATION 2022</span>
  </a>
    <a href="page22_LTP.php">
    <img src="images/folder1_LTP.png" alt="" />
    <span>LOGEMENT-TERRE ET PROPRIETE 2022</span>
  </a> 
   <a href="page22_PCS.php">
    <img src="images/folder1_PCS.png" alt="" />
    <span>PAIX ET COHESION SOCIALE 2022</span>
  </a>
   <a href="page22_PE.php">
    <img src="images/folder1_PE.png" alt="" />
    <span>PROTECTION DE L'ENFANCE 2022</span>
  </a>
  <a href="page22_PG.php">
    <img src="images/folder1_PG.png" alt="" />
    <span>PROTECTION GENERALE 2022</span>
  </a>
   <a href="page22_SM.php">
    <img src="images/folder1_SM.png" alt="" />
    <span>SANTE MENTALE 2022</span>
  </a>
  <a href="page22_VBG.php">
    <img src="images/folder1_VBG.png" alt="" />
    <span>VBG/PEAS 2022</span>
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
