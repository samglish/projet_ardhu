<?php
require ('config.php');
session_start();
if (isset($_POST['username']) & isset($_POST['password'])& isset($_POST['nom']) & isset($_POST['email'])){
    try {
        $username= $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nom= $_POST['nom'];
        $email= $_POST['email'];
        $sth = $conn->prepare("INSERT INTO `user`(`username`,`password`,`nom` ,`email`) VALUES (:username, :password, :nom, :email)");
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':email', $email);
        $sth->execute();
        header('location: login.php');
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
            <h1>INSCRIPTION</h1> </br></br>
            </center>
          <article class="header">
          
            <center>
                <form action="" method ="POST">
                    <input type="text" name="username" placeholder="username (Ex:fadimatou)" required></input>
                    <input type="password" name="password" placeholder="Mot de passe" required></input>
                    <input type="text" name="nom" placeholder="Nom complet" required></input>
                    <input type="text" name="email" placeholder="Email" required></input>
                    <br>
                  <button type="submit" >S'inscrire</button> 
                    
                </form>
            </br></br>
            <a href="login.php"><h3>si vous avez déjà un compte, cliquez ici pour vous connecter</h3></a> 
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
