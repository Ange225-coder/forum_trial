<?php 
    
    declare(strict_types = 1);

    session_start();    

    /** 
     * autoloading classes with the function
     * spl_autoload_register()
    */

    spl_autoload_register(static function ($fqcn): void {
        $path = str_replace(['App', '\\'], ['back', '/'], $fqcn).'.php';
        require_once($path);
    });

    use App\Model\Users\Registration\UserRegistrationManage;

    function newUserInsertionCtrl(): object
    {

        if(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['pass'])) {

            /**
             * trying if email exist in db
             * if exist throw exception for email and stop script
             * else continue to second if
            */
            
            $_POST['email'] = htmlspecialchars($_POST['email']);
            $_POST['pseudo'] = htmlspecialchars($_POST['pseudo']);
            $pass_hash = sha1($_POST['pass']);

            $user = new UserRegistrationManage;

            foreach($user->checkingEmail() as $checking) {
                if($_POST['email'] == $checking['email']) {
                    throw new \Exception(UserRegistrationManage::ERROR_EMAIL);  
                }
            }
            
            //tryin if password and confirm pass are same
            // if there are different throw exception for password and stpo script
            //else create session, cookie and redirected to
            // member home page             
            
            if($_POST['pass'] !== $_POST['confirm_pass']) {
                throw new \Exception(UserRegistrationManage::ERROR_PASSWORD);
            }
            else {
                $user->newUserInsertion($_POST['pseudo'], $_POST['email'], $_POST['pass']);

                $_SESSION['pseudo'] = $_POST['pseudo'];
                $_SESSION['email'] = $_POST['email'];

                setcookie(
                    'LOGGED_USER',
                    $_POST['email'],
                    [
                        'expires' => time()+24*3600,
                        'secure' => true,
                        'httponly' => true,
                    ]
                );
            }   
        }

        return $user;
    }
    

    

    
    
    