<?php

namespace Cleme\Forum\Controller;

use Cleme\Forum\Model\DB;
use Cleme\Forum\Model\Entity\User;
use Cleme\Forum\Model\Manager\UserManager;

class UserController {

    use RenderView;

    public function userConnect() {
        $this->render('connexion', 'Se connecter');
    }

    public function userRegister() {
        $this->render('registration', 'Inscription');
    }

    public function userRegistration() {
        if (isset($_POST['user-pseudo'], $_POST['user-mail'], $_POST['user-pass'], $_POST['user-pass-confirm'],)) {

            if (($_POST['user-pseudo'] !== 'User deleted')
                && ($_POST['user-pass'] !== 'password deleted')
                && ($_POST['user-mail'] !== 'mail deleted')
                && ($_POST['user-pass'] === $_POST['user-pass-confirm'])) {

                $db = new DB;
                $token = openssl_random_pseudo_bytes(16);
                $token = bin2hex($token);

                $user = new User(
                    null,
                    $db->cleanInput($_POST['user-pseudo']),
                    $db->cleanInput($_POST['user-mail']),
                    $db->cleanInput($_POST['user-pass']),
                    $token,
                    0,
                    3


                );

                (new UserManager())->saveUser($user);

                $to = $user->getMail();
                $subject = 'Signup | Verification';
                $message = '
                Merci de votre inscription ! 
                Votre compte a bien été créé, vous pourrez vous connecter avec vos identifiants après avoir activé votre
                compte en cliquant sur ce lien.
                
                http://localhost:8000/index.php?controller=verify&token='.$user->getToken().'
                ';
                $headers = 'From:clement.servais1@gmail.com' . "\r\n"; // Set from headers
                mail($to, $subject, $message, $headers); // Send our email
            }
        }
        header('Location: ../index.php');
    }

    public function userConfirm() {
        if (isset($_GET['token'])) {

            $db = new DB;
            $safe = $db->cleanInput($_GET['token']);

            (new UserManager())->confirmUser($safe);
            header('Location: ../index.php');
        }
    }

    public function userConnexion() {

        if (isset($_POST['user-mail']) && isset($_POST['user-pass']))  {

            $manager = new UserManager();
            $db = new DB();

            if (($_POST['user-mail'] !== 'mail deleted') && ($_POST['user-pass'] !== 'password deleted')) {

                $pass = $db->cleanInput($_POST['user-pass']);
                $mail = $db->cleanInput($_POST['user-mail']);

                $userConnected = $manager->connectUser($mail, $pass);
                if ($userConnected !== false) {
                    $_SESSION['user'] = $userConnected;
                }
            }
        }
        header('Location: ../index.php');
    }

    public function userDeconnexion() {
        session_start();
        $_SESSION = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'],$params['HttpOnly']);
        session_destroy();

        header('Location: ../index.php');
    }

    public function panel() {
        $this->render('panel', 'Panel');
    }


}
