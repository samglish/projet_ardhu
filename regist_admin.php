<?php
require ('config.php');
if (isset($_POST['username']) & isset($_POST['password'])){
    try {
        $username= $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sth = $conn->prepare("INSERT INTO `gestion`(`username`,`password`) VALUES (:username, :password)");
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->execute();
        header('location: log_admin.php');
    }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }
}else{
    echo "";
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>register</title>
    <link rel="stylesheet" href="css/all.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="style.css">
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
        
            <div class="user-img-wrapper">
      
            </div>
          </div>
        </nav>
        <!-- end of feeds navigation -->
      </header>
      <main class="main">
        
        <section class="page-content">
            <center>
            <h1>AJOUTER ADMINISTRATEUR</h1> </br></br>
            </center>
          <article class="header">
          
            <center>
                <form action="" method ="POST">
                    <input type="text" name="username" placeholder="username (Ex:fadimatou)" required></input>
                    <input type="password" name="password" placeholder="Mot de passe" required></input>
                    <br>
                  <button type="submit" >Ajouter</button> 
                 </br></br>

                  <a href="log_admin.php"><h3>Si vous avez deja un compte administrateur, cliquez ici</h3></a>    

                </form>
            </br></br>
        </article>
        </section>
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
