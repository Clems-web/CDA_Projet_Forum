<?php

namespace Cleme\Forum\Controller;

use Cleme\Forum\Controller\RenderView;

class CategoryController {

    use RenderView;

    /**
     * Display getRecipe view
     */
    public function getCategory() {

        $this->render('categories', 'Les catégories');
    }


    public function getJeux() {
        $this->render('Jeux', 'Jeux vidéos');
    }

    public function getFilm() {
        $this->render('Film', 'Films');
    }

    public function getSeries() {
        $this->render('Séries', 'Séries');
    }

    public function getManga() {
        $this->render('Manga', 'Mangas');
    }

    public function getAnime() {
        $this->render('Anime', 'Animes');
    }

    public function getRoman() {
        $this->render('Roman', 'Romans');
    }


}