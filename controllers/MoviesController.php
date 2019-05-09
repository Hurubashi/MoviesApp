<?php

class MoviesController
{
    public function actionMain() {
        include_once ROOT . '/views' . '/movies/main.php';
        return true;
    }
}