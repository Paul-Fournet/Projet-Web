<header>
    <div class="logo">PLANETS–D</div>
    <input type="checkbox" id="nav_check" hidden />
    <nav>
      <ul>
        <li>
          <a href="index.php" class="active" class="buttonnavheader">Accueil</a>
        </li>
        <li>
          <a href="#scrollfooter" id="buttonfooter" class="buttonnavheader">Services</a>
        </li>
        <li>
          <a href="pagereportclient.php" class="buttonnavheader">Contacter</a>
        </li>

        <?php
        if(!isset($_SESSION['connected'])){
          echo "<li><a href='formulaire.php' class='buttonnavheader'>Connexion</a></li>";
        }
        elseif($_SESSION['connected']===true){
          echo '<li><a href="deconnexion.php" class="buttonnavheader">Déconnexion</a></li>';
        }
        else{
        ?>
        <li>
          <a href="formulaire.php" class='buttonnavheader'>Connexion</a>
        </li>
        <?php
        }
        ?>
</header>