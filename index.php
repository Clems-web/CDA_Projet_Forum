<?php

use Cleme\Forum\Controller\CategoryController;
use Cleme\Forum\Controller\HomeController;
use Cleme\Forum\Controller\UserController;
use Cleme\Forum\Model\Entity\User;
use Cleme\Forum\Model\Manager\UserManager;

require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';




session_start();

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case 'category' :
            (new CategoryController())->getCategory();
            break;

        case 'Jeux' :
            (new CategoryController())->getJeux();
            break;

        case 'Film' :
            (new CategoryController())->getFilm();
            break;

        case 'Séries' :
            (new CategoryController())->getSeries();
            break;

        case 'Manga' :
            (new CategoryController())->getManga();
            break;

        case 'Anime' :
            (new CategoryController())->getAnime();
            break;

        case 'Roman' :
            (new CategoryController())->getRoman();
            break;


        case 'connexion' :
            (new UserController)->userConnect();
            break;

        case 'registration' :
            (new UserController())->userRegister();
            break;

        case 'UserRegistration' :
            (new UserController())->userRegistration();
            break;
    }
}
else {

    (new HomeController())->homePage();

}


