<?php

function connectToDatabase() {
    $host = 'localhost';
    $user = 'root';
    $password = '1qazXSW@';

    $connection = new mysqli($host, $user, $password);
    if ($connection->connect_error) {
        die('Błąd podczas komunikacji z bazą danych');
    }

    $connection->select_db('biblioteka');

    return $connection;
}

function createDatabase($connection) {
    $connection->query('CREATE DATABASE IF NOT EXISTS biblioteka');
    $connection->select_db('biblioteka');
    return $connection->query('
      CREATE TABLE users(
        `id` INT NOT NULL AUTO_INCREMENT,
        `login` VARCHAR(255) NOT NULL,
        `password` VARCHAR(64) NOT NULL,
        `first-name` VARCHAR(20) NOT NULL,
        `last-name` VARCHAR(20) NOT NULL,
        `month` VARCHAR(11) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `phone` VARCHAR(12) NOT NULL,
        `interest` VARCHAR(255) NOT NULL,
        `book-name` VARCHAR(255) NOT NULL,
        `book-description` TEXT NOT NULL,
        `age-group` VARCHAR(8) NOT NULL,
        `first-agreement` BOOLEAN NOT NULL DEFAULT TRUE,
        `second-agreement` BOOLEAN NOT NULL DEFAULT TRUE,
        PRIMARY KEY (`id`)
      ) ENGINE = InnoDB'
    );
}

function dropDatabase($connection) {
    $isDatabaseExists = $connection->select_db('biblioteka');
    if ($isDatabaseExists) {
        return $connection->query('DROP DATABASE biblioteka');
    }
    return false;
}

function closeDatabaseConnection($connection) {
    $connection->close();
}