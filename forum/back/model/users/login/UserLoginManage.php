<?php

    declare(strict_types = 1);

    namespace App\Model\Users\Login;

    use App\Model\Users\Registration\UserRegistrationManage;

    class UserLoginManage extends UserRegistrationManage
    {

        public const ERROR_LOGIN = 'L\'email ou le mot de passe ne correspondent pas';

        public function getLoginUser(): array
        {
           return $this->checkingEmail();
        }

        
    }