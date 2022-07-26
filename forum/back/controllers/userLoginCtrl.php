<?php 

    declare(strict_types = 1);

    /** 
     * autoloading classes with the function
     * spl_autoload_register()
    */
    
    spl_autoload_register(static function ($fqcn): void {
        $path = str_replace(['App', '\\'], ['back', '/'], $fqcn).'.php';
        require_once($path);
    });

    use App\Model\Users\Login\UserLoginManage;

    function loginUserCtrl(): void
    {
        if(isset($_POST['email']) && isset($_POST['pass'])) {

            $_POST['email'] = htmlspecialchars($_POST['email']);
            $pwd_hash = sha1($_POST['pass']);

            $login = new UserLoginManage;

            foreach($login->getLoginUser() as $chekingLogin) {
                if($_POST['email'] === $chekingLogin['email'] && $pwd_hash === $chekingLogin['pass']) {
                    $logged_user = [
                        'pseudo' => $chekingLogin['pseudo'],
                        'email' => $chekingLogin['email'],
                        'pass' => $chekingLogin['pass'],
                        'id' => $chekingLogin['id']
                    ];

                    $_SESSION['pseudo'] = $logged_user['pseudo'];
                    $_SESSION['email'] = $logged_user['email'];
    
                    setcookie(
                        'LOGGED_USER',
                        $logged_user['email'],
                        [
                            'expires' => time()+24*3600,
                            'secure' => true,
                            'httponly' => true,
                        ]
                    );

                       
                }
                else {
                    $errorLogin = sprintf('Les données de connexion ne correspondent pas : (%s / %s)', $_POST['email'], $_POST['pass']);
                    
                }
            }
        }
    }