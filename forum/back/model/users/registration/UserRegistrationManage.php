<?php

    declare(strict_types = 1);

    namespace App\Model\Users\Registration;

    require_once('back/model/database/DbManage.php');

    use App\Model\Database\DbManage;

    class UserRegistrationManage extends DbManage
    {

        public const ERROR_EMAIL = 'Cet email exist déjà veuillez en choisir un autre';
        public const ERROR_PASSWORD = 'Les mots de passes ne correspondent pas';
        

        /**
         * Query in database for checking if 
         * email exist in this
        */

        public function checkingEmail(): array
        {
            $db = $this->dbConnect();
            $queryRetEmail = $db->prepare('SELECT * FROM users ');
            $queryRetEmail->execute(array());
            $checkingEmail = $queryRetEmail->fetchAll();

            return $checkingEmail;
        }


        

        /**
         * Query to insert new member in db
        */

        public function newUserInsertion(string $pseudo, string $email, string $pass_hash): bool
        {
            $db = $this->dbConnect();
            $pass_hash = sha1($_POST['pass']);
            $queryInsertUser = $db->prepare('INSERT INTO users(pseudo, email, pass, registration_date_user) VALUES(?, ?, ?, NOW())');
            $insertUser = $queryInsertUser->execute(array($pseudo, $email, $pass_hash));

            return $insertUser;
        }

        /**
         * Query to retrieve user save
         * in db
         * to continue...
        */
        
    }