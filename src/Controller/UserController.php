<?php

namespace Cleme\Forum\Controller;

class UserController {

    use RenderView;

    public function userConnect() {
        $this->render('connexion', 'Se connecter');
    }
}