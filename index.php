<?php
    /**
     * Page d'accueil qui vérifie si l'utilisateur est déjà connecté ou non
     */
    session_start();
    require_once("./template/head.php");
    require_once("./template/foot.php");
    if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
        // Redirige vers la page personnelle de l'utilisateur si il est déjà connecté
        require_once("./pages/user.php");
    } else {
        // Retourne le formulaire de connexion s'il n'est pas connecté
        require_once("./forms/form_login.php");
    }