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
            <a href="login.php" class="user-link"> <?php echo $_SESSION['username'] ?> </a>
            <div class="user-img-wrapper">
              <a href="connexion.html"><img src="images/logonew.png" alt="User 1" /></a> 
            </div>
           &nbsp;&nbsp;&nbsp; <a href="logout.php">logout</a>
          </div>
        </nav>
        <!-- end of feeds navigation -->
      </header>
        <section class="page-content">
        <article class="header">
        <center>
        <h1>Projets</h1> </br></center>
          </article>
     </div>
        </section>
          <div id="Accueil" class="year-folder">
  <a href="pageP_PC24.php">
    <img src="images/folder1_PC2024.png" alt="" />
    <span>PARC CAMEROUN 2024</span>
  </a>
  <a href="pageP_CF4.php">
    <img src="images/folder1_CF2024.png" alt="" />
    <span>CERF 2024</span>
  </a>
   <a href="pageP_IC4.php">
    <img src="images/folder1_ICVA4.png" alt="" />
    <span>ICVA 2024</span>
  </a>
  <a href="pageP_IC5.php">
    <img src="images/folder1_ICVA5.png" alt="" />
    <span>ICVA 2025</span>
  </a>
   <a href="pageP_CF5.php">
    <img src="images/folder1_CF2025.png" alt="" />
    <span>CERF 2025</span>
  </a>
   <a href="pageP_PC25.php">
    <img src="images/folder1_PC2025.png" alt="" />
    <span>PARC CAMEROUN 2025</span>
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
