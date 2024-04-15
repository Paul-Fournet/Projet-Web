<header>
    <div class="logo">PLANETS–D</div>
    <input type="checkbox" id="nav_check" hidden />
    <nav>
      <ul>
        <li>
          <a href="index.php" class="active">Accueil</a>
        </li>
        <li>
          <a href="#scrollfooter" id="buttonfooter">Services</a>
        </li>
        <li>
          <a href="">Contacter</a>
        </li>

        <?php
        if(!isset($_SESSION['connected'])){

        }
        elseif($_SESSION['connected']===true){
          echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
        }
        else{
        ?>
        <li>
          <a href="formulaire.php">Connexion</a>
        </li>
        <?php
        }
        ?>
</header>