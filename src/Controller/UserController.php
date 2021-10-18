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
                mail()
            }
        }
        header('Location: ../index.php');
    }
}

