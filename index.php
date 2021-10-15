<?php

use Cleme\Forum\Controller\CategoryController;
use Cleme\Forum\Controller\HomeController;
use Cleme\Forum\Controller\UserController;

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
    }
}
else {

    (new HomeController())->homePage();

}


