<?php
    require_once("./db/db.php");
    if (!isset($_SESSION['user']))
    {
        header("Location: /");
    }
    ?>

<h1>Bienvenue <?php echo implode(getName($_SESSION['user'][2])) ?></h1>
<br>
<a href=""><h2>Modifier vos informations personnelles</h2></a>
<br>
<a href=""><h2>Modifier votre mot de passe</h2></a>
<br>
<a href=""><h2>Ajouter une expérience professionnelle</h2></a>
<br>
<a href=""><h2>Ajouter une formation</h2></a>
<br>
<a href="../template/logout.php">Se déconnecter</a>
