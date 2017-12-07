<?php

function isPostRequest() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}