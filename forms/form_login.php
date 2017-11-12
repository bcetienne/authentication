<?php
    /**
     * Affiche le formulaire de connexion
     */
?>

<div>
    <h1>On se connaît déjà ?</h1>
        <form action="../template/login.php" method="post">
            <label for="email">E-mail :</label>
            <input id="email" name="email" type="email" placeholder="user@domain.com">
            <br>
            <label for="password">Password :</label>
            <input id="password" name="password" type="password">
            <br>
            <input name="submit" type="submit">
        </form>
    <small>Pas de compte ? <a href='./template/register.php'>Inscrivez-vous</a></small>
</div>