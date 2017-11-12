<?php
    require_once "../template/head.php";
    require_once "../template/foot.php";
    /**
     * Retourne le formulaire de création de compte
     */
    ?>
<h1>Enregistrez-vous</h1>
<form action="../template/register.php" method="post">
    <label for="nom">Nom :</label>
    <input id="nom" name="nom" type="text" placeholder="Dupont">
    <br>
    <label for="prenom">Prénom :</label>
    <input id="prenom" name="prenom" type="text" placeholder="Kévin">
    <br>
    <label for="email">E-mail :</label>
    <input id="email" name="email" type="email" placeholder="user@domain.com">
    <br>
    <label for="password">Mot de passe :</label>
    <input id="password" name="password" type="password">
    <br>
    <label for="repassword">Resaisissez votre mot de passe :</label>
    <input id="repassword" name="repassword" type="password">
    <br>
    <input name="submit" type="submit">
    <input name="reset" type="reset">
</form>
<br>
<small><a href="/">Retour au menu</a></small>