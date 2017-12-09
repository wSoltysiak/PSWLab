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
        `login` VARCHAR(255) NOT NULL UNIQUE,
        `password` VARCHAR(64) NOT NULL,
        `firstName` VARCHAR(20) NOT NULL,
        `lastName` VARCHAR(20) NOT NULL,
        `monthName` VARCHAR(11) NOT NULL,
        `email` VARCHAR(255) NOT NULL,
        `phone` VARCHAR(12) NOT NULL,
        `interest` VARCHAR(255) NOT NULL,
        `bookName` VARCHAR(255) NOT NULL,
        `bookDescription` TEXT NOT NULL,
        `ageGroup` VARCHAR(8) NOT NULL,
        `firstAgreement` BOOLEAN NOT NULL DEFAULT FALSE,
        `secondAgreement` BOOLEAN NOT NULL DEFAULT FALSE,
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