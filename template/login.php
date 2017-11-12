<?php
    /**
     *Récupère les informations saisies pour les tester
     */
    session_start();
    require_once 'head.php';
    require_once 'foot.php';
    require_once '../db/db.php';

    if (!empty($_POST) && isset($_POST["submit"])){
        //Vérifie qu'il y ait un mail dans la requête
        if (isset($_POST['email']) && !empty($_POST['email'])){
            $email = $_POST['email'];
            //Vérifie qu'il y ait un mot de passe dans la requête
            if (isset($_POST['password']) && !empty($_POST['password'])){
                $pwd = $_POST['password'];
                $result = checkLogin($email, $pwd);
                $_SESSION['user'] = $result;
                if ($result == TRUE){
                    header("Location: ../pages/user.php");
                }
            }
        }
    }
    header("Location: ../index.php");