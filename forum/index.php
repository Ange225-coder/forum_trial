<?php


    require_once('front/view/indexView.php');
    
    require_once('back/controllers/userRegistrationCtrl.php');
    require_once('back/controllers/userLoginCtrl.php');
    
    try
    {  
        if(isset($_GET['action'])) {

            if($_GET['action'] == 'registration') {
                header('Location: front/view/registration.php');
            }
    
            elseif($_GET['action'] == 'login') {
                header('Location: front/view/login.php');
            }
    
            elseif($_GET['action'] == 'newUserInsertionCtrl') {
                newUserInsertionCtrl();

                header('Location: front/view/memberHomePage.php'); 
            }

            elseif($_GET['action'] == 'loginUserCtrl') {
                loginUserCtrl();

                header('Location: front/view/memberHomePage.php');
            }
        }
    }

    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    
    
    

    

    
    