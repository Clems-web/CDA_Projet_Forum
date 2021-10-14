<?php

use Cleme\Forum\Controller\CategoryController;
use Cleme\Forum\Controller\HomeController;

require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';




session_start();

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case 'category' :
            $controller = new CategoryController();
            $controller->getCategory();
            break;
        case 'Jeux' :
            $controller = new CategoryController();
            $controller->getJeux();
            break;
        case 'Film' :
            $controller = new CategoryController();
            $controller->getFilm();
            break;
        case 'Séries' :
            $controller = new CategoryController();
            $controller->getSeries();
            break;
        case 'Manga' :
            $controller = new CategoryController();
            $controller->getManga();
            break;
        case 'Anime' :
            $controller = new CategoryController();
            $controller->getAnime();
            break;
        case 'Roman' :
            $controller = new CategoryController();
            $controller->getRoman();
            break;
    }
}
else {
    $controller = new HomeController();
    $controller->homePage();

}


