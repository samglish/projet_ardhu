<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
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
            <h1>ADMINISTRATION</h1> </br></br>
            </center>
          <article class="header">
          
            <center>
                 <form action="" method ="POST">
                    <input type="text" name="username" placeholder="username" required>
                    <input type="password" name="password" placeholder="Mot de passe" required></br></br>
                    <button type="submit">Se connecter</button> 
                    
                </form> 
</br></br>
                <a href="regist_admin.php"><h3>pour ajouter un compte administrateur, cliquez ici</h3></a> 
            </br></br>
        </article>
        </section>
      </main>
    </div>
    <center><font color="red">
</br>

    <?php
require ('config.php');


if (isset($_POST['username']) & isset($_POST['password'])){
    try {
        $sth = $conn->prepare("SELECT * FROM gestion WHERE username=:username");
        $sth->bindParam(':username', $_POST['username']);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $hash = $row['password'];
        if (password_verify($_POST['password'], $hash)){
            $_SESSION['id']   = $row['id'];
            $_SESSION['username'] = $row['username'];
            header('Location: docs/index.php');
        }else{
            echo "Mauvais mot de passe ou username.";
        }
    }catch (PDOException $e){
        print "Erreur !: " . $e->getMessage() . "<br/>";
    }
}else{
    echo "";
}
?>

</font>
</center>

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
