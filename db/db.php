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

/**
 * Récupère le nom de l'utilisateur dans la base de données
 * @param $mail String Adresse mail de l'utilisateur
 * @return array|null
 */
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

/**
 * Récupère le nom des villes
 * @return array|null
 */
    function getCities(){
        $link = connectDb();
        $query = "SELECT `cityName` FROM `cities`;";
        $result = mysqli_query($link, $query);
        if (!$result){
            var_dump("Erreur");
        }else{
            $fetch = mysqli_fetch_row($result);
            return $fetch;
        }
    }

/**
 * Ajoute un utilisateur selon les informations renseignées
 * @param $surname String Nom de l'utilisateur
 * @param $name String Prénom de l'utilisateur
 * @param $city String Ville de l'utilisateur
 * @param $mail String Mail de l'utilisateur
 * @param $password String Mot de passe de l'utilisateur
 * @return array|null
 * @parma $city String Ville de l'utilisateur
 */
    function addUser($surname, $name, $city, $mail, $password){
        $mail = clean($mail);
        $password = cryptPwd($password);
        $link = connectDb();
        $query = "INSERT INTO `users` (`userId`, `userName`, `userSurname`, `cityId`, `userMail`, `userPassword`) VALUE (NULL, '$name', '$surname', '$city', '$mail', '$password');";
        $result = mysqli_query($link, $query);
        if (!$result){
            var_dump("Erreur");
        }else{
            $fetch = mysqli_fetch_row($result);
            return $fetch;
        }
    }

/**
 * @param $name String Le nom de la compétence
 * @param $label String Le label de la compétence
 * @param $level String Le niveau de la compétence
 * @param $id Number L'id de l'utilisateur
 * @return array|null
 */
    function addSkill($name, $label, $level, $id){
        $link = connectDb();
        $query = "";
        $result = mysqli_query($link, $query);
        if (!$result){
            var_dump("Erreur");
        }else{
            $fetch = mysqli_fetch_row($result);
            return $fetch;
        }
    }

/**
 * @param $start DateTime Le début de l'éduction
 * @param $end DateTime La fin de l'éducation
 * @param $title String Le titre de l'éducation
 * @param $description String La description de l'éducation
 * @param $id Number L'id de l'utilisateur
 * @return array|null
 */
    function addEducation($start, $end, $title, $description, $id){
        $link = connectDb();
        $query = "";
        $result = mysqli_query($link, $query);
        if (!$result){
            var_dump("Erreur");
        }else{
            $fetch = mysqli_fetch_row($result);
            return $fetch;
        }
    }