<?php

abstract class Controller {
    public function start() {

    }

    protected function render() {
        include_once('utils/head.php');
        include_once('components/header/header.view.php');
    }
}