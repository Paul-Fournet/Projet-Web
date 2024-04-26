<header>
    <div class="logo">PLANETS–D</div>
    <input type="checkbox" id="nav_check" hidden />
    <nav>
      <ul>
        <li>
          <a href="index.php" class="active" class="buttonnavheader" style="text-decoration:none;">Accueil</a>
        </li>
        <li>
          <a href="#scrollfooter" id="buttonfooter" class="buttonnavheader" style="text-decoration:none;">Services</a>
        </li>
        <li>
          <a href="pagereportclient.php" class="buttonnavheader" style="text-decoration:none;">Contacter</a>
        </li>

        <?php
        if(!isset($_SESSION['connected'])){
          echo "<li><a href='formulaire.php' class='buttonnavheader' style='text-decoration:none;'>Connexion</a></li>";
        }
        elseif($_SESSION['connected']===true){
          echo '<li><a href="deconnexion.php" class="buttonnavheader" style="text-decoration:none;">Déconnexion</a></li>';
        }
        else{
        ?>
        <li>
          <a href="formulaire.php" class='buttonnavheader' style="text-decoration:none;">Connexion</a>
        </li>
        <?php
        }
        ?>
</header>