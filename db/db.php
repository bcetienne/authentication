<?php
    /**
     * Fonctions relatives à la base de données
     */

    /**
     * Connexion à la base de données
     * @return mysqli
     */
    function connectDb(){
        //Connexion à la base de données
        $link = mysqli_connect('localhost','root','0000','authentication',3306);
        mysqli_set_charset($link,'utf8');
        //Vérifie la connexion
        if ($link->connect_error){
            die("Echec de la connexion" . $link->connect_errno);
        }
        return $link;
    }

    /**
     * Hacher un mot de passe
     * @param $pwd String Mot de passe
     * @return string
     */
    function cryptPwd($pwd){
        $salt = 'h64wJ#3%vC';
        return md5($pwd . $salt);
    }

    /**
     * @param $var
     * @return string
     */
    function clean($var){
        return htmlspecialchars($var);
    }

    /**
     * Vérifie l'existance de l'utilisateur dans la base de données
     * @param $mail String Adresse mail de l'utilisateur
     * @param $pwd String Mot de passe de l'utilisateur
     * @return array|null
     */
    function checkLogin($mail, $pwd){
        $mail = clean($mail);
        $pwd = cryptPwd($pwd);
        $link = connectDb();
        $query = "SELECT `userId`, `userPassword`, `userMail` FROM `users` WHERE `userMail` = '$mail' AND `userPassword` = '$pwd' LIMIT 1;";
        $result = mysqli_query($link, $query);
        if (!$result){
            var_dump("Aucun résultat");
        }else{
            $fetch = mysqli_fetch_row($result);
            return $fetch;
        }
    }

    function getName($mail){
        $mail = clean($mail);
        $link =connectDb();
        $query = "SELECT `userName` FROM `users` WHERE `userMail` = '$mail';";
        $result = mysqli_query($link, $query);
        if (!$result){
            var_dump("Aucun résultat");
        }else{
            $fetch = mysqli_fetch_row($result);
            return $fetch;
        }
    }